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
							<h3>Data Mahasiswa Ikut Seleksi</h3>
						</div>					
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="table-datatable">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> E-MAIL</th>					
											<th> NAMA</th>					
											<th> KELAMIN</th>									
											<th> KONTAK</th>											
											<th width="15%">OPSI</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
										$no =1;
										while($d = mysqli_fetch_array($data)){
											$id_mahasiswa = $d['mahasiswa_id'];
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['mahasiswa_email']; ?></td>
												<td><?php echo $d['mahasiswa_nama']; ?></td>
												<td><?php echo $d['mahasiswa_kelamin']; ?></td>
												<td><?php echo $d['mahasiswa_kontak']; ?></td>
												<!-- <td><img src="../gambar/<?php echo $d['mahasiswa_foto'] ?>" width="35" height="40"></td> -->
												
												<td>
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#peserta_edit<?php echo $d['mahasiswa_id']; ?>"> Edit</button>
													<div id="peserta_edit<?php echo $d['mahasiswa_id']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> EDIT IDENTITAS PESERTA</h4>
																</div>

																<div class="modal-body">
																	<form action="mahasiswa_update.php" method="post" enctype="multipart/form-data"> 
																		<div class="table-responsive">

																			<table class="table table-bordered table-hover">
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> email</th>
																						<th width="1%">:</th>
																						<td>
																							<input type="hidden" name="id" class="form-control" value="<?php echo $d['mahasiswa_id'] ?>">
																							<input type="text" name="email" class="form-control" value="<?php echo $d['mahasiswa_email'] ?>">
																						</td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> NAMA</th>
																						<th width="1%">:</th>
																						<td><input type="text" name="nama" class="form-control" value="<?php echo $d['mahasiswa_nama'] ?>"></td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> ALAMAT</th>
																						<th width="1%">:</th>
																						<td><input type="text" name="alamat" class="form-control" value="<?php echo $d['mahasiswa_alamat'] ?>"></td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> KELAMIN</th>
																						<th width="1%">:</th>
																						<td>
																							<select class="form-control" name="kelamin">
																								<option <?php if($d['mahasiswa_kelamin']=="Laki-Laki"){echo "selected='selected'";} ?> value="Laki-Laki">Laki-Laki</option>
																								<option <?php if($d['mahasiswa_kelamin']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
																							</select>
																						</td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> NO. TELEPON</th>
																						<th width="1%">:</th>
																						<td><input type="text" name="kontak" class="form-control" value="<?php echo $d['mahasiswa_kontak'] ?>"></td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> FOTO</th>
																						<th width="1%">:</th>
																						<td>
																							<input type="hidden" name="gambar" value="<?php echo $d['mahasiswa_foto'] ?>">
																							<input type="file" name="foto">
																							<p style="color: red">* Upload Jika Akan Diganti</p>
																						</td>
																					</tr>
																				</div>
																				<div class="form-group ">
																					<tr>
																						<th width="30%"> PASSWORD</th>
																						<th width="1%">:</th>
																						<td>
																							<input type="password" name="password" class="form-control">
																							<p style="color: red">* Jika Akan Diganti</p>
																						</td>
																					</tr>
																				</div>
																			</table> 
																		</div>
																		<br/>
																		<input type="submit" value="Simpan" class="btn btn-primary">
																	</form>
																</div>											
															</div>
														</div>
													</div>
													
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