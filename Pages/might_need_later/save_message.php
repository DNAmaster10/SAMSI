<?php
$user_input=$_POST['sent_message'];
$messageFile = fopen("message_file.txt", "w") or die ("Unable to open the file!");
fwrite($messageFile, $user_input);
fclose($myfile);
?>
