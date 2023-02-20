<?php 
// session_start();
class Register extends DB 
{
    protected function setUser($username, $password, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (roles_id, username, password, email) VALUES (1, ?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email))){
            $stmt = null;   
            $_SESSION['flash_message'] = 'There was an error with your registration';
            header("Location: ../signup.php");
        } 
            $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $email))){
            $stmt = null;   
            $_SESSION['flash_message'] = 'There was an error with your registration';
            header("Location: ../signup.php");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;

    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
         if(!$stmt->execute([$id])){
             $_SESSION['flash_message'] = 'There was an error while deleting a user!';
             header("Location: ../dashboard.php");
             exit();
         }else{
             $_SESSION['flash_message'] = 'User deleted!';
             header("Location: ../dashboard.php");
             exit();
         }
 }

    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
}