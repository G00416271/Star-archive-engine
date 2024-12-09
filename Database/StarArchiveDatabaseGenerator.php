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

// // Drop database if exists                   //This block can delete databases? the sql querey i think "DROP DATABASES IF EXISTS"
// $sql = "DROP DATABASE IF EXISTS stararchivedb";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully<br>";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

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


//TABLE CREATING





// sql to create USERS table
$sql = "CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// sql to create CHARACTERS table
$sql = "CREATE TABLE Characters (
  character_id INT AUTO_INCREMENT PRIMARY KEY,
  char_name VARCHAR(50) UNIQUE NOT NULL,
  species_name VARCHAR(100)  NOT NULL,
  planet_name VARCHAR(50) NULL,
  religion_name VARCHAR(50) NULL,
  droid_name VARCHAR(50) NULL,
  movie_name VARCHAR(50) NULL
  
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}



// sql to create PLANETS table

$sql = "CREATE TABLE Planets (
  planet_id INT AUTO_INCREMENT PRIMARY KEY,
  planet_name VARCHAR(50) UNIQUE NOT NULL,
  planet_region VARCHAR(30) NOT NULL
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "plANETS able created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}



// sql to create SPECIES table

$sql = "CREATE TABLE Species (
  species_Id INT AUTO_INCREMENT PRIMARY KEY,
  species_name VARCHAR(30) UNIQUE NOT NULL,
  species_description TEXT NOT NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}



//sql to create religions table

$sql = "CREATE TABLE religion (
  religion_id INT AUTO_INCREMENT PRIMARY KEY,
  religion_name VARCHAR(30) NOT NULL
) ENGINE=InnoDB;
";


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}


//Ship models

$sql = "CREATE TABLE ship_models (
  ship_id INT AUTO_INCREMENT PRIMARY KEY,
  ship_name VARCHAR(50) NOT NULL,
  pilot_name VARCHAR(50) NOT NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}




//sql to create PILOTS table 

$sql = "CREATE TABLE pilots (
  pilot_id INT AUTO_INCREMENT PRIMARY KEY,
  pilot_name VARCHAR(50) NOT NULL,
  ship_name VARCHAR(50) NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

//Droid models

$sql = "CREATE TABLE droids(
    droid_id INT AUTO_INCREMENT PRIMARY KEY,
    droid_name VARCHAR(50) NOT NULL,
    droid_nickname VARCHAR(50) NULL,
    droid_owner VARCHAR(50) NULL,
    religion_name VARCHAR(10)NULL
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

//Movies models

$sql = "CREATE TABLE movies(
  movie_id INT AUTO_INCREMENT PRIMARY KEY,
  movie_name VARCHAR(50) NOT NULL,
  movie_year INT NOT NULL
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
echo "Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}












