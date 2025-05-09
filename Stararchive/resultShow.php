<?php
$conn = new mysqli("stararchive", "root", "", "stararchivedb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conditions = array();

// Example variables (you would retrieve these from a form or user input)
$name = $_POST['char_name'] ?? '';
$planet = $_POST['planet_name'] ?? '';
$species = $_POST['species_name'] ?? '';
$religion = $_POST['religion_name'] ?? '';
$droid = $_POST['droid_name'] ?? '';
$ship_model = $_POST['ship_name'] ?? '';
$movies = $_POST['movie_name'] ?? '';


// Construct SQL query dynamically based on provided filters
if (!empty($name)) {
    $conditions[] = "Characters.char_name LIKE '%" . $conn->real_escape_string($name) . "%'";
}

if (!empty($planet)) {
     $conditions[] = "Planets.planet_name LIKE '%" . $conn->real_escape_string($planet) . "%'";
 }

 if (!empty($species)) {
     $conditions[] = "Species.species_name LIKE '%" . $conn->real_escape_string($species) . "%'";
 }

if (!empty($religion)) {
    $conditions[] = "Religions.religion_name LIKE '%" . $conn->real_escape_string($religion) . "%'";
}

if (!empty($droid)) {
    $conditions[] = "Droids.droid_name LIKE '%" . $conn->real_escape_string($droid) . "%'";
}

if (!empty($ship_model)) {
     $conditions[] = "Ships.ship_name LIKE '%" . $conn->real_escape_string($ship_model) . "%'";
 }




 if (!empty($movies)) {
     $conditions[] = "Movies.movie_name LIKE '%" . $conn->real_escape_string($movies) . "%'";
}

// Build the SQL query with joins to include human-readable values
$sql = "SELECT 
    Characters.character_id,
    Characters.char_name,
    Characters.file_price,
    Species.species_name,
    Planets.planet_name,
    Religions.religion_name,
    Droids.droid_name,
    Movies.movie_name,
    Ships.ship_name
FROM characters
LEFT JOIN Species ON Characters.species_id = Species.species_id
LEFT JOIN Planets ON Characters.planet_id = Planets.planet_id
LEFT JOIN Religions ON Characters.religion_id = Religions.religion_id
LEFT JOIN Droids ON Characters.droid_id = Droids.droid_id
LEFT JOIN Movies ON Characters.movie_id = Movies.movie_id
LEFT JOIN Ships ON Characters.ship_id = Ships.ship_id
";


// If there are any conditions, append them to the SQL query
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions );


    // Execute the query
$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $name = htmlspecialchars($row['char_name']?? 'UNKOWN');
        $char_id = htmlspecialchars($row['character_id']?? 'UNKNOWN');
        $file_price = htmlspecialchars($row['file_price']?? 'UNKOWN');
        echo "<div class='result' id=".$name.">" ;
        echo '<img src="../resources/character profiles/'.$name.'.png" onerror="this.onerror=null; this.src=\'../resources/character profiles/unknown character.png\';">';
        echo "<div id='resultTXT' >";
        echo "<p>Name: " . htmlspecialchars($row['char_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Planet: " . htmlspecialchars($row['planet_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Species: " . htmlspecialchars($row['species_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Religion: " . htmlspecialchars($row['religion_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Droid: " . htmlspecialchars($row['droid_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Ship Model: " . htmlspecialchars($row['ship_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>Movies: " . htmlspecialchars($row['movie_name']?? 'UNKOWN') . "<br></p>";
        echo "<p>price: €" . $file_price."<br></p>";
        echo "<button class='addToCartBtn' id='addToCart' onclick='addToCart(".$char_id.")'> Add to cart</button>";
        echo "</div></div>";
        echo '<button id="scrollToTopBtn" onclick="scrollToTop()">↑</button>
';
        echo "<hr>";

     }
} else {
    echo "No results found.";
}
} else {
    echo "No search filters entered...";
}




$conn->close();
?>
