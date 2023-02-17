<?PHP 
  include('config/app.php');
  include('layout/header.php');
  include('layout/navbar.php');
?>
        <div class="login-container">
          <div class="login-body">
            <h1>Welcome back!</h1>

            <form action="includes/Login.inc.php" method="POST">
              <div class="input-group">
                <input name="username" type="text" placeholder="Enter Email or Username" />
                <input name="password" type="password" placeholder="Enter Password"/>
              </div>
              <div>
                  <p style="color: red;">
                  <?php 
                      if(isset($_SESSION['flash_message'])){
                        print $_SESSION['flash_message'];
                        unset($_SESSION['flash_message']);
                      }
                  ?>
                  </p>
                </div>
              <div class="form-btn">
                <button name="submit" type="submit">Login</button>
              </div>
            </form>
            <p>Don't have an account? <a href="<?= base_url('signup.php')  ?>">Register here</a></p>
          </div>
        </div>
<?PHP 
    include('layout/footer.php')
?>  