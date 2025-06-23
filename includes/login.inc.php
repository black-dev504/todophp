<?php

declare(strict_types=1);

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require_once 'dbh.inc.php';
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    

try {
    require_once 'models/login.model.inc.php';
    require_once 'controls/login.contr.inc.php';
    require_once 'config_session.inc.php';

    // ERROR HANDLING
    $errors = [];
    if(is_input_empty($username, $pwd)){
        $errors['emptyfields'] = 'Please fill in all fields.';
        throwValidationError($errors);
    }

    $result = get_user($pdo, $username);

    if(!does_user_exist($result)){
        $errors['user'] = 'User does not exist.';
        throwValidationError($errors);

    }

    if(!is_password_correct($result, $pwd)){
        $errors['password'] = 'Incorrect password.';
        throwValidationError($errors);

    }

    
    
        login_user( $result['id'], $result['username'], $result['email']);
        $pdo = null; 
        header("Location: ../index.php?login=success");
        die();
    

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

}  else {
    header('Location: ../login.php?error=invalidrequest');
    die('Invalid request method.');  
}

function throwValidationError(array $message) {
    $_SESSION['errors'] = $message;
    header('Location: ../login.php?error=loginfailed');
    die();
}