<?php    
	session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
	$assignment_id = $conn -> real_escape_string ($_POST["homework_id"]);
	
	#Make sure user is admin of class
	$table_name = "class_data";
	$column_name = "owner";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$class_owner = $result
	if ($class_owner != $_SESSION["username"]) {
		header ("location: /Pages/Interface/Misc/not_owner_of_class.php")
	}
	
	$table_name = "homework_data";
	$column_name = "completed";
	$where_column = "ID";
	$where_value = $assignment_id;
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$completed = $result;
	$completed = str_replace(",", ", ", $completed);
	
	$column_name = "not_complete";
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$not_completed = $result;
	$not_completed = str_replace(",", ", ", $not_completed);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<form action="./view_assignments.php">
			<input type="submit" value="Back">
		</form>
		<br>
		<p>Completed: <?php echo $completed ?> </p>
		<br>
		<p>Not completed: <?php echo $not_completed ?> </p>
	</body>
<html>