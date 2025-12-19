<?php
error_reporting(0);
ini_set('display_errors', 0);

$conn = mysqli_connect("db", "sqli", "sqli", "sqli");
if (!$conn) {
    die("Database connection failed");
}

mysqli_set_charset($conn, "utf8mb4");
?>