<div class="container-fluid">


	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataPegawai/tambahData/') ?>"><i
			class="fas fa-plus"> Tambah Data</i></a>
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NIP</th>
			<th class="text-center">Nama Pegawai</th>
			<th class="text-center">Alamat</th>
			<th class="text-center">Tanggal Lahir</th>
			<th class="text-center">Tanggal Masuk</th>
			<th class="text-center">Bidang</th>
			<th class="text-center">Jabatan</th>
			<th class="text-center">Action</th>
		</tr>
		<?php $no = 1;
		foreach ($pegawai as $p): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $p->NIP ?></td>
				<td><?php echo $p->Nama ?></td>
				<td><?php echo $p->Alamat ?></td>
				<td><?php echo $p->Tanggal_Lahir ?></td>
				<td><?php echo $p->Tanggal_Masuk ?></td>
				<td><?php echo $p->Bidang ?></td>
				<td><?php echo $p->Nama_Jabatan ?></td>


				<td>
					<center>
						<a class="btn btn-sm btn-primary"
							href="<?php echo base_url('admin/dataPegawai/updateData/' . $p->NIP) ?>"><i
								class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"
							href="<?php echo base_url('admin/dataPegawai/deleteData/' . $p->NIP) ?>"><i
								class="fas fa-trash"></i></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>


</div>
