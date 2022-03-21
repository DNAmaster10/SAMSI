<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
    
    #Make sure user has selected a class.
    if (!isset($_SESSION["current_class"])) {
        header ("location: /Pages/Interface/Misc/class_not_selected.php");
    }
    
    #Check if user is owner. if not send to another page
    $table_name = "class_data";
    $column_name = "owner";
    $where_column = "class";
    $where_value = $_SESSION["current_class"];
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    if ($result != $_SESSION["username"]) {
        header ("location: /Pages/Interface/Misc/not_owner_of_class.php")
    }
    
    #Get assignment ID from POST
    $homework_id = $conn -> real_escape_string ($_POST["homework_id"]);
    
    #get assignment details
    $table_name = "homework_data";
    $column_name = "descripion";
    $where_column = "ID";
    $where_value = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $descripion = $result;
    
    $table_name = "homework_data";
    $column_name = "title";
    $where_column = "ID";
    $where_value = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $title = $result;
    
    $table_name = "homework_data";
    $column_name = "due_data";
    $where_column = "ID";
    $where_vale = $homework_id;
    include $file_path."/Includes/Php/get_single_value_from_db.php";
    $due_data = $result;
?>
<!DOCTYPE html>
<html>
</html>
