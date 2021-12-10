<?php
$message_file = fopen ("message_file","r");
echo json_encode(fread($message_file("webdictionary.txt"));
fclose($message_file);
?>
