<?php 

include "../classes/Db.class.php";
include "../classes/Contact.class.php";
include "../classes/ContactController.php";

if(isset($_POST["submit"]))
{
    header("Location: ../contact.php?redirect-successs");

    // Grabbing the data
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Instantiate ContactController class 
    $contact = new ContactController($email, $message);

    // Running error handlers
    $contact->createContact();

    // Going to back to front page 
    $_SESSION['flash_message'] = 'Message sent!';
    header("Location: ../contact.php?sent-successfully");
}

if(isset($_POST['deleteBtn'])){
    $id = $_POST['contactId'];
    $contact = new Contact();
    $contact->deleteContact($id);
}