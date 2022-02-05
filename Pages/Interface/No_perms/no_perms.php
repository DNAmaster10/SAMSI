<?php
session_start();
$username = $_SESSION["username"];

include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/var/www/html/Includes/Css/Themes/<?php echo $theme; ?>.css">
  </head>
  <body>
    <p>Sorry <?php echo $username; ?>, you lack the permissions to perform that action!</p>
    <br>
    <form action="../main_menu.php">
      <input type="submit" value="Home">
    </form>
  </body>
</html>
