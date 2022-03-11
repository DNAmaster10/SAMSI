<?php
	session_start();
    $text_output = "Hey ".$_SESSION["username"]."! Here's what you need to do today:";
    #setting everything up
    $continue = 1;
	$file_path = $_SERVER["DOCUMENT_ROOT"];
	$username = $_SESSION["username"];
	include "/var/www/html/Includes/Php/dbh.php";
	include "/var/www/html/Includes/Php/check_user_pass.php";
	include "/var/www/html/Includes/Php/get_user_theme.php";
	include "/var/www/html/Includes/Php/get_account_type.php";
	
	#Getting a list of the users homework
	$table_name = "user_homework";
	$column_name = "homework";
	$where_column = "username";
	$where_value = $_SESSION["username"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$id_string = $result;
	
	#Checking if the user has any homework set
	if ($id_string == "null") {
        $text_output = "You have no homework set";
        $continue = 0;
	}
	else {
        #Creating array of user homework and working out how much there is
        $homework_count = substr_count($id_string,',');
        $homework_array = explode(',', $id_string);
        
        #Getting list of homework ID's
        $table_name = "user_homework";
        $column_name = "ID";
        $where_column = "username";
        $where_value = $_SESSION["username"];
        include $file_path."/Includes/Php/get_single_value_from_db.php";
        $homework_id_string = $result;
        $homework_id_array = explode(',', $homework_id_string);
	}
	$current_homework = 0;
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAMSi</title>
        <link rel="stylesheet" href="/Includes/Css/Themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" href="/Includes/Css/main.css">
    </head>
    <body>
        <p><?php echo $text_output; ?></p>
        <form>
        </form>
        <?php
            for ($i = 0; $i <= $homework_count - 2; $i++) {
            $table_name = "homework_data";
            $column_name = "title";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_title = $result;
            
            $table_name = "homework_data";
            $column_name = "description";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_description = $result;
            
            $table_name = "homework_data";
            $column_name = "due_date";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_due_date = $result;
            
            $table_name = "homework_data";
            $column_name = "teacher";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_teacher = $result;
            
            $table_name = "homework_data";
            $column_name = "class";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_description = $result;
            
            $table_name = "homework_data";
            $column_name = "date_set";
            $where_column = "ID";
            $where_value = $homework_id_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $output_description = $result;
            
            echo "
            <h3>".$output_title."</h3>
            <p>Description: ".$output_description."</p>
            <p>Date due: ".$output_due_date."| Teacher: ".$output_teacher."| Date set: ".$date_set."|
            "; 
            }
        ?>
    </body>
</html>
