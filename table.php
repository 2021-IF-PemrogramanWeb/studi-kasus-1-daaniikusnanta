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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <a href="" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="chart.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Chart
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="table.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Table
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="sidebar-custom">
                <a href="logout.php" class="btn btn-danger hide-on-collapse pos-right">Logout</a>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Chart</h1>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>On Date</th>
                                        <th>Off Date</th>
                                        <th>Ack By</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once("connection.php");
                                        $db = Database::getInstance();
                                        $conn = $db->getConnection(); 
                                        $sql = "SELECT c.ondate, c.offdate, e1.name AS disbyname, e2.name AS ackbyname, r.description AS reason FROM car c
                                            INNER JOIN employees e1 ON c.disbyid = e1.id
                                            INNER JOIN employees e2 ON c.ackbyid = e2.id
                                            INNER JOIN reasons r ON c.reasonid = r.id";
                                            $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>".$row['ondate']."</td>";
                                            echo "<td>".$row['offdate']."</td>";
                                            echo "<td>Ack by: ".$row['ackbyname']."<br>Dis by: ".$row['disbyname']."</td>";
                                            echo "<td>".$row['reason']."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    

    <script src="dist/plugins/jquery/jquery.min.js"></script>
    <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>