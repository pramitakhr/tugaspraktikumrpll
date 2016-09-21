<?php
    session_start();
    ob_start();
    error_reporting(0);
    if (isset($_SESSION["HASH1337"])){
        require_once("../connector.php");
?>
         <!DOCTYPE html>
         <html lang="id">
            <head>
               <meta charset="utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
               <meta name="viewport" content="width=device-width">
               <meta name="robots" content="noindex, nofollow">
               <title>e-Learning Informatika</title>
               <link rel="stylesheet" type="text/css" href="./css/bootmetro.css">
               <link rel="stylesheet" type="text/css" href="./css/semilight.css">
               <link rel="stylesheet" type="text/css" href="./css/icomoon.css">
               <link rel="stylesheet" type="text/css" href="./css/table.css">
               <link rel="stylesheet" type="text/css" href="./css/app.css">
               <link rel="shortcut icon" href="icon/icon.png">
            </head>
            <body data-accent="blue">
               <header id="nav-bar" class="container-fluid">
                  <div class="row-fluid">
                     <div class="span9">
                        <div id="header-container">
                           <h3 style="color: rgb(36, 160, 218);">Admin Panel</h3>
                           <h4>Teknik Informatika, UIN Sunan Gunung Djati Bandung</h4>
                        </div>
                     </div>
                     <div id="top-info" class="pull-right">
                     <a href="#" class="pull-left">
                        <div class="top-info-block">
                           <h3 style="color: rgb(36, 160, 218); text-align: right"><?php echo ucfirst($_SESSION['uname']); ?></h3>
                           <h4 style="color: rgb(36, 160, 218); text-align: right"><?php echo ucfirst($_SESSION['nama']); ?></h4>
                        </div>
                        <div class="top-info-block">
                           <b class="icon-user" style="color: rgb(36, 160, 218);"></b>
                        </div>
                     </a>
                  </div>
               </div>
               </header>
               <div class="container-fluid">
                  <div class="subnav">
                     <ul class="nav nav-pills">
                        <li><a href="?halaman=beranda">Beranda</a></li>
                        <li><a href="?halaman=admin">Data Admin</a></li>
                        <li><a href="?halaman=guru">Data Dosen</a></li>
                        <li><a href="?halaman=kelas">Data Kelas</a></li>
                        <li><a href="?halaman=mapel">Data Mata Kuliah</a></li>                        
                        <li><a href="?halaman=siswa">Data Mahasiswa</a></li>
                        <li><a href="?halaman=file">Data File</a></li>
                        <li class="pull-right"><a href="?halaman=keluar">Keluar</a></li>
                     </ul>
                  </div>
               </div>
               <div class="container-fluid" style="margin-bottom: -70px">
                  <div class="row-fluid" style="margin-top: 30px; margin-bottom: 30px; min-height: 400px">
                    <?php
                        if (isset($_GET["halaman"])){
                            $halaman = $_GET["halaman"];
                            if ($halaman == "beranda"){
                                require_once("beranda.php");                            
                            } elseif ($halaman == 'admin') {
                                require_once("admin.php");
                            }elseif ($halaman == 'guru') {
                                require_once("guru.php");
                            }elseif ($halaman == 'siswa') {
                                require_once("siswa.php");
                            }elseif ($halaman == 'file') {
                                require_once("file.php"); 
                            }elseif ($halaman  == 'mapel') {
                                require_once ("mapel.php");
                            }elseif ($halaman == 'kelas') {
                                require_once ("kelas.php");      
                            }elseif ($halaman == "keluar"){
                                session_destroy();
                                header("location: ../");
                            } else {
                                header("location: ./modul.php?halaman=beranda");
                            }
                        } else {
                            header("location: ./modul.php?halaman=beranda");
                        }
                        echo "\n";
                    ?>
                  </div>
                  <p>
                    Copyright &copy; 2016 - All Rights Reserved<br>
                    Muhammad Ridlo Alimudin<br><a href="http://google.com/">Free Template</a>
                    <span style="color: rgb(36, 160, 218);">e-Learning, Teknik Informatika, UIN Sunan Gunung Djati Bandung</span>
                  </p>
               </div>
               <script type="text/javascript" src="./js/jquery.js"></script>
               <script type="text/javascript" src="./js/bootmetro.js"></script>
               <script type="text/javascript" src="./js/table.js"></script>
               <script type="text/javascript">
                  $(document).ready(function(){
                    $(".dataTable").dataTable({
                      "oLanguage": {
                            "sSearch": "",
                            "sLengthMenu": "<a class='btn' href='?halaman=<?php echo $halaman; ?>&mode=tambah' style='padding: 1px 10px; margin-top:-10px'>Tambah Data</a> _MENU_",
                            "sZeroRecords": "Data Tidak Ditemukan",
                            "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Item",
                            "sInfoEmpty": "Menampilkan 0 - 0 Dari 0 Item",
                            "sInfoFiltered": "",
                          "oPaginate": {
                          "sPrevious": "",
                          "sNext":     ""
                        }
                      }
                    });
                  })
               </script>
            </body>
         </html>
<?php
      ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
    } else {
        header("location: ./");
    }
?>
