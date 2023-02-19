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
                    <form action="">
                        <div class="input-group">
                            <input name="email" type="text" placeholder="E-mail">
                            <textarea name="message" type="text" placeholder="Message here..." style="margin-bottom: 10px"></textarea>
                        </div>
                        <button>Send</button>
                    </form>
                </div>
            </div>
         
<?PHP 
    include('layout/footer.php')
?>  