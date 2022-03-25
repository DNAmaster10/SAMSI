<?php
session_start();
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";

$table_name = "users";
$column_name = "account_type";
$where_column = "username";
$where_value = ($_SESSION["username"]);

include "/var/www/html/Includes/Php/get_single_value_from_db.php";


if ($result == "admin") {
	$is_admin = (true);
}
else {
    header("location: /Pages/Interface/No_perms/not_admin.php");
}

include "/var/www/html/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" href="/Includes/Css/main.css">
        <title>SAMSi</title>
    </head>
    <style>
      		.select_form{
			display: inline-block;
		}
		.block_button{
			padding: 15px 32px;
			font-size: 16px;
		}
		.block_button_small{
			padding: 5px 24px;
			font-size: 8px;
		}
	</style>
    <body>
        <h1>Register an account</h1>
    <form action="../manage_accounts_menu.php" class="select_form">
    <input type="submit" value="Back" class="block_button">
    </form><br>
	<form action="../../main_menu.php" class="select_form">
		<input type="submit" value="Home" class="block_button">
	</form>
	<p>Hey <?php echo ($_SESSION["username"]); ?>! Use this page to register users, such as teachers and students.</p><br>
	<br>
	<div class="input_menu">
	<form action="./register_users_submit.php" method="POST">
		<p>Username: </p><input type="text" name="username" required> <br>
		<p>Password: </p><input type="text" name="password" required> <br>
		<p>Account type: </p><br><p>Student</p><input type="radio" value="student" name="account_type" required><br>
		<p>Teacher</p><input type="radio" value="teacher" name="account_type" required><br>
		<p>Administrator</p><input type="radio" value="admin" name="account_type" required><br>
		<input type="submit" value="Register User" class="block_button_small">
	</form>
	</div>
    </body>
</html>
