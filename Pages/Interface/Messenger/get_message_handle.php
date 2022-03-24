<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    include $file_path."/Includes/Php/dbh.php";
    $chat_id = $_SESSION["current_chat"];
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
        $sql = "SELECT user,message FROM message_data WHERE chat_id='$chat_id' ORDER BY message_id DESC LIMIT 10";
        $raw_result = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
        if ($raw_result -> num_rows > 0) {
            while ($row = mysqli_fetch_array($raw_result)){
				echo $row['user'].": ".$row["message"]."\n";
            }
        }
        else {
            echo "null";
        }
        
    }
?>
