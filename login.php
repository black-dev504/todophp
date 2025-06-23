<?php 
require_once 'includes/views/errorhandler.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body>
<div class="bg-white  max-w-[600px] mx-auto px-5 lg:px-20 py-8 my-20 rounded-lg shadow-lg">
    <h1 class="font-bold text-xl mb-6 text-[#333]">Login</h1>
    <form action="includes/login.inc.php" method="POST">
        <label class='block mb-2 text-[#555] text-xl' for="username">Username:</label>
        <input class='w-full px-2 py-3 mb-5 border-1 border-[#ccc] rounded-[6px] focus:border-[#b26cff] transition focus:outline-none  ' type="text" id="username" name="username" >
      
        <br>
        <label class='block mb-2 text-[#555] text-xl' for="password">Password:</label>
        <input  class='w-full px-2 py-3 mb-5 border-1 border-[#ccc] rounded-[6px] focus:border-[#b26cff] transition focus:outline-none  '  type="password" id="password" name="password" >
        <br>
        <input class="w-full bg-[#b26cff] mb-2 rounded-[6px] cursor-pointer p-3 text-white hover:bg-[#b26cE1]" type="submit" value="Login">
    </form>
    <p>Dont have an account? <a class='underline text-blue-500 italic' href="signup.php">Sign up</a></p>
    <?php 
     display_errors();
    ?>
 </div>
 
</body>
</html>