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
		<form action="theme_submit.php" method="POST">
			<input type="radio" value="default" name="theme_select" <?php if ($theme == "default") {echo "checked";} ?>><label>Default</label>
			<input type="radio" value="cleo" name="theme_select" <?php if ($theme == "cleo") {echo "checked";} ?>><label>Cleo</label>
			<input type="radio" value="rose" name="theme_select" <?php if ($theme == "rose") {echo "checked";} ?>><label>Rose</label>
			<input type="radio" value="lavender" name="theme_select" <?php if ($theme == "lavender") {echo "checked";} ?>><label>Lavender</label>
			<input type="radio" value="peach" name="theme_select" <?php if ($theme == "peach") {echo "checked";} ?>><label>Peach</label>
			<br>
			<input type="submit" value="Save">
		</form>
		<br>
		<form action="../main_menu.php">
			<input type="submit" value="Back">
		</form>
	</body>
</html>
