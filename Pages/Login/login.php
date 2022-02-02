<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="/Includes/Css/main.css">
  <title>Login</title>
  <style>
    body {
 background-image: url("./MicrosoftTeams-image.png");
 background-color: #cccccc;
 background-position: center;
 background-repeat: no-repeat;
 background-size: cover;
}
    </style>
  </head>
  <body>
    <p>Enter your login credidentials bellow</p>
    <br>
    <form action="/Pages/Login/login_submit.php">
        <p>Username: </p><input type="text" id="username_text_box" name="username"><br>
        <p>Password: </p><input type="text" id="password_text_box" name="password"><br>
        <input type="submit" value="Login">
    </form>
  </body>
</html>
