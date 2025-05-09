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
<body>

<div id="hyperspace">
    <h2>Welcome</h2>
    <div class="formBox">
        <button onclick="showForm('login')">Login</button>
        <button onclick="showForm('signup')">Sign Up</button>
    </div>

    <div id="form-container">
        <form id="loginForm" class="active" onsubmit="handleLogin(event)">
            <label for="loginEmail">Email</label>
            <input type="email" name="loginEmail" id="loginEmail" class="formQ" required>

            <label for="loginPassword">Password</label>
            <input type="password" name="loginPassword" id="loginPassword" class="formQ" required>

            <button type="submit"  id="search-btn">Login</button>
        </form>

        <form id="signupForm" onsubmit="handleSignup(event)">
            <label for="signupUsername">Username</label>
            <input type="text" name="signupUsername" id="signupUsername" class="formQ" required>

            <label for="signupEmail">Email</label>
            <input type="email" name="signupEmail" id="signupEmail" class="formQ" required>

            <label for="signupPassword">Password</label>
            <input type="password" name="signupPassword" id="signupPassword" class="formQ" required>

            <button type="submit" id="search-btn">Sign Up</button>
        </form>
    </div>

    <div id="resultShow"></div>
</div>

<script src="../js/signuplogin.js"></script>

</body>
</html>
