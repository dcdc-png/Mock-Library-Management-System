<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $book_id = $_POST['book_id'];

    $sql_txn = "
        UPDATE
            `transactions`
        SET
            `return_date` = CURDATE()
        WHERE
            `transaction_id` = {$transaction_id};
    ";

    $sql_books = "
        UPDATE
            `books`
        SET
            `is_available` = '1'
        WHERE
            `book_id` = {$book_id};
    ";

    $conn -> query($sql_txn);
    $conn -> query($sql_books);
    $conn -> close();

    header('Location: transactions.php');
    exit;
}