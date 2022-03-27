<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
	#Find out if user is a member of any message groups, and if so, check how many
	$table_name = "user_chats";
	$column_name = "chats";
	$where_column = "username";
	$where_value = $_SESSION["username"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	if ($result == "null") {
        $has_chats = false;
	}
	else {
        $has_chats = true;
        $chats_array = explode(",", $result);
        $chat_count = count($chats_array);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <form action="/Pages/Interface/main_menu.php" class="inline_display">
            <input type="submit" value="Home" class="block_button">
        </form>
        <form action="./join_chat.php" class="inline_display">
            <input type="submit" value="Join chat from code" class="block_button">
        </form>
        <form action="./create_chat.php" class='inline_display'>
            <input type="submit" value="Create chat" class="block_button">
        </form>
        <br>
		<?php
            if ($has_chats) {
                for ($i = 0; $i <= $chat_count - 2; $i++) {
                    $table_name = "chat_data";
                    $column_name = "chat_name";
                    $where_column = "chat_id";
                    $where_value = $chats_array[$i];
                    include $file_path."/Includes/Php/get_single_value_from_db.php";
                    $chat_title = $result;
                    
                    echo "
                    <form action='./message_hub_redirect.php' method='POST' class='inline_display'>
                        <input type='hidden' value='".$chats_array[$i]."' name='chat_id'>
                        <input type='submit' value='$chat_title' class='small_block_button'>
                    </form>
                    ";
                }
			}
			else {
                echo "<p>You are not part of any chats</p>";
			}
		?>
    </body>
</html>
