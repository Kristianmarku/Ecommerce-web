<?PHP 
    include('includes/autoloader.inc.php');
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

<form action="includes/Profile.inc.php" method="POST">
    <div class="add-product-form">
            <h3>Edit Profile</h3>
            <?php 
                if(isset($_SESSION['flash_message'])){
                    print '<p style="color: red;">';
                    print $_SESSION['flash_message'];
                    print  '</p>';
                    unset($_SESSION['flash_message']);
                    }
            ?>

            <input name="username" type="text" placeholder="Username" value="<?php echo $_SESSION["username"] ?>">
            <input name="email" type="email" placeholder="Email" value="<?php echo $_SESSION["email"] ?>">
            <button type="submit" name="submit">Save</button>
    </div>
</form>
    
<?PHP 
    include('layout/footer.php')
?>  