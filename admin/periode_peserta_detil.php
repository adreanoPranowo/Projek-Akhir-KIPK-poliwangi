<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				DETIL DATA PENDAFTAR
				<small>PENERIMAAN BEASISWA PPA :</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Detil Pendaftar</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-14">
					<div class="box">
						<div class="box-header">
							<?php $id = $_GET['id'] ?>
							<a href="periode_peserta.php?id=<?php echo $id ?>" class="btn btn-warning btn-sm pull-right"> Kembali</a>
							<br>
							<br>
							<div class="row">
								<div class="col-lg-6 col-lg-offset-3">
									<table class="table table-bordered table-hover">
										<?php 
										$mhs_id = $_GET['mahasiswa'];
										$mhs = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_id='$mhs_id'");
										$mh = mysqli_fetch_assoc($mhs);

										?>
										<tr>
											<th width="30%"> EMAIL</th>
											<th width="1%">:</th>
											<td>
												<label class="from-control"><?php echo $mh['mahasiswa_email']; ?></label>										
											</td>
										</tr>
										<tr>
											<th width="30%"> NAMA PENDAFTAR</th>
											<th width="1%">:</th>
											<td>
												<label class="from-control"><?php echo $mh['mahasiswa_nama']; ?></label>										
											</td>
										</tr>
										<tr>
											<th width="30%"> JENIS KELAMIN</th>
											<th width="1%">:</th>
											<td>
												<label class="from-control"><?php echo $mh['mahasiswa_kelamin']; ?></label>										
											</td>
										</tr>
										<?php
										?>
										
									</table>
								</div>
							</div>
							
						</div>					
						<div class="box-body">
							<H3 style="text-align: center;">NILAI SELEKSI PENERIMAAN BEASISWA PPA</H3>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> KRITERIA</th>				
											<th> NILAI</th>									
											<th> BUKTI</th>	
										</tr>
									</thead>
									<tbody>
										<?php
										$idperiode = $_GET['id']; 
										$idmahasiswa = $_GET['mahasiswa']; 
										$data = mysqli_query($koneksi,"SELECT * FROM nilai,kriteria,bobot_kriteria where nilai_periode='$idperiode' and nilai_mahasiswa='$idmahasiswa' and nilai_kriteria=kriteria_id and nilai_bobot=bobot_id");
										$no =1;
										while($d = mysqli_fetch_array($data)){			
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['kriteria_keterangan']; ?></td>	
												<td><?php echo $d['bobot_keterangan']; ?></td>
												<td>
													<?php 
													if($d['nilai_bukti']==""){
														echo "Tidak Ada Berkas";
													}else{
														?>
														<button type="button" data-toggle="modal" data-target="#lihat<?php echo $d['nilai_id']; ?>"> File</button>
														<div id="lihat<?php echo $d['nilai_id']; ?>" class="modal fade" role="dialog">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h4 class="modal-title">ISI DOKUMENT</h4>
																	</div>
																	<div class="modal-body">                                   
																		<embed src="../bukti/<?php echo $d['nilai_bukti'] ?>" type="application/pdf" width="100%" height="500px"></embed>
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