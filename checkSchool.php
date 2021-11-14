<?php
$user_input = $_REQUEST["user_input"];
if (is_file('/var/www/html/Data/'.$user_input)) {
echo "School exists!";
echo $user_input;
}
else {
echo  "School does not exist!";
echo $user_input;
}
echo $user_input;
?>