$sql = "INSERT INTO Characters (char_name, species_name, planet_name, religion_name, droid_name) 
        VALUES 
        ('Darth Vader', 'Human', 'Tatooine', 'Sith', NULL),
        ('Anakin Skywalker', 'Human', 'Tatooine', 'Jedi', NULL),
        ('Obi-Wan Kenobi', 'Human', 'Stewjon', 'Jedi', NULL),
        ('Luke Skywalker', 'Human', 'Tatooine', 'Jedi', NULL),
        ('Leia Organa', 'Human', 'Alderaan', 'None', NULL),
        ('Han Solo', 'Human', 'Corellia', 'None', 'R2-D2'),
        ('Chewbacca', 'Wookiee', 'Kashyyyk', 'None', NULL),
        ('Yoda', 'Unknown', 'Dagobah', 'Jedi', NULL),
        ('Palpatine', 'Human', 'Naboo', 'Sith', 'C-3PO'),
        ('Padmé Amidala', 'Human', 'Naboo', 'None', NULL),
        ('Kylo Ren', 'Human', 'Chandrila', 'Sith', NULL),
        ('Rey', 'Human', 'Jakku', 'Jedi', NULL),
        ('Finn', 'Human', 'Unknown', 'None', 'BB-8'),
        ('Poe Dameron', 'Human', 'Yavin 4', 'None', 'BB-8'),
        ('Mace Windu', 'Human', 'Haruun Kal', 'Jedi', NULL),
        ('Qui-Gon Jinn', 'Human', 'Coruscant', 'Jedi', NULL),
        ('Jabba the Hutt', 'Hutt', 'Nal Hutta', 'None', NULL),
        ('Greedo', 'Rodian', 'Rodia', 'None', NULL),
        ('Lando Calrissian', 'Human', 'Socorro', 'None', NULL),
        ('Boba Fett', 'Human', 'Kamino', 'None', NULL),
        ('Ahsoka Tano', 'Togruta', 'Shili', 'Jedi', NULL),
        ('Hunter', 'Clone', 'Kamino', 'None', 'Omega'),
        ('Wrecker', 'Clone', 'Kamino', 'None', NULL),
        ('Tech', 'Clone', 'Kamino', 'None', NULL),
        ('Crosshair', 'Clone', 'Kamino', 'None', NULL),
        ('Echo', 'Clone', 'Kamino', 'None', 'R7-A7'),
        ('Captain Rex', 'Clone', 'Kamino', 'None', NULL),
        ('Sabine Wren', 'Human', 'Lothal', 'Mandalorian', NULL),
        ('Ezra Bridger', 'Human', 'Lothal', 'Jedi', NULL),
        ('Kanan Jarrus', 'Human', 'Lothal', 'Jedi', NULL),
        ('Hera Syndulla', 'Twi\'lek', 'Ryloth', 'None', NULL),
        ('Garazeb \"Zeb\" Orrelios', 'Lasat', 'Lothal', 'None', NULL),
        ('Chopper', 'Astromech', 'Unknown', 'None', NULL),
        ('Bo-Katan Kryze', 'Human', 'Mandalore', 'Mandalorian', NULL),
        ('Din Djarin', 'Human', 'Nevarro', 'Mandalorian', 'IG-11'),
        ('Grogu', 'Yoda\'s species', 'Unknown', 'None', NULL),
        ('Pre Vizsla', 'Human', 'Mandalore', 'Mandalorian', NULL),
        ('Fennec Shand', 'Human', 'Unknown', 'None', NULL)
";


        if ($conn->query($sql) === TRUE) {
          echo "characters able created successfully<br>";
        } else {
          echo "Error creating table: " . $conn->error;
        }


        $sql = "INSERT INTO Planets (planet_name, planet_region) VALUES
        ('Coruscant', 'Inner Rim'),
        ('Tatooine', 'Outer Rim'),
        ('Naboo', 'Mid Rim'),
        ('Hoth', 'Outer Rim'),
        ('Dagobah', 'Outer Rim'),
        ('Endor', 'Outer Rim'),
        ('Kashyyyk', 'Mid Rim'),
        ('Alderaan', 'Core Worlds'),
        ('Mustafar', 'Outer Rim'),
        ('Jakku', 'Unknown Regions'),
        ('Geonosis', 'Outer Rim'),
        ('Kamino', 'Outer Rim'),
        
        ('Bespin', 'Outer Rim'),
        ('Yavin 4', 'Mid Rim'),
        ('Lothal', 'Outer Rim'),
        ('Utapau', 'Outer Rim'),
        
        ('Crait', 'Outer Rim'),
        ('Ahch-To', 'Outer Rim'),
        ('Dathomir', 'Mid Rim'),
        ('Felucia', 'Outer Rim'),
        ('Ryloth', 'Outer Rim'),
        ('Rodia', 'Mid Rim'),
        ('Togruta', 'Outer Rim');";

if ($conn->query($sql) === TRUE) {
  echo "40 planets inserted successfully<br>";
} else {
  echo "Error inserting planets: " . $conn->error;
}

