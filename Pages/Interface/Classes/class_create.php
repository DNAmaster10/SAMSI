<?php
//start session
session_start();

//connect to database and check if user is logged in
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";

//make sure account is of teacher or admin type
$table_name = "users";
$column_name = "account_type";
$where_column = "username";
$where_value = ($_SESSION["username"]);
include "/var/www/html/Includes/Php/get_single_value_from_db.php";


if ($result == "admin" or $result == "teacher") {
	$can_access = (true);
}
else {
    header("location: /Pages/Interface/No_perms/not_admin.php");
}
?>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheef" href="/Includes/Css/main.css">
  </head>
  <body>
  </body>
</html>
