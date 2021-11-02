<?php
include_once("connection.php");
$db = Database::getInstance();
$conn = $db->getConnection(); 

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
                header('Location: table.php');
            } else {
                echo "Login Failed";
            }
        }
    } else {
        echo "Login Failed";
    }
}
?>