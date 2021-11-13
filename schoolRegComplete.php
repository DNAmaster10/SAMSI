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
  
  if ($schoolNameLenght > 50) {
  $continue = (0);
  }
  if ($adminNameLength > 50) {
  $continue = (1);
  }
  
  if ($continue == (1)) {
    if (!is_dir('/var/www/html/Data/'.($schoolName))) {
      mkdir('/var/www/html/Data/'.($schoolName));
      mkdir("/var/www/html/Data/".($schoolName)."/Accounts/Admin/".$adminName);
      $admin_txt_file = fopen("/var/www/html/".$adminName, "w");
      fwrite($admin_txt_file, $adminPassword."\n")
      fclose($admin_txt_file)
      copy ("/var/www/html/Templates/adminPanelTemplate.txt","/var/www/html/Data/".($schoolName)."/Accounts/Admin/".$adminName)
      rename("/var/www/html/Data/".$schoolName."/Accounts/Admin/".$adminName."/adminPanelTemplate.txt","/var/www/html/Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword.".html")
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
