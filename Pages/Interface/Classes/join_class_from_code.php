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
    <form>
      <input type="text" placeholder="1234" name="input_code" required>
    </form>
  </body>
</html>
