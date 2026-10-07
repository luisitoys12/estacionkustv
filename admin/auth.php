<?php
require_once __DIR__ . "/../config/database.php";

function requireLogin() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION["usuario_id"])) {
        header("Location: login.php");
        exit;
    }
}

function requireAdmin() {
    requireLogin();
    if ($_SESSION["rol"] !== "admin") {
        die("Acceso denegado.");
    }
}

function getCurrentUser() {
    return $_SESSION["usuario"] ?? null;
}
?>