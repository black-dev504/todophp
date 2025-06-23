<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require_once 'dbh.inc.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    try {
        require_once 'config_session.inc.php';
        require_once 'models/signup.model.inc.php';
        require_once 'controls/signup.contr.inc.php';


        // ERROR HANDLING
            $errors = [];
            if(is_input_empty($username, $email, $pwd)){
                $errors['emptyfields'] = 'Please fill in all fields.';
                throwValidationError($errors);
            }

            if(is_email_invalid($email)){
                $errors['email'] = 'Invalid email format.';
                throwValidationError($errors);
            }

            if(is_username_taken($pdo, $username)){
                $errors['username'] = 'Username is already taken.';
                throwValidationError($errors);
            }

            if(is_email_registered($pdo, $email)){
                $errors['email'] = 'Email is already registered.';
                throwValidationError($errors);
            }



          
            create_user($pdo, $username, $email, $pwd);
            $pdo = null; 
            $stmt = null; 
            header("Location: ../login.php?signup=success");
            die();

    } catch ( PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ./signup.php?error=invalidrequest');
    die();
}

function throwValidationError(array $message) {
    $_SESSION['errors'] = $message;
    header('Location: ../signup.php?error=signupfailed');
    die();
}