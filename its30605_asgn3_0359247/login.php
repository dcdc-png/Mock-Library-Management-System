<?php
session_start();
require_once "connect_db.php";

$destination = $_POST['destination'] ?? "index.php";

if (isset($_SESSION['user_id'])) {
    header("Location: {$destination}");
    exit;
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        SELECT
            *
        FROM
            `users`
        WHERE
            `username` = ?
    ";

    $result = $conn -> execute_query($sql, [$username]); 
    $user_data = $result -> fetch_assoc();

    if ($user_data && ($password === $user_data['password']) && !($user_data['is_disabled'])) {
        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['is_admin'] = $user_data['is_admin'];

        // echo "Logged in successfully.";
        // prettyPrint($_SESSION);

    } else {
        // echo "Invalid username or password.";
        $_SESSION['login_error'] = true;
    };

    header("Location: {$destination}");
    exit;
};