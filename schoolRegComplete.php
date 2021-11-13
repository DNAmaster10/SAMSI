<!DOCTYPE html>
<html>
  <?php
  $continue = (1);
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword"];
  $textOutput = ('null');
  
  //need to finish string validation
  $schoolNameLength = strlen($schoolName);
    
  if ($continue == (1)) {
    if (!is_dir('/var/www/html/Data/'.($schoolName))) {
      mkdir('/var/www/html/Data/'.($schoolName));
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
