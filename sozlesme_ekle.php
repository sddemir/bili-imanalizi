<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a random sozlesme_id within the specified range
    $sozlesme_id = rand(3015, 35001);

    // Retrieve data from the form
    $musteri_id = $_POST["musteri_id"];
    $islem_id = $_POST["islem_id"];
    $sozlesme_tarih = $_POST["sozlesme_tarih"];
    $aciklama = $_POST["aciklama"];

    // Use prepared statement to insert data
    $sql = "INSERT INTO sozlesmeler (sozlesme_id, musteri_id, islem_id, sozlesme_tarih, aciklama)
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $sozlesme_id, $musteri_id, $islem_id, $sozlesme_tarih, $aciklama);
    
    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


