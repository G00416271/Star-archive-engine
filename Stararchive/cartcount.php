
    <?php
    session_start();
    include 'cartFunctions.php';


    $id= isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';

    echo ("id: $id");
    


    //database connection
    $conn = new mysqli("stararchive","root","","stararchivedb");
    //check connections
    if ($conn -> connect_error) { 
        die("connection failed: ". $conn ->connect_error);
    }

    $sql_statement = "
    SELECT
    Characters.character_id,
    Characters.char_name,
    Characters.file_price,
    Species.species_name
    FROM characters
    LEFT JOIN Species ON Characters.species_id = Species.species_id
    WHERE character_id = '$id'";




    $result = $conn -> query($sql_statement);
    $conn ->close();

    $no_of_items = 0;
    $total_price = 0;

    if($result -> num_rows > 0){
        while($row = mysqli_fetch_array($result)) { 
            PHPaddtocart($id, $row['file_price'], $row['char_name'],$row['character_id']);
            
            $return_info = countItemsAndPrice();

            $no_of_items = $return_info['no_of_items'];
            $total_price = $return_info['total_price'];       
        }
    }else{
        echo 'No results found.';
        //echo ("id: $id");
        //var_dump($_SESSION);
    }

    
echo "<div id='cart_icon_php_gen'>";
echo    '<a href = "cart.php">';
echo    '<div id="cart">';
echo        '<img src="../resources/images/shopping-cart.png" alt="Shopping cart"  id="cart-icon" >';
echo    '<p>(<?php echo $cart_info['. $no_of_items . '];?>)</p>';
echo    '</a>';
echo    '</div>';








    ?>