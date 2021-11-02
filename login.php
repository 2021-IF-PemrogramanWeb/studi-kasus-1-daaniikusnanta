<?php
$servername = "localhost";
$username = "root";
$password = "katasandi";
$dbname = "studi-kasus-1";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["password"] == $password) {
                header('Location: table.html');
            } else {
                echo "Login Failed";
            }
        }
    } else {
        echo "Login Failed";
    }
}
?>