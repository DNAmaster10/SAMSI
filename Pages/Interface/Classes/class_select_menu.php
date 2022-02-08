<?php
	session_start();
	$username = $_SESSION[""];
	include "/var/www/html/Includes/Php/dbh.php";
	include "/var/www/html/Includes/Php/check_user_pass.php";
	include "/var/www/html/Includes/Php/get_user_theme.php";
	include "/var/www/html/Includes/Php/get_account_type/php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
	</head>
	<body>
		<?php if ($account_type == "teacher" or $account_type == "admin") {echo '
		<form action="./class_create.php">
			<input type="submit" value="New Class">
		</form>
		'; ?>
	</body>
</html>