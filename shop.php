<?PHP 
    include('includes/autoloader.inc.php');
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

            <div class="header">
                <h1>A few clicks is all it takes</h1>
                <p>Only the best material for your kid. Everything a kid needs! </p>

                <?php 
                    if(isset($_SESSION["userid"])){
                        if($_SESSION["roles_id"] == 2){

                ?>
                    <a href="<?= base_url('add-product.php')  ?>">
                        <button style="font-size: 14px; margin-bottom: 15px;">Add Products</button>
                    </a>
                <?php 
                        }
                    }
                ?>
            </div>

            <hr>

            <div id="products" class="products">
                <?php 
                    $product = new Product();
                    $stmt = $product->getProducts();
                    while($row = $stmt->fetch()){
                ?>
                <div class="item">
                    <div class="price-tag">
                        <?php  echo $row['price']?>€
                    </div>
                    <div class="item-thumbnail">
                        <img src="images/camera.png"/>
                    </div>
                    <div class="item-content">
                        <h3><?php echo $row['name'] ?></h3>
                        <p>Stock: <?php echo $row['quantity'] ?></p>

                      
                        <div style="display: flex">
                            <a href="
                                <?php 
                                    if(!isset($_SESSION["userid"])){
                                        print base_url('signin.php');
                                    }
                                ?>
                            ">
                                <button>Purchase</button>
                            </a>
                            <?php 
                                if(isset($_SESSION["userid"])){
                                    if($_SESSION['roles_id'] == 2){
                            ?>
                            <form action="includes/Product.inc.php" method="POST">
                                <input name="productId" type="hidden" value="<?php echo $row['id'] ?>">
                                <button name="deleteBtn" style="background-color: red;">Delete</button>
                            </form>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                        
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
<?PHP 
    include('layout/footer.php')
?>  