<?php
    $file_path = $_SERVER["DOCUMENT_ROOT"];
	include $file_path."/Includes/Php/dbh.php";
	$username_entry = $conn -> real_escape_string($_POST["username_entry"]);
	if ($username_entry == "") {
		echo "";
	}
	else{
		$sql = "SELECT username FROM users WHERE username LIKE '".$username_entry."%' LIMIT 5;";
		$raw_result = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
        if ($raw_result -> num_rows > 0) {
            while ($row = mysqli_fetch_array($raw_result)){
				echo "<button type='button' value='".$row['username']."' onclick=addUser(this.value)>".$row['username']."</button><br>";
            }
        }
        else {
            echo "null";
        }
	}
?>