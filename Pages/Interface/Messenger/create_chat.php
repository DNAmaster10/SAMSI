<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <form action="./create_chat_submit.php" method="POST" id="create_input">
            <p> Chat name: </p><input type="text" name="chat_name" required>
			<input type="hidden" name="members" value="" id="members">
            <input type="submit" value="Create">
        </form>
		<input type="text" onkeyup="getUsers()" id="user_entry_box">
		<p id="members_list">Members: <br><?php echo $_SESSION["username"]; ?></p>
		<div id="user_buttons">
		</div>
    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="./Javascript/chat_create.js"></script>
</html>
