<?php session_start();
date_default_timezone_set("Asia/Ujung_Pandang");
include 'control/konek.php';             // Panggil koneksi ke database
// include 'control/sms-konek.php';
include 'control/cek-login.php';    // Panggil fungsi cek sudah login/belum
include 'control/cek-session.php';
include 'control/tgl.php';
// include 'control/ulangtahun.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Goceng</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


  <script src="bower_components/jquery/dist/jquery-2.2.4.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="view/page/rombonganbelajar/process.js"></script>
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- <script src="//cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script> -->
  <script src="bower_components/ckeditor/ckeditor.js"></script>
  <!-- <script src="bower_components/ckeditor/ckfinder.js"></script> -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
  <!-- Slimscroll -->

   <script src="plugins/iCheck/icheck.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" bgcolor="grey">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b><?=$sesen_nama?></b></span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Goceng</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="image/admin.png" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="image/admin.png" class="img-circle" alt="User Image"><br>
                <span class="hidden-xs"><?=$sesen_nama?></span>

                
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="image/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$sesen_nama?></p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li><a href="?page=beranda"><i class="fa fa-home"></i> <span>Beranda</span></a></li>     
      <li><a href="?page=kas-masuk"><i class="fa fa-bank"></i> <span>Kas Masuk</span></a></li>
      <li><a href="?page=kas-keluar"><i class="fa fa-bank"></i> <span>Kas Keluar</span></a></li>
      <li><a href="?page=laporan-kas-masuk"><i class="fa fa-calendar"></i> <span>Laporan Kas Masuk</span></a></li> 
      <li><a href="?page=laporan-kas-keluar"><i class="fa fa-calendar"></i> <span>Laporan Kas Keluar</span></a></li>
      <li><a href="?page=laporan-rekapitulasi"><i class="fa fa-calendar"></i> <span>Laporan Rekapitulasi</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
          <div id="page-wrapper" >
              <div id="page-inner">
                <div class="row">
                  <div class="col-md-12">

                      <?php
                      
                      include 'control/control.php';
                    ?>

                  </div>
                    <!-- /. ROW  -->
                  </div>
                <!-- /. PAGE INNER  -->
              </div>
            </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
 
    <strong>Copyright &copy; 2020 <a href="">Goceng</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
</body>
</html>
