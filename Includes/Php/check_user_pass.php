<?php
session_start();
include "var/www/html/Includes/Php/dbh.php";
#Get username and password
$username_t = $_SESSION["username"];
$password_t = $_SESSION["password"];

#Check if username and password are in a database
$sql_check_username = "SELECT * FROM users WHERE username='".$username_t."' AND password='".$password_t."'";
$result_check_username = mysqli_query($conn, $sql_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
	unset ($username_t);
	unset ($password_t);
}
  else {
	header("location: /Pages/Login/login.php");
  }
?>
