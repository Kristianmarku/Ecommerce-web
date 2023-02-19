<?php 
session_start();
class ContactController extends Contact 
{
    private $email, $message;

    public function __construct($email, $message){
        $this->email = $email;
        $this->message = $message;
    }

    public function createContact(){
        if($this->emptyInput() == false){
            $_SESSION['flash_message'] = 'There was an error while sending a message!';
            header("Location: ../contact.php?empty");
            exit();
        }

        $this->setContact($this->email, $this->message);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->email) || empty($this->message)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
