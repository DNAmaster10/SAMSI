<?php
//Connect to database
include "/var/wwww/html/Includes/dbh.php";
//Make sure user is logged in
include "/var/www/html/Includes/check_user_pass.php";
//get variables from HTML form
$username = $_POST["username"];
$password = $_POST["password"];
$account_type = $_POST["account_type"];

if ($account_type != 
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
