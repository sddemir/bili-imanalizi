<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Add FullCalendar CSS (from CDN) -->

<!-- Add FullCalendar JavaScript (from CDN) -->

<style>
    .is-clickable {
      cursor: pointer;
    }
    
    
  
        body {
            background-image: url('maphey.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; /* Text color */
            height:700px;
        }

        .navbar.is-primary {
            background-color: #363636; /* Dark background color for navbar */
            color: #fff; /* Text color for navbar */
        }

        .navbar-item:hover {
            background-color: #1e1e1e; /* Dark background color on hover */
        }

        .card {
            background-color: #7b7775; /* Dark background color for cards */
            color: #fff; /* Text color for cards */
            border: 1px solid #4a4a4a; /* Border color for cards */
        }

        .card-header-title {
            color: #fff; /* Text color for card titles */
        }

        .card-toggle-button {
            color: #fff; /* Icon color for card toggle buttons */
        }

        .container {
            max-width: 1200px;
        }

        /* #myChart {
            background-color: #7b7775; /* Dark background color for chart */
            border: 1px solid #4a4a4a; /* Border color for chart */
        } */

        #searchResults {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent dark background for search results */
            padding: 10px;
            margin-top: 10px;
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
<?php
    include 'db.php'; // Include the database connection file
    $query = $conn->query("
    SELECT COUNT(sozlesmeler.islem_id) as islem_sayisi, yapilacak_islem.islem_ad
    FROM sozlesmeler, yapilacak_islem
    WHERE sozlesmeler.islem_id = yapilacak_islem.islem_id
    GROUP BY yapilacak_islem.islem_id
    ");

    foreach ($query as $data) {
        $islem[] = $data['islem_ad'];
        $islem_sayisi[] = $data['islem_sayisi'];
    }
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
                <h1 class="title is-4" style="color:#FFF">Şahbay <span style="color:#FFD56F">Harita Mühendislik</span></h1>
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
    
    
    

<section class="section">
    <div class="container">
        <div class="columns">
            <!-- First Square - Faturalar -->
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header" id="fatura-card-header">
                        <p class="card-header-title">Faturalar</p>
                        <!-- Symbol for Toggle -->
                        <a class="card-toggle-button" id="fatura-toggle-button">
                            <span class="icon is-small">
                                <i class="fas fa-plus"></i>
                            </span>
                        </a>
                    </header>                    
                    <div class="card-content is-hidden" id="fatura-islemleri">
                        <div class="content">
                            <!-- Content for Faturalar Card -->
                            <!-- Toggle bar for Fatura İşlemleri -->
                            <p><a href="fatura_bilgi.php" class="has-text-white">Fatura Bilgileri</a></p>
                            <p><a href="fatura.php" class="has-text-white">Fatura İşlemleri</a></p>
                        </div>
                    </div>
                </div>
            </div>


            <?php
// Assuming you have already established a database connection
// $conn = mysqli_connect("your_host", "your_username", "your_password", "bilgi");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the count of rows in 'musteri_bilgi' table
$sql = "SELECT COUNT(*) as rowCount FROM musteri_bilgi";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $rowCount = $row['rowCount'];
} else {
    // Handle the query error if needed
    $rowCount = 0;
}

mysqli_close($conn);
?>

<!-- Second Square - Müşteri Sayısı -->
<div class="column is-one-third">
    <div class="card">
        <header class="card-header" id="musteri-card-header">
            <p class="card-header-title">Müşteri Sayısı: <?php echo $rowCount; ?></p>
            <!-- Symbol for Toggle -->
            <a class="card-toggle-button" id="musteri-toggle-button">
                <span class="icon is-small">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
        </header>
        <div class="card-content is-hidden" id="musteri-islemleri">
            <div class="content">
                <!-- Toggle bars for Müşteri Bilgileri and Müşteri İşlemleri -->
                <p><a href="musteri_bilgi.php" class="has-text-white">Müşteri Bilgileri</a></p>
                <p><a href="musteri.php" class="has-text-white">Müşteri İşlemleri</a></p>
            </div>
        </div>
    </div>
