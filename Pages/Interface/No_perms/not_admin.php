<?php
session_start();
include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheet" href="/Includes/Css/main.css">
    <title>SAMSi</title>
  </head>
  <body>
    <p>Sorry <?php echo ($_SESSION["username"]); ?>! You must hold administrator priveliges to perform that action. If you feel this is an error, please contact a network administrator to help you with your problem.</p>
    <br>
    <form action="/Pages/Interface/main_menu.php">
      <input type="submit" value="Home">
    </form>
  </body>
</html>
