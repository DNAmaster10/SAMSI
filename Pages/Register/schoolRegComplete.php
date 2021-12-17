<!DOCTYPE html>
<html>
  <?php
  $root = $_SERVER['DOCUMENT_ROOT'];
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
  $continue = (1);
  }
  
  if ($continue == (1)) {
    if (!is_dir($root.'/Data/'.$schoolName)) {
      
      $textOutput = ("An error occured setting up either your school, or your admin account. Contact a network administrator for more information on the matter");
      mkdir($root."/Data");
      mkdir($root."/Data/".$schoolName);
      mkdir($root."/Data/".$schoolName."/Accounts");
      mkdir($root."/Data/".$schoolName."/Accounts/Admin");
      mkdir($root."/Data/".$schoolName."/Accounts/Admin/".$adminName);
        
      copy ($root."/Templates/adminPanelTemplate.txt",$root."Data/".($schoolName)."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt");
      
      $path_to_file = $root."/Data/".($schoolName)."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt";
      $file_contents = file_get_contents($path_to_file);
      $file_contents = str_replace("ADMIN_NAME_PLACEHOLDER",$adminName,$file_contents);
      file_put_contents($path_to_file,$file_contents);

      copy ($root."/Templates/logged_in.txt",$root."/Data/".$schoolName."/Accounts/Admin/".$adminName."/logged_in.txt");
      
      $file_contents_2 = file_get_contents($root."/Data/".$schoolName."/Accounts/Admin/".$adminName."/logged_in.txt");
      $file_contents_2 = str_replace("false","true",$file_contents);
      file_put_contents ($root."/Data/".$schoolName."/Accounts/Admin/".$adminName."/logged_in.txt",$file_contents_2);
   
      rename($root."/Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.txt",$root."/Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.php");
      $admin_panel_path = "../Data/".$schoolName."/Accounts/Admin/".$adminName."/".$adminPassword."Panel.php";
      $textOutput = 'School successfully registered';      
    }
    else {
    $textOutput = 'Your school is already registered!';
  }
  } ?>
  <body>
    <p> <?php echo $textOutput; ?> </p>
    <form action="<?php echo $admin_panel_path; ?>">
      <input type="button" onclick="location.href='<?php echo $admin_panel_path; ?>';" value="Admin Panel" />
    </form>
  </body>
</html>
