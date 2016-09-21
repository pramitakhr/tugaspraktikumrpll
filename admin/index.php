<?php
    session_start();
    error_reporting(0);
    if (isset($_SESSION["HASH1337"])){
        header("location: ./modul.php?halaman=beranda");
    }
    if (isset($_POST["login"])){
        if (isset($_POST["uname"]) and isset($_POST["passwd"])) {
            $uname = $_POST["uname"];
            $passwd = md5($_POST["passwd"]);
            include_once("../connector.php");
            $login_query  = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname' and passwd='$passwd'");
            $login_num_rows = mysqli_num_rows($login_query);
            if ($login_num_rows > 0){
                $login_fetch_array  = mysqli_fetch_array($login_query);
                $_SESSION["HASH1337"]  = md5(time());
                $_SESSION["id"]     = $login_fetch_array["id_admin"];
                $_SESSION["nama"] = $login_fetch_array["nama"];
                $_SESSION["uname"]  = $login_fetch_array["uname"];
                ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
                header("location: ./modul.php?halaman=beranda");
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
?>
    <!DOCTYPE html>
    <html lang="id">
        <head>
           <meta charset="utf-8" />
           <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
           <meta name="viewport" content="width=device-width">
           <meta name="robots" content="noindex, nofollow">
           <title>e-Learning Informatika ADMIN</title>
           <link rel="stylesheet" type="text/css" href="./css/login.css">
           <link rel="shortcut icon" href="icon/icon.png">
        </head>
        <body>
            <div id="wrapper">
                <div id="login">
                    <form action="./" method="post" enctype="multipart/form-data" />
                        <input type="text" name="uname" placeholder="Username" />
                        <input type="password" name="passwd" placeholder="Password" />
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