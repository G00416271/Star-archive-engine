<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
    <!--Gooogle fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link href="https://fonts.cdnfonts.com/css/star-wars" rel="stylesheet">
<!--Bootstraps-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/signuplogin.css">
    <link rel="stylesheet" href="../css/settings.css">
</head>
<body>



<div class="logo" id="logobar">
    <img src="resources/Logo/Star_logo_Cropped.gif" id="logo-gif">
    <img src="resources/Logo/Star_logo_static.jpg" id="logo-static">
    <div class="logo" id="text_star_archive">Star Archive</div>
</div>
<nav class="navbar">
    <ul class="navbar-menu">
        <li><a href="search.php">Search</a></li>
        <li><a href="#">Planets</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">About</a></li>
    </ul>
    <a href = "cart_table.php">
    <div id="cart">
        <img src="../resources/images/shopping-cart.png" alt="Shopping cart"  id="cart-icon" >
    <p id="countnum"></p>
    </a>
    </div>
</nav>


</head>

<?php session_start() ?>
<div id="settings-container">
    <h2>Settings</h2>
    <h3>Logged in as <?php echo $_SESSION['username'] ?></h3>
    <form id="settings" >
        <label for="username">Change Username:</label>
        <input type="text" id="username" name="username" class="settings-input" placeholder="New username" required>

        <!-- <label for="profilePic" class="settings-file">Profile Picture:</label>
        <input type="file" id="profilePic" name="profilePic" class="settings-input" accept="image/*"> -->

        <button type="submit" class="settings-button">Save Changes</button>
    </form>
</div>

<button id="logoutBtn" class="settings-button" style="margin-top: 20px; background: #f75f00; color: #fff;">
    Logout
</button>

<?php
var_dump($_SESSION);
var_dump($_COOKIE);


?>

<script src="../js/account.js"></script>
