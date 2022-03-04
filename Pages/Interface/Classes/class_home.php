<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
    if (isset($_SESSION["current_class"])) {
        $continue = "yes";
    }
    else {
        header ("location: /Pages/Interface/Misc/class_not_selected.php");
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
        <p>This class is <?php echo $_SESSION["current_class"]; ?></p>
    </body>
</html>
