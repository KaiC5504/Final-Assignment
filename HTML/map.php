<?php
    require('connect.php');
    session_start();

    //Select Location
    $sql = "SELECT location, rating, color FROM places";
    $result = mysqli_query($con, $sql);

    
    $ratings = array();

    // output data of each row
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $location = $row['location'];
            $rating = $row['rating'];
            $color = $row['color'];
            $ratings[$location] = array('rating' => $rating, 'color' => $color);
        }
    }

    //Session timeout
    if (isset($_SESSION['username'])) {
        
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src="../JavaScript/hamburger.js" defer></script>
    <script src="../JavaScript/pin.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        <?php include "../CSS/map.css"; ?>
    </style>
</head>
<body style="solid">
    <header>
        <?php include "nav_bar.php"; ?>
    </header>
    <h1 style="text-align: center;">Map</h1>
    <div class="contain">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Blank_malaysia_map.svg/2560px-Blank_malaysia_map.svg.png" alt="Map" style="width:100%">

        <?php
            
            $locations = array("Perlis", "Kedah", "Penang", "Perak", "Selangor", "Kelantan", "Terrenganu", "Pahang", "Negeri Sembilan", "Melaka", "Johor", "Sabah", "Sarawak");
            $topPositions = array("29%", "36%", "42%", "52%", "69%", "43%", "49%", "62%", "71%", "76%", "82%", "43%", "74%");
            $leftPositions = array("4.5%", "7%", "6%", "9%", "12.5%", "16%", "22%", "19%", "17%", "17%", "24%", "83%", "63%");

            for ($i = 0; $i < count($locations); $i++) {
                $location = $locations[$i];
                $ratingInfo = isset($ratings[$location]) ? $ratings[$location] : array('rating' => "No Rating", 'color' => "#000"); 
                $rating = $ratingInfo['rating'];
                $color = $ratingInfo['color'];
        ?>
        <button class="btn enlarge-btn" style="top: <?php echo $topPositions[$i]; ?>; left: <?php echo $leftPositions[$i]; ?>;" data-target="hiddenContent<?php echo $i + 1; ?>"><i class="fas fa-map-marker-alt" style="color: <?php echo $color; ?>"></i></button>
        <div id="hiddenContent<?php echo $i + 1; ?>" class="hidden-content">
            <p><?php echo "$location<br><span style='color: $color;'>$rating</span><br><a href='details.php' style = 'text-decoration: none;'>Details</a>"; ?></p>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
