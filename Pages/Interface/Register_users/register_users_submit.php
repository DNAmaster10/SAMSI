<?php
include "/var/wwww/html/Includes/dbh.php";
include "/var/www/html/Includes/check_user_pass.php";
$username = $_POST["username"];
$password = $_POST["password"];
?>
<html>
  <head>
    <title>SAMSi</title>
  </head>
  <body>
    <p><?php echo $text_output ?></p>
    <br>
    <form>
      <input type="submit" value="Register someone else">
    </form>
    <br>
  </body>
</html>
