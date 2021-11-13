<!DOCTYPE html>
<html>
  <?php
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword];
  
  $schoolName = str_replace(" ", "");
  $schoolNameLength = strlen($schooName);
  
  if ($schoolNameLength > (50)) {
    $textOutput = "Your school name is too long"
    $continue = (0)
  }
  ?>
  <body>
    <p><?php echo $textOutput; ?></p>
  </body>
</html>
