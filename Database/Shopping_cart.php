<?php
$servername = "stararchive";
$username = "root";
$password = "";
$dbname = "stararchivedb";



$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE stararchive_Shopper";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli("stararchive", "root", "", "stararchivedb");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(30) NOT NULL,
  product_price VARCHAR(30) NOT NULL,
  product_quantity VARCHAR(30) NOT NULL,
  product_total VARCHAR(30) NOT NULL
  )";
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}






?>