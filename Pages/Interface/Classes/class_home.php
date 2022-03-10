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
    $table_name = "class_data";
    $column_name = "owner";
    $where_column = "class";
    $where_value = $_SESSION["current_class"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    if ($result == $_SESSION["username"]) {
        $is_owner = true;
    }
    else {
        $is_owner = false;
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
        <form action="../main_menu.php">
            <input type="submit">
        </form>
        <?php if ($is_owner == true) {echo ' 
		<form action="./set_homework.php">
            <input type="submit" value="Set an assignment">
		</form>
		';} ?>
    </body>
</html>
