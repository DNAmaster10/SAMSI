<?php
session_start();
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";
include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/var/www/html/Includes/Css/Themes/<?php echo $theme ?>.css">
	</head>
	<body>
	<p>Use this page to select your desired themes</p>
	</body>
</html>