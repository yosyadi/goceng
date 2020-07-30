<?php
        include 'control/konek.php';
        
        if(isset($_POST['register'])) {
         
      
        $nama =$_POST['nama'];
        $telpon =$_POST['telpon'];  
        $email = $_POST['email'];       
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);  // enkripsi password
          
            $query = "INSERT INTO signup VALUES ( '', '$nama', '$telpon', '$email', '$password')";
            $queri = "INSERT INTO login VALUES ( '', '$email', '$password', '$nama')";
            $input = mysqli_query($conn, $query);
            $masuk = mysqli_query($conn, $queri);
            if(!$input) {
                die ("query gagal dijalankan: ".mysqli_errno($conn). " - ".mysqli_error($conn));
            }
            if(!$masuk) {
            	 die ("query gagal dijalankan: ".mysqli_errno($conn). " - ".mysqli_error($conn));
            }
          header("location:index.php");
        } 

    
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HALAMAN REGISTRASI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="/himatika/admin/plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
   <body  class="hold-transition login-page" style="background:white;">
   <div class="login-box">
      <div align="center">
        <h2 class="teks"><b>REGISTRASI</b></h2>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="user image" align="center"><img src="image/admin.png"></div>
    </div>
</div>
    <div class="container">
      <h2 class="alert alert-primary text-center ">FORMULIR PENDAFTARAN PENGGUNA GOCENG</h2>

      <form action="" method="post">
      			
        <div class="form-group">           
              <label>Nama lengkap</label> 
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama lengkap anda">        
        </div>
         <div class="form-group">           
              <label>Nomor Telepon</label> 
            <input type="text" name="telpon" id="telpon" class="form-control" placeholder="Masukan nama lengkap anda">        
        </div>
        <div class="form-group">           
              <label>Email/USERNAME</label> 
            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan email anda">        
        </div>
        <div class="form-group">           
              <label>password</label> 
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password anda"> 
            <small>password harus terdiri dari angka dan huruf minimal 6 karakter</small>       
        </div> 
        
      
    </div> <br>

           <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
              <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Registrasi</button><br>
              <button type="reset" name="reset" class="btn btn-danger btn-block btn-flat">Reset</button><br>
            </div><!-- /.col -->
          </div>
        </form>
       
    <br><br>

     <nav class="navbar navbar-e-lg navbar-light bg-info fixed-buttom text-white" id="mainNav"><center><b>
	Copyright 2020 goceng menghemat uang | All Rights Reserved | Site Map | Privacy Policy | Redaksi | Pedoman Siber</b></center></nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="bower_components/iCheck/icheck.min.js"></script>

  </body>
</html>