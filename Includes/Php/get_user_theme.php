<?php
$sql = "SELECT theme FROM themes WHERE username=('".$username."');";
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

$theme = $result;
unset($result);
