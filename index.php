<?php
    session_start();
    error_reporting(0);
    if (isset($_POST["login"])){
        if (isset($_POST["uname"]) and isset($_POST["passwd"])) {
            $uname = $_POST["uname"];
            $passwd = $_POST["passwd"];
            $akses = $_POST["akses"];

            if($akses == ""){
            	session_destroy();
            	header("location: ./?login=gagal");
            } elseif($akses == "dosen"){
	            include_once("./connector.php");
	            $login_query  = mysqli_query($GLOBALS["___mysqli_ston"], "select * from dosen where uname='$uname' and passwd='$passwd'");
	            $login_num_rows = mysqli_num_rows($login_query);
	            if ($login_num_rows > 0){
	                $login_fetch_array  = mysqli_fetch_array($login_query);
	                $_SESSION["HASHGURU"]  = md5(time());
	                $_SESSION["id"]     = $login_fetch_array["id_dosen"];
	                $_SESSION["nama"] = $login_fetch_array["nama"];
	                $_SESSION["uname"]  = $login_fetch_array["uname"];
	                ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	                header("location: ./guru/");
	            } else {
	                ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	                session_destroy();
	                header("location: ./?login=gagal");
	            }
            } elseif($akses == "mahasiswa"){
	            include_once("./connector.php");
	            $login_query  = mysqli_query($GLOBALS["___mysqli_ston"], "select * from mahasiswa where uname='$uname' and passwd='$passwd'");
	            $login_num_rows = mysqli_num_rows($login_query);
	            if ($login_num_rows > 0){
	                $login_fetch_array  = mysqli_fetch_array($login_query);
	                $_SESSION["HASHSISWA"]  = md5(time());
	                $_SESSION["id"]     = $login_fetch_array["id_mahasiswa"];
	                $_SESSION["nama"] = $login_fetch_array["nama"];
	                $_SESSION["uname"]  = $login_fetch_array["uname"];
	                ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	                header("location: ./siswa/");
	            } else {
	                ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	                session_destroy();
	                header("location: ./?login=gagal");
	            }
            } else {
            	session_destroy();
            	header("location: ./?login=gagal");
            }

        } else {
            session_destroy();
            header("location: ./?login=gagal");
        }      
    } else {
?>
	<!DOCTYPE html>
	<html lang="id">
		<head>
	       <meta charset="utf-8" />
	       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	       <meta name="viewport" content="width=device-width">
	       <meta name="robots" content="noindex, nofollow">
	       <title>e-Learning Informatika</title>
	       <link rel="stylesheet" type="text/css" href="./css/login.css">
           <link rel="shortcut icon" href="icon/icon.png">
		</head>
		<body>
			<div id="wrapper">
				<div id="login">
					<form action="./" method="post" enctype="multipart/form-data" />
						<input type="text" name="uname" placeholder="Username" />
						<input type="password" name="passwd" placeholder="Password" /><br>
						<input type="radio" name="akses" value="mahasiswa" checked id="radio">Mahasiswa</input><br>
						<input type="radio" name="akses" value="dosen" id="radio">Dosen</input><br>
						<input type="submit" name="login" id="button" value="Login" />
					</form>
					<?php
						if (isset($_GET["login"])){
							if ($_GET["login"] == 'gagal'){
								echo "<p id='gagal'>Login Gagal</p>";
							}
						}
					?>
				</div>
			</div>	
		</body>
	</html>
<?php
    }
?>