<!DOCTYPE html>
<html>
  <?php
  #connect to database
  include "/var/www/html/Includes/dbh.php";
  
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
  #add username and password to sql database
  try {
  if ($continue == 1) {
	$sql = ("INSERT INTO admin_users (username, password) VALUES ('".$adminName."','".$adminPassword."');");
	mysqli_query ($conn, $sql) or die(mysqli_error($mysqli)) 	
	$textOutput = ("All done! You should now be able to login with your admin account to begin your SAMSi journey.");
	}
  }
  catch (Exception $ex) {
	  $textOutput = ("Username already in use. Please use a different one.");
  }
  ?>
  <body>
    <p> <?php echo $textOutput; ?></p>
    <form action="index.php">
      <input type="button" onclick="location.href='index.php';" value="Admin Panel" />
    </form>
  </body>
</html>
