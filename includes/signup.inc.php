<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require_once 'dbh.inc.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    try {
        require_once 'signup.model.inc.php';
        require_once 'signup.contr.inc.php';


        // ERROR HANDLING
            $errors = [];
            if(is_input_empty($username, $email, $pwd)){
            $errors['emptyfields'] = 'Please fill in all fields.';
            }

            if(is_email_invalid($email)){
                $errors['email'] = 'Invalid email format.';
            }

            if(is_username_taken($pdo, $username)){
                $errors['username'] = 'Username is already taken.';
            }

            if(is_email_registered($pdo, $email)){
                $errors['email'] = 'Email is already registered.';
            }


            require_once 'config_session.inc.php';

            if($errors){
               $_SESSION['signup_errors'] = $errors;
                header('Location: ../signup.php?error=signupfailed');
                die();
            } else {
                create_user($pdo, $username, $email, $pwd);
                $pdo = null; // Close the connection
                $stmt = null; // Close the statement
                header("Location: ../index.php?signup=success");
                die();
            }

    } catch ( PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ./signup.php?error=invalidrequest');
    die();
}