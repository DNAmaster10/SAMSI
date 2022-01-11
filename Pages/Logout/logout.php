<?php
session_start();
$logout_name = $_SESSION["username"];
session_unset();
?>
<html>
	<head>
		<title>SAMSi</title>
	</head>
	<body>
		<h1>Later, <?php echo($logout_name); ?>
		<br>
		<form action="../../index.php">
			<input type="submit" value="Home page">
		</form>
	</body>
</html>