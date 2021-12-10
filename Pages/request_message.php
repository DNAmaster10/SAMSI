<?php
$message_file = fopen (getcwd()."message_file.txt","r");
echo json_encode(fread($message_file("webdictionary.txt"));
fclose($message_file);
?>
