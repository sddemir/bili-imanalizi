<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $musteri_id = $_POST["delete"]; // Assuming you're passing the musteri_id via POST

    $sql = "DELETE FROM musteri_bilgi WHERE musteri_id = $musteri_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
