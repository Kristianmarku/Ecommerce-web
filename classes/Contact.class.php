<?php 
class Contact extends Db
{
    protected function setContact($email, $message){
        $stmt = $this->connect()->prepare('INSERT INTO contacts (email, message, created_at) VALUES (?,?,?);');

        $created_at = date('Y-m-d H:i:s', time());
        
        if(!$stmt->execute(array($email, $message, $created_at))){
            $stmt = null;
            $_SESSION['flash_message'] = 'There was an error while sending a message!';
            header("Location: ../contact.php");
            exit(); 
        }
        $stmt = null;
    }

    public function getContacts(){
        $sql = "SELECT * FROM contacts";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function deleteContact($id){
           $sql = "DELETE FROM contacts WHERE id = ?";
           $stmt = $this->connect()->prepare($sql);
           $stmt->execute([$id]);
            if(!$stmt->execute([$id])){
                $_SESSION['flash_message'] = 'There was an error while deleting a contact!';
                header("Location: ../dashboard.php");
                exit();
            }else{
                $_SESSION['flash_message'] = 'Contact deleted!';
                header("Location: ../dashboard.php");
                exit();
            }
    }
}