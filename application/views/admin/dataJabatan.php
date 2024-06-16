<div class="container-fluid">


	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData/') ?>"><i
			class="fas fa-plus"> Tambah Data</i></a>
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Bidang</th>
			<th class="text-center">Nama Jabatan</th>
			<th class="text-center">Gaji Pokok</th>
			<th class="text-center">Persentase Bonus</th>
			<th class="text-center">Action</th>
		</tr>
		<?php $no = 1;
		foreach ($jabatan as $j): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $j->Bidang ?></td>
				<td><?php echo $j->Nama_Jabatan ?></td>
				<td>Rp. <?php echo number_format($j->Gaji_Pokok, 0, ',', '.') ?></td>
				<td><?php echo number_format($j->Persentase_Bonus, 0, ',', '.') ?>%</td>
				<td>
					<center>
						<a class="btn btn-sm btn-primary"
							href="<?php echo base_url('admin/dataJabatan/updateData/' . $j->ID_Jabatan) ?>"><i
								class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"
							href="<?php echo base_url('admin/dataJabatan/deleteData/' . $j->ID_Jabatan) ?>"><i
								class="fas fa-trash"></i></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>


</div>
