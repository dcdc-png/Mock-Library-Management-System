<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_logged_in) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];

    $sql_books = "
        UPDATE
            `books`
        SET
            `is_available` = '0'
        WHERE
            `book_id` = ?
    ";

    $sql_txn = "
        INSERT INTO `transactions`(
            `user_id`,
            `book_id`,
            `borrow_date`
        )
        VALUES(
            ?,
            ?,
            CURDATE()
        );
    ";

    $txn_params = [$_SESSION['user_id'], $book_id]; 

    $conn -> execute_query($sql_books, [$book_id]);
    $conn -> execute_query($sql_txn, $txn_params);
    $conn -> close();

    header("Location: books.php?id={$book_id}");
    exit;
    
} else {
    header('Location: index.php');
    exit;
}