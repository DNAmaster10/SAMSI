<?php
$user_input=$_POST['sent_message'];
$message_file = fopen("testfile.txt", "w");
fwrite($message_file, $user_input);
?>
