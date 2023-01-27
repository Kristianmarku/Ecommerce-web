<?php 

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate RegisterController class 
    include "../classes/Db.class.php";
    include "../classes/Login.class.php";
    include "../classes/LoginController.php";
    $login = new LoginController($username, $password);

    // Running error handlers and user login
    $login->loginUser();

    // Going to back to front page 
    header("Location: ../index.php?logged=in");
}
