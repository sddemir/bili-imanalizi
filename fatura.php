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

        .select select,
        .input,
        .label {
            color: #fff;
            background-color: #555;
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

        /* Add the following styles to make labels transparent */
        .column .field .label {
            background-color: transparent;
        }
        .card-toggle-button {
            cursor: pointer;
            color: #fff;
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
                <h1 class="title is-4 navbar-title">Fatura Ekleme <span style="color:#FFD56F">Sayfası</span></h1>
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
                <span class="icon is-small">
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

    <div class="container">
        <h2 class="title is-4 input-label">Fatura Ekleme Formu</h2>
        <form method="post" action="fatura_ekle.php">
            <div class="columns">
                <!-- <div class="column is-one-third">
                    <div class="field">
                        <label class="label">Fatura ID</label>
                        <div class="control input-container">
                            <input class="input" type="text" placeholder="Fatura ID" name="fatura_id">
                        </div>
                    </div>
                </div> -->
                <div class="column is-one-third ml-5">
                    <div class="field">
                        <label class="label">Sözleşme ID</label>
                        <div class="control input-container">
                            <div class="select">
                                <select name="sozlesme_id">
                                    <?php
                                    include 'db.php'; // Include the database connection file

                                    // Fetch Sözleşme IDs from the database
                                    $result = $conn->query("SELECT sozlesme_id FROM sozlesmeler");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['sozlesme_id'] . "'>" . $row['sozlesme_id'] . "</option>";
                                    }

                                    $conn->close(); // Close the database connection
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="field">
                        <label class="label">Net Tutar</label>
                        <div class="control input-container">
                            <input class="input" type="text" placeholder="Net Tutar" name="net_tutar">
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-third">
                    <div class="field">
                        <label class="label ml-5">Banka ID</label>
                        <div class="control input-container">
                            <div class="select ml-5">
                                <select name="banka_id">
                                    <?php
                                    include 'db.php'; // Include the database connection file

                                    // Fetch bank IDs from the database
                                    $result = $conn->query("SELECT banka_id FROM bankalar");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['banka_id'] . "'>" . $row['banka_id'] . "</option>";
                                    }

                                    $conn->close(); // Close the database connection
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="field">
                        <label class="label ml-5">Fatura Tarihi</label>
                        <div class="control input-container ml-5">
                            <input class="input" type="text" placeholder="Fatura Tarihi" name="fatura_tarihi">
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="field">
                        <div class="button-container ml-5">
                        <button type="submit"  style="background-color:#FFD56F " class="button is-primary">Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>