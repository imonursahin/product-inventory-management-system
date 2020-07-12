<?php 

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "stok";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: <br>" . $conn->connect_error);
}

#echo "Connected successfully <br>"

?>