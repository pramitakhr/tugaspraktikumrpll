<?php
	$db_server	= "localhost";
	$db_username	= "root";
	$db_password	= "";
	$db_database	= "e-learn";
	($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server, $db_username, $db_password, $db_database)) or die("Server Connection Error");
?>
