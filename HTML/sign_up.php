<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>

    <style>
        <?php include "../CSS/sign_up.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?> 
</header>

<body>
    <div class="signupContainer">

        <h1 style = "text-align: center; margin-bottom: 7vh; margin-top: 0.5vh; width: 100%;">Create Account</h1>

      <div class="inputs">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required class = "signUpInput">
      </div>

      <div class="inputs">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required class = "signUpInput">
      </div>

      <div class="inputs">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required class = "signUpInput">
      </div>

      <div class="inputs">
          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="dob" required class = "signUpInput">
      </div>

      <div style = "flex: 0 0 100%; text-align: center;">
          <button type="submit" class = "createAccButton"><b>SIGN UP</b></button>
          <p style = "margin-top: 1.5vh; font-size: 1vw; color: #B3B3B3;">Already Registered? &nbsp;<a href = "login.php" style = "text-decoration: none; color: #4d4d4d;">Login Here</a></p>
      </div>
  </div>
</body>
</html>