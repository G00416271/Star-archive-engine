<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!--Gooogle fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link href="https://fonts.cdnfonts.com/css/star-wars" rel="stylesheet">
<!--Bootstraps-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/">
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




<?php
session_start();
include 'cartFunctions.php';
$cart_info = countItemsAndPrice();

    $remove_item = isset($_POST['remove_item']) ? htmlspecialchars($_POST['remove_item']) : '';
    $change_item = isset($_POST['change_item']) ? htmlspecialchars($_POST['change_item']) : '';
    $change_number = isset($_POST['change_number']) ? htmlspecialchars($_POST['change_number']) : '';


//only if js function calls change item
    if($change_item){
        foreach($_SESSION['cart'] as $key => $item) { 
            if($item['id'] == $change_item) {
                $_SESSION['cart'][$key]['quantity'] += $change_number;

                if ($_SESSION['cart'][$key]['quantity'] == 0){
                    unset($_SESSION['cart'][$key]);
                }
                break;
            }
        }
    }



//only if js function calls remove item
    if($remove_item){
        foreach($_SESSION['cart'] as $key => $item) { 
            if((string)$item['id'] === (string)$remove_item) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }


    echo "<div id='cart_change'>";

    echo "<br><b>SHOPPING CART</b>";
    echo "<table style=\"width:100%\">
    <tr>
    <th class=\"custom-header\">name</th>
    <th class=\"custom-header\">price</th>
    <th class=\"custom-header\">quantity</th>
    <th class=\"custom-header\"></th>
    </tr>";

    $total_price = 0;



    foreach($_SESSION['cart'] as $item){
        echo "<tr>";
        echo "<td class=\"custom-row\">".$item['name']."</td>";
        echo "<td class=\"custom-row\">".$item['price']."</td>";
        echo "<td class=\"custom-row\">".$item['quantity']."</td>";
        echo "<td class=\"custom-row\"><button onclick=\"changeCartValue(".$item['id'] . ",-1)\"> - </button>"
        . $item['quantity']
        . "<button onclick=\"changeCartValue(".$item['id'] . ",1)\"> + </button></td>";
        echo "<td class=\"custom-row\"><button onclick=\"removeFromCart(".$item['id'].")\">Remove</button></td>";
        echo "</tr>";

        $total_price += $item['price'] * $item['quantity'];
    }

    // $conn -> close();

    echo "<tr> <td> Total </td> <td> $total_price </td> </tr>";

    echo "<tr> <td> Total</td> <td> </td> <td> </td> <td> </td> <td> &euro;$total_price </td>"; 
    echo "<td><button onclick='checkoutItems(". $total_price . ")'>Checkout</button></td></tr>";
    echo "</table>";
    echo "</div>";

    // var_dump($_SESSION);

    // foreach($_SESSION['cart'] as $item){
    //     echo ("the item id: ". $item['id']);
    // }

?>
</body>
<script src="../js/cart.js"></script>
</html>
