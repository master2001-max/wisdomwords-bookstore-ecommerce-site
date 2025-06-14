<?php
if (isset($_POST["btn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Include the database connection and functions
    require_once 'dbconn.php';
    require_once 'functions.php';

    $emptyInput = emptyInputLogin($email, $password);

    if ($emptyInput) {
        echo "<script>alert('Please fill in all fields.'); window.location.href = 'login.html';</script>";
        exit();
    }

    // Attempt to login
    $emailExists = emailExists($conn, $email);
    if ($emailExists === false) {
        echo "<script>alert('Email is not registered yet.'); window.location.href = 'registration.html';</script>";
        exit();
    }

    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {

        echo "<script>alert('Invalid email or password.'); window.location.href = 'login.html';</script>";
        exit();
    } else if ($checkPwd === true) {
        // Start session and set session variables
        session_start();
        $_SESSION["useremail"] = $emailExists["usersEmail"];
        header('Location: home.html');
        exit();
    }
} else {
    header('Location: home.html');
    exit();
}
