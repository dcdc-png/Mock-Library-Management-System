<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];

    $sql = "
        DELETE
        FROM
            `books`
        WHERE
            `book_id` = ?
    ";

    $conn -> execute_query($sql, [$book_id]);
    $conn -> close();

    header('Location: view.php');
    exit;
    
} else {
    header('Location: index.php');
    exit;
}
