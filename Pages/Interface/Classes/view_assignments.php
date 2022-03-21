<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
	#Check that user is owner of the class
	$table_name = "class_data";
	$column_name = "owner";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	if ($result == $_SESSION["username"]) {
        $is_owner = 1;
	}
	else {
        $is_owner = 0;
	}
	
	#getting class assignments
	$table_name = "class_data";
	$column_name = "homework";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$homework_id_list = $result;
	if ($homework_id_list == "null") {
        $is_homework = 0;
	}
	else {
        $is_homework = 1;
        $homework_count = substr_count($homework_id_list,",") - 1;
        $homework_id_array = explode(",",$homework_id_list);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<body>
		<h1>Current assignments:</h1>
		<?php
		if ($is_homework == 0) {
				echo "<p>There are no assignments set for this class.</p>
				<form action='./set_homework.php'
					<input type='submit' value='Set an assignment'>
				</form>";
			}
			else {
            for ($i = 0; $i <= $homework_count; $i++) {
            $table_name = "homework_data";
            $column_name = "title";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_title = $result;
            
            $table_name = "homework_data";
            $column_name = "description";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_description = $result;
            
            $table_name = "homework_data";
            $column_name = "due_date";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_due_date = $result;
            
            $table_name = "homework_data";
            $column_name = "date_set";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_date_set = $result;
            
            echo "
			<div class='homework_div'>
				<h3> ".$output_title."</h3>
				<p> Description: ".$output_description."</p>
				<p><small> Date due: ".$output_due_date."| Date set: ".$output_date_set."|</small></p>
				";
				if ($is_owner == 1) {echo "
				<form action='./view_handins.php'>
					<p> </p> <input type='hidden' name='homework_id value='".($homework_id_array[$i])."'>
					<input type='submit' value='View handins'>
				</form>
				<form action='./edit_assignment.php' method='POST'>
					<p> </p><input type='hidden' name='homework_id' value='".($homework_id_array[$i])."'>
					<input type='submit' value='Edit details'>
				</form>
				"; }
				echo "
				<p> </p>
            </div>"; 
            }
			}
			?>
	</body>
</html>
