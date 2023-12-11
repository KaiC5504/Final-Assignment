<?php
    require('connect.php');

    //set variables for user details and error
    $usernameError = "";
    $username = null;

    $emailError = "";
    $email = null;

    $passwordError = "";
    $password = null;

    $dobError = "";
    $dob = null;

    $errorFlag = false;

    //form validation and insert user details into database
    if(isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            $usernameError = "Username cannot be empty";
            $errorFlag = true;
        }
        else
        {
            $username = $_POST['username'];
        }

        if(strlen(($_POST['password'])) < 8) {
            $passwordError = "Password must be at least 8 characters";
            $errorFlag = true;
        }
        else {$password = $_POST['password'];}

        $email = $_POST['email'];

        $pattern = '/\S+@\S+\.\S+/';

        if(!preg_match($pattern, $email)) {
            $emailError = "Email is not valid";
            $errorFlag = true;
        }

        if (empty($_POST['dob'])) {
            $dobError = "Date of Birth cannot be empty";
            $errorFlag = true;
        }
        else
        {
            $dob = $_POST['dob'];
        }


        //insert user details into database if no error
        if(!$errorFlag) {
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($con, $username);
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $date_created = date("Y-m-d");

            $query = "INSERT into users (username, password, email, dob, date_created)
            VALUES ('$username', '$password', '$email', '$dob', '$date_created')";
            mysqli_query($con, $query);
            header("Location: login.php");
        }
    }
    
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

        <form id = "signUpForm" method = "POST" action = "sign_up.php" novalidate>
            <div class = "inputRow">
                <div class = "inputs">
                    <label for = "username">Username:</label>
                    <input type = "text" id = "username" name = "username" class = "signUpInput" value='<?=$username?>'>
                    <span class = "error"><?=$usernameError ?></span>
                </div>
            

                <div class = "inputs">
                    <label for = "email">Email:</label>
                    <input type = "email" id = "email" name = "email" class = "signUpInput" value='<?=$email?>' autocomplete="off"> 
                    <span class = "error"><?=$emailError?></span>
                </div>
            </div>

            <div class = "inputRow">
                <div class = "inputs">
                    <label for = "password">Password:</label>
                    <input type = "password" id = "password" name = "password" class = "signUpInput" value='<?=$password?>'>
                    <small class = "error"><?=$passwordError?></small>
                </div>

                <div class = "inputs">
                    <label for = "dob">Date of Birth:</label>
                    <input type = "date" id = "dob" name = "dob" class = "signUpInput" value = "<?=$dob?>">
                    <small class = "error"><?=$dobError?></small>
                </div>
            </div>
            
            <div style = "flex: 0 0 100%; text-align: center;">
                <button type = "submit" class = "createAccButton" name='submit'><b>SIGN UP</b></button>
                <p style = "margin-top: 1.5vh; font-size: 1vw; color: #B3B3B3;">Already Registered? &nbsp;<a href = "login.php" style = "text-decoration: none; color: #4d4d4d;">Login Here</a></p>
            </div>
        </form>

    </div>
</body>
</html>