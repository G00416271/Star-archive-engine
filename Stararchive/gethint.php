<?php




$formQuestion = $_POST['formQuestion'] ?? '';
$location = $_POST['location'] ?? '';


//character nanme
$char_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';
//planet
$planet_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';
//species
$species_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';
//Droid
$droid_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';
//Ship
$ship_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';
//movies
$movie_hint = isset($_POST[$formQuestion]) ? htmlspecialchars($_POST[$formQuestion]) : '';


{$conn = new mysqli("stararchive","root","","stararchivedb");

$sql2 = "";


if (($formQuestion == 'char_name') and strlen($char_hint) > 0) {
    $sql2 = "SELECT char_name FROM characters WHERE LOWER(char_name) LIKE '%$char_hint%'";

} elseif (($formQuestion == 'planet_name')and strlen($planet_hint) > 0) {
    $sql2 = "SELECT planet_name FROM planets WHERE LOWER(planet_name) LIKE '%$planet_hint%'";

} elseif (($formQuestion == 'species_name')and strlen($species_hint) > 0) {
    $sql2 = "SELECT species_name FROM species WHERE LOWER(species_name) LIKE '%$species_hint%'";
}
elseif (($formQuestion == 'droid_name')and strlen($droid_hint) > 0) {
    $sql2 = "SELECT droid_name FROM droids WHERE LOWER(droid_name) LIKE '%$droid_hint%'";

}elseif (($formQuestion == 'ship_name')and strlen($ship_hint) > 0) {
    $sql2 = "SELECT ship_name FROM ships WHERE LOWER(ship_name) LIKE '%$ship_hint%'";

}elseif (($formQuestion == 'movie_name')and strlen($movie_hint) > 0) {
    $sql2 = "SELECT movie_name FROM movies WHERE LOWER(movie_name) LIKE '%$movie_hint%'";
}




if($sql2 != ""){
    $result2 = $conn-> query($sql2);     
    if($result2 -> num_rows > 0){
        $output = "";
        while($row = $result2->fetch_assoc()){
            $output .= "<li class='dropdown-content' onclick=\"locate('" . $location . "," . $formQuestion . "'); autofill('" . $row[$formQuestion] . "')\">" . $row[$formQuestion] . "</li>";
        }
            echo $output; // Output all concatenated results at once
    }
}
}

$conn->close();







?>