$sql = "INSERT INTO Species (species_name, species_description) VALUES
  ('Human', 'Humans are the most common species in the galaxy.'),
  ('Wookiee', 'A tall, hairy species known for their strength and loyalty.'),
  ('Rodian', 'A species of green-skinned humanoids from the planet Rodia.'),
  ('Hutt', 'A slug-like species, notorious for their criminal underworld influence.'),
  ('Twi\'lek', 'A species of humanoids with long head-tails called Lekku, originating from Ryloth.'),
  ('Zabrak', 'A species known for their distinctive horns and tattoos, originally from Iridonia.'),
  ('Muun', 'A species of tall, thin beings known for their long limbs and large heads, native to the planet Muunilinst.'),
  ('Chagrian', 'A species with large head-tails, originating from the planet Chagri.'),
  ('Iktotchi', 'A species known for their precognitive abilities, originating from Iktotch.'),
  ('Nautolan', 'A species known for their amphibious characteristics, originating from Glee Anselm.'),
  ('Vulpter', 'A species from the planet Vulpter, with orange fur and sharp fangs.'),
  ('Toong', 'A species from the planet Toong, known for their telepathic abilities.'),
  ('Cerean', 'A species with tall, conical heads, originating from the planet Cerea.'),
  ('Skakoan', 'A species that requires pressurized suits to survive in their home planet\'s atmosphere.'),
  ('Kel Dor', 'A species with respiratory needs, native to the planet Dorin.'),
  ('Geonosian', 'A species of insectoid beings, originating from the planet Geonosis.'),
  ('Mirialan', 'A species of green-skinned humanoids with distinctive tattoos, originating from Mirial.'),
  ('Clawdite', 'A shapeshifting species, originally from the planet Zolan.'),
  ('Shistavanen', 'A wolf-like species with sharp senses and keen hunting abilities.'),
  ('Neimodian', 'A species of humanoids known for their roles in trade, originating from the planet Neimodia.'),
  ('Gungan', 'A species known for their amphibious nature, originating from the planet Naboo.'),
  ('Toydarian', 'A species that is immune to mind tricks, originating from the planet Toydaria.'),
  ('Droid', 'Artificial beings, usually mechanical in nature, created to perform various tasks.'),
  ('Yoda\'s species', 'A mysterious and rare species, famous for their connection to the Force.'),
  ('Bith', 'A species known for their large heads and high intellectual capacity, originating from the planet Clakdor VII.'),
  ('Togruta', 'A species known for their colorful skin and head-tails, originating from the planet Shili.'),
  ('Kaleesh', 'A species with reptilian features, originating from the planet Kalee.'),
  ('Pau\'an', 'A species with long, pale faces, originating from the planet Utapau.'),
  ('Chiss', 'A species known for their blue skin and red eyes, originating from the Unknown Regions.'),
  ('Rattataki', 'A humanoid species from the planet Rattatak, known for their warrior culture.'),
  ('Urodel', 'A species of amphibious beings with great flexibility, from the planet Urodel.'),
  ('Sullustan', 'A species of humanoid beings with large eyes, originating from the planet Sullust.'),
  ('Besalisk', 'A species with four arms and a strong connection to the Force, originating from the planet Ojom.'),
  ('Xexto', 'A species with an elongated head and slender limbs, originating from the planet Xexto.'),
  ('Tholothian', 'A species with long, tentacle-like appendages, originating from the planet Tholoth.'),
  ('Kiffar', 'A species with markings that can be used to identify individuals, originating from the planet Kiffu.'),
  ('Lasat', 'A species of strong warriors, originating from the planet Lira San.');";

  if ($conn->query($sql) === TRUE) {
    echo "40 Species inserted successfully<br>";
  } else {
    echo "Error inserting planets: " . $conn->error;
}


