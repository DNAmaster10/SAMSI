<?php
session_start();
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";

$table_name = "users";
$column_name = "isAdmin";
$where_column = "username";
$where_value = ($_SESSION["username"]);

include "/var/www/html/Includes/Php/get_single_value_from_db.php";


if ($result == "yes") {
	is_admin = (true);
}
else {
    header("location: /Pages/Interface/No_perms/not_admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/Includes/Css/main.css">
        <title>SAMSi</title>
    </head>
    <body>
        <h1>Register an account</h1>
        <br>
		<p>Hey <?php echo ($_SESSION["username"]); ?>! Use this page to register users, such as teachers and students.</p>
    </body>
</html>
