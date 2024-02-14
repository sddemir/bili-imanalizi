<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "bilgi";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn, "SET NAMES utf8mb4");
?>

