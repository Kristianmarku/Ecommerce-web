<?PHP 
    session_start();
?>
<div class="main">
    <div class="navbar">
        <ul>
            <li><a href="<?= base_url('index.php')  ?>">Home</a></li>
            <li><a href="<?= base_url('shop.php')  ?>">Shop</a></li>
            <li><a href="<?= base_url('contact.php')  ?>">Contact</a></li>
            <!-- <li><a href="?= base_url('product.php')  ?>">Product</a></li> -->
            <?PHP 
                if(isset($_SESSION["userid"]))
                {
            ?>
            <li><a href="<?= base_url('includes/Logout.inc.php')  ?>">Logout</a></li>
            <?PHP 
                }
                else 
                {
            ?>
            <li><a href="<?= base_url('signin.php')  ?>">Signin</a></li>
            <?PHP 
                }
            ?>
        </ul>
        <img src="images/logo.png">
    </div>