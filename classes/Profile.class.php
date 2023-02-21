<?php 
class Profile extends Db
{
    protected function setProfile($username, $email){
        $stmt = $this->connect()->prepare('UPDATE users SET username = ?, email = ? WHERE id = ?');

        if(!$stmt->execute(array($username, $email, $_SESSION["userid"]))){
            $stmt = null;
            $_SESSION['flash_message'] = 'There was an error while updating your profile!';
            header("Location: ../profile.php");
            exit(); 
        }

        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;

        $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $email))){
            $stmt = null;   
            $_SESSION['flash_message'] = 'There was an error while updating your profile!';
            header("Location: ../profile.php");
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
}