<?php
session_start();
$input_code = $_POST["input_code"];
$file_path = $_SERVER["DOCUMENT_ROOT"];
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_user_theme.php";
$table_name = "class_data";
$column_name = "class";
$where_column = "join_code";
$where_value = $input_code;
include $file_path."/Includes/Php/get_single_value_from_db.php";
$class_name = $result;
$table_name = "user_classes";
$column_name = "classes";
$where_column = "username";
$where_value = $_SESSION["username"];
include $file_path."/Includes/Php/get_single_value_from_db.php";
$current_user_classes = $result;
$current_classes_array = explode(',', $current_user_classes);
if (in_array($class_name, $current_classes_array)){
	$text_output = "You are already a member of that class!";
}
else if ($class_name == "null") {
    $text_output = "That is not a valid code";
}
else {
	$new_user_classes = $current_user_classes.$class_name;
	$sql = "UPDATE user_classes SET classes='".$new_user_classes.",' WHERE username='".$_SESSION['username']."';";
	mysqli_query ($conn,$sql);
	$text_output = "Done! You're now a member of ".$class_name;
	$table_name = "class_data";
	$column_name = "members";
	$where_column = "join_code";
	$where_value = $input_code;
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$current_members = $result;
	$new_members = $current_members.$_SESSION["username"].",";
	$sql = "UPDATE class_data SET members='".$new_members."' WHERE join_code=".$input_code.";";
	mysqli_query ($conn,$sql);
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
		<p><?php echo $text_output; ?></p>
		<form action="./class_select_menu.php">
			<input type="submit" value="Classes">
		</form>
		<form action="../main_menu.php">
			<input type="submit" value="Home">
		</form>
	</body>
</html>
