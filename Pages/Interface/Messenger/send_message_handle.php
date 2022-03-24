<?php
    session_start();
        $table_name = "chat_data";
    $column_name = "users";
    $where_column = "chat_id";
    $where_value = $chat_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $members_array = explode (",", $result);
    if (!in_array($_SESSION["username"], $members_array)) {
        echo "You are not a part of this chat!";
    }
    
    else {
        $message = $conn -> real_escape_string ($_POST["message"]);
        $chat_id = $_SESSION["current_chat"];
        $username = $_SESSION["username"];
        $sql = "INSERT INTO message_data (chat_id,user,message) VALUES ($chat_id,$username,$message)";
        mysqli_query($conn, $sql);
        echo "Message sent successfully!";
    }
?>
