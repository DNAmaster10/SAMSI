<?php
	#Setting everything up
	session_start();
    $continue = 1;
	$file_path = $_SERVER["DOCUMENT_ROOT"];
	$username = $_SESSION["username"];
	include $file_path."/Includes/Php/dbh.php";
	include $file_path."/Includes/Php/check_user_pass.php";
	
	#Check if POST variables are set, if not show error
	if (isset($_POST["homework_id"])) {
        #filter bad POST
        $homework_post_id = $conn -> real_escape_string($_POST["homework_id"]);
        
		#Get all of users set homework ID's
		$table_name = "user_homework";
		$column_name = "ID";
		$where_column = "username";
		$where_value = $_SESSION["username"];
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$id_string = $result;
		
		#Remove homework from their list
		$new_id_string = str_replace($homework_post_id.",","",$id_string);
		$sql = "UPDATE user_homework SET ID='".$new_id_string."' WHERE username='".$_SESSION["username"]."';";
		mysqli_query($conn,$sql) or die (mysqli_error($conn));
		
		#Add homework to their completed_id list
		$table_name = "user_homework";
		$column_name = "completed_id";
		$where_column = "username";
		$where_value = $_SESSION["username"];
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$completed_id_string = $result;
		$new_completed_id_string = $completed_id_string.$homework_post_id.",";
		$sql = "UPDATE user_homework SET completed_id='$new_completed_id_string' WHERE username='".$_SESSION["username"]."';";
		mysqli_query($conn, $sql) or die (mysqli_error($conn));
		
		#Find out name of the homework
		$table_name = "homework_data";
		$column_name = "title";
		$where_column = "ID";
		$where_value = $homework_post_id;
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$homework_title = $result;
		
		$table_name = "user_homework";
		$column_name = "homework";
		$where_column = "username";
		$where_value = $_SESSION["username"];
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$new_homework_list = str_replace($homework_title.",","",$result);
		$sql = "UPDATE user_homework SET homework='$new_homework_list' WHERE username='".$_SESSION["username"]."';";
		mysqli_query($conn,$sql) or die (mysqli_error($conn));
		
		#Add user to completion list in homework data
		$table_name = "homework_data";
		$column_name = "completed";
		$where_column = "ID";
		$where_value = $homework_post_id;
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$completed_users_string = $result;
		if ($completed_users_string == "null") {
            $new_completed_users = $_SESSION["username"].",";
		}
		else {
            $new_completed_users = $completed_users_string.$_SESSION["username"].",";
		}
		$sql = "UPDATE user_homework SET completed='$new_completed_users' WHERE ID='homework_post_id'";
		mysqli_query($conn,$sql) or die (mysqli_error($conn));

		$table_name = "homework_data";
		$column_name = "not_complete";
		$where_column = "ID";
		$where_value = $homework_post_id;
		include $file_path."/Includes/Php/get_single_value_from_db.php";
		$current_not_complete = $result;
		$new_not_complete = str_replace($_SESSION["username"].",","",$current_not_complete);
		$sql = "UPDATE homework_data SET not_complete='$new_not_complete' WHERE ID='$homework_post_id';";
		mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header ("location: ./view_homework.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SAMSi</title>
	</head>
	<body>
		<p>An error occured. Has that homework already been removed from the database?</p>
		<form action="./view_homework.php">
			<input type="submit" value="Back">
		</form>
	</body>
</html>
