<?php 
session_start();

if (isset($_SESSION['uname'])) {
}

else header("Location:../index.php?error=Unauthorized Access");

$page = $_GET['page'];

include '../db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../favicon.ico">

  <title>Ana Sayfa</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="styles.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SYS | Stok Yönetim Sistemi</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Kullanıcı Adı : <?php echo $_SESSION['uname']; ?></a></li>
              <li><a href="#">Kullanıcı ID : <?php echo $_SESSION['uid']; ?></a></li>
              <li><a href="../cikis.php">Çıkış Yap</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li <?php if (!(isset($_GET['page']))) echo 'class="active"'; ?> ><a href="index.php">Ana Sayfa</a></li>
              <li <?php if ($page == "new_prod") echo 'class="active"'; ?> ><a href="index.php?page=new_prod">Stok Ekle</a></li>
              <li <?php if ($page == "view_prod") echo 'class="active"'; ?> ><a href="index.php?page=view_prod">Stokları Göster</a></li>
              <li <?php if ($page == "update_prod") echo 'class="active"'; ?> ><a href="index.php?page=update_prod">Stok Güncelle</a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li <?php if ($page == "new_wrk") echo 'class="active"'; ?> ><a href="index.php?page=new_wrk">Tedarikçi Ekle</a></li>
              <li <?php if ($page == "view_wrk") echo 'class="active"'; ?> ><a href="index.php?page=view_wrk">Tedarikçileri Göster</a></li>
              <li <?php if ($page == "update_wrk") echo 'class="active"'; ?> ><a href="index.php?page=update_wrk">Tedarikçi Bilgilerini Güncelle</a></li>
            </ul>

          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">
              <?php 
              switch ($page) {
                case 'new_prod':
                echo 'Stok Ekle</h1>';
                include 'stok_ekle.php';
                break;
                case 'view_prod':
                echo 'Stokları Görüntüle</h1>';
                include 'stok_gor.php';
                break;
                case 'update_prod':
                echo 'Stokları Güncelle</h1>';
                include 'stok_guncelle.php';
                break;
                case 'new_wrk':
                echo 'Tedarikçi Ekle</h1>';
                include 'ted_ekle.php';
                break;
                case 'view_wrk':
                echo 'Tedarikçileri Göster</h1>';
                include 'ted_gor.php';
                break;
                case 'update_wrk':
                echo "Tedarikçi Bilgilerini Güncelle</h1>";
                include 'ted_guncelle.php';
                break;
                default:
                echo 'Tedarikçi Paneli</h1>';
                include 'ted_panel.php';                break;
              }
              ?>
            






          </div>
        </div>
      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
