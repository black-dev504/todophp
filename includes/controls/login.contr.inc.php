<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd): bool {
    return empty($username) || empty($pwd);
}

function does_user_exist( bool|array $result): bool {
    if($result){
        return true;
    }
    return false;
}

function is_password_correct(bool|array $result, string $pwd): bool {
    if ($result && password_verify($pwd, $result['password'])) {
        return true;
    }
    return false;
}

function login_user(int $id, string $username, string $email): void {
    require_once './config_session.inc.php';
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = htmlspecialchars($username);
    $_SESSION['email'] = htmlspecialchars($email);
}