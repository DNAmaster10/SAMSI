<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
    #Make sure user has selected a class.
    if (!isset($_SESSION["current_class"])) {
        header ("location: /Pages/Interface/Misc/class_not_selected.php");
    }
    
    #Check if user is owner. if not send to another page
    $table_name = "class_data";
    $column_name = "owner";
    $where_column = "class";
    $where_value = $_SESSION["current_class"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    if ($result != $_SESSION["username"]) {
        header ("location: /Pages/Interface/Misc/not_owner_of_class.php");
    }
	
	$new_title = $conn -> real_escape_string($_POST["title"]);
	$new_description = $conn -> real_escape_string ($_POST["description"]);
	$new_due_date = $conn -> real_escape_string ($_POST["due_date"]);
	$homework_id = $conn -> real_escape_string ($_POST["homework_id"]);
	
	$sql = "UPDATE homework_data SET title='$new_title',description='$new_description',due_date='$new_due_date' WHERE ID=$homework_id";
	mysqli_query ($conn, $sql);
	
	header ("location: ./view_assignments.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
	</head>
	<body>
		<p>An error has occured</p>
	</body>
</html>
