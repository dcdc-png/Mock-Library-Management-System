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

    $fields = array();
    $insert_params = array();
    $placeholders = array();

    foreach ($_POST as $key => $val) {
        $placeholders[] = '?';
        $fields[] = $key;
        $insert_params[] = $val;
    }

    $fields_imploded = implode(", ", $fields);
    $placeholders_imploded = implode(", ", $placeholders);

    $sql = "
        INSERT INTO `books`(
            {$fields_imploded}
        )
        VALUES(
            {$placeholders_imploded}
        );
    ";

    $conn -> execute_query($sql, $insert_params);
    $conn -> close();

    header('Location: view.php');

}
