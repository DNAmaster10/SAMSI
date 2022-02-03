<?php
#Access global variables
session_start();

#Connect to database
include "/var/www/html/Includes/Php/dbh.php";

#Check user's username and password
include "/var/www/html/Includes/Php/check_user_pass.php";

#Find out what account type the user has
$username = $_SESSION["username"];
$column_name = "account_type";
$table_name = "users";
$where_column = "username";
$where_value = $username;
include "/var/www/html/Includes/Php/get_single_value_from_db.php";
$account_type = $result;

#Find out user's theme
$column_name = "theme";
$table_name = "themes";
$where_column = "username";
$where_value = $username;
include "/var/www/html/Includes/Php/get_single_value_from_db.php";
$theme = $result;

if ($theme == "default") {
$background_colour = "coral";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			body.{background-colour: <?php echo ($background_colour) ?>;}
		</style>
		<title>Samsi</title>
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body class="body">
		<h1>Welcome back, <?php echo $username; ?> </h1>
		<?php 
		if ($account_type == "admin") {
		echo ("<br>
		<form action='./Register_users/register_user.php'>
		  <input type='submit' value='Register new users'>
		</form> ");
		}
		?>
		<br>
		<form action="../Logout/logout.php">
			<input type="submit" value="Log out">
		</form>
	</body>
</html>
