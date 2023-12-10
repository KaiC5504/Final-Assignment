<?php
    require('connect.php');
    session_start();
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    $user_idList = [];
    $usernameList = [];
    $emailList = [];
    $is_adminList = [];

    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $is_admin = $row['is_admin'];

        $user_idList[] = $user_id;
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
    
    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

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

<!-- <header>
    <?php include "nav_bar.php"; ?>
</header> -->

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
            <li><i class="fa-solid fa-right-from-bracket"></i><a href = "?logout=true">Logout</a></li>
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

        <div class = "values">
            <div class="valBox">
                <i class="fa-solid fa-user-plus"></i>
                <div>
                    <h3>100</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="valBox">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <div>
                    <h3>5,000</h3>
                    <span>Donations</span>
                </div>
            </div>
            <div class="valBox">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <h3>PM 2.5</h3>
                    <span>Air Quality</span>
                </div>
            </div>
            <div class="valBox">
                <i class="fa-solid fa-temperature-quarter"></i>
                <div>
                    <h3>1.13°C</h3>
                    <span>Earth Temperature</span>
                </div>
            </div>
        </div>

        <div class = "userContainer">
            <table width = "100%">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($user_idList); $i++): ?>
                        <tr>
                            <td class = "userName">
                                <h5 name = "username"><?php echo isset($usernameList[$i]) ? $usernameList[$i]:''?></h5>
                            </td>

                            <td class = "userEmail">
                                <h5 name = "email"><?php echo isset($emailList[$i]) ? $emailList[$i]:''?></h5>
                            </td>

                            <td class = "userRole">
                                <p name = "email"><?php echo isset($is_adminList[$i]) ? $is_adminList[$i]:''?></p>
                            </td>

                            <td class = "actions">
                                <a href = "admin_edit.php?user_id=<?php echo $user_idList[$i]; ?>">Edit</a>
                            </td>
                            <td class = "actions">
                                <a href = "admin_delete.php?user_id=<?php echo $user_idList[$i]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>