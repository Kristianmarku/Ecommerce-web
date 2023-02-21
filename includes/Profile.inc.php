<?php 
include "../classes/Db.class.php";
include "../classes/Profile.class.php";
include "../classes/ProfileController.php";

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $username = $_POST['username']; 
    $email = $_POST['email'];

    // Instantiate UserController class 
    $user = new ProfileController($username, $email);

    // Running error handlers
    $user->updateProfile();

    // Going to back to front page 
    $_SESSION['flash_message'] = 'Profile Updated!';
    header("Location: ../profile.php");
}