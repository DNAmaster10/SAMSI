<?php
    $user_input = $_POST["message"];
    $user_input = $user_input * 2;
    echo $user_input;
    error_log(print_r($user_input, TRUE)); 
?>
