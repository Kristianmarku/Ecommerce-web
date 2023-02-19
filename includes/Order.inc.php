<?php 

include "../classes/Db.class.php";
include "../classes/Order.class.php";
include "../classes/OrderController.php";

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];

    // Instantiate ContactController class 
    $order = new OrderController($user_id, $product_id, $product_name);

    // Running error handlers
    $order->createOrder();

    // Going to back to front page 
    $_SESSION['flash_message'] = 'Product has been ordered!';
    header("Location: ../shop.php?");
}