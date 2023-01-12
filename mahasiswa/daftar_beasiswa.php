<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				PERIODE PENDAFTARAN BEASISWA KIP-K
				<!-- <small>PENERIMAAN BEASISWA PPA :</small> -->
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Periode Beasiswa</li>
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
								if($_GET['alert']=='daftar'){
									?>
									<div class="alert alert-success text-center alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>        
										Selamat Anda Sudah Mendaftar
									</div>      
									<?php		
								}
							}
							?>
						</div>					
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> MASA PERIODE</th>
											<th> STATUS</th>
											<th> FILE PENGUMUMAN</th>
											<th width="15%"> OPSI</th>											
										</tr>
									</thead>
									<tbody>
										<?php 
										$data = mysqli_query($koneksi,"SELECT * FROM periode order by periode_id desc");
										$no =1;
										while($d = mysqli_fetch_array($data)){			
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td>
													<?php 
													echo "<b> Pendaftaran Dibuka </b> : ".date('d-m-Y',strtotime($d['periode_tanggal_buka']))."<br/>"; 
													echo "<b> Pendaftaran Ditutup </b> : ". date('d-m-Y',strtotime($d['periode_tanggal_tutup']))."<br/>"; 
													?>
												</td>												
												<td>
													<?php
													if($d['periode_status'] == "Aktif"){
														echo "<span class='label label-success'>Aktif</span>";
													}else if($d['periode_status'] == "Tutup"){
														echo "<span class='label label-warning'>Tutup</span>";
													}
													?>
												</td>												
												<td>													
													<?php 
													if($d['periode_file']==""){
														echo "Tidak Ada Berkas";
													}else{
														?>
														<button type="button" data-toggle="modal" data-target="#lihat<?php echo $d['periode_id']; ?>"> File</button>
														<div id="lihat<?php echo $d['periode_id']; ?>" class="modal fade" role="dialog">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h4 class="modal-title">ISI DOKUMENT</h4>
																	</div>
																	<div class="modal-body">                                   
																		<embed src="../file/<?php echo $d['periode_file'] ?>" type="application/pdf" width="100%" height="500px"></embed>
																	</div>
																</div>
															</div>
														</div>
														<?php
													}

													?>											
												</td>
												<td>
													<?php
													if($d['periode_status'] == "Tutup"){
														echo "<span class='label label-warning'>PENDAFTARAN SUDAH DITUTUP</span>";
													}else if($d['periode_status'] == "Aktif"){
														?>
														<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#daftar_beasiswa<?php echo $d['periode_id']; ?>"> DAFTAR BEASISWA</button>
														<div id="daftar_beasiswa<?php echo $d['periode_id']; ?>" class="modal fade" role="dialog">
															<div class="modal-dialog" style="width: 1000px;">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h4 class="modal-title"> DAFTAR BEASISWA KIPK</h4>
																	</div>
																	<div class="modal-body">

																		<?php
																		$idperiode = $d['periode_id'];
																		$mahasiswa = $_SESSION['id']; 
																		$cek = mysqli_query($koneksi,"select * from nilai where nilai_periode='$idperiode' and nilai_mahasiswa='$mahasiswa'");
																		if(mysqli_num_rows($cek)>0){
																			echo "Anda Sudah Mendaftar";
																		}else{
																			?>

																			<form action="beasiswa_daftar_act.php" method="post" enctype="multipart/form-data"> 
																				<div class="table-responsive">
																					<table class="table table-bordered table-hover">
																						<thead>
																							<tr>
																								<th colspan="2"> KRITERIA</th>					
																								<th> NILAI</th>					
																								<th> BUKTI</th>	
																								<th> KETENTUAN</th>									
																							</tr>
																						</thead>
																						<tbody>

																							<?php 
																							$kriteria = mysqli_query($koneksi,"select * from kriteria");
																							while($k = mysqli_fetch_array($kriteria)){
																								$kk = $k['kriteria_id'];
																								?>
																								<div class="form-group ">
																									<tr>
																										<th width="30%"> 
																											<?php echo $k['kriteria_keterangan']." ( ".$k['kriteria_inisial']." ) " ?>
																											<input type="hidden" name="kriteria[]" value="<?php echo $k['kriteria_id'] ?>">
																											<input type="hidden" name="periode" class="form-control" value="<?php echo $d['periode_id'] ?>">
																										</th>
																										<th width="1%">:</th>
																										<td width="30%">
																											<select class="form-control" name="nilai[]" required="required">
																												<option value="">--Pilih--</option>
																												<?php 	
																												$bobot = mysqli_query($koneksi, "select * from bobot_kriteria where bobot_kriteria='$kk'");
																												while($b = mysqli_fetch_array($bobot)){
																													?>		
																													<option value="<?php echo $b['bobot_id'] ?>"><?php echo $b['bobot_keterangan']; ?></option>
																													<?php
																												}
																												?>
																											</select>
																										</td>
																										<td width="10%">
																											<input type="file" name="bukti[]" required="required">																										
																										</td>
																										<td width="30%">
																											<p>Jika tidak ada, Upload File kosong</p>																										
																										</td>
																									</tr>
																								</div>
																								<?php
																							}
																							?>
																						</tbody>
																					</table> 
																				</div>
																				<br/>
																				<input type="submit" value="Simpan" class="btn btn-primary">
																			</form>
																			<?php
																		}
																		?>	
																	</div>											
																</div>
															</div>
														</div>
														<?php
													}
													?>
												</td>													
											</tr>	
											<?php
										}
										?>
									</tbody>							
								</table>
							</div>
						</div>							
					</div>
				</div>
			</div>
		</section>
	</div>	
</div>
<?php include 'footer.php'; ?>