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
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            .input_message {
                width: 75%;
                height: 70px;
                padding: 12px 20px;
                border-radius: 20px;
                font-size: 16px;
                display: inline-block;
                resize: none;
                margin: 1%;
            }
            .send_message_button {
                padding: 38px 4%;
                border-radius: 20px;
                display: inline-block;
                float: right;
                margin: 1%;
            }
            .inside_header {
                margin: 1px;
            }
            .settings_button {
                float: right;
            }
            }
            .send_message_button {
                background-color: #71a9ab;
                border: 2px solid #000000;
                color: 000000;
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            }
            .send_message_button:hover {
                background-color: #587e80;
                color: #ffffff;
            }
            .send_message_container {
                animation-duration: 0.3s;
                animation-name: slidein;
            }
            @keyframes slidein {
                from {
                    transform: translate(-100%);
                }
                to {
                    transform: translate(0%);
                }
            }
            .send_message_container_active {
                animation-duration: 0.3s;
                animation-name: slideout;
                animation-fill-mode: forwards;
            }
            @keyframes slideout {
                from {
                    transform: translate(0%);
                }
                to {
                    transform: translate(110%);
                }
            }
        </style>
    </head>
    <body>
        <div class="header">
        <div class="inside_header">
		<form action="./messenger_hub.php" class="inline_display">
			<input type="submit" value="Back" class="block_button">
		</form>
		<form action="./chat_settings.php" method="POST" class="inline_display">
            <input type="hidden" value="<?php $chat_id
            ; ?>" name="chat_id">
            <input type="submit" value="Chat settings" class="block_button">
		</form>
        </div>
		</div>
		<br>
		<div id="send_message_container" class="send_message_container">
        <textarea id="message_entry" placeholder="Message" class="input_message"></textarea>
        <button type="button" onclick="sendMessage()" class="send_message_button block_button">Send</button>
        </div>
		<br>
		<p id="message_p"></p>
		<button type="button" onclick="loadMore()" class="small_block_button">Load more messages</button>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./Javascript/message_gui.js"></script>
</html>
