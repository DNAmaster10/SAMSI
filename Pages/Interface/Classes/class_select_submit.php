<?php
	session_start();
	$file_path = $_SERVER["DOCUMENT_ROOT"];
	include $file_path."/Includes/Php/dbh.php";
	include $file_path."/Includes/Php/check_user_pass.php";
	include $file_path."/Includes/Php/get_user_theme.php";
	include $file_path."/Includes/Php/get_account_type.php";
	$selected_class = $conn -> real_escape_string($_POST["selected_class"]);
	$_SESSION["current_class"] = $selected_class;
    header("location: /Pages/Interface/Classes/class_home.php");
?>
