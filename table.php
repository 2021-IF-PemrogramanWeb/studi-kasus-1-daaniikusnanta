<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition">
    <div class="table">
        <div class="card-body">
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</html>