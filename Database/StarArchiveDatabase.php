<!DOCTYPE html>
<html>

<head>
    <title>Creating Database Table</title>
</head>

<body>

<?php
$servername = "stararchive";
$username = "root";
$password = "";
$dbname = "stararchivedb";




//Users
//Characters 
//Planets 
//Species
//religion
//Ships 
//Droids 
//movies





// Create connection


$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


 // Drop database if exists                   //This block can delete databases? the sql querey i think "DROP DATABASES IF EXISTS"
 $sql = "DROP DATABASE IF EXISTS stararchivedb";
 if ($conn->query($sql) === TRUE) {
   echo "Database dropped successfully<br>";
 } else {
   echo "Error creating database: " . $conn->error;
 }


// Create database
$sql = "CREATE DATABASE stararchivedb";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli("stararchive", "root", "", "stararchivedb");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//Tables


//Users
$sql = "CREATE TABLE users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";
if ($conn->query($sql) === TRUE) {
  echo "Users table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}




//Planets
$sql = "CREATE TABLE planets (
    planet_id INT PRIMARY KEY,
    planet_name VARCHAR(50) UNIQUE NOT NULL,
    planet_region VARCHAR(30) NOT NULL
  ) ENGINE=InnoDB;
  ";

if ($conn->query($sql) === TRUE) {
    echo "Planets table created successfully<br>";
  } else {
    echo "Error creating table: " . $conn->error;
  }



//Religion
$sql = "CREATE TABLE religions (
      religion_id INT PRIMARY KEY,
      religion_name VARCHAR(50)
      ) ENGINE = InnoDB;
      ";

if($conn ->query($sql) === TRUE) {
    echo "Religion created successfully<br>";
  }else{
    echo "Error creating table: ". $conn -> error;
  }

//Species
$sql = "CREATE TABLE species(
        species_id INT NOT NULL PRIMARY KEY,
        species_name VARCHAR(50)
        ) ENGINE = InnoDB;
      ";

if($conn ->query($sql) === TRUE) {
  echo "Species table created successfully<br>";
}else{
 echo "Error creating table: ". $conn -> error;
}

//Ships
 $sql = "CREATE TABLE ships (
        ship_id INT PRIMARY KEY,
        ship_name VARCHAR(50)
) ENGINE = InnoDB;
      ";
if($conn ->query($sql) === TRUE) {
  echo "Ships table created successfully<br>";
}else{
 echo "Error creating table: ". $conn -> error;
}

//Droids
$sql = "CREATE TABLE droids (
  droid_id INT PRIMARY KEY,
  droid_name VARCHAR(50)
) ENGINE = InnoDB;
";
if($conn ->query($sql) === TRUE) {
echo "Droids table created successfully<br>";
}else{
echo "Error creating table: ". $conn -> error;
}

//Movies
$sql = "CREATE TABLE movies (
  movie_id INT PRIMARY KEY,
  movie_name VARCHAR(50)
) ENGINE = InnoDB;
";
if($conn ->query($sql) === TRUE) {
echo "Movies table created successfully<br>";
}else{
echo "Error creating table: ". $conn -> error;
}







