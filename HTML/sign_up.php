<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>
    
    <style>
        <?php include "../CSS/sign_up.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?> 
</header>

<body>

    <div class="signupContainer">

        <h1 style = "text-align: center; margin-bottom: 7vh; margin-top: 0.5vh; width: 100%;">Create Account</h1>

        <form id = "signupForm" onsubmit = "event.preventDefault(); validateForm()" method = "POST" action = "">
            <div class = "inputRow">
                <div class = "inputs">
                    <label for = "username">Username:</label>
                    <input type = "text" id = "username" name = "username" class = "signUpInput">
                    <span class = "error"></span>
                </div>
            

                <div class = "inputs">
                    <label for = "email">Email:</label>
                    <input type = "email" id = "email" name = "email" class = "signUpInput">
                    <span class = "error"></span>
                </div>
            </div>

            <div class = "inputRow">
                <div class = "inputs">
                    <label for = "password">Password:</label>
                    <input type = "password" id = "password" name = "password" class = "signUpInput">
                    <small class = "error"></small>
                </div>

                <div class = "inputs">
                    <label for = "dob">Date of Birth:</label>
                    <input type = "date" id = "dob" name = "dob" class = "signUpInput">
                    <small class = "error"></small>
                </div>
            </div>
            
            <div style = "flex: 0 0 100%; text-align: center;">
                <button type = "submit" class = "createAccButton"><b>SIGN UP</b></button>
                <p id = "signup"></p>
                <p style = "margin-top: 1.5vh; font-size: 1vw; color: #B3B3B3;">Already Registered? &nbsp;<a href = "login.php" style = "text-decoration: none; color: #4d4d4d;">Login Here</a></p>
            </div>
        </form>

        <!-- <script src = "../Javascript/sign_up.js"></script> -->
    </div>
</body>
</html>