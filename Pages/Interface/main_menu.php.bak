<?php
session_start();
include "/var/www/html/Includes/Php/check_user_pass.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Samsi</title>
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h1>Welcome back, <?php echo ($_SESSION["username"]."."); ?> </h1>
		<br>
		<form>
			<input type="submit" value="Register new users">
		</form>
		<br>
		<form action="/Pages/Interface/Register_users/register_user.php">
			<input type="submit" value="logout">
		</form>
	</body>
</html>
