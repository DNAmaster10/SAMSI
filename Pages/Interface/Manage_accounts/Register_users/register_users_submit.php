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
$where_value = $username;
include "/var/www/html/Includes/Php/get_single_value_from_db.php";

if ($result == "null") {
$continue = 1;
}
else {
$continue = 0;
$text_output = "An account with that username has already been registered!";
}

if ($continue == 1) {
//writing to users DB
$table_name = "users";
$columns = "username,password,account_type";
$values = "'".$username."','".$password."','".$account_type."'";
include "/var/www/html/Includes/Php/write_to_db.php";
unset ($table_name);
unset ($columns);
unset ($values);
$table_name = "themes";
$columns = "username,theme";
$values = "'".$username."','default'";
include "/var/www/html/Includes/Php/write_to_db.php";

$sql = "INSERT INTO user_classes (username) VALUES ('.$username.')";
mysqli_query($conn, $sql);
  
$text_output = ("Account ".$username." was successfully registered");
}
?>
<html>
  <head>
    <title>SAMSi</title>
  </head>
  <body>
    <p><?php echo $text_output; echo $result; ?></p>
    <br>
    <form action="./register_user.php">
      <input type="submit" value="Register someone else">
    </form>
    <form action="../manage_accounts_menu.php">
    </form>
    <form action="../../main_menu.php">
      <input type="submit" value="Home">
    </form>
    <br>
  </body>
</html>
