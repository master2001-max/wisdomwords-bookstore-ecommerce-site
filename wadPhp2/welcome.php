<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
        }

        header {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(251, 248, 251, 0.984), rgba(231, 211, 230, 0.7)), url(image/background2.jpg);
            background-position: center;
            background-size: cover;
            position: relative;

        }

        .text-box {
            width: 90%;
            color: #c74b42;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .text-box h1 {
            font-size: 68px;

        }

        .text-box p {
            margin: 10px 0 40px;
            font-size: 20px;
            color: #996633;

        }

        .hero-btn {
            display: inline-block;
            text-decoration: none;
            color: #996633;
            border: 1px solid #BB9966;
            padding: 12px 34px;
            font-size: 14px;
            background: transparent;
            position: relative;
            cursor: pointer;
        }

        .hero-btn:hover {
            border: 3px solid #FFCC99;
            background: #FFCC99;
            transition: 1s;
        }

        .text-box {
            width: 90%;
            color: #c74b42;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .text-box h1 {
            font-size: 68px;

        }

        .text-box p {
            margin: 10px 0 40px;
            font-size: 20px;
            color: #996633;

        }
    </style>
</head>

<body>
    <header>
        <div class="text-box">
            <h1>Discover Your Next Favorite Book.</h1>
            <p> <strong> "Stories that inspire you, <br>Knowledge that empowers you,<br> and Adventures that captivate
                    you." </strong></p>
            <a href="login.html" class="hero-btn"> Login & Shop Now</a>

        </div>
    </header>
</body>

</html>