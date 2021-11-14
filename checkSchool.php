<?php
$user_input = $_REQUEST["user_input"];
$time = time();
$file_state = (file_exists('/var/www/html/Data/'.$user_input));
if (file_exists('/var/www/html/Data/'.$user_input)) {
echo "School exists!";
}
else {
echo  "School does not exist!";
}
echo $time;
echo "<br>";
echo $file_state;
?>
