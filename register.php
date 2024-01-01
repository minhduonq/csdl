<?php
// Connect to MySQL
try {
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "shop";
    try {
        $conn = mysqli_connect($servername, $username, $password, $database);
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"]; // Hash the password
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $role = $_POST["role"];
      
        if ($role == "customer") {
            $sql = "INSERT INTO customers (username, password, fname, lname, phone, address, email) VALUES ('$username', '$password', '$fname', '$lname', '$phone', '$address', '$email')";
        } elseif ($role == "petsitter") {
            $sql = "INSERT INTO petsitters (username, password, fname, lname, phone, address, email) VALUES ('$username', '$password', '$fname', '$lname', '$phone', '$address', '$email')";
        } else {
            echo "Invalid role!";
            exit;
        }
    
      if ($conn->query($sql)) {
        echo "Đăng ký thành công!";
        } else {
        echo "Đăng ký thất bại";
        }
  } 
} catch (Exception $e) {
    echo "Lỗi:" .$e; 
}


// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

