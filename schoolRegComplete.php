<!DOCTYPE html>
<html>
  <?php
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword"];
  $textOutput = ('null');

  $schoolNameLength = strlen($schoolName);
  $schoolName = str_replace(" ","",$schoolName);
  $schoolName = strtolower($schoolName);
  
  $adminNameLength = strlen($adminName);
  $adminName = str_replace(" ","",$adminName);
  $adminName = strtolower($adminName);
  
  if ($schoolNameLength > 50) {
  $continue = (0);
  }
  if ($adminNameLength > 50) {
  $continue = (1);
  }
  
  if ($continue == (1)) {
    if (!is_dir('/var/www/html/Data/'.$schoolName)) {
      
      mkdir('/var/www/html/Data/'.$schoolName);
      mkdir("/var/www/html/Data/".$schoolName."/Accounts");
      mkdir("/var/www/html/Data/".$schoolName."/Accounts/Admin");
      mkdir("/var/www/html/Data/".$schoolName."/Accounts/Admin/".$adminName);
        
      copy ("/var/www/html/Templates/adminPanelTemplate.txt","/var/www/html/Data/".($schoolName)."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt");
      
      $path_to_file = "/var/www/html/Data/".($schoolName)."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt";
      $file_contents = file_get_contents($path_to_file);
      $file_contents = str_replace("ADMIN_NAME_PLACEHOLDER",$adminName,$file_contents);
      file_put_contents($path_to_file,$file_contents);

   
      rename("/var/www/html/Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt","/var/www/html/Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.html");
      $textOutput = 'School successfully registered';      
    }
    else {
    $textOutput = 'Your school is already registered!';
  }
  } ?>
  <body>
    <p> <?php echo $textOutput; ?> </p>
  </body>
</html>
