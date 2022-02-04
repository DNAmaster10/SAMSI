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
$username = $_SESSION["username"];
include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<title>SAMSi</title>
	</head>
	<body>
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
		<form action="./Theme/select_theme.php">
			<input type="submit" value="Change theme">
		</form>
		<br>
		<form action="../Logout/logout.php">
			<input type="submit" value="Log out">
		</form>
	</body>
</html>
