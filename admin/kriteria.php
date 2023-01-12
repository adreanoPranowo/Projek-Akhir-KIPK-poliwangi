<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				DATA KRITERIA
				<small>Kriteria Penerimaan :</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Kriteria</li>
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
							<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#kriteria_baru">Tambah</button>
							<div id="kriteria_baru" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Tambah Data Kriteria Penerimaan</h4>
										</div>
										<div class="modal-body">
											<form action="kriteria_act.php" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label> INISIAL KRITERIA</label>
													<input type="text" name="inisial" required="required" class="form-control">
												</div>												
												<div class="form-group">
													<label> KETERANGAN</label>
													<input type="text" name="keterangan" required="required" class="form-control">
												</div>												
												<div class="form-group">
													<label> BOBOT</label>
													<input type="number" name="bobot" required="required" class="form-control">
												</div>
												<div class="form-group">
													<label> SIFAT</label>
													<select class="form-control" name="sifat" required="required">
														<option value="">--Pilih--</option>
														<option value="Cost">COST</option>
														<option value="Benefit">BENEFIT</option>
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
											<th> INISIAL</th>					
											<th> KETERANGAN</th>					
											<th> BOBOT</th>									
											<th> SIFAT</th>	
											<th width="15%"> OPSI</th>
											<th> NILAI BOBOT</th>	
											<th> ISI BOBOT</th>	
										</tr>
									</thead>
									<tbody>
										<?php 
										$data = mysqli_query($koneksi,"SELECT * FROM kriteria");
										$no =1;
										while($d = mysqli_fetch_array($data)){
											$id_kriteria = $d['kriteria_id'];
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['kriteria_inisial']; ?></td>
												<td><?php echo $d['kriteria_keterangan']; ?></td>
												<td><?php echo $d['kriteria_bobot']." %"; ?></td>
												<td><?php echo $d['kriteria_sifat']; ?></td>
												<td>
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#kriteria_edit<?php echo $d['kriteria_id']; ?>"> Edit</button>
													<div id="kriteria_edit<?php echo $d['kriteria_id']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> EDIT KRITERIA PENERIMAAN</h4>
																</div>

																<div class="modal-body">
																	<form action="kriteria_update.php" method="post" enctype="multipart/form-data"> 

																		<table class="table table-bordered table-hover">
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> INISIAL</th>
																					<th width="1%">:</th>
																					<td>
																						<input type="hidden" name="id" class="form-control" value="<?php echo $d['kriteria_id'] ?>">
																						<input type="text" name="inisial" class="form-control" value="<?php echo $d['kriteria_inisial'] ?>">
																					</td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> KETERANGAN</th>
																					<th width="1%">:</th>
																					<td><input type="text" name="keterangan" class="form-control" value="<?php echo $d['kriteria_keterangan'] ?>"></td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> BOBOT</th>
																					<th width="1%">:</th>
																					<td><input type="number" name="bobot" class="form-control" value="<?php echo $d['kriteria_bobot'] ?>"></td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> SIFAT</th>
																					<th width="1%">:</th>
																					<td>
																						<select class="form-control" name="sifat">
																							<option <?php if($d['kriteria_sifat']=="Cost"){echo "selected='selected'";} ?> value="Cost">COST</option>
																							<option <?php if($d['kriteria_sifat']=="Benefit"){echo "selected='selected'";} ?> value="Benefit">Benefit</option>
																						</select>
																					</td>
																				</tr>
																			</div>
																		</table> 
																		<br/>
																		<input type="submit" value="Simpan" class="btn btn-primary">
																	</form>
																</div>											
															</div>
														</div>
													</div>
													<a href="kriteria_hapus.php?id=<?php echo $d['kriteria_id'] ?>" class="btn btn-danger btn-sm"> Hapus</a>												
												</td>	
												<td>
													<?php 
													$nilai = mysqli_query($koneksi,"SELECT * FROM bobot_kriteria WHERE bobot_kriteria='$id_kriteria'");
													while($n = mysqli_fetch_array($nilai)){
														?>
														<ul class="list-group list-group-flush">
															<li  class="list-group-item">
																<?php echo $n['bobot_keterangan']." ( ".$n['bobot_nilai']." )"; ?>			
																<button type="button" class="btn border-warning text-warning btn-flat btn-icon btn-xs" data-toggle="modal" data-target="#bobot_edit<?php echo $n['bobot_id']; ?>"> Edit | </button>
																<div id="bobot_edit<?php echo $n['bobot_id']; ?>" class="modal fade" role="dialog">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title"> EDIT KRITERIA PENERIMAAN</h4>
																			</div>

																			<div class="modal-body">
																				<form action="kriteria_bobot_update.php" method="post" enctype="multipart/form-data"> 
																					<table class="table table-bordered table-hover">
																						<div class="form-group ">
																							<tr>
																								<th width="30%"> KRITERIA</th>
																								<th width="1%">:</th>
																								<td>
																									<input type="hidden" name="id" class="form-control" value="<?php echo $n['bobot_id'] ?>">
																									<input type="text" disabled="disabled" name="inisial" class="form-control" value="<?php echo $d['kriteria_inisial'] ?>">
																								</td>
																							</tr>
																						</div>
																						<div class="form-group ">
																							<tr>
																								<th width="30%"> KETERANGAN</th>
																								<th width="1%">:</th>
																								<td><input type="text" name="keterangan" class="form-control" value="<?php echo $n['bobot_keterangan'] ?>"></td>
																							</tr>
																						</div>
																						<div class="form-group ">
																							<tr>
																								<th width="30%"> NILAI</th>
																								<th width="1%">:</th>
																								<td><input type="number" name="nilai" class="form-control" value="<?php echo $n['bobot_nilai'] ?>"></td>
																							</tr>
																						</div>																					
																					</table> 
																					<br/>
																					<input type="submit" value="Simpan" class="btn btn-primary">
																				</form>
																			</div>											
																		</div>
																	</div>
																</div>
																<a href="kriteria_bobot_hapus.php?id=<?php echo $n['bobot_id'] ?>" class="btn border-danger text-danger btn-flat btn-icon btn-xs">Hapus</a>
															</li>
														</ul>
														<?php
													}
													?>
												</td>
												<td>
													<button type="button" class="btn border-primary text-primary" data-toggle="modal" data-target="#bobot_tambah<?php echo $d['kriteria_id']; ?>"> NILAI BOBOT</button>
													<div id="bobot_tambah<?php echo $d['kriteria_id']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> TAMBAH NILAI BOBOT</h4>
																</div>

																<div class="modal-body">
																	<form action="kriteria_bobot_act.php" method="post" enctype="multipart/form-data"> 
																		<table class="table table-bordered table-hover">
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> KRITERIA</th>
																					<th width="1%">:</th>
																					<td>																						
																						<input type="hidden" name="kriteria" class="form-control" value="<?php echo $d['kriteria_id'] ?>">
																						<input type="text" disabled="disabled" name="inisial" class="form-control" value="<?php echo $d['kriteria_inisial'] ?>">
																					</td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> KETERANGAN</th>
																					<th width="1%">:</th>
																					<td><input type="text" name="keterangan" class="form-control"></td>
																				</tr>
																			</div>
																			<div class="form-group ">
																				<tr>
																					<th width="30%"> NILAI</th>
																					<th width="1%">:</th>
																					<td><input type="number" name="nilai" class="form-control"></td>
																				</tr>
																			</div>																					
																		</table> 
																		<br/>
																		<input type="submit" value="Simpan" class="btn btn-primary">
																	</form>
																</div>											
															</div>
														</div>
													</div>
													<?php
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