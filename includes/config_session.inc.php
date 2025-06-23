<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800, // Session cookie
    'path' => '/',
    'domain' => 'localhost', // Set to your domain if needed
    'secure' => true, // Use true if using HTTPS
    'httponly' => true,
]);

session_start();



if (!isset($_SESSION['last_activity'])) {
        set_activity();
} else {
    $limit = 1800;
    if (time() - $_SESSION['last_activity'] > $limit) {
       set_activity();
    }
}

function set_activity() {
    session_regenerate_id(true);
    $_SESSION['last_activity'] = time();
  
}

function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ./login.php');
        exit();
    }
}