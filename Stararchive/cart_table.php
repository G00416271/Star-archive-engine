<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>

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

    foreach($_SESSION['cart'] as $item){
        echo ("the item id: ". $item['id']);
    }

?>
</body>
<script src="../js/cart.js"></script>
</html>
