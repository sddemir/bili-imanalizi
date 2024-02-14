<?php
include 'db.php'; // Include the database connection file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fatura_id = rand(4000, 99999);
    // Retrieve data from the form
    $sozlesme_id = $_POST["sozlesme_id"];
    $net_tutar = $_POST["net_tutar"];
    $banka_id = $_POST["banka_id"];
    $fatura_tarihi = $_POST["fatura_tarihi"];

    // Use prepared statement to insert data
    $sql = "INSERT INTO faturalar (fatura_id, sozlesme_id, net_tutar_tl, banka_id, fatura_tarih)
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issis", $fatura_id, $sozlesme_id, $net_tutar, $banka_id, $fatura_tarihi);
    
    if ($stmt->execute()) {
        echo "Record inserted successfully";

        // Send email to the customer
        sendEmailToCustomer($sozlesme_id, $net_tutar);
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close(); // Close the database connection

function sendEmailToCustomer($sozlesme_id, $net_tutar) {
    global $conn;

    // Fetch customer email from the database based on sözleşme_id
    $result = $conn->query("SELECT mb.musteri_e_mail
                            FROM sozlesmeler s
                            JOIN musteri_bilgi mb ON s.musteri_id = mb.musteri_id
                            WHERE s.sozlesme_id = '$sozlesme_id'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customerEmail = $row['musteri_e_mail'];

        // Create PHPMailer object
        $mail = new PHPMailer(true);

        // Configure SMTP settings
        $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sumeyyedemir1903@gmail.com';
    $mail->Password = 'dpuaoyromjaqzpul';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;


        // Set email details
        $mail->setFrom('sumeyyedemir1903@gmail.com');
        $mail->addAddress($customerEmail);
        $mail->isHTML(true);

        // Set email subject and body
        $mail->Subject = 'Sahbay Harita Muhendislik Fatura';
        $mail->Body = "Adınıza fatura oluşturuldu. Tutar: $net_tutar TL";

        // Send the email
        try {
            $mail->send();
            echo '<script>alert("Email sent to customer successfully.");</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error sending email to customer. ' . $mail->ErrorInfo . '");</script>';
        }
    } else {
        echo "Error fetching customer email: " . $conn->error;
    }
}
?>
