<?php
include "/Includes/check_user_pass.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Samsi</title>
	</head>
	<body>
		<h1>Welcome back, <?php echo ($_SESSION["username"]."."); ?> </h1>
		<?php 
		print_r($_SESSION);
		?>
	</body>
</html>