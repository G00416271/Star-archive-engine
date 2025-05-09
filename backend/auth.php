<?php
session_start();
$servername = "stararchive";
$username = "root";
$password = "";
$dbname = "stararchivedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_POST['action'];
$email = trim($_POST['email'])?? '';
$password_plain = trim($_POST['password']);

// Signup
if ($action === 'signup') {
    // Basic email validation: must contain '@' and '.'
    if (strpos($email, '@') === false || strpos($email, '.') === false) {
        echo "Invalid email format. Email must contain '@' and '.'";
        exit;
    }

    $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);
    $username = explode('@', $email)[0]; // Use email prefix as username

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "Signup successful! You can now login.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} 



// if ($action === 'signup') {
//     $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);

//     $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
//     $username = explode('@', $email)[0]; // Use email prefix as username
//     $stmt->bind_param("sss", $username, $email, $password_hash);

//     if ($stmt->execute()) {
//         echo "Signup successful! You can now login.";
//     } else {
//         echo "Error: " . $stmt->error;
//     }
//     $stmt->close();
// }

// Login
if ($action === 'login') {
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username, $password_hash);
        $stmt->fetch();
        
        if (password_verify($password_plain, $password_hash)) {
            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            
            echo "Login successful!";
            if (!isset($_COOKIE['name'])) {
                setcookie('name', $username, time() + (86400 * 30), "/");
            }
            setcookie('active', 'true', time() + (86400 * 30), "/");
            //setcookie("active", "", time() - 3600, "/");



        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
    $stmt->close();
}


if ($action === 'logout') {
    // Clear session variables
    session_unset();
    session_destroy();

    // Clear cookies
    setcookie('name', '', time() - 3600, "/");
    setcookie('active', '', time() - 3600, "/");

    echo "Logout successful!";
}
$conn->close();



?>

