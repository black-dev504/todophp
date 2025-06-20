<?php

declare(strict_types=1);

function get_username(object $pdo, string $username) {

    $query = 'SELECT * FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {

    $query = 'SELECT * FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function create_user(object $pdo, string $username, string $email, string $pwd){
    try {
        $query = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :pwd);';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'pwd' => password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 12])
        ]);
        $pdo = null; // Close the connection
        $stmt = null; // Close the statement
        header("Location: ../login.php?signup=success");
    } catch (PDOException $e) {
        $pdo = null; // Close the connection
        // echo "Error: " . $e->getMessage();
        header("Location: ../signup.php?error=stmtfailedd");
        exit();
    }

    }