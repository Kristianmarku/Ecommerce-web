<?PHP 
    include('includes/autoloader.inc.php');
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

            <div class="header">
                <h1>Contact Us</h1>
                <p>Send us a message!</p>
            </div>

            <hr>

            <div class="contact-form">
                <div class="contact-body">
                        <?php 
                            if(isset($_SESSION['flash_message'])){
                                print '<p style="color: red;">';
                                print $_SESSION['flash_message'];
                                print  '</p>';
                                unset($_SESSION['flash_message']);
                            }
                        ?>
                    <form action="includes/Contact.inc.php" method="POST">
                        <div class="input-group">
                            <input name="email" type="text" placeholder="E-mail">
                            <textarea name="message" type="text" placeholder="Message here..." style="margin-bottom: 10px"></textarea>
                        </div>
                        <button name="submit" type="submit">Send</button>
                    </form>
                </div>
            </div>
         
<?PHP 
    include('layout/footer.php')
?>  