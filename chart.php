<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body class="hold-transition">
    <div class="chart">
        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>

    <script>
        var xValues = [<?php include_once("connection.php");
                        $db = Database::getInstance();
                        $conn = $db->getConnection(); 
                        
                        $sql = "SELECT description FROM `reasons`";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "\"" . $row['description'] . "\",";
                        }
                        ?>];

        var yValues = [<?php include_once("connection.php");
                        $db = Database::getInstance();
                        $conn = $db->getConnection(); 
                        
                        $sql = "SELECT COUNT(*) AS count, r.description FROM car c JOIN reasons r 
                            ON c.reasonid = r.id GROUP BY c.reasonid";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "\"" . $row['count'] . "\",";
                        }
                        ?>];                    
        
        new Chart("barChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: "red",
                    data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: "Jumlah Reason"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                },
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }
        });
    </script>
    
    <script src="dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="dist/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>   
    
</body>
</html>