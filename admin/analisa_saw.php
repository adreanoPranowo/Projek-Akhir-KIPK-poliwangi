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
								<h3 class="box-title">Nilai mahasiswa</h3>
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
						$no = 0;
						$normalisasi = array();
						$hasil_normal = array();
						$id_periode = $_GET['id'];
						$inputan = mysqli_query($koneksi,"select * from periode_mahasiswa where pm_periode='$id_periode' and pm_status='Diterima'");
						while($i=mysqli_fetch_array($inputan)){
							$no =0;	
							$vs =1;
							$yuhu = 0;
							$iduser = $i['pm_mahasiswa'];
							$krit = mysqli_query($koneksi, "select * from kriteria");
							while($k=mysqli_fetch_array($krit)){
								$bobot_krit = $k['kriteria_bobot'];
								$idkriteria = $k['kriteria_id'];
								$nox = $no++;
								if($k['kriteria_sifat']=="Cost"){
									$min = mysqli_query($koneksi, "select min(bobot_nilai) as terkecil from bobot_kriteria, nilai where nilai.nilai_bobot=bobot_kriteria.bobot_id and  nilai_kriteria='$idkriteria'");
									$mn = mysqli_fetch_assoc($min);
									$n = $mn['terkecil'];
									// print_r($n."<br>");
									

									$abc =mysqli_query($koneksi,"select bobot_nilai from bobot_kriteria, nilai where nilai.nilai_bobot=bobot_kriteria.bobot_id and nilai_mahasiswa='$iduser' and nilai_kriteria='$idkriteria'");

									
									$ab = mysqli_fetch_assoc($abc);
									$a = $ab['bobot_nilai'];

									$nilai=$n/$a;


								}else{
									$min = mysqli_query($koneksi, "select max(bobot_nilai) as terkecil from bobot_kriteria,nilai where nilai.nilai_bobot=bobot_kriteria.bobot_id and nilai_kriteria='$idkriteria'");
									$mn = mysqli_fetch_assoc($min);
									$n = $mn['terkecil'];
									// print_r($n."<br>");	
									
									$abc =mysqli_query($koneksi,"select bobot_nilai from bobot_kriteria, nilai where nilai.nilai_bobot=bobot_kriteria.bobot_id and nilai_mahasiswa='$iduser' and nilai_kriteria='$idkriteria'");

									
									$ab = mysqli_fetch_assoc($abc);
									$a = $ab['bobot_nilai'];

									$nilai=$a/$n;
								}
								$normalisasi[0][$iduser][$idkriteria]=$nilai;		
							}
						}
						?>

						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Hasil Normalisasi</h3>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<th>No</th>
										<th>mahasiswa</th>
										<?php
										$kriteria = mysqli_query($koneksi,"select * from kriteria");
										while($k=mysqli_fetch_array($kriteria)){
											?>
											<th><?php echo $k['kriteria_keterangan']; ?></th>
											<?php
										}
										?>
									</tr>
									<?php 
									$no = 1;
									$arr_hasil = array();
									$id_per = $_GET['id'];
									$inputan = mysqli_query($koneksi,"select * from periode_mahasiswa,mahasiswa where pm_periode='$id_per' and pm_mahasiswa=mahasiswa_id and pm_status='Diterima'");
									while($i=mysqli_fetch_array($inputan)){
										$id_p = $i['pm_mahasiswa'];

										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $i['mahasiswa_nama']; ?></td>
											<?php 

											$nilai = 0;
											$kriteria = mysqli_query($koneksi,"select * from kriteria");
											while($k=mysqli_fetch_array($kriteria)){
												$id_k = $k['kriteria_id'];

												$bobot = $k['kriteria_bobot']/100;
												$xxx = $normalisasi[0][$id_p][$id_k] * $bobot;
												$nilai += $xxx;

												?>
												<td><?php echo $normalisasi[0][$id_p][$id_k] ?></td>
												<?php 

											}
											$arr_hasil[$id_p]['mahasiswa'] = $id_p;
											$arr_hasil[$id_p]['nilai'] = $nilai;
											$nilai = 0;
											?>
										</tr>
										<?php 

									}
									?>
								</table>

								<?php
								array_multisort(array_column($arr_hasil, 'nilai'),SORT_DESC,$arr_hasil);
								?>

							</div>
						</div>

						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">Hasil Perangkingan</h3>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>

										<th>mahasiswa</th>
										<th>Hasil Perhituingan SAW</th>
										<th>Peringkat</th>
									</tr>
									<?php 
									$no = 1;
									for($x = 0; $x < count($arr_hasil);$x++){
										?>
										<tr>
											<td>
												<?php 
												$id_p = $arr_hasil[$x]['mahasiswa'];
												$pp = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_id='$id_p'");
												$ppp = mysqli_fetch_assoc($pp);
												echo $ppp['mahasiswa_nama'];
												?>
											</td>
											<td><?php echo $arr_hasil[$x]['nilai']; ?></td>
											<td><?php echo $no++; ?></td>
										</tr>
										<?php 
									}
									?>
								</table>
							</div>
						</div>
						<!-- filter -->
						<div class="box box-primary box-solid">
							<div class="box-header">
								<h3 class="box-title">YANG DIBUTUHKAN</h3>
							</div>
							<form action="analisa_saw.php" method="GET">
								<table class="table table-bordered">
									<tr>
										<td>
											<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
											<?php
											$id_pr = $_GET['id'];
											$p = mysqli_query($koneksi,"select * from periode_mahasiswa where pm_periode='$id_pr' and pm_status='Diterima'");
											$jp = mysqli_num_rows($p);												
											?>
											<select class="form-control" name="filter">
												<option value="">--Pilih</option>
												<?php
												for($pp=1;$pp<=$jp;$pp++){
													?>	
													<option value="<?php echo $pp ?>"><?php echo $pp; ?></option>
													<?php
												}
												?>
											</select>
										</td>
										<td>
											<input type="submit" value="Tampilkan" class="btn btn-primary">
										</td>
									</tr>
								</table>							
							</form>							
						</div>
						<br/>
						<?php
						if(isset($_GET['filter'])){
							$idpr = $_GET['id'];
							$filter = $_GET['filter'];
							?>
							<br>
							<a href="analisa_print.php?id=<?php echo $idpr?>&filter=<?php echo $filter ?>" class="btn btn-sm btn-primary"><i class="icon-PRINT"></i> PRINT HASIL</a>
							<br>
							<br>
							<div class="box box-primary box-solid">
								<div class="box-header">
									<h3 class="box-title">YANG LULUS SELEKSI</h3>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered">
										<tr>
											<th>Nama</th>
											<th>Hasil Perhituingan SAW</th>
											<th>Peringkat</th>
										</tr>
										<?php 
										$no = 1;
										for($x = 0; $x < count($arr_hasil);$x++){
											?>
											<tr <?php
											if($x<$filter){echo "style='background:green;color:white'";}
											?>>

											<td>
												<?php 
												$id_p = $arr_hasil[$x]['mahasiswa'];
												$pp = mysqli_query($koneksi,"select * from periode_mahasiswa,mahasiswa where pm_mahasiswa='$id_p' and pm_mahasiswa=mahasiswa_id and pm_status='Diterima'");
												$ppp = mysqli_fetch_assoc($pp);
												echo $ppp['mahasiswa_nama'];
												?>
											</td>
											<td><?php echo $arr_hasil[$x]['nilai']; ?></td>
											<td>
												<?php 
												if($x<$filter){
													echo "Penerima Beasiswa";
												}else{
													echo "Tidak Menerima Beasiswa";
												}
												?>	
											</td>
										</tr>
										<?php 
									}
									?>
								</table>
							</div>
						</div>
						<?php
					}

					?>
				</div>					
			</div>	
		</div>
	</div>		
</div>
<?php include 'footer.php'; ?>