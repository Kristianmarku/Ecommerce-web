<?php  
class Login extends DB 
{
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $password))){
            $stmt = null;   
            header("Location: ../signin.php?error=stmtfailed");
            exit(); 
        }

        if($stmt->rowCount() == 0){
            $stmt = null;   
            header("Location: ../signin.php?error=usernotfound");
            exit(); 
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pwdHashed[0]["password"]);

        
        if($checkPassword == false){
            $stmt = null;   
            header("Location: ../signin.php?error=wrongpassword");
            exit(); 
        }elseif($checkPassword == true){
            // user can login with email or username
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if(!$stmt->execute(array($username, $username, $password))){ 
                $stmt = null;   
                header("Location: ../signin.php?error=stmtfailed");
                exit(); 
            }

            if($stmt->rowCount() == 0){
                $stmt = null;   
                header("Location: ../signin.php?error=usernotfound");
                exit(); 
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["roles_id"] = $user[0]["roles_id"];
        }

        $stmt = null;
    }
}