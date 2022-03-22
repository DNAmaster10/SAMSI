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
        <title>SAMSi<title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <form action="/Pages/Interface/main_menu.php">
            <input type="submit" value="Home">
        </form>
        <form action="./join_chat.php">
            <input type="submit" value="Join chat from code">
        </form>
        <form action-"./create_chat.php">
            <input type="submit" value="Create chat">
        </form>
        <br>
        
    </body>
</html>
