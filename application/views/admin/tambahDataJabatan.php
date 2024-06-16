<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>">

				<div class="form-group">
					<label>Bidang</label>
					<input type="text" name="Bidang" class="form-control">
					<?php echo form_error('Bidang', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Nama Jabatan</label>
					<input type="text" name="Nama_Jabatan" class="form-control">
					<?php echo form_error('Nama_Jabatan', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Gaji Pokok</label>
					<input type="number" name="Gaji_Pokok" class="form-control">
					<?php echo form_error('Gaji_Pokok', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Persentase Bonus</label>
					<input type="number" name="Persentase_Bonus" class="form-control">
					<?php echo form_error('Persentase_Bonus', '<div class="text-small text-danger"></div>') ?>
				</div>

				<button type="submit" class="btn btn-success">Submit</button>

			</form>
		</div>
	</div>

</div>
