<?php

declare(strict_types=1);

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require_once 'dbh.inc.php';
    $username = $_POST['username'];
    $pwd = $_POST['password'];


try {
    require_once 'login.model.inc.php';
    require_once 'login.contr.inc.php';

    // ERROR HANDLING
    $errors = [];
    if(is_input_empty($username, $pwd)){
        $errors['emptyfields'] = 'Please fill in all fields.';
    }
    $result = get_user($pdo, $username);

    if(!does_user_exist($result)){
        $errors['user'] = 'User does not exist.';
    }

    if(!is_password_correct($result, $pwd)){
        $errors['password'] = 'Incorrect password.';
    }


    require_once 'config_session.inc.php';
    if($errors){
        $_SESSION['login_errors'] = $errors;
        header('Location: ../login.php?error=loginfailed');
        die();
    } else {
        login_user( $result['id'], $result['username'], $result['email']);
        $pdo = null; // Close the connection
        $stmt = null; // Close the statement
        header("Location: ../index.php?login=success");
        die();
    }

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

}  else {
    header('Location: ../login.php?error=invalidrequest');
    die('Invalid request method.');  
}