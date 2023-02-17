<?php 
session_start();
class LoginController extends Login{
    private $username, $password; 

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            $_SESSION['flash_message'] = 'All fields are required!';
            header("Location: ../signin.php");
            exit();
        }
        
        $this->getUser($this->username, $this->password);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->username)  || empty($this->password) ){
                $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
 
} 