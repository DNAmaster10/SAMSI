<?php
    $user_input = $_POST["message"];
    echo $user_input;
    error_log(print_r($user_input, TRUE)); 
?>
