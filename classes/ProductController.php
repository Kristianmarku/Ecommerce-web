<?php 
class ProductController extends Product 
{
    private $name, $quantity, $price;

    public function __construct($name, $quantity, $price){
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function createProduct(){
        if($this->emptyInput() == false){
            header("Location: ../add-product.php?error=emptyinput");
            exit();
        }

        $this->setProduct($this->name, $this->quantity, $this->price);
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->name) || empty($this->quantity) || empty($this->price)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
