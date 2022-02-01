<?php
$sql = "INSERT INTO "$table_name" ("$columns") VALUES ("$values");";
mysqli_query ($conn, $sql);
