<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";

  $table_name = "users";
  $column_name = "account_type";
  $where_column = "username";
  $where_value = ($_SESSION["username"]);
  include $file_path."/Includes/Php/get_single_value_from_db.php";


if (!$result == "admin" or $result == "teacher") {
	$can_access = (true);
}
?>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheef" href="/Includes/Css/main.css">
    <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
  </head>
  <body>
	  <p>Hey <?p echo $_SESSION["username"]; ?>! Use this page to create a new classroom.</p><br>
	  <form action="./class_create_submit.php" method="POST">
			<input type="text" name="class_name" placeholder="class name">
		  	<input type="submit" value="Create class">
	  </form>
  </body>
</html>
