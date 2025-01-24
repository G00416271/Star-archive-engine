<?php
function countItemsAndPrice(): array{
    $no_of_items = 0;
    $total_price = 0.00;

    foreach($_SESSION['cart'] as $item){
        $no_of_items += $item['quantity'];
        $total_price += $item['quantity']*$item['price'];
    }

    return [
        'no_of_items' => $no_of_items,
        'total_price' => $total_price
    ];
}


//function to add item to cart
function PHPaddToCart($itemId,$price,$name,$character_id){
    //check if item is already in the cart
    foreach ($_SESSION['cart'] as &$item){
        if ($item['id'] == $itemId){
            $item['quantity'] += 1;
            return;
        }

    }   
    //if the item is not in the cart, add it as a new entry
    $_SESSION['cart'][] = [
        'id' => $itemId,
        'price' => $price,
        'quantity' => 1,
        'name' => $name,
        'character_id' => $character_id
    ];
}







?>