// Create Characters table
$sql = "CREATE TABLE characters ( 
  character_id INT AUTO_INCREMENT PRIMARY KEY,
  char_name VARCHAR(50) NOT NULL, 
  character_icon TEXT,
  religion_id INT,
  planet_id INT,
  species_id INT,
  ship_id INT,
  droid_id INT,
  movie_id INT,
  file_price DECIMAL(6,2) DEFAULT(4.99),
  FOREIGN KEY (religion_id) REFERENCES religions(religion_id),
  FOREIGN KEY (planet_id) REFERENCES planets(planet_id),
  FOREIGN KEY (species_id) REFERENCES species(species_id),
  FOREIGN KEY (ship_id) REFERENCES ships(ship_id),
  FOREIGN KEY (droid_id) REFERENCES droids(droid_id),
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
) ENGINE = InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Characters table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}






























  //insert into planets

  $sql = "INSERT INTO planets (planet_id, planet_name, planet_region) VALUES
  (1, 'Tatooine', 'Outer Rim'),
  (2, 'Alderaan', 'Core Worlds'),
  (3, 'Naboo', 'Mid Rim'),
  (4, 'Coruscant', 'Core Worlds'),
  (5, 'Shili', 'Expansion Region'),
  (6, 'Mandalore', 'Outer Rim'),
  (7, 'Kashyyyk', 'Mid Rim'),
  (8, 'Dagobah', 'Outer Rim'),
  (9, 'Kamino', 'Outer Rim'),
  (10, 'Geonosis', 'Outer Rim'),
  (11, 'Lothal', 'Outer Rim'),
  (12, 'Mustafar', 'Outer Rim'),
  (13, 'Endor', 'Outer Rim'),
  (14, 'Hoth', 'Outer Rim'),
  (15, 'Bespin', 'Outer Rim'),
  (16, 'Corellia', 'Core Worlds'),
  (17, 'Jakku', 'Western Reaches'),
  (18, 'Dathomir', 'Outer Rim'),
  (19, 'Yavin IV', 'Outer Rim'),
  (20, 'Scarif', 'Outer Rim'),
  (21, 'Jedha', 'Mid Rim'),
  (22, 'Ryloth', 'Outer Rim'),
  (23, 'Zygerria', 'Outer Rim'),
  (24, 'Felucia', 'Outer Rim'),
  (25, 'Onderon', 'Inner Rim'),
  (26, 'Mon Cala', 'Outer Rim'),
  (27, 'Exegol', 'Unknown Regions'),
  (28, 'Ahch-To', 'Unknown Regions'),
  (29, 'Ilum', 'Unknown Regions'),
  (30, 'Polis Massa', 'Outer Rim'),
  (31, 'Saleucami', 'Outer Rim'),
  (32, 'Umbara', 'Mid Rim'),
  (33, 'Toydaria', 'Hutt Space'),
  (34, 'Ord Mantell', 'Mid Rim'),
  (35, 'Crait', 'Outer Rim'),
  (36, 'Malachor', 'Outer Rim'),
  (37, 'Serenno', 'Outer Rim'),
  (38, 'Nal Hutta', 'Hutt Space'),
  (39, 'Hosnian Prime', 'Core Worlds'),
  (40, 'Korriban', 'Outer Rim')";
  



