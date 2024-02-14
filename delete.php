<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $fatura_id = $_POST["delete"]; // Assuming you're passing the fatura_id via POST

    $sql = "DELETE FROM faturalar WHERE fatura_id = $fatura_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
