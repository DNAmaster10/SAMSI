<!DOCTYPE html>
<html>
  <?php
  $schoolName = $_POST["schoolName"];
  $adminName = $_POST["adminName"];
  $adminPassword = $_POST["adminPassword]
  
  $conn = new mysqli($schoolName, $adminName, $adminPassword);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  
  $sql = "CREATE DATABASE IF NOT EXISTS $schooName;
  if ($conn->query($sql) == TRUE) {
    echo "Database for $schooName successfully created";
  } else {
    echo "Error creating database: " . $conn->error;
  }
                          
  $conn->close();
  ?>
  <body>
    <p><?php echo $textOutput; ?></p>
  </body>
</html>