$sql="INSERT INTO ship_models (ship_name, pilot_name) VALUES
  ('Millennium Falcon', 'Han Solo'),
  ('X-Wing Starfighter', 'Luke Skywalker'),
  ('TIE Fighter', 'Darth Vader'),
  ('Slave 1', 'Boba Fett'),
  ('Imperial Shuttle', 'Palpatine'),
  ('E-Wing Starfighter', 'Nrin Vakil'),
  ('A-Wing Starfighter', 'Arvel Crynyd'),
  ('B-Wing Starfighter', 'Hera Syndulla'),
  ('Y-Wing Starfighter', 'Gold Leader'),
  ('TIE Interceptor', 'Darklighter'),
  ('TIE Bomber', 'Rogue Squadron Pilot'),
  ('Rebel Transport', 'Lando Calrissian'),
  ('Death Star', 'Grand Moff Tarkin'),
  ('Star Destroyer', 'Admiral Piett'),
  ('Super Star Destroyer', 'Vader'),
  ('Naboo Fighter', 'Qui-Gon Jinn'),
  ('Naboo Fighter', 'Obi-Wan Kenobi'),
  ('T-65 X-Wing', 'Red Leader'),
  ('Cloud Car', 'Lando Calrissian'),
  ('V-19 Torrent Starfighter', 'Plo Koon'),
  ('Z-95 Headhunter', 'Bail Prestor Organa'),
  ('Republic Gunship', 'Anakin Skywalker'),
  ('Acclamator-class Assault Ship', 'Mace Windu'),
  ('Arquitens-class Light Cruiser', 'Admiral Trench'),
  ('LAAT/i Gunship', 'Clone Trooper'),
  ('TIE Defender', 'Vader'),
  ('Speeder Bike', 'Biker Scout'),
  ('Sith Infiltrator', 'Darth Maul'),
  ('Jedi Starfighter', 'Obi-Wan Kenobi'),
  ('Tri-Fighter', 'Count Dooku'),
  ('V-wing Starfighter', 'Jedi Starfighter'),
  ('TIE Bomber', 'Imperial Pilot'),
  ('ARC-170 Starfighter', 'Anakin Skywalker'),
  ('Pelta-class Frigate', 'Clone Captain'),
  ('Sith Interceptor', 'Darth Sidious'),
  ('Republic Star Destroyer', 'Clone Commander'),
  ('Interdictor-class Star Destroyer', 'Captain Needa'),
  ('Star Destroyer-Class', 'Admiral Motti'),
  ('Droid Control Ship', 'Nute Gunray');
";
if ($conn->query($sql) === TRUE) {
  echo "ship models inserted successfully<br>";
} else {
  echo "Error inserting planets: " . $conn->error;
}

$sql="INSERT INTO pilots (pilot_name, ship_name) VALUES
  ('Han Solo', 'Millennium Falcon'),
  ('Luke Skywalker', 'X-Wing Starfighter'),
  ('Darth Vader', 'TIE Fighter'),
  ('Boba Fett', 'Slave 1'),
  ('Palpatine', 'Imperial Shuttle'),
  ('Nrin Vakil', 'E-Wing Starfighter'),
  ('Arvel Crynyd', 'A-Wing Starfighter'),
  ('Hera Syndulla', 'B-Wing Starfighter'),
  ('Gold Leader', 'Y-Wing Starfighter'),
  ('Darklighter', 'TIE Interceptor'),
  ('Rogue Squadron Pilot', 'TIE Bomber'),
  ('Lando Calrissian', 'Rebel Transport'),
  ('Grand Moff Tarkin', 'Death Star'),
  ('Admiral Piett', 'Star Destroyer'),
  ('Vader', 'Super Star Destroyer'),
  ('Qui-Gon Jinn', 'Naboo Fighter'),
  ('Obi-Wan Kenobi', 'Naboo Fighter'),
  ('Red Leader', 'T-65 X-Wing'),
  ('Lando Calrissian', 'Cloud Car'),
  ('Plo Koon', 'V-19 Torrent Starfighter'),
  ('Bail Prestor Organa', 'Z-95 Headhunter'),
  ('Anakin Skywalker', 'Republic Gunship'),
  ('Mace Windu', 'Acclamator-class Assault Ship'),
  ('Admiral Trench', 'Arquitens-class Light Cruiser'),
  ('Clone Trooper', 'LAAT/i Gunship'),
  ('Vader', 'TIE Defender'),
  ('Biker Scout', 'Speeder Bike'),
  ('Darth Maul', 'Sith Infiltrator'),
  ('Obi-Wan Kenobi', 'Jedi Starfighter'),
  ('Count Dooku', 'Tri-Fighter'),
  ('Jedi Starfighter', 'V-wing Starfighter'),
  ('Imperial Pilot', 'TIE Bomber'),
  ('Anakin Skywalker', 'ARC-170 Starfighter'),
  ('Clone Captain', 'Pelta-class Frigate'),
  ('Sith Sidious', 'Sith Interceptor'),
  ('Clone Commander', 'Republic Star Destroyer'),
  ('Captain Needa', 'Interdictor-class Star Destroyer'),
  ('Admiral Motti', 'Star Destroyer-Class'),
  ('Nute Gunray', 'Droid Control Ship');";

  if ($conn->query($sql) === TRUE) {
    echo " Pilots inserted successfully<br>";
  } else {
    echo "Error inserting planets: " . $conn->error;
  }


