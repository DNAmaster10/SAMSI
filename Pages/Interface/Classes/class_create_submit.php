<?php
session_start();
#connect to database
include "/var/www/html/Includes/Php/dbh.php";
#Make sure users login details are correct
include "/var/www/html/Includes/Php/check_user_pass.php";
#Make sure user is either a student or an admin
include "/var/www/html/Includes/Php/get_account_type.php";
if ($account_type !== "admin" and $account_type !== "teacher") {
  header("location: /Pages/Interface/No_perms/not_admin.php");
}
else {
#Get the users input from the previous page
$class_name = $_POST["class_name"];
$username = $_SESSION["username"];
  
$sql = "INSERT INTO class_data (class,owner) VALUES ('".$class_name."','".$username."')";
mysqli_query ($conn, $sql);
  
#redirect user back to the class select menu
header("location: /Pages/Interface/Classes/class_select_menu.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Samsi</title>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheet" href="/Includes/Css/main.css">
</head>
<body>
  A fatal error occured!
</body>
</html>
