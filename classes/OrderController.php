<?php 
session_start();
class OrderController extends Order 
{
    private $user_id, $product_id, $product_name;

    public function __construct($user_id, $product_id, $product_name){
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
    }

    public function createOrder(){
        if($this->emptyInput() == false){
            $_SESSION['flash_message'] = 'There was an error while ordering a product!';
            header("Location: ../shop.php");
            exit();
        }

        $this->setOrder($this->user_id, $this->product_id, $this->product_name);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->user_id) || empty($this->product_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
