<HTML>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</HTML>

<?php
    require('connect.php');
    session_start();

    //update donation 
    if (isset($_POST['donation']) && isset($_SESSION['username'])) {
        $donation = $_POST['donation'];
        $username = $_SESSION['username'];

        $query = "UPDATE users SET donation = '$donation' WHERE username = '$username'";

        
        if (mysqli_query($con, $query)) {
            echo "<script>
                    Swal.fire({
                    title: 'Thank you for your donation!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    }).then (function() {
                        window.location.href = '../index.php';
                    });
                </script>";
        } else {
            // echo "Error updating record: " . mysqli_error($con);
        }
    }

    //get donation list
    $query = "SELECT user_id, username, donation FROM users WHERE donation > 0";
    $result = mysqli_query($con, $query);

    $user_idList = [];
    $usernameList = [];
    $donationList = [];

    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $donation = $row['donation'];

        $user_idList[] = $user_id;
        $usernameList[] = $username;
        $donationList[] = $donation;
    }

    //Session timeout
    if (isset($_SESSION['username'])) {
        
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
    <title>Donation</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/donation.css"; ?>
    </style>

    <script>
        var LoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;
    </script>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
    <h1 style = "text-align: center; padding-top: 1vh; font-size: 3vw">Plant 1 Million Trees</h1>

    <div class = "progress-bar">
        <div></div>
    </div>

    <div class = "content">
        <div class="boxContainer">

            <form action = "donation.php" method = "POST">
                <div class="box" style = "background-color: #FF9292;"onclick = "return checkLogin(this);">
                    <span>Plant 3 Trees</span>
                    <div class = "middleText">
                        <span>RM 10</span>
                    </div>
                    <input type = "hidden" name = "donation" value = "1">
                </div>
            </form>

            <form action = "donation.php" method = "POST">
                <div class="box" style = "background-color: #61D58F" onclick = "return checkLogin(this);">
                    <span>Plant 20 Trees</span>
                    <div class = "middleText">
                        <span>RM 50</span>
                    </div>
                    <input type = "hidden" name = "donation" value = "2">
                </div>
            </form>

            <form action = "donation.php" method = "POST">
                <div class="box" style = "background-color: #78AFFD" onclick = "return checkLogin(this);">
                    <span>Plant 50 Trees</span>
                    <div class = "middleText">
                        <span>RM 100</span>
                    </div>
                    <input type = "hidden" name = "donation" value = "3">
                </div>
            </form>

            <script>
                function checkLogin(element) { 
                    if (!LoggedIn) { 
                        Swal.fire({
                            title: 'Please Login to donate!',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            footer: '<a href = "login.php" class = "warningFooter">Login Here</a>'
                        })
                        return false;
                    }
                    element.parentNode.submit();
                    return false;
                }
            </script>
        </div>

        <div class="donationList">
            <h2 style = "text-align: center; font-size: 40px">DONATION LIST</h2>
            <?php for ($i = 0; $i < count($donationList); $i++): ?>
            <ul>
                <li name = "username" style = "color:
                <?php 
                    if ($donationList[$i] == 1) {
                        echo '#FF9292';
                    } elseif ($donationList[$i] == 2) {
                        echo '#61D58F';
                    } elseif ($donationList[$i] == 3) {
                        echo '#78AFFD';
                    } else {
                        echo 'black';
                    }
                ?>">
                <?php echo isset($usernameList[$i]) ? $usernameList[$i]:''?></li>
            </ul>
            <?php endfor; ?>
        </div>
    </div>

</body>
</html>

