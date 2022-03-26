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
	<style>
		.select_form{
			display: inline-block;
		}
		.block_button{
			padding: 15px 32px;
			font-size: 16px;
			display: inline-block;
		}
	</style>
	<body>
		<h1>Hey <?php echo $_SESSION["username"]; ?>! Use this page to remove users from the system.</h1>
		<form action="../../main_menu.php" class="select_form">
			<input type="submit" value="Home" class="block_button">
		</form>
		<form action="../manage_accounts_menu.php" class="select_form">
			<input type="submit" value="Back" class="block_button">
		</form>
		<br>
		<form action="./delete_accounts_submit.php" method="POST">
			Username: <input type="text" placeholder="username" onkeyup="getUsers()" id="username_input_box" required>
			<input type="submit" value="Delete">
		</form>
		<div id="button_output_field"></div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="./Javascript/delete_accounts.js"></script>
</html>
