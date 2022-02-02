<?php
//start session to access current users login details
session_start();

//Connect to database
include "/var/www/html/Includes/Php/dbh.php";

//Make sure user is logged in
include "/var/www/html/Includes/Php/check_user_pass.php";

//get variables from HTML form
$username = $_POST["username"];
$password = $_POST["password"];
$account_type = $_POST["account_type"];
$continue = 1;

//check if the username already exists in database
$table_name = "users";
$column_name = "account_type";
$where_column = "username";
$where_value = "'".$username."'";
include "/var/www/html/Includes/Php/get_single_value_from_db.php";

if ($result == "null") {
$continue = 1;
$text_output = "An account with that username has already been registered!";
}
else {
$continue = 0;
}

if ($continue == 1) {
//writing to DB
$table_name = "users";
$columns = "username,password,account_type";
$values = "'".$username."','".$password."','".$account_type."'";
include "/var/www/html/Includes/Php/write_to_db.php";
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
