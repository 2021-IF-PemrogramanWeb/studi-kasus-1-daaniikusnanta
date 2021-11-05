<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <a href="" class="brand-link text-center">
                <span class="brand-text font-weight-heavy ">Dashboard</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="table.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p class="text">Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="chart.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p class="text">Chart</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="sidebar-custom">
                <div class="nav nav-sidebar">
                    <a href="logout.php" class="btn btn-danger nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="text">Logout</p>
                    </a>
                </div>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header text-center">
                <h1>Chart</h1>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    

    <script>
        var xValues = [<?php include_once("connection.php");
                        
                        $sql = "SELECT description FROM `reasons`";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "\"" . $row['description'] . "\",";
                        }
                        ?>];

        var yValues = [<?php include_once("connection.php");
                        
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
                    backgroundColor: "orange",
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
    <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>   
</body>
</html>