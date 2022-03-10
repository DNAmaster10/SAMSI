<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";
	
    if ((!isset($_SESSION["current_class"]))) {
        header ("location: /Pages/Interface/Misc/class_not_selected.php");
    }
	
	$table_name = "class_data";
	$column_name = "owner";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	if ($result != $_SESSION["username"]) {
		header ("location: /Pages/Interface/");
	}
	
	#Get information entered by user about homework from browser 
	$title = $_POST["title"];
	$description = $_POST["description"];
	$due_date = $_POST["due_date"];
	$date_set = date("l jS \of F Y h:i:s A");
	
	#Add homework to homework database
	$sql = "INSERT INTO homework_data (title,description,class,teacher,due_date,date_set) VALUES ('".$title."','".$description."','".$_SESSION["current_class"]."','".$_SESSION["username"]."',
	'".$due_date."','".$date_set."')";
	
	#Get current user homework
	$table_name = "user_homework";
	$column_name = "homework";
	$where_column = "username";
	$where_value = $_SESSION["username"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$current_homework = $result;
	
	#Get homework ID from db
	$table_name = "homework_data";
	$column_name = "ID";
	$where_column = "title";
	$where_value = $title."') AND (due_date) = ('".$due_date .");";
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	$id = $result;
	
	#Get list of users to set homework for
	$table_name = "class_data";
	$column_name = "members";
	$where_column = "class";
	$where_value = $_SESSION["class"];
	include $file_path."/Includes/Php/get_single_value_from_db";
	$members = $result;
	
	#Check if users actually exist in the class
	$member_ammount = substr_count($members,',');
	if ($member_count == 0) {
        $continue = "no";
	}
	#Set homework for every user in class
	else {
        $members_array = explode(',', $members);
        for ($i = 0; $i <= $member_ammount - 2; $i++) {
            $table_name = "user_homework";
            $column_name = "homework";
            $where_column = "username";
            $where_value = $members_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $current_homework = $result;
            $new_homework = $current_homework.$title.",";
            $sql = "UPDATE user_homework SET homework='".$new_homework."' WHERE username='".$members_array[$i]."';";
            $table_name = "user_homework";
            $column_name = "ID";
            $where_column = "username";
            $where_value = $members_array[$i];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $current_homework_id = $result;
            $new_homework_id = $current_homework_id.$id.",";
            
        }
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
        <p>All done!</p>
        <form action="./class_home.php">
            <input type="submit" value="Class home page">
        </form>
    </body>
</html>
