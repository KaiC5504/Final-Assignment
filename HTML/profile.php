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

    if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/profile.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
    <div class = "profileContainer">
        <div class = "leftBox">
            <img src = "../resources/Images/Profile.png" alt = "Profile Picture">
        </div>
        <div class = "details">
            <form method = "GET" action = "edit.php">
                <ul>
                    <h1>Details</h1>
                </ul>
                <ul>
                    <h3>Username</h3>
                    <li name = "username"><?php echo "$username"; ?></li>
                </ul>
                <ul>
                    <h3>Birthday</h3>
                    <li name = "dob"><?php echo "$dob"; ?></li>
                </ul>
                <ul>
                    <h3>Account Created</h3>
                    <li>WILL BE ADDED IN</li>
                </ul>
                <ul>
                    <h3>Contact</h3>
                    <li name = "email"><?php echo "$email"; ?></li>
                </ul>
        </div>
    </div>


    <div class = "buttonRow">
        <button type = "submit" class = "editButton" name = "edit"><span><b>Edit </b></span></button>
    </form>
    <form method="POST">
    <button type = "submit" class = "logoutButton" name='logout'><span><b>Logout</b></span></button>
    </form>
    </div>
    
</body>
</html>
