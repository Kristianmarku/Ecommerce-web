<?php 

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm_password'];

    // Instantiate RegisterController class
    include "../classes/Db.class.php";
    include "../classes/Register.class.php";
    include "../classes/RegisterController.php";
    $register = new RegisterController($username, $email, $password, $password_confirm);

    // Running error handlers and user register 
    $register->registerUser();

    // Going to back to front page 
    header("Location: ../signin.php?registered-successfully");
}
