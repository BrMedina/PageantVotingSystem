<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function require_login() {
    if (!isset($_SESSION['role'])) {
        header("Location: pageant_login.php");
        exit();
    }
}

function require_role(array $allowedRoles) {
    require_login();

    $role = $_SESSION['role'] ?? '';

    if ($role === 'admin') {
        return;
    }

    if (!in_array($role, $allowedRoles, true)) {
        header("Location: pageant_login.php");
        exit();
    }
}
?>