<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";

    if (!$account_type == "teacher" or !$account_type == "admin") {
        header ("location: /Pages/Interface/Misc/not_teacher_or_admin.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
		<link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
		<link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <div class="header">
        <form action="../main_menu.php">
            <input type="submit" value="Back" class="block_button">
        </form>
        </div>
        <form action="./report_gen_submit.php" method="POST">
            <input type="text" placeholder="Name" name="name" required>
            <input type="text" placeholder="Subject" name="subject" required>
            <input type="text" placeholder="Grade" name="grade" required>
            <input type="submit" value="Generate Report" class="small_block_button">
        </form>
        <textarea class="report_gen_output" class="large_text_box" readonly><?php if(isset($_SESSION["report"])) {
            echo $_SESSION["report"];
        } ?></textarea>
    </body>
</html>
