<?php
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."baglanti.php");
define("SITE",$siteURL."admin/");
define("ANASITE",$siteURL);
if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]))
{
}
else
{
	?>
    <meta http-equiv="refresh" content="0;url=<?=SITE?>giris-yap">
    <?php
	exit();
}
?>
<!DOCTYPE html>
<html data-url="<?=SITE?>" data-anaurl="<?=ANASITE?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$sitebaslik?></title>
  <meta http-equiv="keywords" content="<?=$siteanahtar?>">
  <meta http-equiv="description" content="<?=$siteaciklama?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=SITE?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=SITE?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=SITE?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=SITE?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=SITE?>dropzone/dropzone.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=SITE?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=SITE?>plugins/chart.js/Chart.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <?php
 include_once(DATA."ust.php");
 include_once(DATA."menu.php");
 
 if($_GET && !empty($_GET["sayfa"]))
 {
	 $sayfa=$_GET["sayfa"].".php";
	 if(file_exists(SAYFA.$sayfa))
	 {
		 include_once(SAYFA.$sayfa);
	 }
	 else
	 {
		 include_once(SAYFA."home.php");
	 }
	 
 }
 else
 {
	 include_once(SAYFA."home.php");
 }
 
 
 include_once(DATA."footer.php");
 ?>
 
 
 
 
 
 
 
  
</div>
<!-- ./wrapper -->

<!-- Sparkline -->
<script src="<?=SITE?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=SITE?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=SITE?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=SITE?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=SITE?>plugins/moment/moment.min.js"></script>
<script src="<?=SITE?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=SITE?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=SITE?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=SITE?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?=SITE?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SITE?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?=SITE?>plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=SITE?>dist/js/pages/dashboard.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=SITE?>dist/js/demo.js"></script>
<script src="<?=SITE?>dropzone/dropzone.js"></script>
<script src="<?=SITE?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=SITE?>dist/js/sistem.js"></script>
</body>
</html>
