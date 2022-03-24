<?php
	session_start();
	if (!isset($_SESSION["message_ammount"])) {
		$_SESSION["message_ammount"] = 10;
		echo $_SESSION["message_ammount"];
	}
	else {
		$_SESSION["message_ammount"] = $_SESSION["message_ammount"] + 10;
		echo $_SESSION["message_ammount"];
	}
?>