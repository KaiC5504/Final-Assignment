<?php
    require('connect.php');
    session_start();
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
    <title>Map</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>
    <script src="../JavaScript/pin.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        <?php include "../CSS/map.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body style="solid">
    <h1 style = "text-align: center;">Map</h1>
    <div class="contain">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Blank_malaysia_map.svg/2560px-Blank_malaysia_map.svg.png" alt="Snow" style="width:100%">

    <button class="btn enlarge-btn" style =" top: 29%;left: 4.5%;" data-target="hiddenContent1"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent1" class="hidden-content">
    <p>Perlis<br><span style="color: green;">45-Good</span></p>
    </div>
    <button class="btn enlarge-btn" style =" top: 36%;left: 7%;" data-target="hiddenContent2"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent2" class="hidden-content">
    <p>Kedah<br><span style="color: #7CFC00;">37-Very Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 43%;left: 5.5%;" data-target="hiddenContent3"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent3" class="hidden-content">
    <p>Penang<br><span style="color: orange;">130-Bad</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 52%;left: 9%;" data-target="hiddenContent4"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent4" class="hidden-content">
    <p>Perak<br><span style="color: green;">40-Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 69%;left: 12.5%;" data-target="hiddenContent5"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent5" class="hidden-content">
    <p>Selangor<br><span style="color: red;">157-Unhealthy</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 43%;left: 16%;" data-target="hiddenContent6"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent6" class="hidden-content">
    <p>Kedah<br><span style="color: #7CFC00;">33-Very Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 49%;left: 22%;" data-target="hiddenContent7"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent7" class="hidden-content">
    <p>Terrenganu<br><span style="color: #7CFC00;">28-Very Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 62%;left: 19%;" data-target="hiddenContent8"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent8" class="hidden-content">
    <p>Pahang<br><span style="color: green;">42-Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 74%;left: 17%;" data-target="hiddenContent9"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent9" class="hidden-content">
    <p>Negeri Sembilan<br><span style="color: orange;">107-Bad</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 79%;left: 17%;" data-target="hiddenContent10"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent10" class="hidden-content">
    <p>Melaka<br><span style="color: #FFEA00;">89-Moderate</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 82%;left: 24%;" data-target="hiddenContent11"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent11" class="hidden-content">
    <p>Johor<br><span style="color: red;">133-Bad</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 43%;left: 83%;" data-target="hiddenContent12"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent12" class="hidden-content">
    <p>Sabah<br><span style="color: #7CFC00;">23-Very Good</span></p>
    </div> 
    <button class="btn enlarge-btn" style =" top: 74%;left: 63%;" data-target="hiddenContent13"><i class="fas fa-map-marker-alt"></i></button>
<div id="hiddenContent13" class="hidden-content">
    <p>Sarawak<br><span style="color: #7CFC00;">12-Very Good</span></p>
    </div> 
</div>
        </div>

</body>
</html>