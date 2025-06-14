<?php
function emptyInputSignup($name, $email, $number, $password, $cpassword)
{
    return empty($name) || empty($email) || empty($number) || empty($password) || empty($cpassword);
}

function emptyInputLogin($email, $password)
{
    return empty($email) || empty($password);
}

function passwordMatch($password, $cpassword)
{
    return $password !== $cpassword;
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('stmt failed.'); window.location.href = 'registration.html';</script>";
        // header('Location: registration.html ?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $number, $password)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersNumber, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('stmt failed.'); window.location.href = 'registration.html';</script>";
        // header('Location: registration.html?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $number, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: login.html?error=none');
    exit();
}


function loginUser($conn, $email, $password)
{

    $emailExists = emailExists($conn, $email);
    if ($emailExists === false) {
        echo "<script>alert('Wrong Login.'); window.location.href = 'login.html';</script>";
        // header('Location: login.html?error=wronglogin');
        exit();
    }


    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        echo "<script>alert('Wrong Login.'); window.location.href = 'login.html';</script>";
        // header('Location: login.html?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        // Start session and set session variables
        session_start();
        $_SESSION["useremail"] = $emailExists["usersEmail"];
        header('Location: home.html');
        exit();
    }
}
