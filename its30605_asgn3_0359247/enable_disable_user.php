<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    $sql = "
        UPDATE
            `users`
        SET
            `is_disabled` = NOT `is_disabled`
        WHERE
            `user_id` = ?;
    ";

    $conn -> execute_query($sql, [$user_id]);

    header('Location: users.php');

}
