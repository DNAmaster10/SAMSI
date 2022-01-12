<?php
session_start();
include "/var/www/html/Includes/Php/dbh.php";
include "/var/www/html/Includes/Php/check_user_pass.php";
$sql = "SELECT isAdmin FROM users WHERE username='".$_SESSION['username']."';";
$raw_result = mysqli_query($conn, $sql);
$array_result = get_object_vars($raw_result);
implode ("|",$array_result);
error_log($array_result);
if (1 == 1) {
	echo ("yes");
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
    </body>
</html>
