<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bookstore";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
