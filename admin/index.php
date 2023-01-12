<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <h1>
        SELAMAT DATANG
        <!-- <small>Pemberitahuan :</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-14">
          <div class="box">

            <?php 
            $id = $_SESSION['id'];
            $cek_data = mysqli_query($koneksi,"select * from admin where admin_id='$id'");
            $cd = mysqli_fetch_assoc($cek_data);
            if($cd['admin_foto']==""){
              echo "<div class='alert alert-warning text-center'>Data Anda Belum Lengkap.</div>";
            }else{

            }
            ?>

            <div class="box-body">
              <div class="row">

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <?php 
                      $kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria");
                      ?>
                      <h3><?php echo mysqli_num_rows($kriteria); ?></h3>
                      <p>Jumlah Kriteria</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="kriteria.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <?php 
                      $mahasiswa = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
                      ?>
                      <h3><?php echo mysqli_num_rows($mahasiswa); ?></h3>
                      <p>Jumlah Mahasiswa</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                    <a href="mahasiswa.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <?php 
                      $periode = mysqli_query($koneksi,"SELECT * FROM periode");
                      ?>
                      <h3><?php echo mysqli_num_rows($periode); ?></h3>
                      <p>Jumlah Periode Pendaftaran</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                    <a href="periode.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
               <?php if($aa['admin_foto']!="" && file_exists("../gambar/".$aa['admin_foto'])){ ?>
                <img style="width: 100%;height: auto;" src="../gambar/<?php echo $aa['admin_foto']; ?>" class="thumbnail">
              <?php }else{ ?>
                <img style="width: 100%;height: auto;" src="../assets/dist/img/avatar.png" class="thumbnail">
              <?php } ?>
            </div>
            <div class="col-lg-8">
             <table class="table table-bordered">                                      
               <tr>
                 <th>Nama Lengkap</th>
                 <td><?php echo $aa['admin_nama']; ?></td>
               </tr>
               <tr>
                 <th>Username</th>
                 <td><?php echo $aa['admin_username']; ?></td>
               </tr>                                      
             </table>
             <a href="profil_edit.php" class="btn btn-primary pull-right">Edit Profil</a>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>
</div>
<?php include 'footer.php'; ?>