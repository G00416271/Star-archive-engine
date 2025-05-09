<?php
// confirmed.php
session_start();

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmed</title>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/confirmed.css" rel="stylesheet">
</head>
<body>
    <div class="confirmation-box">
        <h1>Order Confirmed</h1>
        <p>Thank you for your order! Your order has been successfully confirmed.</p>
        <a href="search.php">Return to Homepage</a>
    </div>
</body>
</html>
