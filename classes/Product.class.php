<?php 

class Product extends Db
{
    protected function setProduct($name, $quantity, $price){
        $stmt = $this->connect()->prepare('INSERT INTO products (name, quantity, price) VALUES (?,?,?);');

        if(!$stmt->execute(array($name, $quantity, $price))){
            $stmt = null;
            header("Location: ../add-product.php?error=stmtfailed");
            exit(); 
        }
        $stmt = null;
    }

    public function getProducts(){
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    // // If we have user input i.e search form    
    // public function getProductsStmt($name){
    //     $sql = "SELECT * FROM products WHERE name = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$name]);
    //     $products = $stmt->fetchAll();
    // }

    public function deleteProduct($id){
           $sql = "DELETE FROM products WHERE id = ?";
           $stmt = $this->connect()->prepare($sql);
           $stmt->execute([$id]);
            if(!$stmt->execute([$id])){
                header("Location: ../shop.php?error=somethingWentWrong");
                exit();
            }else{
                header("Location: ../shop.php?product=deleted");
                exit();
            }
    }
}