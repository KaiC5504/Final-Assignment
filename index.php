<?php
    require('HTML/connect.php');
    session_start();

    //check if user is logged in and if session is expired
    if (isset($_SESSION['username'])) {
        
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
            session_unset();
            session_destroy();
            header("Location: index.php");
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
    <title>Home Page</title>
    <link rel = "stylesheet" href = "CSS/style.css">
    <link rel = "icon" href = "resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>
    <script src = "JavaScript/hamburger.js" defer></script>

    <style>
        body { 
            background-image: url("resources/Images/Background.png");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            background-position: center bottom;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<header>
<div class = "container">

<a href = "index.php"><img src = "resources/Images/AirPure_Logo.png" alt = "logo" class = "logo"></a>

<nav>
    <ul class = "navMenu">
        <li class = "navItem">
            <a href = "HTML/about_us.php">
                <div class="iconText">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6 iconWidth">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                    <span>About Us</span>
                </div>
            </a>
        </li>

        <li class = "navItem">
            <a href = "HTML/map.php">
                <div class="iconText">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 iconWidth">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                    </svg>
                    <span>Map</span>
                </div>
            </a>
        </li>

        <li class = "navItem">
            <a href = "HTML/donation.php">
                <div class="iconText">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 iconWidth">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                    <span>Donation</span>
                </div>
            </a>
        </li>

        <li class = "search navItem">
            <input type = "text" placeholder = "Search" class = "searchBox">
            <button type = "submit" class = "submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </li>

        <li class = "navItem">
            <?php
                if (!isset($_SESSION['username'])) { 
                    echo "<a href = 'HTML/login.php'>
                    <div class='iconText'>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 iconWidth'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9'/>
                        </svg>
                        <span>Login</span>
                    </div>
                </a>";
                }
                else if (isset($_SESSION['username'])) { 
                    if ($_SESSION['is_admin'] == 1) {
                        echo "<a href = 'HTML/admin_dashboard.php'>
                            <div class='iconText'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 iconWidth'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z' />
                                </svg>
                                <span>Admin</span>
                            </div>
                        </a>";
                    } else {
                        echo "<a href = 'HTML/profile.php'>
                            <div class='iconText'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 iconWidth'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z' />
                                </svg>
                                <span>Profile</span>
                            </div>
                        </a>";
                    }
                }
            ?>
        </li>
    </ul>
    <div class = "hamburger">
    <span class = "bar"></span>
    <span class = "bar"></span>
    <span class = "bar"></span>
</div>
</nav>
</div>
</header>


<body>    
    <h1 style = "margin-left: 8.5vw; margin-top: 10vh; font-size: 6vw; color: #3834E3;">Welcome To Air<a style = "color: #7f7ea5;">Pure</a></h1>


    <?php 
        if (!isset($_SESSION['username'])) { 
            echo "<a href = 'HTML/sign_up.php'><button class = 'signUpButton'><b>Sign UP Now</b></button></a>";
        }
    ?>
    

</body>
</html>