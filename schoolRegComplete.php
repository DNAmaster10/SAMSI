<!DOCTYPE html>
<html>
  <?php
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword];
  
  //need to finish string validation
  $schoolNameLength = strlen($schooName);
    
  if ($continue == (1)) {
    if ( !file_exists(/Data/$schoolName) && !is_dir(/Data/$schoolName)) {
      mkdir(/Data/$schoolName);
      $textOutput = "Schoolsuccessfullyregistered";
    }
    else {
    $textOutput = "Yourschoolisalreadyregistered!";
  }
  }
  ?>
  <body>
    <p><?php echo $textOutput; ?>.</p>
  </body>
</html>
