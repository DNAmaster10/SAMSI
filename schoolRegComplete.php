<!DOCTYPE html>
<html>
  <?php
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword];
  
  //need to finish string validation
  $schoolNameLength = strlen($schooName);
  if ($schoolNameLength > (50)) {
    $textOutput = ["Your school name is too long"];
    $continue = (0);
    }
    
  if ($continue == (1)) {
    if ( !file_exists(/Data/$schoolName) && !is_dir(/Data/$schoolName)) {
      mkdir(/Data/$schoolName);
      $textOutput = ["School successfully registered"]
    }
    else {
    $textOutput = ["Your school is already registered!"]
  }
  ?>
  <body>
    <p><?php echo $textOutput; ?></p>
  </body>
</html>
