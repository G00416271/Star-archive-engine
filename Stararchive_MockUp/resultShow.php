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
$pilot = $_POST['pilot_name'] ?? '';
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
    $conditions[] = "Religion.religion_name LIKE '%" . $conn->real_escape_string($religion) . "%'";
}

if (!empty($droid)) {
    $conditions[] = "Droids.droid_name LIKE '%" . $conn->real_escape_string($droid) . "%'";
}

if (!empty($ship_model)) {
    $conditions[] = "Ship_models.ship_name LIKE '%" . $conn->real_escape_string($ship_model) . "%'";
}

if (!empty($pilot)) {
    $conditions[] = "Pilots.pilot_name LIKE '%" . $conn->real_escape_string($pilot) . "%'";
}

if (!empty($movies)) {
    $conditions[] = "Movies.movie_name LIKE '%" . $conn->real_escape_string($movies) . "%'";
}

// Build the SQL query with joins to include human-readable values
$sql = "SELECT 
    Characters.character_id,
    Characters.char_name,
    Species.species_name,
    Planets.planet_name,
    Religion.religion_name,
    Droids.droid_name,
    Movies.movie_name,
    Ship_models.ship_name,
    Pilots.pilot_name
FROM Characters
LEFT JOIN Species ON Characters.species_id = Species.species_id
LEFT JOIN Planets ON Characters.planet_id = Planets.planet_id
LEFT JOIN Religion ON Characters.religion_id = Religion.religion_id
LEFT JOIN Droids ON Characters.droid_id = Droids.droid_id
LEFT JOIN Movies ON Characters.movie_id = Movies.character_id
LEFT JOIN Ship_models ON Characters.character_id = Ship_models.pilot_id
LEFT JOIN Pilots ON Ship_models.pilot_id = Pilots.pilot_id";

// If there are any conditions, append them to the SQL query
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
} else {
    echo("yeaaaaa....this mf empty asl");
}

// Execute the query
$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        echo "Name: " . $row['char_name'] . "<br>";
        echo "Species: " . $row['species_name'] . "<br>";
        echo "Planet: " . $row['planet_name'] . "<br>";
        echo "Religion: " . $row['religion_name'] . "<br>";
        echo "Droid: " . $row['droid_name'] . "<br>";
        echo "Movies: " . $row['movie_name'] . "<br>";
        echo "Ship: " . $row['ship_name'] . "<br>";
        echo "Pilot: " . $row['pilot_name'] . "<br><hr>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
