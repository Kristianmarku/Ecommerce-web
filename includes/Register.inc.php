<?php 
include "../classes/Db.class.php";
include "../classes/Register.class.php";
include "../classes/RegisterController.php";
    
if(isset($_POST["submit"]))
{
    // Grabbing the data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm_password'];


    // Instantiate RegisterController class
    $register = new RegisterController($username, $email, $password, $password_confirm);

    // Running error handlers and user register 
    $register->registerUser();

    // Going to back to front page  
    $_SESSION['flash_message'] = "You've successfully registered!";
    header("Location: ../signin.php");
}

if(isset($_POST["deleteBtn"]))
{
    $id = $_POST["userId"];
    $user = new Register();
    $user->deleteUser($id);
}