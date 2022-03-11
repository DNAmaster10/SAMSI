<?php
    $text_output = "All done!";
    $continue = 0;
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
		header ("location: /Pages/Interface/Misc/not_owner_of_class.php");
	}
	
	#Get information entered by user about homework from browser
    $title = $_POST["title"];
	$description = $_POST["description"];
	$due_date = $_POST["due_date"];
	$date_set = date("l jS \of F Y h:i:s A");
	
	#Add homework to homework database
	$sql = "INSERT INTO homework_data (title,description,class,teacher,due_date,date_set) VALUES ('".$title."','".$description."','".$_SESSION["current_class"]."','".$_SESSION["username"]."',
	'".$due_date."','".$date_set."');";
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	
	#Get homework ID from db	
	$sql = "SELECT ID FROM homework_data WHERE title='".$title."' AND teacher='".$_SESSION["username"]."'";
	$raw_result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	if ($raw_result->num_rows > 0) {
		$row = $raw_result->fetch_assoc();
		$result = $row[$column_name];
		unset($row);
		unset($raw_result);
	}
	else {
		$result = "null";
	}
	$ident = (string) $result;
	
	#Get list of users to set homework for
	$table_name = "class_data";
	$column_name = "members";
	$where_column = "class";
	$where_value = $_SESSION["current_class"];
	include $file_path."/Includes/Php/get_single_value_from_db.php";
	if ($result == "null") {
        $text_output = "There are no members in this class.";
        $continue = 0;
    }
	$members = $result;
	
	#Check if users actually exist in the class
	$member_ammount = substr_count($members,',');
	if ($member_ammount == 0) {
        $continue = 0;
	}
	#Set homework for every user in class
	else {
        $members_array = explode(',', $members);
        $student_number = 0;
        for ($i = 0; $i <= $member_ammount - 2; $i++) {
            #Add the homework title
            $table_name = "user_homework";
            $column_name = "homework";
            $where_column = "username";
            $where_value = $members_array[$student_number];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $current_homework = $result;
			
            $new_homework = $current_homework.$title.",";
            $sql = "UPDATE user_homework SET homework='".$new_homework."' WHERE username='".$members_array[$student_number]."';";
            mysqli_query($conn,$sql);
			#Add the homework ID
            $table_name = "user_homework";
            $column_name = "ID";
            $where_column = "username";
            $where_value = $members_array[$student_number];
            include $file_path."/Includes/Php/get_single_value_from_db.php";
            $current_homework_id = $result;
			
            $new_homework_id = $current_homework_id.$ident.",";
            $sql = "UPDATE user_homework SET ID='".$new_homework_id."' WHERE username='".$members_array[$student_number]."';";
            mysqli_query($conn, $sql) or die (mysqli_error($conn));
            $student_number = $student_number + 1;
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
        <p><?php echo $text_output ?></p>
        <form action="./class_home.php">
            <input type="submit" value="Class home page">
        </form>
		<?php echo $ident; ?>
    </body>
</html>
