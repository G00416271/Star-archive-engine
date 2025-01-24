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




//Users N
//Characters Y  
//Planets Y 
//Species Y
//religion  Y
//Ships Y
//Droids Y
//movies  Y





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
  religion_id INT ,
  religion_name VARCHAR(30) PRIMARY KEY
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

//Movies 

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
  religion_id INT

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
  FOREIGN KEY (droid_id) REFERENCES Droids(droid_id) ON DELETE SET NULL,
  FOREIGN KEY (movie_id) REFERENCES Movies(movie_id) ON DELETE SET NULL
) ENGINE=InnoDB;";
$conn->query($sql);


$sql = "
ALTER TABLE droids ADD COLUMN
FOREIGN KEY (char_id) REFERENCES characters(char_id) ON DELETE SET NULL"; 





















$sql = "INSERT INTO Religion (religion_name) VALUES
('Jedi'),
('Sith'),
('Mandalorian'),
('none');";

if ($conn->multi_query($sql) === TRUE) {
  echo "<br>Religion table inserted successfully";
} else {
  echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

// Characters table inserts
$sql = "INSERT INTO Characters (char_name, religion_id) VALUES
('Luke Skywalker', 1), -- Jedi
('Darth Vader', 2), -- Sith
('Han Solo', 4), -- None of the above
('Leia Organa', 4), -- None of the above
('Chewbacca', 4), -- None of the above
('C-3PO', 4), -- None of the above
('R2-D2', 4), -- None of the above
('Obi-Wan Kenobi', 1), -- Jedi
('Yoda', 1), -- Jedi
('Palpatine', 2), -- Sith
('Darth Maul', 2), -- Sith
('Padmé Amidala', 4), -- None of the above
('Qui-Gon Jinn', 1), -- Jedi
('Jar Jar Binks', 4), -- None of the above
('Anakin Skywalker', 1), -- Jedi
('Count Dooku', 2), -- Sith
('Jango Fett', 3), -- Mandalorian
('Boba Fett', 3), -- Mandalorian
('General Grievous', 4), -- None of the above
('Ahsoka Tano', 1), -- Jedi
('Rey', 1), -- Jedi
('Kylo Ren', 2), -- Sith
('Finn', 4), -- None of the above
('Poe Dameron', 4), -- None of the above
('BB-8', 4), -- None of the above
('Maz Kanata', 4), -- None of the above
('Snoke', 2), -- Sith
('Hux', 4), -- None of the above
('Rose Tico', 4), -- None of the above
('Admiral Holdo', 4), -- None of the above
('Lando Calrissian', 4), -- None of the above
('Ben Solo', 1), -- Jedi
('Janna', 4), -- None of the above
('Zorii Bliss', 4), -- None of the above
('Babu Frik', 4), -- None of the above
('D-O', 4); -- None of the above
";

if ($conn->multi_query($sql) === TRUE) {
  echo "<br>Characters table inserted successfully";
} else {
  echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

// // Planets table inserts
// $sql = "INSERT INTO Planets (planet_name, planet_region) VALUES
// ('Tatooine', 'Outer Rim'),
// ('Alderaan', 'Core Worlds'),
// ('Naboo', 'Mid Rim'),
// ('Coruscant', 'Core Worlds'),
// ('Shili', 'Expansion Region'),
// ('Mandalore', 'Outer Rim'),
// ('Kashyyyk', 'Mid Rim'),
// ('Dagobah', 'Outer Rim'),
// ('Kamino', 'Outer Rim'),
// ('Geonosis', 'Outer Rim'),
// ('Lothal', 'Outer Rim'),
// ('Mustafar', 'Outer Rim'),
// ('Endor', 'Outer Rim'),
// ('Hoth', 'Outer Rim'),
// ('Bespin', 'Outer Rim'),
// ('Corellia', 'Core Worlds'),
// ('Jakku', 'Western Reaches'),
// ('Dathomir', 'Outer Rim'),
// ('Yavin IV', 'Outer Rim'),
// ('Scarif', 'Outer Rim'),
// ('Jedha', 'Mid Rim'),
// ('Ryloth', 'Outer Rim'),
// ('Zygerria', 'Outer Rim'),
// ('Felucia', 'Outer Rim'),
// ('Onderon', 'Inner Rim'),
// ('Mon Cala', 'Outer Rim'),
// ('Exegol', 'Unknown Regions'),
// ('Ahch-To', 'Unknown Regions'),
// ('Ilum', 'Unknown Regions'),
// ('Polis Massa', 'Outer Rim'),
// ('Saleucami', 'Outer Rim'),
// ('Umbara', 'Mid Rim'),
// ('Toydaria', 'Hutt Space'),
// ('Ord Mantell', 'Mid Rim'),
// ('Crait', 'Outer Rim'),
// ('Malachor', 'Outer Rim'),
// ('Serenno', 'Outer Rim'),
// ('Nal Hutta', 'Hutt Space'),
// ('Hosnian Prime', 'Core Worlds'),
// ('Korriban', 'Outer Rim')";

// if ($conn->multi_query($sql) === TRUE) {
//   echo "Planets table inserted successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Species table inserts
// $sql = "INSERT INTO Species (species_name, species_description) VALUES
// ('Togruta', 'A humanoid species with colorful skin patterns and large head-tails.'),
// ('Human', 'A common sentient species in the galaxy.'),
// ('Droid', 'Mechanical beings with varying levels of sentience.'),
// ('Wookiee', 'A tall, hairy species known for their strength and loyalty.'),
// ('Twi lek', 'A humanoid species wit head tails called lekku.'),
// ('Zabrak', 'A species known for their horns and resilience.'),
// ('Chiss', 'A blue-skinned humanoid species with red eyes.'),
// ('Rodian', 'Green-skinned species known for their tracking skills.'),
// ('Ithorian', 'A species with long necks and two mouths.'),
// ('Mon Calamari', 'Aquatic species known for their shipbuilding skills.'),
// ('Nautolan', 'Aquatic species with head tentacles.'),
// ('Duros', 'A humanoid species with blue skin and red eyes.'),
// ('Trandoshan', 'Reptilian species known for their hunting prowess.'),
// ('Kaminoan', 'Tall, slender species from Kamino.'),
// ('Hutt', 'A slug-like species known for their criminal empires.'),
// ('Chadra-Fan', 'Small, bat-like species.'),
// ('Nikto', 'Reptilian humanoids known for their loyalty.'),
// ('Kel Dor', 'Humanoids with breath masks and goggles.'),
// ('Ewok', 'Small, furry bipeds from Endor.'),
// ('Geonosian', 'Insectoid species from Geonosis.'),
// ('Gungan', 'Amphibious species from Naboo.'),
// ('Neimoidian', 'Humanoids known for their trade skills.'),
// ('Sith Pureblood', 'The ancient Sith species.'),
// ('Aqualish', 'Walrus-faced humanoids.'),
// ('Toydarian', 'Small, winged humanoids immune to mind tricks.'),
// ('Quarren', 'Aquatic species from Mon Cala.'),
// ('Devaronian', 'Humanoids with devil-like horns.'),
// ('Togrutan', 'Colorful species similar to Togruta.'),
// ('Pau an', 'Tall humanoids fr Utapau.'),
// ('Weequay', 'Reptilian humanoids known for their piracy.'),
// ('Gamorrean', 'Pig-like humanoids.'),
// ('Lannik', 'Small, humanoid warriors.'),
// ('Vulptereen', 'Bulldog-faced species.'),
// ('Selkath', 'Aquatic species from Manaan.'),
// ('Shistavanen', 'Wolf-like humanoids.'),
// ('Falleen', 'Reptilian humanoids with pheromonal control.'),
// ('Mirialan', 'Green-skinned humanoids with facial tattoos.'),
// ('Pantoran', 'Blue-skinned humanoids.'),
// ('Lasat', 'Large, strong humanoids.')";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "<br>Species table inserted successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }

// // Religion table inserts



// if ($conn->multi_query($sql) === TRUE) {
//     echo "<br>Religion table inserted successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }

// // Movies table inserts
// $sql = "INSERT INTO Movies (movie_name, movie_year) VALUES
// ('The Phantom Menace', 1999),
// ('Attack of the Clones', 2002),
// ('Revenge of the Sith', 2005),
// ('A New Hope', 1977),
// ('The Empire Strikes Back', 1980),
// ('Return of the Jedi', 1983),
// ('The Force Awakens', 2015),
// ('The Last Jedi', 2017),
// ('The Rise of Skywalker', 2019),
// ('The Clone Wars', 2008),
// ('Rogue One', 2016),
// ('Solo', 2018),
// ('Star Wars Rebels', 2014),
// ('The Mandalorian', 2019),
// ('The Book of Boba Fett', 2021),
// ('Obi-Wan Kenobi', 2022),
// ('Andor', 2022),
// ('Ahsoka', 2023),
// ('Tales of the Jedi', 2022),
// ('The Bad Batch', 2021),
// ('Visions', 2021),
// ('Forces of Destiny', 2017),
// ('Resistance', 2018),
// ('Droids', 1985),
// ('Ewoks', 1985),
// ('Holiday Special', 1978),
// ('Battle for Endor', 1985),
// ('Caravan of Courage', 1984),
// ('Jedi Fallen Order', 2019),
// ('The High Republic', 2021),
// ('The Acolyte', 2024),
// ('Rangers of the New Republic', 2024),
// ('Children of the Jedi', 1995),
// ('Dark Empire', 1991),
// ('Heir to the Empire', 1991),
// ('Empires End', 1995),
// ('Shadows of the Empire', 199);";


// if ($conn->multi_query($sql) === TRUE) {
//     echo "<br>Religion table inserted successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }


// $sql = "INSERT INTO Ship_models (ship_name) VALUES
// ('Millennium Falcon'),
// ('X-Wing'),
// ('TIE Fighter'),
// ('TIE Interceptor'),
// ('Star Destroyer');";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "<br>Ships table inserted successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }

// // Droids table inserts
// $sql = "INSERT INTO Droids (droid_name) VALUES
// ('C-3PO' ),
// ('R2-D2'),
// ('BB-8'),
// ('D-O');";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "<br>Droids table inserted successfully";
// } else {
//     echo "<br>Error: " . $sql . "<br>" . $conn->error;
// }




$conn->close();
?>

</body>
</html>