<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f3f3f3;
        }
        .progress-bar {
            /* width: 80vw; */
            background-color: white;
            margin: 1vh 24vw 1vh 24vw;
            padding: 1px;
            border-radius: 12px;
        }

        .progress-bar div {
            height: 3vh;
            width: 50%; /* Change this to represent the actual progress */
            background-color: #7CCE89;
            border-radius: 12px;
        }

        .boxContainer { 
            display: flex;
            justify-content: space-between;
            width: 50vw;
            margin: 30vh auto 0;
            
        }

        .box {
            height: 30vh;
            width: 12vw;
            border: 1px grey;
            padding: 2.5vh;
            box-sizing: border-box;
            text-align: center;
            background-color: #BDE3FF;
            border-radius: 12px;
            border-width: 1px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            font-size: 1.5vw;
        }
        
        .box .middleText { 
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
    <h1 style = "text-align: center; padding-top: 1vh; font-size: 3vw">Plant 1 Million Trees</h1>

    <div class = "progress-bar">
        <div></div>
    </div>

    <div class="boxContainer">
        <div class="box">
            <span>Plant 3 Trees</span>
            <div class = "middleText">
                <span>RM 10</span>
            </div>
        </div>

        <div class="box">
            <span>Plant 20 Trees</span>
            <div class = "middleText">
                <span>RM 50</span>
            </div>
        </div>

        <div class="box">
            <span>Plant 50 Trees</span>
            <div class = "middleText">
                <span>RM 100</span>
            </div>
        </div>
    </div>

</body>
</html>

