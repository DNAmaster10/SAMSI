<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
    if ((!isset($_SESSION["current_class"])) {
        header ("location: /Pages/Interface/Misc/class_not_selected.php");
    }
	
	$table_name = "class_data";
	$column_name = "owner";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	if ($result != $_SESSION["username"]) {
		header ("location: /Pages/Interface/");
	}
	
	#Get information entered by user about homework from browser 
	$title = $_POST["title"];
	$description = $_POST["description"];
	$due_date = $_POST["due_date"];
	$date_set = date("l jS \of F Y h:i:s A");
	
	#Add homework to homework database
	$sql = "INSERT INTO homework_data (title,description,class,teacher,due_date,date_set) VALUES ('".$title."','".$description."','".$_SESSION["current_class"]."','".$_SESSION["username"]."',
	'".$due_date."','".$date_set."')";
	
	#Get current user homework
	$table_name = "user_homework";
	$column_name = "homework";
	$where_column = "username";
	$where_value = $_SESSION["username"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$current_homework = $result;
	
	#Add homework to users homework list
	$current_homework = $current_homework.$title;
	
	$sql = "UPDATE user_homework SET homework VALUE";
?>