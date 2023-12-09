<?php
    require('connect.php');
    session_start();
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    $usernameList = [];
    $emailList = [];
    $is_adminList = [];

    while ($row = mysqli_fetch_array($result)) {
        $username = $row['username'];
        $email = $row['email'];
        $is_admin = $row['is_admin'];

        $usernameList[] = $username;
        $emailList[] = $email;

        $role = ($is_admin == 1) ? "Admin" : "User";
        $is_adminList[] = $role;
    }

    // if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    //     session_unset();
    //     session_destroy();
    //     header("Location: ../index.php");
    //     exit();
    // }

    $_SESSION['LAST_ACTIVITY'] = time();
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel = "stylesheet" href = "../CSS/style.css"> -->
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    
    <style>
        <?php include "../CSS/dashboard.css" ?>
    </style>
</head>

<body>
    
    <section id = "menu">
        <div class = "navLogo">
            <a href = "../index.php"><img src = "../resources/Images/AirCon_Logo.png" alt = "logo"></a>
        </div>

        <div class = "menuItems">
            <li><i class="fa-solid fa-crown"></i><a href = "#">Dashboard</a></li>
            <li><i class="fa-solid fa-map"></i><a href = "#">Map</a></li>
            <li><i class="fa-solid fa-hand-holding-dollar"></i><a href = "#">Donation</a></li>
            <li><i class="fa-solid fa-comment"></i><a href = "#">Feedbacks</a></li>
            <li><i class="fa-solid fa-pen-to-square"></i><a href = "#">Forms</a></li>
            <li><i class="fa-solid fa-credit-card"></i><a href = "#">Cards</a></li>
            <li><i class="fa-solid fa-chart-pie"></i><a href = "#">Chart</a></li>
        </div>
    </section>
    
    <section id = "interface">
        <div class = "navBar">
            <div class = "n1">
                <div class = "search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="search">
                </div>
            </div>

            <div class = "profile">
               <img src = "../resources/Images/Admin_profile.jpg" alt = "admin profile">
            </div>
        </div>
        <h3 class = "iName">Dashboard</h3>
    </section>
</body>
</html>