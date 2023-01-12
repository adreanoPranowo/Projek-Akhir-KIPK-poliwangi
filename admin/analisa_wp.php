<?php 
include 'header.php';
?>
<div class="content-wrapper">

	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<div class="box-header">								
							<h4 class="panel-title">Analisa Data mahasiswa</h4>
							<a href="seleksi.php" class="btn btn-warning btn-sm pull-right"> Kembali</a>
						</div>	
					</div>
					<div class="panel-body">
						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Bobot Nilai</h3>
							</div>							
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<?php
											$data = mysqli_query($koneksi, "select * from kriteria");
											while($d = mysqli_fetch_array($data)){
												?>													
												<th class="text-center"><?php echo $d['kriteria_keterangan'] ?></th>				
												<?php
											}
											?>
										</tr>											
									</thead>
									<tbody>
										<tr>
											<?php
											$data = mysqli_query($koneksi, "select * from kriteria");
											while($d = mysqli_fetch_array($data)){
												?>									
												<td class="text-center">
													<?php 
													echo $d['kriteria_bobot']; 
													echo "<br/>";

													// menghitung nilai bobot untuk setiap kriteri
													echo $d['kriteria_bobot']. " / 100 = " .  $d['kriteria_bobot']/100; 
													?>
												</td>											
												<?php
											}
											?>
										</tr>
									</tbody>	
								</table>
							</div>

						</div>
						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Nilai Inputan</h3>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>										
										<tr>
											<th>No.</th>											
											<th>Nama mahasiswa</th>
											<?php
											$data = mysqli_query($koneksi, "select * from kriteria");
											while($d = mysqli_fetch_array($data)){
												?>									
												<th class="text-center"><?php echo $d['kriteria_keterangan'] ?></th>											
												<?php
											}
											?>
										</tr>											
									</thead>
									<tbody>

										<?php
										$no=1;
										$idperiode = $_GET['id'];

										// ambil mahasiswa yang ikut seleksi dan yang berstatus Diterima selain dari status tersebut data akan di abaikan
										$mahasiswa = mysqli_query($koneksi,"select * from periode_mahasiswa,mahasiswa where pm_periode='$idperiode' and pm_mahasiswa=mahasiswa_id and pm_status='Diterima'");
										while($pp = mysqli_fetch_array($mahasiswa)){
											$idmahasiswa = $pp['pm_mahasiswa'];
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $pp['mahasiswa_nama']; ?></td>
												<?php

												// ambil nilai yang sudah di input untuk setiap kriteria oleh mahasiswa
												$nilai = mysqli_query($koneksi,"select * from nilai,bobot_kriteria where nilai_mahasiswa='$idmahasiswa' and nilai_bobot=bobot_id");
												while($nn = mysqli_fetch_array($nilai)){
													?>
													<td><?php echo $nn['bobot_nilai']; ?></td>
													<?php
												}
												?>
											</tr>
											<?php
										}
										?>

									</tbody>	
								</table>
							</div>

						</div>

						<?php 
						$vs =array();
						$total_hasil=0;
						$no = 0;
						$normalisasi = array();
						$hasil_normal = array();
						$id_periode = $_GET['id'];
						$inputan = mysqli_query($koneksi,"select * from periode_mahasiswa where pm_periode='$id_periode' and pm_status='Diterima'");
						while($i=mysqli_fetch_array($inputan)){
							$no =0;							
							$yuhu = 0;
							$iduser = $i['pm_mahasiswa'];
							$krit = mysqli_query($koneksi, "select * from kriteria");
							while($k=mysqli_fetch_array($krit)){
								$bobot_krit = $k['kriteria_bobot'];
								$idkriteria = $k['kriteria_id'];
								$nox = $no++;
								if($k['kriteria_sifat']=="Cost"){

									// echo $idkriteria;
									$min = mysqli_query($koneksi,"select * from nilai, bobot_kriteria where nilai_periode='$id_periode' and nilai_kriteria='$idkriteria' and nilai_bobot=bobot_id");
									$mn = mysqli_fetch_assoc($min);

									$n = $mn['bobot_nilai'];	
									$bobot_nilai =  ($bobot_krit/100)*(-1);
									$bn = $bobot_nilai;								
									$hasil = pow($n, $bn);									

								}else{
									// echo $idkriteria."<br>";
									$min = mysqli_query($koneksi,"select * from nilai, bobot_kriteria where nilai_periode='$id_periode' and nilai_kriteria='$idkriteria' and nilai_bobot=bobot_id");
									
									$mn = mysqli_fetch_assoc($min);

									$n = $mn['bobot_nilai'];	
									$bobot_nilai =  ($bobot_krit/100);
									$bn = $bobot_nilai;								
									$hasil = pow($n, $bn);

								}							
								$vs[$iduser][$idkriteria]=$hasil;							
							}							




						}
						?>

						<pre>
							<?php 
							print_r($vs);
							?>
						</pre>



						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Nilai Vektor S</h3>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>										
										<tr>			
											<th>VEKTOR</th>
											<?php
											$data = mysqli_query($koneksi, "select * from kriteria");
											while($d = mysqli_fetch_array($data)){
												?>									
												<th class="text-center"><?php echo $d['kriteria_keterangan'] ?></th>

												<?php
											}
											?>
											<th>HASIL</th>
										</tr>											
									</thead>
									<tbody>

										<?php
										$vv = array();
										$nox=0;
										$no=1;
										$idperiode = $_GET['id'];

										// ambil mahasiswa yang ikut seleksi dan yang berstatus Diterima selain dari status tersebut data akan di abaikan
										$mahasiswa = mysqli_query($koneksi,"select * from periode_mahasiswa,mahasiswa where pm_periode='$idperiode' and pm_mahasiswa=mahasiswa_id and pm_status='Diterima'");
										while($pp = mysqli_fetch_array($mahasiswa)){
											$idmahasiswa = $pp['pm_mahasiswa'];
											?>
											<tr>
												<td><?php echo "S".$no++; ?></td>

												<?php
												$xhasil="";
												$data = mysqli_query($koneksi, "select * from kriteria");
												while($d = mysqli_fetch_array($data)){
													$id_kk = $d['kriteria_id'];

													?>									
													<td class="text-center"><?php echo $vs[$iduser][$id_kk] ?></td>	

													<?php
													if($xhasil==""){
														$xhasil= $vs[$iduser][$id_kk];														
													}else{
														$xhasil *=$vs[$iduser][$id_kk];														
													}

												}										
												$vv[$idmahasiswa]=$xhasil;													
												?>
												<td><?php echo $xhasil ?></td>											
											</tr>
											<?php
										}

										?>

									</tbody>	
								</table>
							</div>

						</div>

						<pre>
							<?php print_r($vv) ?>
						</pre>


						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Nilai Vektor V</h3>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>										
										<tr>			
											<th>V</th>											
											<th>HASIL</th>
										</tr>											
									</thead>
									<tbody>

										<?php										
										$nox=0;
										$no=1;
										$idperiode = $_GET['id'];
										$arr_total_hasil = array();

										// ambil mahasiswa yang ikut seleksi dan yang berstatus Diterima selain dari status tersebut data akan di abaikan
										
										$mahasiswa = mysqli_query($koneksi,"select * from periode_mahasiswa,mahasiswa where pm_periode='$idperiode' and pm_mahasiswa=mahasiswa_id and pm_status='Diterima'");
										while($pp = mysqli_fetch_array($mahasiswa)){
											$idmahasiswa = $pp['pm_mahasiswa'];
											$total_tambah=0;
											?>
											<tr>
												<td><?php echo "V".$no++; ?></td>
												<td>
													<?php
													$xhasil="";
													$data = mysqli_query($koneksi, "select * from kriteria");
													while($d = mysqli_fetch_array($data)){
														$id_kk = $d['kriteria_id'];
														$total_tambah += $vs[$iduser][$id_kk];


													}	

													$vektor_v = $vv[$idmahasiswa]/$total_tambah;		
													echo $vektor_v;		

													$arr_total_hasil[$idmahasiswa]['mahasiswa'] = $idmahasiswa;
													$arr_total_hasil[$idmahasiswa]['nilai'] = $vektor_v;


													?>
												</td>

											</tr>
											<?php
										}
										
										array_multisort(array_column($arr_total_hasil, 'nilai'),SORT_DESC,$arr_total_hasil);


									?>

								</tbody>
								<?php
								print_r($arr_total_hasil);
								?>	
							</table>
						</div>

					</div>


					<div class="box box-primary box-solid">
						<div class="box-header">
							<h3 class="box-title">Hasil Perangkingan</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>

									<th>Mahasiswa</th>
									<th>Hasil Perhituingan WP</th>
									<th>Peringkat</th>
								</tr>
								<?php 
								$no = 1;
								for($x = 0; $x < count($arr_total_hasil);$x++){
									?>
									<tr>
										<td>
											<?php 
											$id_p = $arr_total_hasil[$x]['mahasiswa'];
											$pp = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_id='$id_p'");
											$ppp = mysqli_fetch_assoc($pp);
											echo $ppp['mahasiswa_nama'];
											?>
										</td>
										<td><?php echo $arr_total_hasil[$x]['nilai']; ?></td>
										<td><?php echo $no++; ?></td>
									</tr>
									<?php 
								}
								?>
							</table>
						</div>
					</div>





				</div>					
			</div>	
		</div>
	</div>		
</div>
</div>
<?php include 'footer.php'; ?>