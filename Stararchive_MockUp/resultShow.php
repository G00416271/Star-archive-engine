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
    $conditions = [];

    // Construct SQL query dynamically based on provided filters
    

    if (!empty($name)) {
        $conditions[] = "char_name LIKE '%$name%'";
    }
    

    if (!empty($planet)) {
        $conditions[] = "planet_name LIKE '%$planet%'";
    }
    

    if (!empty($species)) {
        $conditions[] = "species_name LIKE '%$species%'";
    }
    

    if (!empty($religion)) {
        $conditions[] = "religion_name LIKE '%$religion%'";
    }
    

    if (!empty($droid)) {
        $conditions[] = "droid_name LIKE '%$droid%'";
    }
    
   
    if (!empty($ship_model)) {
        $conditions[] = "ship_name LIKE '%$ship_model%'";
    }
    

    if (!empty($pilot)) {
        $conditions[] = "pilot_name LIKE '%$pilot%'";
    }
    

    if (!empty($movies)) {
        $conditions[] = "movie_name LIKE '%$movies%'";
    }
    
    // Build the SQL query
    $sql = "SELECT * FROM Characters";
    
    // If there are any conditions, append them to the SQL query
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    
    // Optional: Add order by, limit, etc., depending on your needs
    $sql .= " ORDER BY char_name"; // Example ordering by character name


    $result2 = $conn->query($sql);

if($sql != ""){
    $result2 = $conn-> query($sql);    
    if($result2 -> num_rows > 0){
        $output = "";
        while($row = $result2->fetch_assoc()){
            $output .= "<li class='dropdown-content' onclick=\"'" . $row['char_name'] . "'\">" . $row['char_name'] . "</li>";
        }
            echo $output; // Output all concatenated results at once
    }
}else{
    echo ("hi, the search query was empty...fix it you bright beautiful black man....");
}




}












?>