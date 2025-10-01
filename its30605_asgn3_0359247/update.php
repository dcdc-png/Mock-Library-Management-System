<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // prettyPrint($_POST);

    $book_id = $_POST['book_id'];
    $update_params = array();
    $set_statements = array();

    foreach ($_POST as $key => $val) {
        if ($key === 'book_id') { continue; }

        $set_statements[] = "`{$key}` = ?";
        $update_params[] = $val;
    }

    $set_statements_imploded = implode(", ", $set_statements);
    $update_params[] = $book_id;

    $sql = "
        UPDATE
            `books`
        SET
            {$set_statements_imploded}
        WHERE
            `book_id` = ?
    ";

    // echo $sql;
    // prettyPrint($update_params);

    $conn -> execute_query($sql, $update_params);
    $conn -> close();

    header('Location: view.php');

}
