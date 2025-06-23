<?php

declare(strict_types=1);

function display_errors(): void {
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        foreach ($errors as $error) {
            echo "<p class='text-red-500 mt-2'>$error</p>";
        }
        unset($_SESSION['errors']);
    }
}
