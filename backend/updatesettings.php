<?php
session_start();
// updatesettings.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
$servername = "stararchive";
$username = "root";
$password = "";
$dbname = "stararchivedb";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate input
    $newUsername = htmlspecialchars(trim($_POST['username']));

    if (!empty($newUsername)) {
        // Update username in the database
        $sql = "UPDATE users SET username = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $email = $_SESSION['email']; // Ensure session is started and email is set
        $stmt->bind_param("ss", $newUsername, $email);

        if ($stmt->execute()) {
            // Update session variable
            $_SESSION['username'] = $newUsername;
            echo "success";
        } else {
            echo "Error updating settings: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Username cannot be empty.";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>