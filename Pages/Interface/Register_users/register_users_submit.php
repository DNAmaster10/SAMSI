<?php
//Connect to database
include "/var/wwww/html/Includes/dbh.php";

//Make sure user is logged in
include "/var/www/html/Includes/check_user_pass.php";

//get variables from HTML form
$username = $_POST["username"];
$password = $_POST["password"];
$account_type = $_POST["account_type"];

$continue = 1;

if ($continue == 1) {
//writing to DB
$table_name = "users";
$columns = ("username,password,account_type");
$values = ("'.$username.','.$password.','.$account_type.'");
include "/var/www/html/Includes/write_to_db.php";
$text_output = ("Account ".$username." was successfully registered");
}
?>
<html>
  <head>
    <title>SAMSi</title>
  </head>
  <body>
    <p><?php echo $text_output ?></p>
    <br>
    <form action="./register_user.php">
      <input type="submit" value="Register someone else">
    </form>
    <form action="../main_menu.php">
      <input type="submit" value="Home">
    </form>
    <br>
  </body>
</html>
