<?php session_start();
include "control/konek.php";

if(isset($_POST['submit'])) 
{
  $errors   = array();
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  if(empty($email) && empty($password)) 
  {
    echo "<script language='javascript'>alert('Isikan USERNAME dan PASSWORD'); location.replace('index.php')</script>";
  }
  elseif(empty($email))
  {              
    echo "<script language='javascript'>alert('Isikan USERNAME'); location.replace('index.php')</script>";
  } 
  elseif(empty($password)) 
  {
    echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('index.php')</script>";
  }
  
  $sql    = "SELECT * FROM login WHERE email = '$email' ";
  $result = mysqli_query($conn, $sql);
  $data   = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0)
  {
    if(password_verify($password, $data['password']))
    {
      if(empty($errors))
      {
        // Menyimpan session login
        $_SESSION['id']    = $data['id'];   // id user
        $_SESSION['email']   = $data['email'];      // nama user
        $_SESSION['nama']   = $data['nama']; 
        $_SESSION['password']   = $data['password']; 

          echo "<script language='javascript'>alert('Anda berhasil Login sebagai pengguna aplikasi ini'); location.replace('home.php')</script>";
      }
  
      else
      {
        echo "<script>alert('PASSWORD SALAH!');history.go(-1)</script>";
      }
  }
    else
    {
      echo "<script>alert('USERNAME yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
    }
  }

}

  else
  {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
  } 



?>