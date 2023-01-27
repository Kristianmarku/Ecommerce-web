<?PHP 
  include('config/app.php');
  include('layout/header.php');
  include('layout/navbar.php');
?>
        <div class="login-container">
          <div class="login-body">
            <h1>Sign Up</h1>

            <form action="includes/Register.inc.php" method="POST">
                <div class="input-group">
                    <input name="username" type="text" placeholder="Username" />
                    <input name="email" type="email" placeholder="Enter Email" />
                    <input name="password" type="password" placeholder="Enter Password"/>
                    <input name="confirm_password" type="password" placeholder="Confirm Password"/>
                </div>
                <div class="form-btn">
                    <button name="submit" type="submit">Register</button>
                </div>
            </form>
            <p>Already have an account? <a href="/Ecommerce-web/signin.php">Login here</a></p>
          </div>
        </div>

<?PHP 
    include('layout/footer.php')
?>  