<?php
session_start();
include "/Includes/Php/check_user_pass.php";
include "/Includes/Php/dbh.php";
$sql = "SELECT isAdmin FROM users WHERE username='".$_SESSION["username"]."';";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
    </head>
    <body>
        <h1>Register an account</h1>
        <br>
    </body>
</html>
