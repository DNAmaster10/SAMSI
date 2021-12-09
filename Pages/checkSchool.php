<?php
$user_input=$_POST['post_varo'];
echo json_encode(intval($user_input) + 1);
?>
