<?php
$user_input = $_REQUEST["user_input"];
$time = time();
if (file_exists('/var/www/html/Data/'.$user_input)) {
echo "School exists!";
}
else {
echo  "School does not exist!";
}
echo $time;
?>
