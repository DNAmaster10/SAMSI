<?php
$deletion_username = $_POST["deletion_username"];
$file_path = $_SERVER["DOCUMENT_ROOT"];
session_start();
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_account_type.php";
if ($account_type == "admin") {
  include $file_path."/Includes/Php/get_user_theme.php";
  $sql = "DELETE FROM users WHERE username='".$deletion_username."';";
  $sql2 = "DELETE FROM user_classes WHERE username='".$deletion_username."';";
  $sql3 = "DELETE FROM themes WHERE username='".$deletion_username."';";
  mysqli_query($conn, $sql) or die (mysqli_error($conn));
  mysqli_query($conn, $sql2);
  mysqli_query($conn, $sql3);
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
    <p>All done!</p>
    <br>
    <form action="./delete_accounts.php">
      <input type="submit" value="Delete another user" class="small_block_button">
    </form>
    <form action="/Pages/Interface/main_menu.php" class="small_block_button">
      <input type="submit" value="Home">
    </form>
  </body>
</html>
