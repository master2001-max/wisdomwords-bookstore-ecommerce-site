<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        .btn1 {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn1:hover {
            background-color: #2980b9;
        }

        .btn a,
        .btn1 a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="loginform">

        <form action="logout.php" method="post">
            <?php
            session_start(); // Start the session
            if (isset($_SESSION["useremail"])) {
                echo '<h1>Are You Sure ,  </h1>';
                echo '<h1>You want Logout ?  </h1>';
                echo '<button type="submit" name="logout" class="btn"><a href="welcome.php"><strong>Logout</strong></a></button><br><br>';
            } else {
                echo '<h1>You are not Loged In Yet ! </h1>';
                echo '<button type="submit" class="btn1" name="btn1"><a href="home.html"><strong>Log In</strong></a></button>';
            }
            ?>
        </form>

        <!-- <form action="logout.php" method="post">
            <button type="submit" name="logout" class="btn">Logout</button>
            <br><br>
        </form> -->



</body>

</html>