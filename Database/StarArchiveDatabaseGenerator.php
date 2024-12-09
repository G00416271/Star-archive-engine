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

//sql to create PILOTS table 

$sql = "CREATE TABLE pilots (
  pilot_id INT AUTO_INCREMENT PRIMARY KEY,
  pilot_name VARCHAR(50) NOT NULL,
  ship_id INT
  -- FOREIGN KEY(ship_id) REFERENCES ship_models(Ship_id) ON DELETE SET NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}


//Ship models

$sql = "CREATE TABLE ship_models (
  ship_id INT AUTO_INCREMENT PRIMARY KEY,
  ship_name VARCHAR(50) NOT NULL,
  pilot_id INT,
  FOREIGN KEY(pilot_id) REFERENCES pilots(pilot_id)ON DELETE SET NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "
ALTER TABLE pilots ADD COLUMN
FOREIGN KEY(ship_id) REFERENCES ship_models(Ship_id) ON DELETE SET NULL"; 

// Create Droids table
$sql = "CREATE TABLE Droids (
  droid_id INT AUTO_INCREMENT PRIMARY KEY,
  droid_name VARCHAR(50) NOT NULL,
  droid_nickname VARCHAR(50) NULL,
  droid_owner INT,
  religion_id INT,
  FOREIGN KEY (religion_id) REFERENCES Religion(religion_id) ON DELETE SET NULL
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}


// Create Characters table
$sql = "CREATE TABLE Characters (
  character_id INT AUTO_INCREMENT PRIMARY KEY,
  char_name VARCHAR(50) UNIQUE NOT NULL,
  species_id INT,
  planet_id INT,
  religion_id INT,
  droid_id INT,
  movie_id INT,
  FOREIGN KEY (species_id) REFERENCES Species(species_id) ON DELETE SET NULL,
  FOREIGN KEY (planet_id) REFERENCES Planets(planet_id) ON DELETE SET NULL,
  FOREIGN KEY (religion_id) REFERENCES religion(religion_id) ON DELETE SET NULL,
  FOREIGN KEY (droid_id) REFERENCES Droids(droid_id) ON DELETE SET NULL,
  FOREIGN KEY (movie_id) REFERENCES Movies(movie_id) ON DELETE SET NULL
) ENGINE=InnoDB;";
$conn->query($sql);

$sql = "
ALTER TABLE droids ADD COLUMN
FOREIGN KEY (char_id) REFERENCES characters(char_id) ON DELETE SET NULL"; 






























$sql = "INSERT INTO Characters (char_name) 
        VALUES 
        ('Darth Vader'),
        ('Anakin Skywalker'),
        ('Obi-Wan Kenobi'),
        ('Luke Skywalker'),
        ('Leia Organa'),
        ('Han Solo'),
        ('Chewbacca'),
        ('Yoda'),
        ('Palpatine'),
        ('Padmé Amidala'),
        ('Kylo Ren'),
        ('Rey'),
        ('Finn'),
        ('Poe Dameron'),
        ('Mace Windu'),
        ('Qui-Gon Jinn'),
        ('Jabba the Hutt'),
        ('Greedo'),
        ('Lando Calrissian'),
        ('Boba Fett'),
        ('Ahsoka Tano'),
        ('Hunter'),
        ('Wrecker'),
        ('Tech'),
        ('Crosshair'),
        ('Echo'),
        ('Captain Rex'),
        ('Sabine Wren'),
        ('Ezra Bridger'),
        ('Kanan Jarrus'),
        ('Hera Syndulla'),
        ('Garazeb \"Zeb\" Orrelios'),
        ('Chopper'),
        ('Bo-Katan Kryze'),
        ('Din Djarin'),
        ('Grogu'),
        ('Pre Vizsla'),
        ('Fennec Shand');
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


