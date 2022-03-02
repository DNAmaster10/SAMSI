<?php
session_start();
$input_code = $_POST["input_code"];
$file_path = $_SERVER["DOCUMENT_ROOT"];
include $file_path."/Includes/Php/dbh.php";
include $file_path."/Includes/Php/check_user_pass.php";
include $file_path."/Includes/Php/get_user_theme.php";

$table_name = "class_data";
$column_name = "class";
$where_column = "join_code";
$where_value = $input_code;
include $file_path."/Includes/Php/get_single_value_from_db.php";
$class_name = $result;

$table_name = "user_classes";
$column_name = "classes";
$where_column = "username";
$where_value = $_SESSION["username"];
include $file_path."/Includes/Php/get_single_value_from_db.php";
$current_user_classes = $result;



$sql = "UPDATE user_classes SET ";
>
