<!DOCTYPE html>
<html>
  <?php
  include "/var/www/html/Includes/dbh.php";
  
  
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword"];
  $textOutput = ("An Error has occured with the variable handling of the $schoolName variable");

  $schoolNameLength = strlen($schoolName);
  $schoolName = str_replace(" ","",$schoolName);
  $schoolName = strtolower($schoolName);
  
  $textOutput = ("An Error has occured with the variable handling of the $adminName variable");
  
  $adminNameLength = strlen($adminName);
  $adminName = str_replace(" ","",$adminName);
  $adminName = strtolower($adminName);
  
  $textOutput = ("An Error had occured");
  
  if ($schoolNameLength > 50) {
    $continue = (0);
  }
  if ($adminNameLength > 50) {
    $continue = (0);
  }
  
  if ($continue == 1) {
	$sql = ("INSERT INTO admin_users (username, password) VALUES ('".$adminName."','".$adminPassword."');");
	mysqli_query ($conn, $sql) or die(mysqli_error($mysqli));;
  }
  
  else {
    $textOutput = ("An error occured. For more information, contact a network administrator");
  }
  ?>
  <body>
    <p> Done! </p>
    <form action="index.php">
      <input type="button" onclick="location.href='index.php';" value="Admin Panel" />
    </form>
  </body>
</html>
