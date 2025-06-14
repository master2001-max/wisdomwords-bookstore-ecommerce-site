<?php
if (isset($_POST["btn"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Database connection
    require_once 'dbconn.php';
    // Include functions from functions.php
    require_once 'functions.php';

    // Validate inputs
    if (emptyInputSignup($name, $email, $number, $password, $cpassword)) {
        echo "<script>alert('Please fill in all fields.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (emailExists($conn, $email)) {
        echo "<script>alert('The email has taken.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (passwordMatch($password, $cpassword)) {
        echo "<script>alert('Confirm Password in not matching.'); window.location.href = 'registration.html';</script>";
        exit();
    }



    // Validate password strength

    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (!preg_match('/[A-Z]/', $password)) {
        echo "<script>alert('Password must include at least one uppercase letter.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (!preg_match('/[a-z]/', $password)) {
        echo "<script>alert('Password must include at least one lowercase letter.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (!preg_match('/\d/', $password)) {
        echo "<script>alert('Password must include at least one number.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    if (!preg_match('/[\W]/', $password)) {
        echo "<script>alert('Password must include at least one special character.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    // Create user
    createUser($conn, $name, $email, $number, $password);
} else {
    header('Location: home.html');
    exit();
}
