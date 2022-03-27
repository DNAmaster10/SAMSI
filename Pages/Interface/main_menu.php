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
	unset ($column_name);

	#Find out user's theme
	$username = $_SESSION["username"];
	include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
		<title>SAMSi</title>
	</head>
	<style>
		.select_form{
			display: inline-block;
		}
		.block_button{
			padding: 15px 32px;
			font-size: 16px;
		}
	</style>
	<body>
		<div class="header">
		</div>
		<h1>Welcome back, <?php echo $username; ?>.</h1>
		<?php 
		if ($account_type == "admin") {
		echo ("<br>
		<form action='./Manage_accounts/manage_accounts_menu.php' class='select_form'>
		  <input type='submit' value='Mannage accounts' class='block_button'>
		</form> ");
		}
		?>
		<form action="./Classes/class_select_menu.php" class="select_form">
			<input type="submit" value="Classes" class="block_button">
		</form>
		<form action="./Classes/view_homework.php" class="select_form">
            <input type="submit" value="Homework" class="block_button">
		</form>
		<form action="./Messenger/messenger_hub.php" class="select_form">
			<input type="submit" value="Messages" class="block_button">
		</form>
		<form action="./Report_gen/report_gen.php" class="select_form">
			<input type="submit" value="Report Generator" class="block_button">
		</form>
		<form action="./Theme/select_theme.php" class="select_form">
			<input type="submit" value="Change theme" class="block_button">
		</form>
		<form action="../Logout/logout.php" class="select_form">
			<input type="submit" value="Log out" class="block_button">
		</form>
	</body>
</html>
