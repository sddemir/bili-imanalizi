<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $sozlesme_id = $_POST["delete"];

    $sql = "DELETE FROM sozlesmeler WHERE sozlesme_id = $sozlesme_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
