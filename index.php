<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>
      <?php
      @$p = $_GET['page'];
         if(!empty($p)){
         if($p == 'home'){
           echo "Halaman Beranda";
            }else if($p == 'data_pokok'){
             echo "Halaman Data Pokok";
            }else if($p == 'rute_smp'){
             echo "Halaman Rute SMP";
            }else if($p == 'info_lokasi_smp'){
             echo "Halaman Info Lokasi SMP";
            }else if($p == 'contact'){
       echo "Halaman Contact";
       }

       }else if($p == 'login'){
       echo "Halaman Login";
       }else{
       echo "Halaman Beranda";
       }
       ?>


    </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistem Informasi Geografis SMP di Kota Semarang</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
       
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="?page=home">Beranda</a></li>
            <li><a href="?page=data_pokok">Data Pokok</a></li>
            <li><a href="?page=rute_smp">Rute SMP</a></li>
            <li><a href="?page=info_lokasi_smp">Info lokasi SMP</a></li>
            <li><a href="?page=contact">Contact</a></li>
             <li><a href="login.php">Login</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    <?php
      @$page = $_GET['page'];

      if(!empty($page)){

      switch ($page) {
      case 'home':
      include "page/home.php";
      break;

      case 'data_pokok';
      include "page/data_pokok.php";
      break;

      case 'rute_smp';
      include "page/rute_smp.php";
      break;

      case 'info_lokasi_smp';
      include "page/info_lokasi_smp.php";
      break;

      case 'contact';
      include "page/contact.php";
      break;

      case 'login';
      include "login.php";
      break;

      default:
      include "page/home.php";
      break;
      }

      }else {
        include "page/home.php";

      }
    ?>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
</html>
