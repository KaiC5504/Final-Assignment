<?php
    require('connect.php');
    session_start();
    if (isset($_SESSION['username'])) {
        $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $dob = $row['dob'];
        $email = $row['email'];
        $user_id = $row['user_id'];
        // echo "$username <br>"; 
        // echo "$dob";
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
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

    $username = $row['username'];
    $password = $row['password'];
    $dob = $row['dob'];
    $email = $row['email'];
    
    $usernameError = "";

    $passwordError = "";

    $emailError = "";

    $dobError = "";

    $errorFlag = false;
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

        if(!$errorFlag) {
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($con, $username);

            $query = "UPDATE users
            SET username = '$username', password = '$password', email = '$email', dob = '$dob'
            WHERE user_id = '$user_id'";
            mysqli_query($con, $query);
            
            session_destroy();

            header("Location: ../index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/edit.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>

    <div class = "editContainer">
        <h1>Edit Profile</h1>
        <form action = "edit.php" method = "POST" novalidate>
            <div class = "inputRow">
                <label for = "username">Username:</label>
                <input type = "text" id = "username" name = "username" value='<?=$username?>' class = "editInputs">
                <span class = "error"><?=$usernameError ?></span>
            </div>
            <div class = "inputRow">
                <label for = "password">Password:</label>
                <input type = "text" id = "password" name = "password" value='<?=$password?>' class = "editInputs">
                <span class = "error"><?=$passwordError ?></span>
            </div>
            <div class = "inputRow">
                <label for = "email">Email:</label>
                <input type = "email" id = "email" name = "email" value='<?=$email?>' class = "editInputs">
                <span class = "error"><?=$emailError?></span>
            </div>
            <div class = "inputRow">
                <label for = "dob">Date of Birth:</label>
                <input type = "date" id = "dob" name = "dob" value='<?=$dob?>' class = "editInputs">
                <span class = "error"><?=$dobError?></span>
            </div>
            <div style = "flex: 0 0 100%; text-align: center; margin-top: 2vh;">
                <button type = "submit" class = "saveButton" name='submit'><b>Save Changes</b></button>
            </div>
        </form>
    </div>

</body>
</html>