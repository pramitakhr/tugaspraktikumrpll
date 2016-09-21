<?php
    session_start();
    error_reporting(0);
    if (isset($_SESSION["HASHGURU"])){
		require_once("../connector.php");
?>

<!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	
	<title>Halaman Dosen</title>
	
	<meta name="description" content="">
	<meta name="author" content="">	
	
	<link rel="icon" type="../image/png" href="images/favicon.png">
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
           <link rel="shortcut icon" href="../icon/icon.png">

	<!-- HTML5 Shiv -->
	<script type="text/javascript" src="../js/modernizr.custom.js"></script>
</head>
<body class="style-1">
	
<div class="wrap-header"></div><!--/ .wrap-header-->

<div class="wrap">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header" class="clearfix">
		
		<a href="?halaman=beranda" id="logo"><img src="../images/logo.png" alt="" title="Logo" /></a>
		<nav id="navigation" class="navigation">
			
			<ul>
				<li><a href="?halaman=beranda">Beranda</a></li>
				<li><a href="?halaman=data">Data File</a></li>
			</ul>
			
			<a href="?halaman=keluar" class="donate">Keluar</a>
			
		</nav><!--/ #navigation-->
		
	</header><!--/ #header-->
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
	
	
	<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	
	
	<section class="container clearfix">
		
		<!-- - - - - - - - - - Page Header - - - - - - - - - - -->	
		
		<!--/ .page-header-->
		
		<!-- - - - - - - - - end Page Header - - - - - - - - - -->	
		<!-- - - - - - - - - - - - - - - Elements - - - - - - - - - - - - - - - - -->		
		
		<?php
            if (isset($_GET["halaman"])){
                $halaman = $_GET["halaman"];
                if ($halaman == "beranda"){
                    require_once("beranda.php");                            
                }elseif ($halaman == 'data') {
                    require_once("data.php");
                }elseif ($halaman == 'upload') {
                    require_once("upload.php");                
                }elseif ($halaman == 'upload_tugas') {
                    require_once("upload_tugas.php");                
                }elseif ($halaman == "keluar"){
                    session_destroy();
                    header("location: ../");
                } else {
                    header("location: ./modul.php?halaman=beranda");
                }
            } else {
                header("location: ../");
            }
            echo "\n";
        ?>
		<!-- - - - - - - - - - - - - - end Elements - - - - - - - - - - - - - - - -->			
		
	</section><!--/.container -->
		
	<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->	
	
	
				
			<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
			
			<footer id="footer" class="container clearfix">	
				<!-- <div class="clear"></div> -->
				
				<ul class="copyright">
					
                    <li>Template From Internet</li>
					<li><a href="#">e-Learning Informatika UIN Sunan Gunung Djati Bandung</a></li>
					<li>Dibuat Oleh Muhammad Ridlo Alimudin</li>
                  <li>Copyright &copy; 2016</li>
					
				</ul><!--/ .copyright-->
			
			</footer><!--/ #footer-->
			
			<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
			
		</div><!--/ .wrap-->
	

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>	
		<script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>
		<!--[if lt IE 9]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
			<script src="js/ie.js"></script>
		<![endif]-->
		<script src="../js/custom.js"></script>
		<script type="text/javascript">
          function getMapel(id)
          {
            if (id=="")
            {
              document.getElementById("kelas").innerHTML="";
              return;
            }
            if (window.XMLHttpRequest)
            {
              xmlhttp=new XMLHttpRequest();
            }
            else
            {
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("kelas").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","./get_kelas.php?key="+id,true);
            xmlhttp.send();
          }
        </script>
	</body>
</html>
<?php
      ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
    } else {
        header("location: ./");
    }
?>
