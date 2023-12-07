<?php
    require('connect.php');
    session_start();
    if (isset($_SESSION['username'])) {
        $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $dob = $row['dob'];
        echo "$username <br>"; 
        echo "$dob";
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
    <title>Profile</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>
</head>

<header>
    <?php include "nav_bar.php"; ?>
<body>
    
</body>
</html>