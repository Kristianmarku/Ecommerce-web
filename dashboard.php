<?PHP 
     include('includes/autoloader.inc.php');
     include('config/app.php');
     include('layout/header.php');
     include('layout/navbar.php');
?>

    <?php 
        if(isset($_SESSION['flash_message'])){
            print '<p style="color: red;">';
            print $_SESSION['flash_message'];   
            print  '</p>';
            unset($_SESSION['flash_message']);
        }
    ?>

    <fieldset style="border:1px solid #2BA6CB; margin-bottom: 15px;">
        <legend style="color: #2BA6CB;">All Users</legend>
        <div  style="display:flex; justify-content:center;" class="order-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ROLE</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $user = new Register();
                    $stmt = $user->getUsers();
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td>
                            <?php $row['roles_id'] == 1 ? print "User" : print "Admin" ?>
                        </td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td>
                        <form action="includes/Register.inc.php" method="POST">
                            <input name="userId" type="hidden" value="<?php echo $row['id'] ?>">
                            <button name="deleteBtn" style="background-color: #FF2664;">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php 
                    }
                }else{
                    print '<td>No entries found</td>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>


    <fieldset style="border:1px solid #2BA6CB; margin-bottom: 15px;">
        <legend style="color: #2BA6CB;">All Orders</legend>
        <div  style="display:flex; justify-content:center;" class="order-table">
            <table>
                <thead>
                    <tr>
                        <th>USER ID</th>
                        <th>PRODUCT ID</th>
                        <th>PRODUCT</th>
                        <th>ORDERED AT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $order = new Order();
                    $stmt = $order->getAllOrders();
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                ?>
                    <tr>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['product_id'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['ordered_at'] ?></td>
                        <td>
                        <form action="includes/Order.inc.php" method="POST">
                            <input name="orderId" type="hidden" value="<?php echo $row['id'] ?>">
                            <button name="deleteBtn" style="background-color: #FF2664;">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php 
                    }
                }else{
                    print '<td>No entries found</td>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>

    <fieldset style="border:1px solid #2BA6CB; margin-bottom: 15px;">
        <legend style="color: #2BA6CB;">All Messages</legend>
        <div  style="display:flex; justify-content:center;" class="order-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EMAIL</th>
                        <th>MESSAGE</th>
                        <th>SENT AT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $message = new Contact();
                    $stmt = $message->getContacts();
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['message'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                        <form action="includes/Contact.inc.php" method="POST">
                            <input name="contactId" type="hidden" value="<?php echo $row['id'] ?>">
                            <button name="deleteBtn" style="background-color: #FF2664;">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php 
                    }
                }else{
                    print '<td>No entries found</td>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>
    
<?PHP 
    include('layout/footer.php')
?>  