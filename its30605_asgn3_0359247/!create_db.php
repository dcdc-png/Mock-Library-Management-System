<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "asgn3_library_db";

$conn = new mysqli($servername, $username, $password);

// echo "<pre>";
// print_r($conn);
// echo "</pre>";

if ($conn -> connect_error) {
    die("Failed to connect to MySQL: {$conn -> connect_error}");
} else {
    echo "Successfully connected to database.<br />";
}

$sql_create_db = "
    CREATE DATABASE IF NOT EXISTS {$db_name};
";

if ($conn -> query($sql_create_db)) {
    echo "Database created successfully.<br />";
} else {
    echo "Error creating database: {$conn -> error}";
}

$conn -> close();