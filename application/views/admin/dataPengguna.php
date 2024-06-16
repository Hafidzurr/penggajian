<div class="container-fluid">


	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataPengguna/tambahData/') ?>"><i
			class="fas fa-plus"> Tambah Data</i></a>
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Username</th>
			<th class="text-center">Password</th>
			<th class="text-center">Role</th>
			<th class="text-center">NIP Pegawai</th>
			<th class="text-center">Action</th>
		</tr>
		<?php $no = 1;
		foreach ($pengguna as $i): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $i->Username ?></td>
				<td><?php echo $i->Password ?></td>
				<td><?php echo $i->Role ?></td>
				<td><?php echo $i->Pegawai_NIP ?></td>
				<td>
					<center>
						<a class="btn btn-sm btn-primary"
							href="<?php echo base_url('admin/dataPengguna/updateData/' . $i->ID_Pengguna) ?>"><i
								class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger"
							href="<?php echo base_url('admin/dataPengguna/deleteData/' . $i->ID_Pengguna) ?>"><i
								class="fas fa-trash"></i></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>


</div>
