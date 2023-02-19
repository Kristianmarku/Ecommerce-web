<?php 
class Product extends Db
{
    protected function setProduct($name, $quantity, $price){
        $stmt = $this->connect()->prepare('INSERT INTO products (name, quantity, price) VALUES (?,?,?);');

        if(!$stmt->execute(array($name, $quantity, $price))){
            $stmt = null;
            $_SESSION['flash_message'] = 'There was an error while adding a product!';
            header("Location: ../add-product.php");
            exit(); 
        }
        $stmt = null;
    }

    public function getProducts(){
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    public function deleteProduct($id){
           $sql = "DELETE FROM products WHERE id = ?";
           $stmt = $this->connect()->prepare($sql);
           $stmt->execute([$id]);
            if(!$stmt->execute([$id])){
                $_SESSION['flash_message'] = 'There was an error while deleting a product!';
                header("Location: ../shop.php");
                exit();
            }else{
                $_SESSION['flash_message'] = 'Product deleted!';
                header("Location: ../shop.php");
                exit();
            }
    }
}