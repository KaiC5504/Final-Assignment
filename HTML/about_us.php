<?php
    require('connect.php');
    session_start();
    if (isset($_SESSION['username'])) {
        
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 4)) {
            session_unset();
            session_destroy();
            header("Location: ../index.php");
            exit();
        };
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {
        session_unset();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/about_us.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>

    <div class="top-section">
        <h1 style="text-align: center; font-size: xxx-large;">About Us</h1>
        <div class="oval-shape">
            <p>Contact Us<br>033197088</p>
        </div>
    </div>


    <div class="image-container">
        <img src="https://www.alwaysonpurpose.com/wp-content/uploads/2019/11/happypeople-1024x679.jpg" alt="About Us Image">
    </div>

    <div class="bottom-section">
        <div class="textcontainer">
            <p>
                The founders of AirCON, Tan Kai Chuan and Ong Chun Sxien, expressed worry over overpopulation during a lecture that led to the creation of the airline. As we became aware of the connection between pollution and population growth, we realized we had to deal with the growing air pollution brought on by more factories and cars.

                <br><br>We used the internet's power as programmers and lovers of the outdoors to raise awareness of the risks caused by air pollution. AirCON is more than just a company—it's how we voice our worries about the environment and strive for improvement.

                <br><br>Our goal is to minimize the negative effects of air pollution in order to make the world a safer and healthier place. In an effort to make the world a cleaner, safer place, we want to increase public awareness of the health hazards related to air pollution.
            </p>
        </div>
    </div>
        
</body>
</html>