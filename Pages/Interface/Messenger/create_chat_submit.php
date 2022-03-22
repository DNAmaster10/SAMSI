<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
    $chat_title = $conn -> real_escape_string ($_POST["chat_name"]);
    if (isset($_POST["members"])) {
        $members = $conn -> real_escape_string ($_POST["members"]);
    }
    $sql = "INSERT INTO chat_data (users,owner) VALUES (
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
