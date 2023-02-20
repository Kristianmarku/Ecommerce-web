<?PHP 
    session_start();
?>
<div class="main">
    <div class="navbar">
        <ul>
            <?php if($_SESSION["roles_id"] == 1){ ?>
                <li><a class="<?php $_SERVER['REQUEST_URI'] == "/Ecommerce-web/index.php" ? print 'active-link' : '';  ?>" href="<?= base_url('index.php')  ?>">Home</a></li>
                <li><a class="<?php $_SERVER['REQUEST_URI'] == "/Ecommerce-web/contact.php" ? print 'active-link' : '';  ?>" href="<?= base_url('contact.php')  ?>">Contact</a></li>
            <?php }else{ ?>
                <li><a class="<?php $_SERVER['REQUEST_URI'] == "/Ecommerce-web/dashboard.php" ? print 'active-link' : '';  ?>" href="<?= base_url('dashboard.php')  ?>">Dashboard</a></li>
            <?php } ?>

            <li><a class="<?php $_SERVER['REQUEST_URI'] == "/Ecommerce-web/shop.php" ? print 'active-link' : '';  ?>" href="<?= base_url('shop.php')  ?>">Shop</a></li>

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
            <li><a class="<?php $_SERVER['REQUEST_URI'] == "/Ecommerce-web/signin.php" ? print 'active-link' : '';  ?>" href="<?= base_url('signin.php')  ?>">Signin</a></li>
            <?PHP 
                }
            ?>
        </ul>
        <img src="images/logo.png">
    </div>