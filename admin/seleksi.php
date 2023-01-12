<?php include 'header.php'; ?>
<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				PERIODE BEASISWA
				<small>PENERIMAAN BEASISWA PPA :</small>
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
							
							
						</div>					
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">	
									<thead>
										<tr>
											<th width="5%"> NO</th>
											<th> MASA PERIODE</th>
											<th> STATUS</th>
											<th width="20%"> OPSI</th>											
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
													<a href="analisa_hasil.php?id=<?php echo $d['periode_id'] ?>" class="btn btn-primary btn-sm"> ANALISA</a>											
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