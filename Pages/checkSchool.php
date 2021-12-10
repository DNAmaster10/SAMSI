<?php
$user_input=$_POST['post_var'];
echo json_encode(intval($user_input) + 1);
?>
