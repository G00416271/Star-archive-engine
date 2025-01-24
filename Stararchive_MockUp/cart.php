<html>
<head>

<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Gooogle fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link href="https://fonts.cdnfonts.com/css/star-wars" rel="stylesheet">
<!--Bootstraps-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!--CSS-->
<link href="navbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="search.css">
<link rel="stylesheet" type="text/css" href="resultShow.css">

<!--Java Script-->
<script src="navbar.js"></script>
<script src="searchArchive.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/functions.js"></script>





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
    <div id="cart">
    <img src="../resources/images/shopping-cart.png" alt="Shopping cart"  id="cart-icon">
    <p>(0)</p>
    </div>
</nav>

<div id="cart_response"></div>




</html>