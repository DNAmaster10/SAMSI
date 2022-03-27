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
    
    #Get assignment ID from POST
    $homework_id = $conn -> real_escape_string ($_POST["homework_id"]);
    
    #get assignment details
    $table_name = "homework_data";
    $column_name = "description";
    $where_column = "ID";
    $where_value = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $description = $result;
    
    $table_name = "homework_data";
    $column_name = "title";
    $where_column = "ID";
    $where_value = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $title = $result;
    
    $table_name = "homework_data";
    $column_name = "due_date";
    $where_column = "ID";
    $where_vale = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $due_date = $result;
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
			<input tpye="submit" value="Back" class="block_button">
		</form>
		<p>Editing assignment: <?php echo "$title"; ?></p>
		<form action="./edit_assignment_submit.php" method="post" id="usr_form">
			<p> Title:</p><input type="text" value="<?php echo $title; ?>" name="title" required>
            <p> Due date:</p><input type="date" name="due_date" value="<?php echo $due_date; ?>" id="date" form="usr_form" required>
            <p> Description:</p><textarea name="description" class="large_text_box" form="usr_form" required><?php echo $description; ?></textarea>
			<input type="hidden" value="<?php echo $homework_id; ?>" name="homework_id">
			<input type="submit" value="Submit edits" class="small_block_button">
		</form>
	</body>
	<script>
        document.getElementById("date").defaultValue = "<?php echo $due_date; ?>";
	</script>
</html>
