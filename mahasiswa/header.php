<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM PENDUKUNG KEPUTUSAN PENERIMA KIPK</title>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">  
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['status'] != "mahasiswa"){
    header("location:../index.php?alert=belum_login");
  }
  ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><b>KIPK</b> POLIWANGI </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
             <li><a href="../index.php">HALAMAN AWAL</a></li> 
             <!-- <li><a href="kriteria.php">KRITERIA</a></li> -->
             <li><a href="daftar_beasiswa.php">DAFTAR KIPK</a></li>
             <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
           </ul>           
         </div>
         <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">             
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">               
                <?php 
                $x = $_SESSION['id'];
                $ad = mysqli_query($koneksi,"SELECT * FROM mahasiswa where mahasiswa_id='$x'");
                $aa = mysqli_fetch_assoc($ad);
                ?>                
                
                <?php 
                if($aa['mahasiswa_foto']==""){
                   ?><img src="../gambar/default_user.png" class="user-image"><?php
                }else{
                  ?><img src="../gambar/<?php echo $aa['mahasiswa_foto']; ?>" class="user-image"><?php
                }
                ?>                
                <span class="hidden-xs">NAMA : <?php echo $aa['mahasiswa_nama'];?></span> 
              </a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> KELUAR</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>