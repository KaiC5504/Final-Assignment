<?php
    require('connect.php');
    session_start();

    // retrieve user details and session timeout
    if (isset($_SESSION['username'])) {
        $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $user_id = $row['user_id'];
        $username = $row['username'];
        $dob = $row['dob'];
        $email = $row['email'];
        $date_created = $row['date_created'];
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
            session_unset();
            session_destroy();
            header("Location: session_timeout.php");
            exit();
        };
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {
        session_unset();
    }

    //delete account
    if (isset($_POST['delete'])) {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $query);
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit;
    }

    //logout
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/profile.css"; ?>
    </style>

    <script>
        window.onload = function() {
            document.getElementById('deleteButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Once you delete there is no going back!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete!',
            })
            .then((confirmDelete) => {
                if (confirmDelete.isConfirmed) {
                document.getElementById('deleteAcc').submit();
                }
            });
        });
        }
    </script>
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
                    <li name = "date_created"><?php echo "$date_created"; ?></li>
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

    <form id="deleteAcc" method="POST" action="profile.php">
        <input type="hidden" name="delete">
        <button type = "button" id = "deleteButton" name = "delete" class = "deleteButton"><span><b>Delete Account</b></span></button>
    </form>

    <form method="POST">
        <button type = "submit" class = "logoutButton" name='logout'><span><b>Logout</b></span></button>
    </form>

    </div>
    
</body>
</html>
