<?php
$file_path = $_SERVER["DOCUMENT_ROOT"];
session_start();
include ($file_path."/Includes/Php/dbh.php");
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_account_type.php";
if ($account_type == "admin") {	
	$is_admin = ("true");
}
else {
	header("location: /Pages/Interface/No_perms/not_admin.php");
}
include $file_path."/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h1>Hey <?php echo $_SESSION["username"]; ?>! Use this page to remove users from the system.</h1>
		<br>
		<form action="./delete_accounts_submit.php" method="POST">
			<input type="text" placeholder="JohnJames" required>
			<input type="submit" value="Delete">
		</form>
	</body>
</html>
