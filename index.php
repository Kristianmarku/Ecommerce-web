<?PHP 
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>
<?php 
    if(isset($_SESSION["userid"]))
    {
?>
        <div class="loginBar">
            <p><?php echo $_SESSION["username"]  ?></p>
                <?php 
                    if($_SESSION["roles_id"] == 2){
                        echo '<p class="badge">Admin</p>';
                    }
                ?>
        </div>
<?php 
    }
?>
        <div class="slider-container">
            <img src="" id="slider">
        </div>
        <div class="welcome">
            <div class="row">
                <h1>Selling the best baby products!</h1>
            </div>
        </div>
        <div class="featured">
            <div class="column">
                <h1>Shipping</h1>
                <p>Free shipping on 50€</p>
            </div>
            <div class="column">
                <h1>Gift Cards</h1>
                <p>Give the gift of luxury.</p>
            </div>
            <div class="column">
                <h1>Size Charts</h1>
                <p>The perfect fit guaranteed.</p>
            </div>
        </div>
<?PHP 
    include('layout/footer.php')
?>