<?PHP 
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

<form action="includes/Product.inc.php" method="POST">
    <div class="add-product-form">
            <h3>Add a Product</h3>
            <?php 
                if(isset($_SESSION['flash_message'])){
                    print '<p style="color: red;">';
                    print $_SESSION['flash_message'];
                    print  '</p>';
                    unset($_SESSION['flash_message']);
                    }
            ?>

            <input name="name" type="text" placeholder="Product Name">
            <input name="quantity" type="number" placeholder="Product Quantity">
            <input name="price" type="number" placeholder="Product Price">
            <button type="submit" name="submit">Add</button>
    </div>
</form>
    
<?PHP 
    include('layout/footer.php')
?>  