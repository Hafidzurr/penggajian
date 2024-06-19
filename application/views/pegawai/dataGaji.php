<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Gaji Pegawai</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pegawai</th>
							<th>Jabatan</th>
							<th>Gaji Pokok</th>
							<th>Bonus</th>
							<th>PPH 5%</th>
							<th>Total Gaji</th>
							<th>Tanggal Gajian</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($gaji as $g): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $g->Nama_Pegawai ?></td>
								<td><?php echo $g->Nama_Jabatan ?></td>
								<td>Rp. <?php echo number_format($g->Gaji_Pokok, 0, ',', '.') ?></td>
								<td>Rp. <?php echo number_format($g->Bonus, 0, ',', '.') ?></td>
								<td>Rp. <?php echo number_format($g->PPH_5, 0, ',', '.') ?></td>
								<td>Rp. <?php echo number_format($g->Total_Gaji, 0, ',', '.') ?></td>
								<td><?php echo date('d-m-Y', strtotime($g->Tanggal_Gajian)) ?></td>
								<td>
									<a href="<?php echo base_url('pegawai/dataGaji/cetakSlip/' . $g->ID_Gaji) ?>"
										class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
