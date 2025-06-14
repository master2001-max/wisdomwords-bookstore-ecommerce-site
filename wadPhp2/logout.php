<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["useremail"])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
}

// Redirect to the login page
header('Location: welcome.php');
exit();
