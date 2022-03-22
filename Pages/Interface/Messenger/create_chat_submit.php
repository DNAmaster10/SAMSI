<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
	#get values from POST and filter amd alter them
    $chat_title = $conn -> real_escape_string ($_POST["chat_name"]);
    if (isset($_POST["members"])) {
        $members = $conn -> real_escape_string ($_POST["members"]);
		if (strpos($members, $_SESSION["username"]) == false) {
			$members = $members.",".$_SESSION["username"].",";
		}
    }
	else {
		$members = $_SESSION["username"].",";
	}
	#Get current time
	$time_created = time();
	
	#Add information to chat_data table
	if (isset($_POST["chat_name"])) {
		$sql = "INSERT INTO chat_data (users,owner,chat_name,created) VALUES ('$members','".$_SESSION["username"]."','$chat_title','$time_created')";
	}
	else {
		$sql = "INSERT INTO chat_data (users,owner,chat_name,created) VALUES ('".$_SESSION["username"]."','$chat_title','$time_created')";
	}
	mysqli_query ($conn, $sql);
	
	#Get chat ID
	$table_name = "chat_data";
	$column_name = "chat_id";
	$where_column = "created";
	$where_value = $time_created;
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$chat_id = $result;
	
	#Add data to user_chats
	if (isset($_POST["members"])) {
		$members_array = explode(",", $members);
		$members_count = count($members_array);
		for ($i = 0; $i <= $members_count; $i++) {
			$table_name = "user_chats";
			$column_name = "chats";
			$where_column = "username";
			$where_value = $members_array[$i];
			$current_chats = $result;
			$new_chats = $current_chats.$chat_id.",";
			$sql = "UPDATE user_chats SET chats='$new_chats' WHERE username='".$members_array[$i]."';";
			mysqli_query($conn, $sql);
		}
	}
	else {
		$table_name = "user_chats";
		$column_name = "chats";
		$where_column = "username";
		$where_value = $_SESSION["username"];
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$current_chats = $result;
		$new_chats = $current_chats.$chat_id.",";
		$sql = "UPDATE user_chats SET chats='$new_chats' WHERE username='".$_SESSION["username"]."';";
		mysqli_query($conn, $sql);
	}
	header ("location: ./messenger_hub.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <form action="./messenger_hub.php">
            <input type="submit" value="Message hub">
        </form>
        <p>If you are seeing this text, an error has occured. Please contact your network administrator to get it fixed</p>
    </body>
</html>
