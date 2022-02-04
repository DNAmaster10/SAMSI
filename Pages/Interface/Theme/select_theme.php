<?php
//start sessions
session_start();
//connect to dbh
include "/var/www/html/Includes/Php/dbh.php";
//Check if user 
include "/var/www/html/Includes/Php/check_user_pass.php";
include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
	</head>
	<body>
		<p>Use this page to select your desired themes</p>
		<br>
		<form action="theme_submit.php">
			<input type="radio" value="default" name="theme_select" <?php if ($theme == "default") {echo "checked";} ?>>
		</form>
	</body>
</html>
