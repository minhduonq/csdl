<?php
// Connect to MySQL
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "shop";
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>