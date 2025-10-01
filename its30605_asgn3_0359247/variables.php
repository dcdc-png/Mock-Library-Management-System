<?php
$has_login_error = $_SESSION['login_error'] ?? false;

$is_admin = $_SESSION['is_admin'] ?? false;
$is_logged_in = isset($_SESSION['user_id']);

$current_page = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"], "/") + 1);

function prettyPrint($str) {
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}