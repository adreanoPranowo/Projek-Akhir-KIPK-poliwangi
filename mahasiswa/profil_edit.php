<?php include 'header.php'; ?>
<div class="content-wrapper">
  <div class="container">    
    <section class="content-header">
      <h1>
        Profil
        <!-- <small>Pemberitahuan :</small> -->
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Profil</li>
        </ol>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="box-body">
        <div class="row">
          <section class="col-lg-12">
           <?php 
           if(isset($_GET['alert'])){
            if($_GET['alert'] == "foto"){
              echo "<div class='alert alert-danger text-center'>Maaf! hanya file gambar yang boleh diupload pada form foto.</div>";
            }
          }
          ?>
          <?php 
          $id = $_SESSION['id'];
          $profil = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$id'");
          $profil = mysqli_fetch_assoc($profil);
          ?>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Data Profil, Selamat Datang!</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-3">
                  <?php if($aa['mahasiswa_foto']!="" && file_exists("../gambar/".$aa['mahasiswa_foto'])){ ?>
                    <img style="width: 100%;height: auto;" src="../gambar/<?php echo $aa['mahasiswa_foto']; ?>" class="thumbnail">
                  <?php }else{ ?>
                    <img style="width: 100%;height: auto;" src="../assets/dist/img/avatar.png" class="thumbnail">
                  <?php } ?>
                </div>
                <div class="col-lg-9">
                  <form action="profil_update.php" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered">

                      <tr>
                        <th>email</th>
                        <td><input type="text" name="email" class="form-control" value="<?php echo $aa['mahasiswa_email']; ?>"></td>
                      </tr> 
                      <tr>
                        <th>Nama Lengkap</th>
                        <td><input type="text" name="nama" class="form-control" value="<?php echo $aa['mahasiswa_nama']; ?>"></td>
                      </tr> 
                      <tr>
                        <th>Alamat Lengkap</th>
                        <td><input type="text" name="alamat" class="form-control" value="<?php echo $aa['mahasiswa_alamat']; ?>"></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                          <select class="form-control" name="kelamin">
                            <option value="Laki-Laki" <?php if($aa['mahasiswa_kelamin']=="Laki-Laki"){echo "selected='selected'";} ?> >Laki-Laki</option>
                            <option value="Perempuan" <?php if($aa['mahasiswa_kelamin']=="Perempuan"){echo "selected='selected'";} ?> >Perempuan</option>
                          </select>
                        </td>
                      </tr> 
                      <tr>
                        <th>Kontak</th>
                        <td><input type="number" name="kontak" class="form-control" value="<?php echo $aa['mahasiswa_kontak']; ?>"></td>
                      </tr>
                      <tr>
                        <th>Password</th>
                        <td>
                          <input type="password" name="password" class="form-control" placeholder="Password ..">
                          <small>Kosongkan jika tidak ingin mengubah password.</small>
                        </td>
                      </tr>
                      <tr>
                        <th>Foto</th>
                        <td>
                          <input type="file" name="foto" accept="image/*">
                          <small>Ketentuan : Ukuran Foto 4x6</small><br>
                          <small>Kosongkan jika tidak ingin mengubah Foto.</small>
                        </td>
                      </tr>

                    </table>
                    <input type="submit" class="btn btn-primary pull-right" value="Simpan Perubahan">
                  </form>
                </div>
              </div>
            </div>
            <br/>
          </div>
        </section>
      </div>
    </div>



    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.container -->
</div>
<?php include 'footer.php'; ?>