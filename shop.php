<?PHP 
    include('includes/autoloader.inc.php');
    include('config/app.php');
    include('layout/header.php');
    include('layout/navbar.php');
?>

            <div class="header">
                <h1>A few clicks is all it takes</h1>
                <p>Only the best material for your kid. Everything a kid needs! </p>
                <?php if($_SESSION["roles_id"] != 2){ ?>
                    <button id="myOrders" style="margin-bottom: 15px; margin-left: 15px">My Orders</button>
                <?php } ?>

                <?php 
                if(isset($_SESSION['flash_message'])){
                    print '<p style="color: red;">';
                    print $_SESSION['flash_message'];   
                    print  '</p>';
                    unset($_SESSION['flash_message']);
                    }
                ?>

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
                            <?php if(isset($_SESSION["userid"])){ ?>
                                <form action="includes/Order.inc.php" method="POST">
                                    <input name="user_id" type="hidden" value="<?php echo $_SESSION["userid"] ?>" >
                                    <input name="product_id" type="hidden" value="<?php echo $row['id'] ?>">
                                    <input name="product_name" type="hidden" value="<?php echo $row['name'] ?>">
                                    <?php if($_SESSION["roles_id"] != 2){ ?>
                                    <button name="submit" type="submit">Purchase</button>
                                    <?php } ?>
                                </form>
                            <?php }else{ ?> 
                                <a href="<?php base_url('signin.php') ?>">
                                    <button name="submit" type="submit">Signin</button>
                                </a>
                            <?php } 
                                if(isset($_SESSION["userid"])){
                                    if($_SESSION["roles_id"] == 2){
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

            <div id="orderTable" class="order-table" style="display: none">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $order = new Order();
                        $stmt = $order->getOrders();
                        if($stmt->rowCount() > 0){
                            while($row = $stmt->fetch()){
                    ?>
                        <tr>
                            <td><?php echo $row['product_id'] ?> : <?php echo $row['product_name']  ?> </td>
                            <td><?php echo $row['ordered_at'] ?></td>
                        </tr>
                    <?php 
                        }
                    }else{
                        print '<td>No orders found</td>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <script>
                /* Handle MyOrders button */
                var myOrders_btn = document.getElementById("myOrders");
                var products = document.getElementById("products");
                var orderTable = document.getElementById("orderTable");

                myOrders_btn.addEventListener("click", function () {
                    if(products.style.display != "none"){
                        products.style.display = "none";
                        orderTable.style.display = "block";
                    }else{
                        products.style.display = "flex";
                        orderTable.style.display = "none";
                    }
                });
            </script>
<?PHP 
    include('layout/footer.php')
?>  