</div>


            <!-- Third Square - Szöleşmeler -->
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header" id="sozlesme-card-header">
                        <p class="card-header-title">Sözleşmeler</p>
                        <!-- Symbol for Toggle -->
                        <a class="card-toggle-button" id="sozlesme-toggle-button">
                            <span class="icon is-small">
                                <i class="fas fa-plus"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content is-hidden" id="sozlesme-islemleri">
                        <div class="content">
                            <!-- Content for Sözleşmeler Card -->
                            <!-- Toggle bars for Sözleşme İşlemleri and Sözleşme Bilgileri -->
                            <p><a href="sozlesme.php" class="has-text-white">Sözleşme İşlemleri</a></p>
                            <p><a href="sozlesme_bilgi.php" class="has-text-white">Sözleşme Bilgileri</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Card Elements -->
        <!-- <section>
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <h3>Toplam Satış Kazancı</h3>
                                    <p><span id="totalSales">Your Data Here</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <h3>Aylık Kazanç</h3>
                                    <p><span id="monthlyEarnings">Your Data Here</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <h3>Yıllık Kazanç</h3>
                                    <p><span id="annualEarnings">Your Data Here</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         -->

        <!-- Bottom Card Element and Calendar -->
<section>
    <div class="container">
        <div class="columns">
        <div class="column is-one-third">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h3 style="color:#fff;">Son Projeler</h3>
                <?php
                // Assuming you have already established a database connection
                $conn = mysqli_connect("localhost", "root", "", "bilgi");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to get the latest 3 entries from 'sozlesmeler' table
                $sqlSonProjeler = "SELECT sozlesme_id, aciklama FROM sozlesmeler ORDER BY sozlesme_tarih DESC LIMIT 3";
                $resultSonProjeler = mysqli_query($conn, $sqlSonProjeler);

                if ($resultSonProjeler) {
                    // Display the column headers outside the loop
                    echo '<div class="columns" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;">';
                    echo '<div class="column" style="border-right: 1px solid #ddd; padding-right: 10px;"><h4>Sözleşme ID</h4></div>';
                    echo '<div class="column"><h4>Açıklama</h4></div>';
                    echo '</div>';

                    // Loop through the result set
                    while ($rowSonProjeler = mysqli_fetch_assoc($resultSonProjeler)) {
                        echo '<div class="columns" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;">';
                        echo '<div class="column" style="border-right: 1px solid #ddd; padding-right: 10px;">';
                        echo '<p><span id="contractID">' . $rowSonProjeler['sozlesme_id'] . '</span></p>';
                        echo '</div>';
                        echo '<div class="column">';
                        echo '<p><span id="description">' . $rowSonProjeler['aciklama'] . '</span></p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // Handle the query error if needed
                    echo "Error: " . mysqli_error($conn);
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>





            
            <div class="column is-two-third">
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <!-- Content for Calendar -->
                            <div class="calendar-container"><div style="width: 700px;">
  <canvas id="myChart"></canvas>
</div>
<script>
    const labels = <?php echo json_encode($islem); ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: 'Yapılan İşlem Dağılımı',
        data: <?php echo json_encode($islem_sayisi); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };

    const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      x: {
        beginAtZero: true,
        ticks: {
          color: 'rgba(0, 0, 0, 0.8)' // Set the color of x-axis labels
        }
      },
      y: {
        beginAtZero: true,
        ticks: {
          color: 'rgba(0, 0, 0, 0.8)' // Set the color of y-axis labels
        }
      }
    }
  }
};

var myChart = new Chart(
  document.getElementById('myChart'),
  config
);

</script></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="searchResults" style="margin-top: 10px;"></div>



<!-- Add any additional scripts or JavaScript dependencies here -->


</body>
</html>

</body>
</html>

