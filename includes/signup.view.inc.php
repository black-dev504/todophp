<?php

declare(strict_types=1);


function check_signup_errors(): void {
    if (isset($_SESSION['signup_errors'])) {
        $errors = $_SESSION['signup_errors'];
        foreach ($errors as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['signup_errors']);
    } else {
        if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
            echo '<br>';
            echo '<p class="success text-green-500">Signup successful! You can now login.</p>';
        }
    }
}
