<?php
session_start();
$logout_name = $_SESSION["username"];
session_unset();
?>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/default.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h1>Later, <?php echo($logout_name); ?>
		<br>
		<form action="../../index.php">
			<input type="submit" value="Home page" class="block_button">
		</form>
	</body>
</html>
