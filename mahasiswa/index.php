<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <h1>
        SELAMAT DATANG - <?php echo $aa['mahasiswa_nama']; ?>
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
            $cek_data = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_id='$id'");
            $cd = mysqli_fetch_assoc($cek_data);
            if($cd['mahasiswa_kelamin']==""){
              echo "<div class='alert alert-warning text-center'>Data Anda Belum Lengkap.</div>";              
            }else{

            }
            ?>

            <div class="box-body ">
              <div class="row ">
              <div class="col-lg-3 col-xs-3"></div>
                <div class="col-lg-6 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <?php 
                      $periode = mysqli_query($koneksi,"SELECT * FROM periode");
                      ?>
                      <h3><?php echo mysqli_num_rows($periode); ?></h3>
                      <p>Jumlah Periode</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                    <a href="daftar_beasiswa.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>               
              </div>
              <div class="col-lg-3">

               <?php if($aa['mahasiswa_foto']!="" && file_exists("../gambar/".$aa['mahasiswa_foto'])){ ?>
                <img style="width: 100%;height: auto;" src="../gambar/<?php echo $aa['mahasiswa_foto']; ?>" class="thumbnail">
              <?php }else{ ?>
                <img style="width: 100%;height: auto;" src="../assets/dist/img/avatar.png" class="thumbnail">
              <?php } ?>
            </div>
            <div class="col-lg-8">
             <table class="table table-bordered">                                      
               <tr>
                 <th>E-MAIL</th>
                 <td><?php echo $aa['mahasiswa_email']; ?></td>
               </tr>
               <tr>
                 <th>Nama Lengkap</th>
                 <td><?php echo $aa['mahasiswa_nama']; ?></td>
               </tr>    
               <tr>
                 <th>Alamat</th>
                 <td><?php echo $aa['mahasiswa_alamat']; ?></td>
               </tr> 
               <tr>
                 <th>Kelamin</th>
                 <td><?php echo $aa['mahasiswa_kelamin']; ?></td>
               </tr> 
               <tr>
                 <th>Kontak</th>
                 <td><?php echo $aa['mahasiswa_kontak']; ?></td>
               </tr>                                          
             </table>
             <a href="profil_edit.php" class="btn btn-primary pull-right">Edit Profil</a>
           </div>
         </div>
       </div>
       <div class="col-lg-6 col-xs-6"></div>
     </div>
   </section>
 </div>
</div>
<?php include 'footer.php'; ?>