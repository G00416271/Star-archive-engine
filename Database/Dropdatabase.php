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

 // Drop database if exists                   //This block can delete databases? the sql querey i think "DROP DATABASES IF EXISTS"
 $sql = "DROP DATABASE IF EXISTS stararchivedb";
 if ($conn->query($sql) === TRUE) {
   echo "Database dropped successfully<br>";
 } else {
   echo "Error creating database: " . $conn->error;
 }
?>