<?php 
session_start();
class ProfileController extends Profile 
{
    private $username, $email;

    public function __construct($username, $email){
        $this->username = $username;
        $this->email = $email;
    }

    public function updateProfile(){
        if($this->emptyInput() == false){
            $_SESSION['flash_message'] = 'There was an error while updating your profile!';
            header("Location: ../profile.php");
            exit();
        }
        if($this->usernameTakenCheck() == false){
            $_SESSION['flash_message'] = 'Username or Email already taken!';
            header("Location: ../profile.php");
            exit();
        }
        if($this->invalidUsername() == false){
            $_SESSION['flash_message'] = 'Invalid Username!';
            header("Location: ../profile.php");
            exit();
        }
        if($this->invalidEmail() == false){
            $_SESSION['flash_message'] = 'Invalid Email!';
            header("Location: ../profile.php");
            exit();
        }

        $this->setProfile($this->username, $this->email);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->username) || empty($this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function usernameTakenCheck(){
        $result = false; 
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result = false; 
        if(!preg_match("/^[A-Za-z0-9]*$/", $this->username)){
                $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = false; 
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}
