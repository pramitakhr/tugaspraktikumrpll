
<?php
	require_once("../connector.php");
	mysqli_query($GLOBALS["___mysqli_ston"], "delete from modul where id_data = '$_GET[id]'");
	$file = unlink("../admin/data/".$_GET['modul']);
	header("location: ./modul.php?halaman=data")
?>