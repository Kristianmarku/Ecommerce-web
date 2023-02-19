<?php 
include "../classes/Db.class.php";
include "../classes/Product.class.php";
include "../classes/ProductController.php";

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $name = $_POST['name']; 
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Instantiate ProductController class 
    $product = new ProductController($name, $quantity, $price);

    // Running error handlers
    $product->createProduct();

    // Going to back to front page 
    $_SESSION['flash_message'] = 'Product added!';
    header("Location: ../add-product.php");
}

if(isset($_POST['deleteBtn'])){
    $id = $_POST['productId'];
    $product = new Product();
    $product->deleteProduct($id);
}