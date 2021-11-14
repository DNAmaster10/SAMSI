<?php
$user_input = $_REQUEST["user_input"];
if (!is_dir('/var/www/html/Data/'.$schoolName)) {
echo "School exists!";
}
else {
echo  "School does not exist!"; 
}
?>
