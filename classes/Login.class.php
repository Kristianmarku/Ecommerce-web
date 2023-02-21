<?php  
session_start();
class Login extends DB 
{
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $password))){
            $stmt = null;   
            $_SESSION['flash_message'] = 'There was an error with your login!';
            header("Location: ../signin.php");
            exit(); 
        }

        if($stmt->rowCount() == 0){
            $stmt = null;   
            $_SESSION['flash_message'] = 'User not found!';
            header("Location: ../signin.php");
            exit(); 
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pwdHashed[0]["password"]);

        
        if($checkPassword == false){
            $stmt = null;   
            $_SESSION['flash_message'] = 'Username/Email or Password is incorrect!';
            header("Location: ../signin.php");
            exit(); 
        }elseif($checkPassword == true){
            // user can login with email or username
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if(!$stmt->execute(array($username, $username, $password))){ 
                $stmt = null;   
                $_SESSION['flash_message'] = 'There was an error with your login!';
                header("Location: ../signin.php");
                exit(); 
            }

            if($stmt->rowCount() == 0){
                $stmt = null;   
                $_SESSION['flash_message'] = 'User not found!';
                header("Location: ../signin.php");
                exit(); 
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["roles_id"] = $user[0]["roles_id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["email"] = $user[0]["email"];
        }

        $stmt = null;
    }
}