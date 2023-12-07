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
            <!-- <ul>
                <li>Robert Downey Jr.</li>
                <li>50 years</li>
                <li>Actor</li>
                <li>
                    <i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                </li>
            </ul> -->
        </div>
        <div class = "details">
            <ul>
                <h1>Details</h1>
            </ul>
            <ul>
                <h3>Username</h3>
                <?php echo "<li>$username</li>"; ?>
            </ul>
            <ul>
                <h3>Birthday</h3>
                <?php echo "<li>$dob</li>"; ?>
            </ul>
            <ul>
                <h3>Account Created</h3>
                <li>WILL BE ADDED IN</li>
            </ul>
            <!-- <ul>
                <h3>More Info</h3>
                <p>Ok</p>
            </ul> -->
            <ul>
                <h3>Contact</h3>
                <?php echo "$email"; ?>
            </ul>
        </div>
    </div>


    <a href = "edit.php"><button type = "submit" class = "editButton" name = "edit"><span><b>Edit </b></span></button></a>


    
</body>
</html>
