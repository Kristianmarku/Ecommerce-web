<?php 
session_start();

class RegisterController extends Register{
    private $username, $email, $password, $password_confirm;

    public function __construct($username, $email, $password, $password_confirm)
    { 
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    public function registerUser(){
        if($this->emptyInput() == false){
            $_SESSION['flash_message'] = 'All fields are required!';
            header("Location: ../signup.php");
            exit();
        }
        if($this->invalidUsername() == false){
            $_SESSION['flash_message'] = 'Invalid Username!';
            header("Location: ../signup.php");
            exit();
        }
        if($this->invalidEmail() == false){
            $_SESSION['flash_message'] = 'Invalid Email!';
            header("Location: ../signup.php");
            exit();
        }
        if($this->pwdMatch() == false){
            $_SESSION['flash_message'] = 'Passwords not matching!';
            header("Location: ../signup.php");
            exit();
        }
        if($this->usernameTakenCheck() == false){
            $_SESSION['flash_message'] = 'Username or Email already taken!';
            header("Location: ../signup.php");
            exit();
        }
        
        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->password_confirm) ){
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

    private function pwdMatch(){
        $result = false; 
        if($this->password !== $this->password_confirm){
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
}