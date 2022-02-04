<?php
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";
include "/var/www/html/Includes/Php/get_user_theme.php";



header('Location: select_theme.php');
?>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheet" href="/Includes/Css/main.css">
  </head>
  <body>
  </body>
</html>
