<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";   
	
    if ((!isset($_SESSION["current_class"]))) {
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
        <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
        <link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
	<body>
		<p>Hey <?php echo $username; ?>!, use this page to set homework for <?php echo $_SESSION["current_class"]; ?></p>
		<form action="./class_select_menu.php">
			<input type="submit" value="Back">
		</form>
		<form action="./set_homework_submit.php" method="POST">
			<p>Title: </p><input type="text" name="title" required>
			<p>Description: </p><input type="text" name="description" required>
			<p>Due data: </p><input type="date" name="due_date" required>
			<input type="hidden" name="date_set" id="submit_date">
			<input type="submit" value="Set Homework">
		</form>
	</body>
	<script src="./Javascript/set_homework.js"></script>
</html>
