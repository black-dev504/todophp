<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/login.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body>
    <div class="form-container">
    <h1>Login</h1>
    <form action="includes/login.inc.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>
    <?php
    display_login_errors();
    ?>
</div>
 
</body>
</html>