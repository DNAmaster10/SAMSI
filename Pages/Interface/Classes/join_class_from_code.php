<?php
session_start();
$file_path = $_SERVER["DOCUMENT_ROOT"];
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/get_user_pass.php";
include $file_path."/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
    <link rel="stylesheet" href="/Includes/Css/main.css">
  </head>
  <body>
    <p>Enter class code bellow</p>
    <form action="./join_class_from_code_submit.php" method="POST">
      <input type="text" placeholder="1234" name="input_code" required>
      <input type="submit" value="Join">
    </form>
  </body>
</html>
