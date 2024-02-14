<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
<?php
    include 'db.php';
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

<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
<script>
    const labels = <?php echo json_encode($islem); ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($islem_sayisi); ?>,
        backgroundColor: [
          'rgb(139, 0, 0)',        // Dark Red
          'rgb(255, 69, 0)',       // Dark Orange-Red
          'rgb(205, 133, 0)',      // Dark Goldenrod
          'rgb(0, 128, 128)',      // Dark Teal
          'rgb(0, 0, 139)',        // Dark Blue
          'rgb(75, 0, 130)',       // Dark Indigo
          'rgb(112, 128, 144)'     // Slate Gray
        ],
        borderColor: [
          'rgb(139, 0, 0)',
          'rgb(255, 69, 0)',
          'rgb(205, 133, 0)',
          'rgb(0, 128, 128)',
          'rgb(0, 0, 139)',
          'rgb(75, 0, 130)',
          'rgb(112, 128, 144)'
        ],
        borderWidth: 1
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: [{
            beginAtZero: true,
            ticks: {
              color: "black"  // Font color for labels and numbers (black)
            }
          }]
        }
      }
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
</body>
</html>