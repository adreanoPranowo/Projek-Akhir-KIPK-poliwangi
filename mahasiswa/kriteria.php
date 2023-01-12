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