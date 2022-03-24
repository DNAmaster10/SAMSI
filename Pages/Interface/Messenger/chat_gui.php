<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
    $chat_id = $_SESSION["current_chat"];
    
    $table_name = "chat_data";
    $column_name = "users";
    $where_column = "chat_id";
    $where_value = $chat_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $members_array = explode (",", $result);
    if (!in_array($_SESSION["username"], $members_array)) {
        header ("location: ../Misc/not_in_chat.php");
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
		<form action="./messenger_hub.php">
			<input type="submit" value="Back">
		</form>
		<br>
        <input type="text" id="message_entry">
        <button type="button" onclick="sendMessage()">Send</button>
        <button type="button" onclick="getMessages()">Get messages</button>
		<br>
		<p id="message_p"></p>
		<button type="button" onclick="loadMore()">Load more messages</button>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./Javascript/message_gui.js"></script>
</html>
