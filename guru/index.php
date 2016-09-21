<?php
    session_start();
    ob_start();
    error_reporting(0);
    if (isset($_SESSION["HASHGURU"])){
		header("location: modul.php?halaman=beranda");
	} else {
		header("location: ../");
	}
?>