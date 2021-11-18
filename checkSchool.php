<?php
$user_input = $_REQUEST["schoolNamePostContainer"];
if (is_file('/var/www/html/Data/'.$user_input)) {
  echo ("School exists");
  }
else {
  echo ("School does not exist!");
}
echo $user_input;
?>
