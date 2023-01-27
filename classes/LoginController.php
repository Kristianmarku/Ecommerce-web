<?php 
class LoginController extends Login{
    private $username, $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header("Location: ../signin.php?error=emptyinput");
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