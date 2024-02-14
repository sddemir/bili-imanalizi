<?php
include 'db.php';
$conn = new PDO("mysql:host=localhost;dbname=bilgi", "root", "");

if (isset($_POST['submit'])) {
    $fullName = $_POST['search'];

    // Split the full name into first name and last name
    $names = explode(' ', $fullName);
    $firstName = $names[0];
    $lastName = isset($names[1]) ? $names[1] : '';

    $sth = $conn->prepare("SELECT * FROM musteri_bilgi WHERE musteri_ad = :firstName AND musteri_soyad = :lastName");
    $sth->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $sth->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute();

    $results = $sth->fetchAll();

    if ($results) {
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Phone</th><th>Birth Date</th><th>Registration Date</th><th>District ID</th></tr>";

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row['musteri_id'] . "</td>";
            echo "<td>" . $row['musteri_ad'] . "</td>";
            echo "<td>" . $row['musteri_soyad'] . "</td>";
            echo "<td>" . $row['musteri_e_mail'] . "</td>";
            echo "<td>" . $row['musteri_telefon'] . "</td>";
            echo "<td>" . $row['dogum_tarihi'] . "</td>";
            echo "<td>" . $row['kayit_tarihi'] . "</td>";
            echo "<td>" . $row['ilce_id'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found";
    }
}
?>
