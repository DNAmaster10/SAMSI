<?php
session_start();
include "/Includes/Php/dbh.php";
include "/Includes/Php/check_user_pass.php";
$sql = "SELECT isAdmin FROM users WHERE username='".$_SESSION['username']."';";
$raw_result = mysqli_query($conn, $sql);
error_log($raw_result);
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
