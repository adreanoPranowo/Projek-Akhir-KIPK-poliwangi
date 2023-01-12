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
				<li class="active">Periode</li>
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
								if($_GET['alert']=='edit'){
									?>
									<div class="alert alert-warning alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
										Data Sudah di Edit.
									</div>								
									<?php
								}elseif($_GET['alert']=="tambah"){
									?>
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Success</h4>
										Data Sudah Ditambah
									</div> 								
									<?php
								}
							}
							?>					
							<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#periode_baru">Tambah</button>
							<div id="periode_baru" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body">
											<form action="periode_act.php" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label> TANGGAL DI BUKA</label>
													<input type="date" name="buka" required="required" class="form-control">
												</div>	
												<div class="form-group">
													<label> TANGGAL DI TUTUP</label>
													<input type="date" name="tutup" required="required" class="form-control">
												</div>												
												<div class="form-group">
													<label> FILE PENGUMUMAN</label>
													<input type="file" name="pengumuman">
												</div>
												<div class="form-group">
													<label> STATUS</label>
													<select class="form-control" name="status" required="required">
														<option value="">--Pilih--</option>
														<option value="Aktif">Aktif</option>
														<option value="Tutup">Tutup</option>
													</select>
												</div>	
												<br/>
												<input type="submit" value="Simpan" class="btn btn-primary">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>					
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="table-datatable">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> TANGGAL BUKA</th>				
											<th> STATUS</th>									
											<th> JUMLAH PENDAFTAR</th>									
											<th> FILE PENGUMUMAN</th>	
											<th width="25%"> OPSI</th>											
										</tr>
									</thead>
									<tbody>
										<?php 
										$data = mysqli_query($koneksi,"SELECT * FROM periode order by periode_id desc");
										$no =1;
										while($d = mysqli_fetch_array($data)){
											$idperiode = $d['periode_id'];			
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td>
													<?php echo "<b>Pendaftaran Dimulai </b> : ".date('d-m-Y',strtotime($d['periode_tanggal_buka']))."<br/>"; ?>
													<?php echo "<b>Pendaftaran Terakhir </b>: ".date('d-m-Y',strtotime($d['periode_tanggal_tutup']))."<br/>"; ?>
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
														$jumlah = mysqli_query($koneksi,"select * from periode_mahasiswa where pm_periode='$idperiode'");
														echo mysqli_num_rows($jumlah)." Orang";
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
																		<h4 class="modal-title">ISI DOKUMEN</h4>
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
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#periode_edit<?php echo $d['periode_id']; ?>"> Edit</button>
													<div id="periode_edit<?php echo $d['periode_id']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> EDIT PERIODE PENERIMAAN BEASISWA</h4>
																</div>
																<div class="modal-body">
																	<form action="periode_update.php" method="post" enctype="multipart/form-data"> 
																		<table class="table table-bordered table-hover">
																			<div class="form-group ">
																				<tr>
																					<th width="40%"> TANGGAL DIBUKA</th>
																					<th width="1%">:</th>
																					<td>
																						<input type="hidden" name="id" class="form-control" value="<?php echo $d['periode_id'] ?>">
																						<input type="date" name="buka" class="form-control" value="<?php echo $d['periode_tanggal_buka'] ?>">
																					</td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="40%"> TANGGAL DITUTUP</th>
																					<th width="1%">:</th>
																					<td>
																						<input type="date" name="tutup" class="form-control" value="<?php echo $d['periode_tanggal_tutup'] ?>">
																					</td>
																				</tr>
																			</div>	
																			<div class="form-group ">
																				<tr>
																					<th width="40%"> FILE PENGUMUMAN</th>
																					<th width="1%">:</th>
																					<td>
																						<input type="file" name="pengumuman">
																						<p style="color: red">Upload Jika File Diganti</p>			
																					</td>
																				</tr>
																			</div>						
																			<div class="form-group ">
																				<tr>
																					<th width="40%"> STATUS</th>
																					<th width="1%">:</th>
																					<td>
																						<select class="form-control" name="status">
																							<option <?php if($d['periode_status']=="Aktif"){echo "selected='selected'";} ?> value="Aktif">Aktif</option>
																							<option <?php if($d['periode_status']=="Tutup"){echo "selected='selected'";} ?> value="Tutup">Tutup</option>
																						</select>
																					</td>
																				</tr>
																			</div>
																		</table> 
																		<br/>
																		<input type="submit" value="Update" class="btn btn-primary">
																	</form>
																</div>											
															</div>
														</div>
													</div>
													<a href="periode_hapus.php?id=<?php echo $d['periode_id'] ?>" class="btn btn-danger btn-sm"> Hapus</a>												
													<a href="periode_peserta.php?id=<?php echo $d['periode_id'] ?>" class="btn btn-primary btn-sm"> Peserta</a>												
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