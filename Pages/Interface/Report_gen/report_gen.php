<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";

    if (!$account_type == "teacher" or !$account_type == "admin") {
        header ("location: /Pages/Interface/Misc/not_teacher_or_admin.php")
    }
?>
