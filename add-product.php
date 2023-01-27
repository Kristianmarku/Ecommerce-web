<?PHP 
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

<form action="includes/Product.inc.php" method="POST">
    <div class="add-product-form">
            <h3>Add a Product</h3>
            <input name="name" type="text" placeholder="Product Name">
            <input name="quantity" type="number" placeholder="Product Quantity">
            <input name="price" type="number" placeholder="Product Price">
            <button type="submit" name="submit">Save</button>
    </div>
</form>
    
<?PHP 
    include('layout/footer.php')
?>  