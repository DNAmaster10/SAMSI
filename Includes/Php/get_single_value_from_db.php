<?php
#Variables needed "$table_name", "$column_name", "$where_column" and "$where_value"
#Outputs value as "$result"
$sql = "SELECT ".$column_name." FROM ".$table_name." WHERE ".$where_column."='".$where_value."';";
$raw_result = mysqli_query($conn, $sql);
if ($raw_result->num_rows > 0) {
	$row = $raw_result->fetch_assoc()
	$result = $row[$column_name];
	unset($row);
	unset($raw_result);
}
else {
	$result = "null";
}
?>