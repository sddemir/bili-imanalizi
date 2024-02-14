<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-image: url('maphey.jpg');
        background-size: cover;
        background-position: center;
        color: #fff;
    }

    .navbar {
        background-color: #333;
    }

    .navbar-title {
        margin-left: 15px;
        color: #fff;
    }

    .input-label {
        margin-top: 15px;
        color: #ddd;
    }

    .input-container {
        margin-top: 10px;
    }

    .button-container {
        margin-top: 15px;
    }

    .label,
    .select,
    .input {
        color: #fff;
    }
    

    .select select {
        background-color: #555;
        border-color: #555;
    }

    .select select:hover {
        background-color: #777;
    }

    .button.is-primary {
        background-color: #4caf50;
    }

    .button.is-primary:hover {
        background-color: #45a049;
    }
    .card-toggle-button {
            cursor: pointer;
            color: #fff;
        }
        .custom-dark-background {
        background-color: #555;
        color: #fff; /* Set text color to white */
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
</style>


    <title>Your Dashboard</title>
    <script src="app.js"></script>
</head>

<body>

    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <a class="card-toggle-button is-flex is-justify-content-center is-align-items-center" id="navbar-toggle-button">
            <span class="icon">
                <i class="fas fa-bars"></i>
            </span>
        </a>
        <div class="navbar-brand">
            <a class="navbar-item" href="app.php">
                <h1 class="title is-4 navbar-title">Müşteri Ekleme <span style="color:#FFD56F">Sayfası</span></h1>
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
        <button   style="background-color:#FFD56F " style="color:#fff"  class="button is-primary" type="submit" name="submit">
                <span  class="icon is-small">
                    <i style="color:#fff" class="fas fa-search"></i>
                </span>
            </button>
        </div>
    </div>
</form>

</div>
                 <!-- Çıkış düğmesi için bu HTML kodunu ekleyin -->
<form method="post" action="logout.php" style="margin-top: 10px;">
<button type="submit" class="button is-primary"  style="background-color:#FFD56F">Çıkış Yap</button>
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

    <div class="container">
      <br>
        <form method="post" action="musteri_ekle.php">
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">Müşteri Adı</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="musteri_ad" placeholder="Müşteri Adı">
                    </div>
                </div>
                <div class="column is-one-third">
                    <label class="label">Müşteri Soyadı</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="musteri_soyad" placeholder="Müşteri Soyadı">
                    </div>
                </div>
                <div class="column is-one-third">
                    <label class="label">Telefon Numarası</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="musteri_telefon" placeholder="Telefon Numarası">
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">Doğum Tarihi</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="dogum_tarihi" placeholder="Doğum Tarihi">
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="field">
                        <label class="label">İlçe ID</label>
                        <div class="control input-container">
                            <div   class="select">
                                <select name="ilce_id" style="color:#FFD56F ">
                                    <?php
                                    include 'db.php'; // Include the database connection file

                                    // Fetch İlçe IDs from the database
                                    $result = $conn->query("SELECT ilce_id FROM gaziantep_ilceler");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['ilce_id'] . "'>" . $row['ilce_id'] . "</option>";
                                    }

                                    $conn->close(); // Close the database connection
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <label class="label">E-mail</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="musteri_email" placeholder="E-mail">
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">Kayıt Tarihi</label>
                    <div class="control input-container">
                        <input class="input custom-dark-background" type="text" name="kayit_tarihi" placeholder="Kayıt Tarihi">
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="button-container">
                        <button type="submit"  style="background-color:#FFD56F " class="button is-primary">Ekle</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
