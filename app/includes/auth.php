<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: /surfschool-manager/login.php");
    exit();
}

function confirm_logged_in() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /surfschool-manager/login.php");
        exit();
    }
}

function confirm_admin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: /surfschool-manager/dashboard.php");
        exit();
    }
}
?>