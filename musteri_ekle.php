<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a random musteri_id
    $musteri_id = rand(1000, 9999);

    // Retrieve data from the form
    $musteri_ad = $_POST["musteri_ad"];
    $musteri_soyad = $_POST["musteri_soyad"];
    $musteri_telefon = $_POST["musteri_telefon"];
    $dogum_tarihi = $_POST["dogum_tarihi"];
    
    // For the "ilce_id", check if it's set in the POST data
    $ilce_id = isset($_POST["ilce_id"]) ? $_POST["ilce_id"] : null;
    
    $musteri_email = $_POST["musteri_email"];
    $kayit_tarihi = $_POST["kayit_tarihi"];

    // Use prepared statement to insert data
    $sql = "INSERT INTO musteri_bilgi (musteri_id, musteri_ad, musteri_soyad, musteri_telefon, dogum_tarihi, ilce_id, musteri_e_mail, kayit_tarihi)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssisss", $musteri_id, $musteri_ad, $musteri_soyad, $musteri_telefon, $dogum_tarihi, $ilce_id, $musteri_email, $kayit_tarihi);
    
    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
