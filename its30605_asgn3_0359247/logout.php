<?php
session_start();

// echo "<pre>";
// print_r($_POST);

$destination = $_POST['destination'] ?? "index.php";

$_SESSION = array();
header("Location: {$destination}");
exit;