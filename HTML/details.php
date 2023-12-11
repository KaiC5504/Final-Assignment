<?php
    require('connect.php');
    session_start();

    
    //Session Timeout
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
    <title>Profile</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "../JavaScript/hamburger.js" defer></script>

    <style>
        <?php include "../CSS/details.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
<h1 style = "text-align: center; padding-bottom: 20px; font-size: 40px">Map Details</h1>

<table class = "detailsTable">
    <tr>
        <th width="300">Flag</th>
        <th width="300">State</th>
        <th width="100">AQI</th>
        <th width="300">Overall Condition Rating</th>
        <th width="900">Factors</th>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Perlis.svg/1200px-Flag_of_Perlis.svg.png" alt="Perlis" style="width:50%"></td>
        <td>Perlis</td>
        <td><span style="color: #7CFC00;">45</span></td>
        <td><span style="color: #7CFC00;">Good</span></td>
        <td>Near to the forest of Thailand</td>
    </tr>

    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Flag_of_Kedah.svg/1200px-Flag_of_Kedah.svg.png" alt="Kedah" style="width:50%"></td>
        <td>Kedah</td>
        <td><span style="color: #7CFC00;">37</span></td>
        <td><span style="color: #7CFC00;">Very Good</span></td>
        <td>Has alot of Forest areas</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Penang_%28Malaysia%29.svg/800px-Flag_of_Penang_%28Malaysia%29.svg.png" alt="Penang" style="width:50%"></td>
        <td>Penang</td>
        <td><span style="color: orange;">130</span></td>
        <td><span style="color: orange;">Bad</span></td>
        <td>Many Vehicles </td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Flag_of_Perak.svg/2560px-Flag_of_Perak.svg.png" alt="Perak" style="width:50%"></td>
        <td>Perak</td>
        <td><span style="color: #7CFC00;">40</span></td>
        <td><span style="color: #7CFC00;">Good</span></td>
        <td>Many preserved forest for tourism</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Flag_of_Selangor.svg/2560px-Flag_of_Selangor.svg.png" alt="Selangor" style="width:50%"></td>
        <td>Selangor</td>
        <td><span style="color: #FF7373;">157</span></td>
        <td><span style="color: #FF7373;">Unhealthy</span></td>
        <td>A developed states with too many vehicles and cities</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Flag_of_Kelantan.svg/1280px-Flag_of_Kelantan.svg.png" alt="Kelantan" style="width:50%"></td>
        <td>Kelantan</td>
        <td><span style="color: #7CFC00;">33</span></td>
        <td><span style="color: #7CFC00;">Very Good</span></td>
        <td>Has less developed areas</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flag_of_Terengganu.svg/2560px-Flag_of_Terengganu.svg.png" alt="Terengganu" style="width:50%"></td>
        <td>Terengganu</td>
        <td><span style="color: #7CFC00;">28</span></td>
        <td><span style="color: #7CFC00;">Very Good</span></td>
        <td>Little developed areas</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Pahang.svg/1280px-Flag_of_Pahang.svg.png" alt="Pahang" style="width:50%"></td>
        <td>Pahang</td>
        <td><span style="color: #7CFC00;">42</span></td>
        <td><span style="color: #7CFC00;">Good</span></td>
        <td>Plenty of forest areas</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/d/db/Flag_of_Negeri_Sembilan.svg" alt="Negeri Sembilan" style="width:50%"></td>
        <td>Negeri Sembilan</td>
        <td><span style="color: orange;">107</span></td>
        <td><span style="color: orange;">Bad</span></td>
        <td>Semi-developed area with reasonable amount of pollution</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Malacca.svg/1200px-Flag_of_Malacca.svg.png" alt="Melaka" style="width:50%"></td>
        <td>Melaka</td>
        <td><span style="color: #FFEA00;">89</span></td>
        <td><span style="color: #FFEA00;">Moderate</span></td>
        <td>Tourism</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Flag_of_Johor.svg/2560px-Flag_of_Johor.svg.png" alt="Johor" style="width:50%"></td>
        <td>Johor</td>
        <td><span style="color: orange;">133</span></td>
        <td><span style="color: orange;">Bad</span></td>
        <td>Factories and Developments</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Flag_of_Sabah.svg/1024px-Flag_of_Sabah.svg.png" alt="Sabah" style="width:50%"></td>
        <td>Sabah</td>
        <td><span style="color: #7CFC00;">23</span></td>
        <td><span style="color: #7CFC00;">Very Good</span></td>
        <td>Alot of Jungle</td>
    </tr>
    <tr>
        <td><image src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Flag_of_Sarawak.svg/1200px-Flag_of_Sarawak.svg.png" alt="Sarawak" style="width:50%"></td>
        <td>Sarawak</td>
        <td><span style="color: #7CFC00;">12</span></td>
        <td><span style="color: #7CFC00;">Very Good</span></td>
        <td>Abundance of Preserved Forest</td>
    </tr>
</table>

</body>
</html>
