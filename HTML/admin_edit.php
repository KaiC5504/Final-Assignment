<?php
    require('connect.php');
    session_start();

    // select user_id to edit
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];

        $query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_array($result);

        $username = $user['username'];
        $user_id = $user['user_id'];
        $email = $user['email'];
        $password = $user['password'];
        $dob = $user['dob'];
        $is_admin = $user['is_admin'];
        $role = ($is_admin == 1) ? "Admin" : "User";
        }
    }

    // update user
    if(isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $role = $_POST['role'];
        $is_admin = ($role == 'Admin') ? 1 : 0;

        $query = "UPDATE users SET username = '$username', password = '$password', email = '$email', dob = '$dob', is_admin = '$is_admin' WHERE user_id = '$user_id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['updated'] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    

    // check if user is logged in and if session is expired
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

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
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    
    <style>
        <?php include "../CSS/admin_edit.css" ?>
    </style>
</head>

<body>
    
    <section id = "menu">
        <div class = "navLogo">
            <a href = "../index.php"><img src = "../resources/Images/AirPure_Logo.png" alt = "logo"></a>
        </div>

        <div class = "menuItems">
            <li><i class="fa-solid fa-crown"></i><a href = "admin_dashboard.php">Dashboard</a></li>
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
        <h3 class = "iName">Edit Users</h3>

        <form action="admin_edit.php" method="POST" novalidate>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="formRow">
                <div class="group">
                    <label for = "username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="group">
                    <label for = "email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="formRow">
                <div class="group">
                    <label for = "password">Password</label>
                    <input type="text" id="password" name="password" value="<?php echo $password; ?>">
                </div>
                <div class="group">
                    <label for = "dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>">
                </div>
            </div>
            <div class="formRow">
                <div class="dropdownGroup">
                    <label for = "role">Role</label>
                    <select name="role" id="role">
                        <option value="Admin" <?php echo $role == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="User" <?php echo $role == 'User' ? 'selected' : ''; ?>>User</option>
                    </select>
                    
                </div>
            </div>
            <button type = "submit" name="update">Update</button>
        </form>
    </section>
</body>
</html>