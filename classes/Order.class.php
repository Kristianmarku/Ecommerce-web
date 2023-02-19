<?php 
class Order extends Db
{
    protected function setOrder($user_id, $product_id, $product_name){
        $stmt = $this->connect()->prepare('INSERT INTO orders (user_id, product_id, product_name, ordered_at) VALUES (?,?,?,?);');

        $created_at = date('Y-m-d H:i:s', time());
        
        if(!$stmt->execute(array($user_id, $product_id, $product_name, $created_at))){
            $stmt = null;
            $_SESSION['flash_message'] = 'There was an error while ordering a product!';
            header("Location: ../shop.php");
            exit(); 
        }
        $stmt = null;
    }

    public function getOrders(){
        $userid = $_SESSION["userid"];
        $sql = "SELECT * FROM orders WHERE user_id = $userid";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
}