<?php
    session_start();
    include $file_path."/Includes/Php/get_user_theme.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme ?>.css">
        <link rel="stylesheet" href="/Includes/Css/main.css">
        <title>SAMSi</title>
    </head>
    <body>
        <p>You've not selected a class! Please select a class from the class select menu.
        </p>
        <form action="/Pages/Interface/Classes/class_select_menu.php">
            <input type="submit" value="Select Class">
        </form>
        <form action="/Pages/Interface/main_menu.php">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
