<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataGaji/tambahData/') ?>"><i
			class="fas fa-plus"> Tambah Data</i></a>
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Pegawai</th>
			<th class="text-center">Jabatan</th>
			<th class="text-center">Gaji Pokok</th>
			<th class="text-center">Bonus</th>
			<th class="text-center">PPH 5%</th>
			<th class="text-center">Total Gaji</th>
			<th class="text-center">Tanggal Gajian</th>
			<th class="text-center">Action</th>
		</tr>
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
					<center>
						<a class="btn btn-sm btn-primary"
							href="<?php echo base_url('admin/dataGaji/updateData/' . $g->ID_Gaji) ?>"><i
								class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"
							href="<?php echo base_url('admin/dataGaji/deleteData/' . $g->ID_Gaji) ?>"><i
								class="fas fa-trash"></i></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>
