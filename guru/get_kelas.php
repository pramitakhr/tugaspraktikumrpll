<?php
	session_start();
	$key=$_GET["key"];
	require_once("../connector.php");
	$sql="select id_kelas, nm_kelas from vmapel where id_dosen = '$_SESSION[id]' and id_mapel = '$key'";
	$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	echo "<option value=\"\"></option>";
	while($row = mysqli_fetch_array($result)){
		echo "<option value=\"$row[id_kelas]\">$row[nm_kelas]</option>";
	}
	((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
