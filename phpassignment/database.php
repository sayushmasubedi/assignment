<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = null ;
$dbname = "phpassignment";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>