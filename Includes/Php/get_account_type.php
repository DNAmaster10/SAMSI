<?php
$username = $_SESSION["username"];
$sql = "SELECT account_type FROM users WHERE username = ('".$username."');";
$raw_result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if ($raw_result->num_rows > 0) {
	$row = $raw_result->fetch_assoc();
	$account_type = $row["account_type"];
	unset($row);
	unset($raw_result);
}
else {
	$account_type = "null";
}

