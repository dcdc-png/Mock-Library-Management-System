<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "asgn3_library_db";

$conn = new mysqli($servername, $username, $password, $db_name);

// echo "<pre>";
// print_r($conn);
// echo "</pre>";

if ($conn -> connect_error) {
    die("Failed to connect to MySQL: {$conn -> connect_error}");
}
// echo "Successfully connected to database.<br />";