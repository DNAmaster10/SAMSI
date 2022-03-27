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
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h3>Use this page to select your desired themes</h3>
		<form action="../main_menu.php" >
			<input type="submit" value="Back" class="block_button" class="block_button">
		</form>
		<br>
		<form action="theme_submit.php" method="POST">
			<input class="coloured_text" type="radio" value="default" name="theme_select" <?php if ($theme == "default") {echo "checked";} ?>><label>Default</label class="coloured_text"><br>
			<input class="coloured_text" type="radio" value="dark" name="theme_select" <?php if ($theme == "dark") {echo "checked";} ?>><label>Dark Mode</label class="coloured_text"><br>
			<input class="coloured_text" type="radio" value="cleo" name="theme_select" <?php if ($theme == "cleo") {echo "checked";} ?>><label>Cleo</label class="coloured_text"><br>
			<input class="coloured_text" type="radio" value="darkcleo" name="theme_select" <?php if ($theme == "darkcleo") {echo "checked";} ?>><label class="coloured_text">Dark Cleo</label><br>
			<input class="coloured_text" type="radio" value="rose" name="theme_select" <?php if ($theme == "rose") {echo "checked";} ?>><label>Rose</label class="coloured_text"><br>
			<input class="coloured_text" type="radio" value="darkrose" name="theme_select" <?php if ($theme == "darkrose") {echo "checked";} ?>><label class="coloured_text">Dark Rose</label><br>
			<input class="coloured_text" type="radio" value="lavender" name="theme_select" <?php if ($theme == "lavender") {echo "checked";} ?>><label class="coloured_text">Lavender</label><br>
			<input class="coloured_text" type="radio" value="darklavender" name="theme_select" <?php if ($theme == "darklavender") {echo "checked";} ?>><label class="coloured_text">Dark Lavender</label><br>
			<input class="coloured_text" type="radio" value="peach" name="theme_select" <?php if ($theme == "peach") {echo "checked";} ?>><label class="coloured_text">Peach</label>
			<input class="coloured_text" type="radio" value="sage" name="theme_select" <?php if ($theme == "sage") {echo "checked";} ?>><label class="coloured_text">Sage</label>
			<br>
			<input type="submit" value="Save" class="small_block_button">
		</form>
	</body>
</html>
