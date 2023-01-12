<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <h1>
       GANTI PASSWORD
       <small>Ganti Password :</small>
     </h1>
     <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ganti Password</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-14">
        <div class="box">
          <div class="box-header">
            <?php 
            if(isset($_GET['alert'])){
              if($_GET['alert'] == "sukses"){
                echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
              }
            }
            ?>

           <h3 class="box-title">Ganti Password</h3>
         </div>
         <div class="box-body">
           <form action="gantipassword_act.php" method="post">
            <div class="form-group">
              <label>Masukkan Password Baru</label>
              <input type="password" class="form-control" name="password" required="required" min="5">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
            </div>
          </form>
        </div>              
      </div>
    </div>
  </div>
</section>
</div>  
</div>
<?php include 'footer.php'; ?>