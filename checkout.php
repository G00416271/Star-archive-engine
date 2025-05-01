<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <?php
    session_start();

    $user_id = $_SESSION['user_id'];
    $total_price = isset($_POST['total_price']) ? htmlspecialchars($_POST['total_price']) : '';

    //Database connection
    $conn = new mysqli('stararchive', 'root', '', 'stararchivedb');

    //Check connection
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    if ($user_id != 0) { 
        //Insert the order into the orders table
        $stmt = $conn -> prepare("INSERT INTO Orders (user_id, total_price) VALUES (?, ?)");
        $stmt -> bind_param("id", $user_id, $total_price);
        //Execute the statement
        if ($stmt -> execute()) {
            $order_id = $conn -> insert_id;
        } else {
            echo "Error: " . $stmt -> error;
        }
        $stmt -> close();
    


            echo "<br><b>ORDER HAS BEEN PLACED</b>";
            echo "<table style=\"width:90%\">
            <tr>
            <th class=\"custom-header\">name</th>
            <th class=\"custom-header\">price</th>
            <th class=\"custom-header\">quantity</th>
            <th class=\"custom-header\">total</th>
            </tr>";

        foreach($_SESSION['cart'] as $item) {
            
            //Insert the order details into the order_details table
            $stmt = $conn -> prepare("INSERT INTO Order_details (order_id, character_id, quantity) VALUES (?, ?, ?)");
            $total = $cart_item['quantity'] * $cart_item['price'];
            $stmt -> bind_param("iii", $order_id, $cart_item['character_id'], $cart_item['quantity']);
            //Execute the statement
            $stmt -> execute();
            $stmt -> close();

            echo "<tr>";
            echo "<td>" . $cart_item['name'] . "</td>";
            echo "<td>" . $cart_item['price'] . "</td>";
            echo "<td>" . $cart_item['quantity'] . "</td>";
            echo "<td>" . $total . "</td>";
            echo "</tr>";
        }

        //Create total price row
        echo "<tr>";
        echo "<td> Total Price</td>";
        echo "<td></td><td></td><td></td><td></td>";
        echo "<td>" . $total_price . "</td>";
        echo "</tr>";
        echo "</table>";
    }else{
        echo "You must be logged in to place an order.";
    }

    $conn -> close();

$conn -> close();


    ?>
</body>
</html>