if ($conn->multi_query($sql) === TRUE) {
  echo "Planets values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//insert religions and ID's

$sql = "INSERT INTO religions(religion_id, religion_name) VALUES 
(1 , 'Jedi'),
(2, 'Sith'),
(3, 'Mandalorian')";

if ($conn->multi_query($sql) === TRUE) {
  echo "Religion values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//insert into species
$sql = "INSERT INTO species (species_id, species_name) VALUES
  (1, 'Human'),
  (2, 'Twi\'lek'),
  (3, 'Wookiee'),
  (4, 'Rodian'),
  (5, 'Hutt'),
  (6, 'Mon Calamari'),
  (7, 'Chiss'),
  (8, 'Togruta'),
  (9, 'Ewok'),
  (10, 'Zabrak'),
  (11, 'Ithorian'),
  (12, 'Droid'),
  (13, 'Geonosian'),
  (14, 'Kaminoan'),
  (15, 'Nautolan'),
  (16, 'Kel Dor'),
  (17, 'Duros'),
  (18, 'Jawa'),
  (19, 'Gamorrean'),
  (20, 'Devaronian'),
  (21, 'Bothan'),
  (22, 'Gungan'),
  (23, 'Quarren'),
  (24, 'Trandoshan'),
  (25, 'Yoda\'s Species'),
  (26, 'Chadra-Fan'),
  (27, 'Mirialan'),
  (28, 'Pau\'an'),
  (29, 'Weequay'),
  (30, 'Aqualish'),
  (31, 'Neimoidian'),
  (32, 'Nikto'),
  (33, 'Sullustan'),
  (34, 'Besalisk'),
  (35, 'Pantoran'),
  (36, 'Vurk'),
  (37, 'Anzat'),
  (38, 'Shistavanen'),
  (39, 'Togruta'),
  (40, 'Kyuzo')";

if ($conn->multi_query($sql) === TRUE) {
  echo "Species values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}





//Insert into Ships 

$sql = "INSERT INTO ships (ship_id, ship_name) VALUES
  (1, 'Millennium Falcon'),
  (2, 'X-Wing Starfighter'),
  (3, 'TIE Fighter'),
  (4, 'Imperial Star Destroyer'),
  (5, 'Slave I'),
  (6, 'Death Star'),
  (7, 'Y-Wing Starfighter'),
  (8, 'A-Wing Starfighter'),
  (9, 'B-Wing Starfighter'),
  (10, 'Super Star Destroyer'),
  (11, 'Jedi Interceptor'),
  (12, 'Naboo Starfighter'),
  (13, 'ARC-170 Starfighter'),
  (14, 'V-Wing Starfighter'),
  (15, 'Lambda-class Shuttle'),
  (16, 'Ghost'),
  (17, 'Outrider'),
  (18, 'Ebon Hawk'),
  (19, 'Razor Crest'),
  (20, 'Venator-class Star Destroyer'),
  (21, 'Droid Control Ship'),
  (22, 'Tantive IV'),
  (23, 'Hammerhead Corvette'),
  (24, 'Mon Calamari Cruiser'),
  (25, 'Executor'),
  (26, 'Havoc Marauder'),
  (27, 'Stealth Ship'),
  (28, 'TIE Interceptor'),
  (29, 'TIE Bomber'),
  (30, 'Zeta-class Cargo Shuttle'),
  (31, 'U-Wing'),
  (32, 'Sith Infiltrator'),
  (33, 'Starhawk-class Battleship'),
  (34, 'Eclipse-class Dreadnought'),
  (35, 'Dreadnought-class Heavy Cruiser'),
  (36, 'Providence-class Dreadnought'),
  (37, 'Invisible Hand'),
  (38, 'Malevolence'),
  (39, 'Crimson Corsair’s Ship'),
  (40, 'Fireball')";

  
if ($conn->multi_query($sql) === TRUE) {
  echo "Species values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Droids Inserts
$sql = "INSERT INTO droids (droid_id, droid_name) VALUES
  (1, 'R2-D2'),
  (2, 'C-3PO'),
  (3, 'BB-8'),
  (4, 'K-2SO'),
  (5, 'IG-88'),
  (6, 'R5-D4'),
  (7, 'L3-37'),
  (8, 'D-O'),
  (9, 'HK-47'),
  (10, 'Chopper'),
  (11, 'BT-1'),
  (12, '0-0-0'),
  (13, 'EV-9D9'),
  (14, '4-LOM'),
  (15, 'AZI-3'),
  (16, 'Mouse Droid'),
  (17, 'T3-M4'),
  (18, 'AP-5'),
  (19, 'Q9-0 (Zero)'),
  (20, 'R1-J5 (Bucket)'),
  (21, 'Probe Droid'),
  (22, 'Medical Droid'),
  (23, 'Super Battle Droid'),
  (24, 'Droideka'),
  (25, 'Pit Droid'),
  (26, 'Battle Droid'),
  (27, 'T-Series Tactical Droid'),
  (28, 'Viper Probe Droid'),
  (29, 'BB-9E'),
  (30, 'Dark Trooper'),
  (31, 'MSE-6 Mouse Droid'),
  (32, 'Imperial KX-series Droid'),
  (33, 'LE-series Repair Droid'),
  (34, 'WA-7 Service Droid'),
  (35, 'DUM-series Pit Droid'),
  (36, 'R7-A7'),
  (37, 'R4-P17'),
  (38, 'Gonk Droid'),
  (39, 'KOTOR Utility Droid'),
  (40, 'FLO Droid')";

  
if ($conn->multi_query($sql) === TRUE) {
  echo "Droids values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
//Insert into Movies

$sql = "INSERT INTO movies (movie_id, movie_name) VALUES
  (1, 'The Phantom Menace'),
  (2, 'Attack of the Clones'),
  (3, 'Revenge of the Sith'),
  (4, 'A New Hope'),
  (5, 'The Empire Strikes Back'),
  (6, 'Return of the Jedi'),
  (7, 'The Force Awakens'),
  (8, 'The Last Jedi'),
  (9, 'The Rise of Skywalker'),
  (10, 'Rogue One'),
  (11, 'Solo'),
  (12, 'The Clone Wars'),
  (13, 'Ewoks: Caravan of Courage'),
  (14, 'Ewoks: The Battle for Endor'),
  (15, 'The Holiday Special'),
  (16, 'Forces of Destiny'),
  (17, 'Rebels: Spark of Rebellion'),
  (18, 'The Mandalorian: Chapter 1'),
  (19, 'The Book of Boba Fett'),
  (20, 'Obi-Wan Kenobi: Part I')";

  
if ($conn->multi_query($sql) === TRUE) {
  echo "movies values inserted successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insert Star Wars characters
$sql = "INSERT INTO characters (char_name, religion_id, planet_id, species_id, ship_id, droid_id, movie_id) VALUES
    ('Luke Skywalker', 1, 4, 1, 2, 1, 4),
    ('Darth Vader', 2, 4, 1, 3, 1, 5),
    ('Leia Organa', 1, 2, 1, 2, 1, 4),
    ('Han Solo', NULL, 16, 1, 1, NULL, 4),
    ('Yoda', 1, 8, 25, NULL, NULL, 5),
    ('Obi-Wan Kenobi', 1, 4, 1, 11, 1, 3),
    ('Anakin Skywalker', 1, 4, 1, 11, 1, 2),
    ('Padmé Amidala', NULL, 3, 1, 12, NULL, 1),
    ('Chewbacca', NULL, 7, 3, 1, NULL, 4),
    ('R2-D2', NULL, NULL, 12, NULL, 1, 1),
    ('C-3PO', NULL, NULL, 12, NULL, 1, 1),
    ('Boba Fett', NULL, 6, 1, 5, NULL, 5),
    ('Palpatine', 2, 4, 1, NULL, NULL, 3),
    ('Lando Calrissian', NULL, 15, 1, 1, NULL, 5),  
    ('Rey', 1, 17, 1, 2, 3, 7),
    ('Finn', NULL, 17, 1, 2, NULL, 7),
    ('Poe Dameron', NULL, 16, 1, 2, NULL, 7),
    ('Kylo Ren', 2, 4, 1, 3, NULL, 7),
    ('Mace Windu', 1, 4, 1, 11, NULL, 2),
    ('Qui-Gon Jinn', 1, 4, 1, 11, NULL, 1),
    ('Jar Jar Binks', NULL, 22, 22, NULL, NULL, 1),
    ('Ahsoka Tano', 1, 5, 8, 11, NULL, 12),
    ('Darth Maul', 2, 40, 39, NULL, NULL, 1),
    ('Count Dooku', 2, 37, 1, NULL, NULL, 2),
    ('Jabba the Hutt', NULL, 38, 5, NULL, NULL, 4),
    ('General Grievous', NULL, 10, 12, 36, NULL, 3),
    ('Grand Moff Tarkin', NULL, 4, 1, 4, NULL, 4),
    ('Ezra Bridger', 1, 11, 1, 16, NULL, 17),
    ('Hera Syndulla', NULL, 22, 2, 16, NULL, 17),
    ('Sabine Wren', NULL, 6, 1, 16, NULL, 17),
    ('Kanan Jarrus', 1, 11, 1, 16, NULL, 17),
    ('Chopper', NULL, NULL, 12, NULL, 10, 17),
    ('Bo-Katan Kryze', NULL, 6, 1, 19, NULL, 19),
    ('Din Djarin', NULL, 6, 1, 19, NULL, 18),
    ('Grogu', NULL, NULL, 25, NULL, NULL, 18),
    ('Cad Bane', NULL, 17, 17, NULL, NULL, 11),
    ('Bossk', NULL, 24, 24, NULL, NULL, 5),
    ('Greedo', NULL, 4, 4, NULL, NULL, 4),
    ('Plo Koon', 1, 16, 16, 11, NULL, 2),
    ('Shaak Ti', 1, 5, 8, NULL, NULL, 2),
    ('Ki-Adi-Mundi', 1, 16, 1, NULL, NULL, 2),
    ('Kit Fisto', 1, 26, 15, NULL, NULL, 2),
    ('Luminara Unduli', 1, 27, 27, NULL, NULL, 2),
    ('Barriss Offee', 1, 27, 27, NULL, NULL, 2),
    ('Asajj Ventress', 2, 18, 10, NULL, NULL, 12),
    ('Savage Opress', 2, 18, 10, NULL, NULL, 12),
    ('Jyn Erso', NULL, 20, 1, 31, NULL, 10),
    ('Cassian Andor', NULL, 20, 1, 31, NULL, 10)";

if ($conn->multi_query($sql) === TRUE) {
    echo "Characters values inserted successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


















$conn->close();
?>

</body>
</html>