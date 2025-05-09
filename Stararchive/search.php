<?php session_start();
include 'cartFunctions.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$cart_info = countItemsAndPrice();
if (isset($_POST['action']) && $_POST['action'] == 'count') {
    echo $cart_info['no_of_items'];
    exit;
}






?>



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
<link href="../css/navbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/search.css">
<link rel="stylesheet" type="text/css" href="../css/resultshow.css">

<!--Java Script-->
<script src="../js/navbar.js"></script>
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
        <li><a href="">Search</a></li>
        <li><a href="#">Planets</a></li>
        <li><a id='account'>Account</a></li>
        <li><a href="#">About</a></li>
    </ul>
<!-- setcookie("active", "", time() - 3600)" -->

    <div id="username">Hey, <?php echo $_SESSION['username']??'';?> let's explore the galaxy!</div>
    <a href = "cart_table.php">
    <div id="cart">
        <img src="../resources/images/shopping-cart.png" alt="Shopping cart"  id="cart-icon" >
    <p id="countnum">(<?php echo $cart_info['no_of_items'];?>)</p>
    </a>
    </div>
</nav>



<body>
    <div id="hyperspace">
    <form id="search_archive" >

      <!-- planet -->
      <label for="planet_name">Planet</label>
      <div id="planet" class="formBox">
      <input class="formQ" type="text" id="planet_name" name="planet_name" onkeyup="getFiles('planet_name','txtHint_planet_name')">
        <button onclick="submit(); autoScroll()">➡</button>
        </div>
       <ul class="dropdown"   id="txtHint_planet_name"></ul>
       


      <!-- species -->
       <label for="species_name">Species</label>
      <input class="formQ" type="text" id="species_name" name="species_name" onkeyup="getFiles('species_name' ,'txtHint_speies_name')";>

       <ul class="dropdown"   id="txtHint_speies_name"></ul>


      <!-- religion -->
      <label for="religion_name">Religion</label>
      <select class="formQ" name="religion_name" id="religion_name">
      <option value=""></option>
      <option value="Jedi">jedi</option>
      <option value="Sith">sith</option>
      </select>

       <ul class="dropdown"  id="txtHint_religion_name"></ul>


      <!-- droid   -->
       <label for="droid_name">Droid</label>
      <input class="formQ" type="text" id="droid_name" name="droid_name" onkeyup="getFiles('droid_name' , 'txtHint_droid_name')">

       <ul class="dropdown" id="txtHint_droid_name"></ul> 


      <!-- ship_model -->
      <label for="ship_name">Ship </label>
      <input class="formQ" type="text" id="ship_name" name="ship_name" onkeyup="getFiles('ship_name' , 'txtHint_ship_name')">

       <ul class="dropdown"   id="txtHint_ship_name"></ul> 

      <!-- movies -->
      <label for="movie_name">Movies</label>
      <input class="formQ" type="text" id="movie_name" name="movie_name" onkeyup="getFiles('movie_name','txtHint_movie_name')">

       <ul class="dropdown"   class="dropdown"id="txtHint_movie_name"></ul> 


    <div id="nameOfChar">
        <!-- name -->
        <label for="char_name">Name</label>
        <input class="formQ" autofill="off" type="text" id="char_name" name="char_name" onkeyup="getFiles('char_name' , 'txtHint_char_name')">
        <ul  class="dropdown" id="txtHint_char_name"></ul>
    </div>

       
    </form>
    </div>

    <button id="search-btn" type="button" onclick="submit(); autoScroll()">submit</button>


       <div id="resultShow"></div>

    

  </body>
<script src="../js/home.js"></script>

</html>