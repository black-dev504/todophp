<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/signup.view.inc.php';
?>

<!DOCTYPE html>
<?php require_once 'header.php'; ?>
<body>
 
    <div class="form-container">
    <h1>Signup</h1>
    <form action="includes/signup.inc.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" >
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <br>
        <input type="submit" value="Signup">
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <?php 
    check_signup_errors();
    ?>
 </div>
   
</body>
</html>