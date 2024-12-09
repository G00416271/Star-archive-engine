<?php
$name = isset($_POST['char_name']) ? htmlspecialchars($_POST['char_name']) : '';
$planet = isset($_POST['planet_name'])? htmlspecialchars($_POST['planet_name']) : '';
$species= isset($_POST['species_name'])? htmlspecialchars($_POST['species_name']) : '';
$religion= isset($_POST['religion_name'])? htmlspecialchars($_POST['religion_name']) : '';
$droid= isset($_POST['droid_name'])? htmlspecialchars($_POST['droid_name']) : '';
$ship_model= isset($_POST['ship_name'])? htmlspecialchars($_POST['ship_name']) : '';
$pilot= isset($_POST['pilot_name'])? htmlspecialchars($_POST['pilot_name']) : '';
$movies = isset($_POST['movie_name'])? htmlspecialchars($_POST['movie_name']) : '';


{$conn = new mysqli("stararchive","root","","stararchivedb");
$query ="";
$query1="";


$query = "SELECT char_name FROM characters WHERE LOWER(char_name) LIKE '%$name%'";
$query1.= $query;




if($query1 != ""){
    $result2 = $conn-> query($query1);    
    if($result2 -> num_rows > 0){
        $output = "";
        while($row = $result2->fetch_assoc()){
            $output .= "<li class='dropdown-content' onclick=\"'" . $row['char_name'] . "'\">" . $row['char_name'] . "</li>";
        }
            echo $output; // Output all concatenated results at once
    }
}else{
    echo ("hi, the search query was empty...fix it you bright beautiful back man....");
}




}












?>