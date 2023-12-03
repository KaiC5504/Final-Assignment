<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>

    <style>
        /* Add your custom styles here */
        body {
            position: relative;
        }

        .oval-shape {
            position: absolute;
            top: 30%;
            right: 20%; /* Adjust the left position as needed */
            transform: translate(0%, -50%);
            background-color: #4CAF50; /* Green color */
            padding: 10px;
            border-radius: 50%;
            color: white;
            text-align: center;
        }
        /* Navigation Bar */
body { 
    margin: 0;
    padding: 0;
}

.container { 
    width: 90%;
    margin: 0 auto;
}

.logo { 
    width: 10vw;
    height: auto;
    float: left;
    padding: 1vh 0;
    vertical-align: middle  ;
}

header { 
    background: #A3CD91;
    z-index: 1000;
}

header::after { 
    content: "";
    display: table;
    clear: both;
}

nav { 
    float: right;
}

nav ul { 
    margin: 0;
    padding: 0;
    list-style: none;
}

nav li { 
    display: inline-block;
    margin-left: 5vw;
    padding-top: 1.5vh;
    position: relative;
    vertical-align: middle;
}

nav a { 
    color: black;
    text-decoration: none;
    font-size: 1.3vw;
}

nav a::before { 
    content: "";
    display: block;
    height: 3px;
    width: 100%;
    background-color: white;
    position: absolute;
    bottom: 0;
    width: 0%;
    transition: all ease-in-out 200ms;
}

nav a:hover::before { 
    width: 100%;
}

.signUpButton { 
    display: inline-block;
    padding: 2vh 3vw;
    font-size: 2vw;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: black;
    background-color: #AFF4C6;
    border: none;
    border-radius: 1em;
    box-shadow: 0.2em 0.2em rgb(169, 169, 169);
    position: absolute;
    right: 6vw;
    bottom: 15vh;
}

.signUpButton:hover { 
    background-color: #8fe6ae;
    transition: background-color 0.4s ease;
}

.signUpButton:active { 
    background-color: #8fe6ae;
    box-shadow: 0 0.1em rgb(169, 169, 169);
    transform: translateY(0.2em);
}

.search { 
    display: inline-block;
    margin-left: 10vw;
    padding-top: 1.2vh;
    position: relative;
}

.searchBox { 
    padding: 5px;
    font-size: 1.2vw;
}

.submit { 
    padding: 5px 10px;
    font-size: 1.2vw;
    cursor: pointer;
}

.textcontainer { 
    background-color: #4CAF50;
    margin: 0;
    position: fixed;
    height: 50%;
    bottom: 0;
    width: 100%;
}

.image-container { 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}

.image-container img { 
    width: 20vw; 
    height: auto; 
    position: relative; 
    z-index: 1;
}

    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body >
    <h1 style = "text-align: center; font-size: xxx-large;">About Us</h1>

    <div class="oval-shape">
        <p>Contact Us<br>033197088</p>
    </div>

    <div class="image-container">
        <img src="https://www.alwaysonpurpose.com/wp-content/uploads/2019/11/happypeople-1024x679.jpg" alt="About Us Image">
    </div>


    <div class = "textcontainer">
    <p style="text-align: center; background-color: #4CAF50; font-size:xx-large; padding: 20px">
    <br>
    The founders of AirCON, Tan Kai Chuan and Ong Chun Sxien, expressed worry over overpopulation during a lecture that led to the creation of the airline. As we became aware of the connection between pollution and population growth, we realized we had to deal with the growing air pollution brought on by more factories and cars.

        <br><br>We used the internet's power as programmers and lovers of the outdoors to raise awareness of the risks caused by air pollution. AirCON is more than just a company—it's how we voice our worries about the environment and strive for improvement.
        
        <br><br>Our goal is to minimize the negative effects of air pollution in order to make the world a safer and healthier place. In an effort to make the world a cleaner, safer place, we want to increase public awareness of the health hazards related to air pollution.</p>
    </div>
        
</body>
</html>