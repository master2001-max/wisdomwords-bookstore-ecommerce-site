<?php

require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">


    <style>
        .header {


            color: #663300;
            background-color: burlywood;

        }
    </style>

</head>

<body>
    <header>
        <h1><a href="../wadPhp2/home.html"><img src="25694.png" alt="Home Icon" style="width: 24px; height: 24px;"></a>
            <!-- <img style="width: 50px; height: 40px;" src="logo.jpg" alt=""> -->
            </a></h1>
        <div id="main_tabs">

            <a href="upload.php">Upload</a>
            <a href="Home.php">Products</a>
        </div>
        <a href="cart.php">Cart <span id="badge"><?php echo mysqli_num_rows($all_cart);  ?></span></a>

    </header>

</body>

</html>