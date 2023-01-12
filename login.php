<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seleksi Penerimaan Beasiswa PPA</title>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">  
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <!-- <a href="#"><img src="gambar/logo.png"></a> -->
    </div>  
    <?php 
    if(isset($_GET['alert'])){
      if($_GET['alert']=='gagal'){
        ?>
        <div class="alert alert-warning text-center alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>        
          Username Atau Password Salah
        </div>      
        <?php
      }elseif($_GET['alert']=="belum_login"){
        ?> 
        <div class="alert alert-danger text-center alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>        
          Silahkan Login Terlebih Dahulu 
        </div>       
        <?php
      }elseif($_GET['alert']=="logout"){
        ?> 
        <div class="alert alert-danger text-center alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>        
          Anda Sudah Berhasil Logout 
        </div>      
        <?php
      }
    }
    ?>

    <div class="login-box-body">      
      <p class="login-box-msg">Login Admin</p>
      <form action="login_act.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">            
          <div class="col-xs-12">
            <input type="submit" name="login" class="btn btn-primary btn-block btn-flat" value="LOGIN">          
          </div>      
        </div>
      </form>  
      <br>
      <a href="index.php"><i class="fa fa-long-arrow-left"> Kembali</i></a>     
    </div>
  </div>
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
