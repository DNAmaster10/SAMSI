<?php
	session_start();
	$file_path = $_SERVER["DOCUMENT_ROOT"];
	$username = $_SESSION["username"];
	include "/var/www/html/Includes/Php/dbh.php";
	include "/var/www/html/Includes/Php/check_user_pass.php";
	include "/var/www/html/Includes/Php/get_user_theme.php";
	include "/var/www/html/Includes/Php/get_account_type.php";
?>