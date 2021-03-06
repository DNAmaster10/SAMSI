<?php
	session_start();
	$file_path = $_SERVER["DOCUMENT_ROOT"];
	$username = $_SESSION["username"];
	include "/var/www/html/Includes/Php/dbh.php";
	include "/var/www/html/Includes/Php/check_user_pass.php";
	include "/var/www/html/Includes/Php/get_user_theme.php";
	include "/var/www/html/Includes/Php/get_account_type.php";
	
	$table_name = "user_classes";
	$column_name = "classes";
	$where_column = "username";
	$where_value = $_SESSION["username"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$classes_string = $result;
	
	$class_ammount = substr_count($classes_string,",");
	if ($class_ammount == 0) {
		$continue = "no";
	}
	else {
		$classes_array = explode(',', $classes_string);
		$class_ammount = count($classes_array);
		$continue = "yes";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
	</head>
	<style>
		.class_button {
			border-radius: 50%;
		}
	</style>
	<body>
        <form action="../main_menu.php" class='inline_display'>
            <input type="submit" value="Home" class="block_button">
        </form>
		<?php if ($account_type == "teacher" or $account_type == "admin") {echo '
		<form action="./class_create.php" class="display_inline">
			<input type="submit" value="New Class" class="block_button">
		</form>
		'; } ?>
	<br>
		<p>Not a member of any classes? Enter the join code here!</p>
	<form action="./join_class_from_code_submit.php" method="POST">
		<input type="text" placeholder="1234" name="input_code" required>
		<input type="submit" value="Join" class="small_block_button">
	</form>
	<br>
	<?php 
		for ($i = 0; $i <= $class_ammount - 2; $i++) {
			echo "
			<form action='./class_select_submit.php' method='POST'>
				<input type='hidden' name='selected_class' value='".($classes_array[$i])."'>
				<input type='submit' value='".($classes_array[$i])."' class='class_button small_block_button'>
			</form>
			";
		}
		?>
	</body>
</html>
