<?php
$deletion_username = $_POST["deletion_username"];
$file_path = $_SERVER["DOCUMENT_ROOT"];
session_start();
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_account_type";
if ($account_type == "admin") {
  include $file_path."/Includes/Php/get_user_theme";
  $sql = "DELETE FROM users WHERE username='".$deletion_username."';
  DELETE FROM user_classes WHERE username='".$deletion_username."';
  DELETE FROM themes WHERE username='".$deletion_username."'";
}
else {
  header("location: /Pages/Interface/No_perms/not_admin.php");
}
