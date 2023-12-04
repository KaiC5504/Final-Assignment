<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>

    <style>
        body { 
            /* background-image: url("../resources/Images/Background.png"); */
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>


<body>    
    <h1 style = "margin-left: 8.5vw; margin-top: 10vh; font-size: 6vw; color: #3834E3;">Welcome To Air<a style = "color: #7f7ea5;">Con</a></h1>

    <a href = "sign_up.php"><button class = "signUpButton"><b>Sign UP Now</b></button></a>

</body>
</html>