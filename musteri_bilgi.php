<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('maphey.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        h2 {
            color: #ddd;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
        }

        th,
        td {
            border: 1px solid #555;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333; /* Dark gray color */
        }

        tr:hover {
            background-color: #4d4d4d; /* Slightly lighter gray on hover */
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-buttons button {
            padding: 8px;
            margin: 4px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }
        .abc ul{background-color: #45474B;}
        .box{
            background-color: #45474B; 
        }
        .abc ul a{
            color: 	hsl(0, 0%, 96%);
        }
        .abc ul a:hover{
            color: black;
        }

        .delete-button {
            background-color: #ff4d4d; /* Red color for delete button */
            color: #fff;
        }

        .is-clickable {
            cursor: pointer;
        }

        .navbar {
            margin-bottom: 0px;
            background-color: #333;
        }

        #navbar-dropdown {
            max-width: 300px;
            background-color: #333;
            color: #fff;
        }

        .navbar-item.has-text-centered {
            width: 80%;
        }

        .card-toggle-button {
            cursor: pointer;
            color: #fff;
        }
    </style>

    <title>Your Dashboard</title>
    <script src="app.js"></script>
</head>

<body>
<?php
    include 'db.php'; // Include the database connection file

    // Fetch data from 'musteri_bilgi' table
    $sql = "SELECT * FROM musteri_bilgi";
    $result = $conn->query($sql);
    ?>

    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <!-- Toggle Button for Navbar -->
        <a class="card-toggle-button is-flex is-justify-content-center is-align-items-center" id="navbar-toggle-button">
            <span class="icon">
                <i class="fas fa-bars"></i>
            </span>
        </a>
        <div class="navbar-brand">
            <a class="navbar-item" href="app.php">
                <h1 class="title is-4" style="color:#fff">Müşteri <span style="color:#FFD56F">Bilgileri</span></h1>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                <form action="search.php" method="post">
    <div class="field has-addons">
        <div class="control">
            <input class="input" type="text" placeholder="Search" name="search">
        </div>
        <div class="control">
        <button class="button" style="background-color:#FFD56F" type="submit" name="submit">
                <span style="color:#fff"  class="icon is-small">
                    <i class="fas fa-search"></i>
                </span>
            </button>
        </div>
    </div>
</form>

</div>
                 <!-- Çıkış düğmesi için bu HTML kodunu ekleyin -->
<form method="post" action="logout.php" style="margin-top: 10px;">
    <button type="submit" class="button is-primary" style="background-color:#FFD56F">Çıkış Yap</button>
</form>
                <!-- <a class="navbar-item" href="#">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                </a> -->
            </div>
        </div>
        
    </nav>   
    <!-- Dropdown Menu for Toggle Button -->
     <!-- Dropdown Menu for Toggle Button -->
     <div class="content is-hidden dropdown-content-background-color:#7b7775 abc" id="navbar-dropdown">
        <div class="box" style="max-width: 300px;"> <!-- Adjust the max-width as needed -->
            <ul class="menu-list">
            <a href="musteri_bilgi.php" class="navbar-item has-text-centered" style="width: 80%;">Müşteri Bilgileri</a>
            <a href="musteri.php" class="navbar-item has-text-centered" style="width: 80%;">Müşteri İşlemleri</a>
            <a href="fatura_bilgi.php" class="navbar-item has-text-centered" style="width: 80%;">Fatura Bilgileri</a>
            <a href="fatura.php" class="navbar-item has-text-centered" style="width: 80%;">Fatura İşlemleri</a></li>
            <a href="sozlesme_bilgi.php" class="navbar-item has-text-centered" style="width: 80%;">Sözleşme Bilgileri</a>
            <a href="sozlesme.php" class="navbar-item has-text-centered" style="width: 80%;">Sözleşme İşlemleri</a>
            </ul>
        </div>
    </div>
    

    <table>
        <thead>
            <tr>
                <th style="color:#fff">Müşteri ID</th>
                <th style="color:#fff">Müşteri Adı</th>
                <th style="color:#fff">Müşteri Soyadı</th>
                <th style="color:#fff">E-Mail</th>
                <th style="color:#fff">Telefon Numarası</th>
                <th style="color:#fff">Doğum Tarihi</th>
                <th style="color:#fff">İlçe</th>
                <th style="color:#fff">Kayıt Tarihi</th>
                <th style="color:#fff">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['musteri_id']}</td>
                        <td>{$row['musteri_ad']}</td>
                        <td>{$row['musteri_soyad']}</td>
                        <td>{$row['musteri_e_mail']}</td>
                        <td>{$row['musteri_telefon']}</td>
                        <td>{$row['dogum_tarihi']}</td>
                        <td>{$row['ilce_id']}</td>
                        <td>{$row['kayit_tarihi']}</td>
                        <td class='action-buttons'>
                            <form method='post' action='delete_musteri.php'>
                                <input type='hidden' name='delete' value='{$row['musteri_id']}'>
                                <button type='submit' class='delete-button'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>