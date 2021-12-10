<?php
$user_input=$_POST['sent_message'];
$message_file = fopen(getcwd()."message_file.txt", "w");
fwrite($message_file, $user_input);
?>
