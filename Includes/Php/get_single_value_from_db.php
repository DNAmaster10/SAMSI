<?php
#Variables needed "$table_name", "$column_name", "$where_column" and "$where_value"
#Outputs value as "$result"
$sql = "SELECT ".$column_name." FROM ".$table_name." WHERE ".$where_column."='".$where_value."';";
$raw_result = mysqli_query($conn, $sql);
$result = ($raw_result["isAdmin"]);
if (result == "yes") {
    $is_admin = (true);
}
?>