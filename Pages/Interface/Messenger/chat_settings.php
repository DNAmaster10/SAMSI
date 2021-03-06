<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
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
    }
    
    $table_name = "chat_data";
    $column_name = "users";
    $where_column = "chat_id";
    $where_value = $_SESSION["current_chat"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $members_array = explode(",",$result);
    $members_ammount = count($members_array);
    for ($i = 0; $i < $members_ammount; $i++) {
        $members_list_output = $members_list_output.$members_array[$i]."<br>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <input type="text" placeholder="Add member" id="add_member_entry_box" onkeyup="getUsers()">
        <button type="button" onclick="sendUser()">Add user</button>
        <p id="return_message_container"></p>
        <div id="new_member_button_list"></div>
        <p id="members_list">Members:<br><?php echo $members_list_output; ?></p>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./Javascript/chat_settings.js"></script>
</html>
