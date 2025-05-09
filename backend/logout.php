<?php
session_start();
$action = $_POST['action'];


if ($action === 'logout') {
    // Clear session variables
    session_unset();
    session_destroy();

    // Clear cookies
    setcookie('name', '', time() - 3600, "/");
    setcookie('active', '', time() - 3600, "/");

    echo "success";
}

?>