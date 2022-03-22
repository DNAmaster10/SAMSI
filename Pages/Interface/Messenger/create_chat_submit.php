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
	#Add information to chat_data table
    $sql = "INSERT INTO chat_data (users,owner,chat_name) VALUES ('$members','".$_SESSION["username"]."','$chat_title')";
	mysqli_query ($conn, $sql);
	
	#Add data to user_chats
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
