<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Penerimaan KIPK</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">  
  <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets2/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets2/lib/animate/animate.min.css" rel="stylesheet">
  <link href="assets2/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets2/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="assets2/css/style.css" rel="stylesheet">
</head>
<body>
  
  <header id="header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-dark ">
        <a class="navbar-brand" href="#">
          <img src="assets2/img/logo.png" width="50" height="50" alt="">
        </a>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="#intro" style="color:white;">Dashboard</a>
          </li>
  <li class="nav-item">
    <a class="nav-link" href="#about" style="color:white;">Jadwal</a>
  </li>
</ul>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="login.php" style="color:white;">Login Admin</a>
    
      <!-- <nav class="main-nav float-right d-none d-lg-block">
        <ul> -->
          <!-- <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Tentang</a></li> -->
          <!-- <li><a href="login.php" style="color:white;">Login Admin</a></li>         
        </ul>
      </nav> -->
    </div>
  </header>
  <section id="intro" class="clearfix">
    <div class="container">
      <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert']=="daftar"){
            echo '<script type="text/javascript">alert("Akun Anda Sudah Didaftarkan");</script>';
          }elseif($_GET['alert']=="gagal"){
            echo '<script type="text/javascript">alert("email Anda Sudah Terdaftar");</script>';
          }elseif($_GET['alert']=="logout"){
            echo '<script type="text/javascript">alert("Silahkan Login Kembali");</script>';
          }
        }

       ?>
      <div class="intro-img">
        <img src="assets2/img/intro-img.svg" alt="" class="img-fluid">
      </div>
      <div class="intro-info">
        <h2>Selamat Datang Di website KIPK POLIWANGI</h2>
        <p style="color:white;">Jadi Apa itu KIPK ?</P>
                  <P style="color:white;">KIP Kuliah adalah salah satu bantuan dana pendidikan yang dinaungi oleh Kemendikbudristek.
                   program ini akan ditanggung pemerintah 100%. Tunggu apalagi segara daftarkan dirimu di program KIPK poliwangi ya, agar kamu dapat direkomendasikan sebagai penerima KIPK di poliwangi</P>

        <div>
          <button type="button" class="btn-get-started scrollto" data-toggle="modal" data-target="#register">DAFTAR</button>
          <button type="button" class="btn-get-started scrollto" data-toggle="modal" data-target="#login">LOGIN</button>
          <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="login_mahasiswa_act.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>E-MAIL</label>
                      <input type="text" name="email" required="required" class="form-control">
                    </div>                                           
                    <div class="form-group">
                      <label> PASSWORD</label>
                      <input type="password" name="password" required="required" class="form-control">
                    </div>                    
                    <br/>
                    <input type="submit" value="Masuk" class="btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3>Daftar Akun</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="daftar_act.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> E-MAIL</label>
                      <input type="text" name="email" required="required" class="form-control">
                    </div>                        
                    <div class="form-group">
                      <label> NAMA</label>
                      <input type="text" name="nama" required="required" class="form-control">
                    </div>                        
                    <div class="form-group">
                      <label> NO. TELEPON</label>
                      <input type="text" name="kontak" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label> PASSWORD</label>
                      <input type="password" name="password" required="required" class="form-control">
                    </div>                    
                    <br/>
                    <input type="submit" value="Daftar Akun" class="btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section id="about">
    <div id="about" class="section wb">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="message-box">                        
                        <h2 class="text-center" style="color:black" >Jadwal Kartu Indonesia Pintar Kuliah</h2>
                        <p class="text-center" style="color:black">Tanggal penting jadwal pendaftaran dan penutupan Kartu Indonesia Pintar Kuliah Tahun 2022</p>
                        <table class="tg" style="undefined;table-layout: fixed; width: 808px">
                        <colgroup>
                        <col style="width: 63px">
                        <col style="width: 329px">
                        <col style="width: 237px">
                        <col style="width: 179px">
                        </colgroup>
                        <thead>
                          <tr>
                            <th class="tg-ww3p">NO</th>
                            <th class="tg-ww3p">Kegiatan</th>
                            <th class="tg-ww3p">Dibuka</th>
                            <th class="tg-ww3p">Ditutup</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="tg-qhzg">1</td>
                            <td class="tg-qhzg">Pendaftaran Akun Siswa KIP-Kuliah</td>
                            <td class="tg-qhzg">02 Februari 2022</td>
                            <td class="tg-qhzg">01 Desember 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-gniv">2</td>
                            <td class="tg-gniv">SNMPN</td>
                            <td class="tg-gniv">07 Februari 2022</td>
                            <td class="tg-gniv">17 Maret 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-qhzg">3</td>
                            <td class="tg-qhzg">SNMPTN</td>
                            <td class="tg-qhzg">13 Februari 2022</td>
                            <td class="tg-qhzg">27 Februari 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-gniv">4</td>
                            <td class="tg-gniv">UTBK-SBMPTN</td>
                            <td class="tg-gniv">22 Maret 2022</td>
                            <td class="tg-gniv">14 April 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-qhzg">5</td>
                            <td class="tg-qhzg">SBMPN</td>
                            <td class="tg-qhzg">05 April 2022</td>
                            <td class="tg-qhzg">29 Juni 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-gniv">6</td>
                            <td class="tg-gniv">Seleksi Mandri PTN</td>
                            <td class="tg-gniv">01 Juni 2022</td>
                            <td class="tg-gniv">07 Oktober 2022</td>
                          </tr>
                          <tr>
                            <td class="tg-qhzg">7</td>
                            <td class="tg-qhzg">Seleksi Mandiri PTS</td>
                            <td class="tg-qhzg">08 Juni 2022</td>
                            <td class="tg-qhzg">31 Oktober 2022</td>
                          </tr>
                        </tbody>
                        </table>
                        <br>
                        <p style="color:black">Keterangan  :  <br> Jadwal dapat berubah sewaktu-waktu</p>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    </section>
  </main>  
  <footer id="footer">   
    <div class="container">
      <div class="copyright">
        <footer class="text-center text-lg-start text-white">
          <div class="row my-3">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <div class="shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
              <img src="assets2/img/logo.png" height="150" alt=""
               loading="lazy" />
              </div>
              <p class="text-center" style="color:white">Politeknik Negeri Banyuwangi</p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color:white">Lokasi</h5>

        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="#!" style="color:white"><i class="fa fa-map-marker" style="color:white"></i > Jalan Raya Jember No.KM13, Kawang, Labanasem, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68461</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color:white">Kontak</h5>

        <ul class="list-unstyled">
          <li class="mb-2">
            <a  href="#!" style="color:white"><i class="fa fa-phone" style="color:white"></i>   +62 (0333) 636780</a>
          </li>
          <li class="mb-2">
            <a href="#!" style="color:white"><i class="fa fa-envelope" style="color:white"></i>  poliwangi@poliwangi.ac.id</a>
          </li>
          <li class="mb-2">
            <a href="#!" style="color:white"><i class="fa fa-envelope" style="color:white"></i>  humas@poliwangi.ac.id</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color:white">Media Sosial</h5>

        <ul class="d-flex flex-row justify-content-center" style="list-style:none">
          <li>
            <a href="https://instagram.com/poliwangi_jinggo?igshid=MWI4MTIyMDE="><i class="fa fa-instagram fa-3x" style="color:white"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </li>
          <li>
            <a href="https://www.facebook.com/poliwangi.jinggo"><i class="fa fa-facebook-square fa-3x" style="color:white"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </li> 
          <li>
            <a href="https://youtube.com/@POLIWANGITV"><i class="fa fa-youtube-play fa-3x" style="color:white"></i></a>
          </li>
        </ul>
      </div>
  </div>
  &copy; Copyright <strong>3Fantastic</strong>. All Rights Reserved
      </div>      
    </div>
</footer>
</div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="assets2/lib/jquery/jquery.min.js"></script>
  <script src="assets2/lib/jquery/jquery-migrate.min.js"></script>
  <script src="assets2/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/lib/easing/easing.min.js"></script>
  <script src="assets2/lib/mobile-nav/mobile-nav.js"></script>
  <script src="assets2/lib/wow/wow.min.js"></script>
  <script src="assets2/lib/waypoints/waypoints.min.js"></script>
  <script src="assets2/lib/counterup/counterup.min.js"></script>
  <script src="assets2/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets2/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="assets2/lib/lightbox/js/lightbox.min.js"></script>
  <script src="assets2/js/main.js"></script>

</body>
</html>
