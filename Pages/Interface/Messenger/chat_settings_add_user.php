<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    
    $table_name = "chat_data";
    $column_name = "chat_name";
    $where_column = "chat_id";
    $where_value = $_SESSION["current_chat"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $chat_owner = $result;
    
    $table_name = "chat_data";
    $column_name = "admins";
    $where_column = "chat_id";
    $where_value = $_SESSION["current_chat"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $admins = $result;
    $admins_array = explode(",",$admins);
    
    if (!in_array($_SESSION["username"],$admins_array)) {
        header ("location: ../Misc/not_chat_admin.php");
        echo "1";
    }
    
    $user = $conn -> real_escape_string($_POST["username"]);
    $table_name = "chat_data";
    $column_name = "users";
    $where_column = "chat_id";
    $where_value = $chat_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $current_users = $result
    if (str_contains($current_users, $user.",")) {
        echo "2";
    }
    else {
        $new_users = $current_users.$user.",";
        $sql = "UPDATE chat_data SET users='$new_users' WHERE chat_id='$chat_id';";
    }
?>