$sql="INSERT INTO ship_models (ship_name) VALUES
  ('Millennium Falcon'),
  ('X-Wing Starfighter'),
  ('TIE Fighter'),
  ('Slave 1'),
  ('Imperial Shuttle'),
  ('E-Wing Starfighter'),
  ('A-Wing Starfighter'),
  ('B-Wing Starfighter'),
  ('Y-Wing Starfighter'),
  ('TIE Interceptor'),
  ('TIE Bomber'),
  ('Rebel Transport'),
  ('Death Star'),
  ('Star Destroyer'),
  ('Super Star Destroyer'),
  ('Naboo Fighter'),
  ('T-65 X-Wing'),
  ('Cloud Car'),
  ('V-19 Torrent Starfighter'),
  ('Z-95 Headhunter'),
  ('Republic Gunship'),
  ('Acclamator-class Assault Ship'),
  ('Arquitens-class Light Cruiser'),
  ('LAAT/i Gunship'),
  ('TIE Defender'),
  ('Speeder Bike'),
  ('Sith Infiltrator'),
  ('Jedi Starfighter'),
  ('Tri-Fighter'),
  ('V-wing Starfighter'),
  ('ARC-170 Starfighter'),
  ('Pelta-class Frigate'),
  ('Sith Interceptor'),
  ('Republic Star Destroyer'),
  ('Interdictor-class Star Destroyer'),
  ('Star Destroyer-Class'),
  ('Droid Control Ship');
";
if ($conn->query($sql) === TRUE) {
  echo "ship models inserted successfully<br>";
} else {
  echo "Error inserting planets: " . $conn->error;
}

$sql = "INSERT INTO pilots (pilot_name) VALUES
  ('Han Solo'),
  ('Luke Skywalker'),
  ('Darth Vader'),
  ('Boba Fett'),
  ('Palpatine'),
  ('Nrin Vakil'),
  ('Arvel Crynyd'),
  ('Hera Syndulla'),
  ('Gold Leader'),
  ('Darklighter'),
  ('Rogue Squadron Pilot'),
  ('Lando Calrissian'),
  ('Grand Moff Tarkin'),
  ('Admiral Piett'),
  ('Vader'),
  ('Qui-Gon Jinn'),
  ('Obi-Wan Kenobi'),
  ('Red Leader'),
  ('Lando Calrissian'),
  ('Plo Koon'),
  ('Bail Prestor Organa'),
  ('Anakin Skywalker'),
  ('Mace Windu'),
  ('Admiral Trench'),
  ('Clone Trooper'),
  ('Vader'),
  ('Biker Scout'),
  ('Darth Maul'),
  ('Obi-Wan Kenobi'),
  ('Count Dooku'),
  ('Jedi Starfighter'),
  ('Imperial Pilot'),
  ('Anakin Skywalker'),
  ('Clone Captain'),
  ('Sith Sidious'),
  ('Clone Commander'),
  ('Captain Needa'),
  ('Admiral Motti'),
  ('Nute Gunray');
";


  if ($conn->query($sql) === TRUE) {
    echo " Pilots inserted successfully<br>";
  } else {
    echo "Error inserting planets: " . $conn->error;
  }


  $sql = "INSERT INTO droids (droid_name, droid_nickname) VALUES
  ('R2-D2', 'Artoo'),
  ('C-3PO', 'Threepio'),
  ('BB-8', 'BB'),
  ('R5-D4', 'Red'),
  ('IG-88', 'Assassin Droid'),
  ('K-2SO', 'Kaytoo'),
  ('Chopper', 'C1-10P'),
  ('L3-37', 'L3'),
  ('C1-10P', 'Chopper'),
  ('WED-15', 'Rex'),
  ('EV-9D9', 'EV-9'),
  ('R2-Q5', 'R2-Q5'),
  ('PZ-4CO', 'PZ'),
  ('T3-M4', 'T3'),
  ('D-O', 'D-O'),
  ('T0-B1', 'Toobi'),
  ('IG-11', 'IG'),
  ('R2-B1', 'R2-B1'),
  ('R4-P17', 'R4'),
  ('L7-20', 'L7'),
  ('MSE-6', 'MSE-6'),
  ('T3-A2', 'T3'),
  ('Q7-T7', 'Q7'),
  ('GONK', 'GONK'),
  ('FX-7', 'FX-7'),
  ('T-3', 'T-3'),
  ('R1-G4', 'R1'),
  ('R9-X9', 'R9'),
  ('R2-A6', 'R2-A6'),
  ('A-1', 'A-1'),
  ('V-9', 'V9'),
  ('Darth Maul\'s Droid', 'Droid'),
  ('ZED', 'ZED'),
  ('T7-01', 'T7'),
  ('R7-A7', 'R7'),
  ('R9-R4', 'R9-R4'),
  ('R3-X2', 'R3'),
  ('R2-X2', 'R2-X2');
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