<?php
    session_start();
    require('connect.php');

    $usernameError = "";
    $passwordError = "";


    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "Select * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $row['is_admin'];
            header("Location: ../index.php");
            exit();
        }
        else {
            $usernameError = "Username or Password is invalid";
            $passwordError = "Username or Password is invalid";
            session_unset();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/login.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
    <?php if (isset($_SESSION['message'])): ?>
        <div class = "message" id = "message">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div> 
        <script type="text/javascript">
            document.getElementById('message').style.display = 'block';
            setTimeout(function() {
                document.getElementById('message').style.display = 'none';
            }, 5000); // The message box will disappear after 5 seconds
        </script>
    <?php endif ?>
    <form action = "login.php" method = "POST" novalidate>
        <div class="loginContainer">

            <h1 style = "text-align: center; margin-bottom: 7vh; margin-top: 0.5vh; width: 100%;">Login</h1>

            <div class="inputs">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class = "loginInput"> <br>
                <span class = "error"><?=$usernameError ?></span>
            </div>

            <div class="inputs">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class = "loginInput"> <br>
                <span class = "error"><?=$passwordError ?></span>
            </div>

            <div style = "flex: 0 0 100%; text-align: center;">
                <button type="submit" class = "loginButton" name = "login"><b>Login</b></button>
                <p style = "margin-top: 1.5vh; font-size: 1vw; color: #B3B3B3;">Not yet register? &nbsp;<a href = "sign_up.php" style = "text-decoration: none; color: #4d4d4d;">Register Here</a></p>
            </div> 
        </div>
  </form>
</body>
</html>