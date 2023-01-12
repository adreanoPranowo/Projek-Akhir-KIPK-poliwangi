<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				DATA PESERTA
				<small> Penerima Beasiswa PPA :</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Peserta</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-14">
					<div class="box">
						
						<div class="box-header">          
							<a href="periode.php" class="btn btn-warning btn-sm pull-right"> Kembali</a>
						</div>					
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="table-datatable">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> NIM</th>					
											<th> NAMA</th>					
											<th> NO. HP</th>
											<th> STATUS</th>									
											<th width="15%">OPSI</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$idperiode = $_GET['id']; 
										$data = mysqli_query($koneksi,"SELECT * FROM periode_mahasiswa,mahasiswa where pm_periode='$idperiode' and pm_mahasiswa=mahasiswa_id");
										$no =1;
										while($d = mysqli_fetch_array($data)){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['mahasiswa_email']; ?></td>
												<td><?php echo $d['mahasiswa_nama']; ?></td>
												<td><?php echo $d['mahasiswa_kontak']; ?></td>
												<td>
													<?php
													if($d['pm_status'] == "Daftar"){
														echo "<span class='label label-warning'>Daftar</span>";
													}else if($d['pm_status'] == "Ditolak"){
														echo "<span class='label label-danger'>Ditolak</span>";
													}else if($d['pm_status'] == "Diterima"){
														echo "<span class='label label-success'>Diterima</span>";
													}
													?>
													<form action="periode_peserta_update.php" method="post">
														<input type="hidden" name="id" value="<?php echo $d['pm_id'] ?>">
														<input type="hidden" name="periode" value="<?php echo $d['pm_periode'] ?>">
														<select name="status" onchange="this.form.submit()">
															<option <?php if($d['pm_status']=="Daftar"){echo "selected='selected'";} ?> value="Daftar">Daftar</option>
															<option <?php if($d['pm_status']=="Diterima"){echo "selected='selected'";} ?> value="Diterima">Diterima</option>
															<option <?php if($d['pm_status']=="Ditolak"){echo "selected='selected'";} ?> value="Ditolak">Ditolak</option>
														</select>
													</form>  
												</td>
												
												<td>													
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#peserta_nilai<?php echo $d['pm_mahasiswa']; ?>"> NILAI</button>
													<div id="peserta_nilai<?php echo $d['pm_mahasiswa']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> NILAI PESERTA PENERIMA BEASISWA</h4>
																</div>
																<div class="modal-body">
																	<form action="peserta_nilai.php" method="post" enctype="multipart/form-data"> 
																		<div class="table-responsive">

																			<table class="table table-bordered table-hover">
																				<div class="form-group ">
																					<tr>
																						<th width="40%"> EMAIL</th>
																						<th width="1%">:</th>
																						<td>					
																							<input type="text" disabled="disabled" name="nim" class="form-control" value="<?php echo $d['mahasiswa_email'] ?>">
																						</td>
																					</tr>
																					<tr>
																						<th width="40%"> NAMA</th>
																						<th width="1%">:</th>
																						<td>					
																							<input type="TEXT" disabled="disabled" class="form-control" value="<?php echo $d['mahasiswa_nama'] ?>">
																						</td>
																					</tr>
																				</div>
																				<?php 
																				$id_mahasiswa = $d['pm_mahasiswa'];
																				$nilai = mysqli_query($koneksi,"select * from nilai,kriteria where nilai_mahasiswa='$id_mahasiswa' and nilai_kriteria=kriteria_id");
																				while($n = mysqli_fetch_array($nilai)){
																					$nn = $n['nilai_bobot'];
																					?>
																					<div class="form-group ">
																						<tr>
																							<th width="50%"> 
																								<?php echo $n['kriteria_inisial']." ( ".$n['kriteria_keterangan']." ) " ?>	
																							</th>
																							<th width="1%">:</th>
																							<td>
																								<?php 	
																								$bobot = mysqli_query($koneksi, "select * from bobot_kriteria where bobot_id='$nn'");
																								while($b = mysqli_fetch_array($bobot)){
																									echo $b['bobot_keterangan'];
																								}
																								?>
																							</td>
																						</tr>
																					</div>
																					<?php
																				}
																				?>
																			</table> 
																		</div>
																	</form>
																</div>											
															</div>
														</div>
													</div>
													<a href="periode_peserta_detil.php?id=<?php echo $idperiode ?>&mahasiswa=<?php echo $d['mahasiswa_id'] ?>" class="btn btn-danger btn-sm"> Detil</a>						
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