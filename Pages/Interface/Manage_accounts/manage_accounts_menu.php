<?php
session_start();
$file_path = $_SERVER["DOCUMENT_ROOT"];
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_user_theme.php";
$table_name = "users";
$column_name = "account_type";
$where_column = "username";
$where_value = ($_SESSION["username"]);
include $file_path."/Includes/Php/get_single_value_from_db.php";
if ($result == "admin") {
	$is_admin = (true);
}
else {
    header("location: /Pages/Interface/No_perms/not_admin.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheet" href="/Includes/Css/main.css">
  </head>
  <body>
    <h1>Where would you like to go?</h1><br>
	<form action="../main_menu.php">
		<input type="submit" value="Back" class="block_button">
	</form>
    <form action="./Register_users/register_user.php">
		<input type="submit" value="Register users" class="block_button">
    </form>
	<form action="./Delete_accounts/delete_accounts.php" class="block_button">
		<input type="submit" value="Delete users">
	</form>
  </body>
</html>
