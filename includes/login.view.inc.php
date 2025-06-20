<?php

declare(strict_types=1);

function display_login_errors(): void {
    if (isset($_SESSION['login_errors'])) {
        $errors = $_SESSION['login_errors'];
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
        unset($_SESSION['login_errors']);
    }
}
