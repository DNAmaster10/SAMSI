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
        <form action="./create_chat_submit.php" method="POST">
            <p> Chat name: </p><input type="text" name="chat_name" required>
            <p> Other member(s): </p><input type="text" name="members" placeholder="James,ruby02,max">
            <input type="submit" value="Create">
        </form>
		<p id="members_list"><?php echo $_SESSION["username"]; ?></p>
    </body>
</html>
