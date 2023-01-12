<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM PENDUKUNG KEPUTUSAN PENERIMA BEASISWA PPA</title>  
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
  if($_SESSION['status'] != "admin"){
    header("location:../login.php?alert=belum_login");
  }
  ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><b>KIPK POLIWANGI</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">DASHBOARD <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">DATA MASTER <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                 <li><a href="periode.php"> PERIODE BEASISWA</a></li>
                 <li><a href="kriteria.php"> KRITERIA</a></li>
                 <li><a href="mahasiswa.php"> MAHASISWA</a></li>
               </ul>
             </li>
             <li><a href="seleksi.php">ANALISA</a></li>
             <!-- <li><a href="wp.php">WP</a></li> -->
             <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
           </ul>           
         </div>
         <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">             
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">               
                <?php 
                $x = $_SESSION['id'];
                $ad = mysqli_query($koneksi,"SELECT * FROM admin where admin_id='$x'");
                $aa = mysqli_fetch_assoc($ad);
                ?>                
                <img src="../gambar/<?php echo $aa['admin_foto']; ?>" class="user-image">                 
                <span class="hidden-xs">NAMA : <?php echo $aa['admin_nama'];?></span> 
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