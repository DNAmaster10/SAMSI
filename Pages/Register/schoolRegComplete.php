<?php
  #connect to database
  include "/var/www/html/Includes/Php/dbh.php";
  
  #get inputs from browser
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword"];
  $textOutput = ("An Error has occured with the variable handling of the $schoolName variable");
  
  #String handling
  $schoolNameLength = strlen($schoolName);
  $schoolName = str_replace(" ","",$schoolName);
  $schoolName = strtolower($schoolName);
  
  $textOutput = ("An Error has occured with the variable handling of the $adminName variable");
  
  $adminNameLength = strlen($adminName);
  $adminName = str_replace(" ","",$adminName);
  $adminName = strtolower($adminName);
  
  $textOutput = ("An Error had occured");
  
  if ($schoolNameLength > 25) {
    $continue = (0);
	$textOutput = ("The entered school name is too long! Maximum of 25 characters allowed.");
  }
  if ($adminNameLength > 25) {
    $continue = (0);
	$textOutput = ("The admin username length is too long! Maximum of 25 characters allowed.");
  }
  #check if username already exists in database
  $sql_u = "SELECT * FROM users WHERE username='".$adminName."'";
  $res_u = mysqli_query($conn, $sql_u);
  
  if (mysqli_num_rows($res_u) > 0) {
	  $continue = 0;
	  $textOutput = ("That username is already in use!");
  }
  if ($continue == 1) {
  #add username and password to sql database
  $table_name = "users";
  $columns = "username,password,account_type";
  $values = "'".$adminName."','".$adminPassword."','admin'";
  include "/var/www/html/Includes/Php/write_to_db.php";	
  }
  if ($continue != 0) {
  $textOutput = "All done! You may now log into your admin account.";
  }
  if ($continue == 1) {
  $table_name = "themes";
  $columns = "username,theme";
  $values = "'".$adminName."','default'";
  include "/var/www/html/Includes/Php/write_to_db.php";
  }
  ?>
<!DOCTYPE html>
<html>
  <body>
    <p><?php echo $textOutput; ?></p>
    <form action="/Pages/Login/login.php">
      <input type="button" onclick="location.href='/Pages/Login/login.php';" value="Login" />
    </form>
    <form action="../../index.php">
	    <input type="submit" value="Home">
    </form>
  </body>
</html>