$sql = "INSERT INTO droids (droid_name, droid_nickname, droid_owner, religion_name) VALUES
  ('R2-D2', 'Artoo', 'Luke Skywalker', NULL),
  ('C-3PO', 'Threepio', 'Luke Skywalker', NULL),
  ('BB-8', 'BB', 'Rey', NULL),
  ('R5-D4', 'Red', 'Luke Skywalker', NULL),
  ('IG-88', 'Assassin Droid', 'Boba Fett', NULL),
  ('K-2SO', 'Kaytoo', 'Cassian Andor', NULL),
  ('Chopper', 'C1-10P', 'Hera Syndulla', NULL),
  ('L3-37', 'L3', 'Lando Calrissian', NULL),
  ('C1-10P', 'Chopper', 'Hera Syndulla', NULL),
  ('WED-15', 'Rex', 'Rey', NULL),
  ('EV-9D9', 'EV-9', 'Jabba the Hutt', NULL),
  ('R2-Q5', 'R2-Q5', 'Imperial Forces', NULL),
  ('PZ-4CO', 'PZ', 'Resistance', NULL),
  ('T3-M4', 'T3', 'Revan', NULL),
  ('D-O', 'D-O', 'Rey', NULL),
  ('T0-B1', 'Toobi', 'Poe Dameron', NULL),
  ('IG-11', 'IG', 'Qui-Gon Jinn', NULL),
  ('R2-B1', 'R2-B1', 'Unknown', NULL),
  ('R4-P17', 'R4', 'Obi-Wan Kenobi', NULL),
  ('L7-20', 'L7', 'Bounty Hunter', NULL),
  ('MSE-6', 'MSE-6', 'Empire', NULL),
  ('T3-A2', 'T3', 'Jedi', NULL),
  ('Q7-T7', 'Q7', 'Jedi', NULL),
  ('GONK', 'GONK', 'Rebel Alliance', NULL),
  ('FX-7', 'FX-7', 'Republic', NULL),
  ('T-3', 'T-3', NULL, NULL),
  ('R1-G4', 'R1', 'Jedi Order', NULL),
  ('R9-X9', 'R9', 'Jedi Council', NULL),
  ('R2-A6', 'R2-A6', 'Alliance', NULL),
  ('A-1', 'A-1', 'Jedi', NULL),
  ('V-9', 'V9', 'Jedi', NULL),
  ('Darth Maul\'s Droid', 'Droid', 'Darth Maul', NULL),
  ('ZED', 'ZED', 'Clone Troopers', NULL),
  ('T7-01', 'T7', 'Jedi Knight', NULL),
  ('R7-A7', 'R7', 'Rebellion', NULL),
  ('R9-R4', 'R9-R4', 'Empire', NULL),
  ('R3-X2', 'R3', 'Jedi Order', NULL),
  ('R2-X2', 'R2-X2', 'Republic', NULL);
";

if ($conn->query($sql) === TRUE) {
echo "Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO movies (movie_name, movie_year) VALUES
  ('Star Wars: A New Hope', 1977),
  ('Star Wars: The Empire Strikes Back', 1980),
  ('Star Wars: Return of the Jedi', 1983),
  ('Star Wars: The Phantom Menace', 1999),
  ('Star Wars: Attack of the Clones', 2002),
  ('Star Wars: Revenge of the Sith', 2005),
  ('Star Wars: The Force Awakens', 2015),
  ('Star Wars: The Last Jedi', 2017),
  ('Star Wars: The Rise of Skywalker', 2019);
";

if ($conn->query($sql) === TRUE) {
  echo "Movies inserted successfully.<br>";
} else {
  echo "Error inserting movies: " . $conn->error;
}







$conn->close();
?>

</body>
</html>