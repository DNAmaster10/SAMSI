<?php
$user_input = $_REQUEST["schoolNamePostContainer"];
$file_name = "/var/www/html/Data/".$user_input;
if (file_exists($file_name)) {
  echo ("School exists!");
  }
else {
  echo ("School does not exist!");
}
echo $user_input;
?>
