<?php

declare(strict_types=1);


function is_input_empty(string $username, string $email, string $pwd): bool {
    if (empty($username) || empty($email) || empty($pwd)) {
        return true;
    }
    return false;
}

function is_email_invalid(string $email): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function is_username_taken(object $pdo, string $username): bool {
   $user = get_username($pdo, $username);
   return $user !== false;
}

function is_email_registered(object $pdo, string $email): bool {
    $email = get_email($pdo, $email);
    return $email !== false;
 }

