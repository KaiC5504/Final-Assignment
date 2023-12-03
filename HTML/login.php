<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" href = "../CSS/style.css">
    <link rel = "icon" href = "../resources/Images/Web_Icon.png">
    <script src="https://kit.fontawesome.com/64d3afc91e.js" crossorigin="anonymous"></script>

    <style>
        <?php include "../CSS/login.css"; ?>
    </style>
</head>

<header>
    <?php include "nav_bar.php"; ?>
</header>

<body>
    <div class="loginContainer">

        <h1 style = "text-align: center; margin-bottom: 7vh; margin-top: 0.5vh; width: 100%;">Login</h1>

      <div class="inputs">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required class = "loginInput">
      </div>

      <div class="inputs">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required class = "loginInput">
      </div>

      <div style = "flex: 0 0 100%; text-align: center;">
          <button type="submit" class = "loginButton"><b>Login</b></button>
          <p style = "margin-top: 1.5vh; font-size: 1vw; color: #B3B3B3;">Not yet register? &nbsp;<a href = "sign_up.php" style = "text-decoration: none; color: #4d4d4d;">Register Here</a></p>
      </div>
  </div>
</body>
</html>