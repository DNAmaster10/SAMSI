<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
	#getting class assignments
	$table_name = "class_data";
	$column_name = "homework";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h1>Current assignments<h1>
	</body>
</html>