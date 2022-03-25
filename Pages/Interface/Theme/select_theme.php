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
			<input class="coloured_text" type="radio" value="default" name="theme_select" <?php if ($theme == "default") {echo "checked";} ?>><label>Default</label><br>
			<input class="coloured_text" type="radio" value="dark" name="theme_select" <?php if ($theme == "dark") {echo "checked";} ?>><label>Dark Mode</label><br>
			<input class="coloured_text" type="radio" value="cleo" name="theme_select" <?php if ($theme == "cleo") {echo "checked";} ?>><label>Cleo</label><br>
			<input class="coloured_text" type="radio" value="darkcleo" name="theme_select" <?php if ($theme == "darkcleo") {echo "checked";} ?>><label>Dark Cleo</label><br>
			<input class="coloured_text" type="radio" value="rose" name="theme_select" <?php if ($theme == "rose") {echo "checked";} ?>><label>Rose</label><br>
			<input class="coloured_text" type="radio" value="darkrose" name="theme_select" <?php if ($theme == "darkrose") {echo "checked";} ?>><label>Dark Rose</label><br>
			<input class="coloured_text" type="radio" value="lavender" name="theme_select" <?php if ($theme == "lavender") {echo "checked";} ?>><label>Lavender</label><br>
			<input class="coloured_text" type="radio" value="darklavender" name="theme_select" <?php if ($theme == "darklavender") {echo "checked";} ?>><label>Dark Lavender</label><br>
			<input class="coloured_text" type="radio" value="peach" name="theme_select" <?php if ($theme == "peach") {echo "checked";} ?>><label>Peach</label>
			<br>
			<input type="submit" value="Save" class="block_button">
		</form>
		<br>
		<form action="../main_menu.php">
			<input type="submit" value="Back" class="block_button">
		</form>
	</body>
</html>
