<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/dataPegawai/tambahDataAksi') ?>">

				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="NIP" class="form-control">
					<?php echo form_error('NIP', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="Nama" class="form-control">
					<?php echo form_error('Nama', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="Alamat" class="form-control">
					<?php echo form_error('Alamat', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="Tanggal_Lahir" class="form-control">
					<?php echo form_error('Tanggal_Lahir', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="Tanggal_Masuk" class="form-control">
					<?php echo form_error('Tanggal_Masuk', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Bidang</label>
					<select name="Bidang" id="Bidang" class="form-control">
						<option value="">Pilih Bidang</option>
						<?php
						$bidang = [];
						foreach ($jabatan as $j) {
							if (!in_array($j->Bidang, $bidang)) {
								$bidang[] = $j->Bidang;
								echo "<option value='{$j->Bidang}'>{$j->Bidang}</option>";
							}
						}
						?>
					</select>
					<?php echo form_error('Bidang', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Nama Jabatan</label>
					<select name="Jabatan_ID" id="Jabatan_ID" class="form-control">
						<option value="">Pilih Jabatan</option>
					</select>
					<?php echo form_error('Jabatan_ID', '<div class="text-small text-danger"></div>') ?>
				</div>

				<button type="submit" class="btn btn-success">Submit</button>

			</form>
		</div>
	</div>

</div>

<script>
	const jabatan = <?php echo json_encode($jabatan); ?>;
	const bidangSelect = document.getElementById('Bidang');
	const jabatanSelect = document.getElementById('Jabatan_ID');

	bidangSelect.addEventListener('change', function () {
		const selectedBidang = this.value;
		jabatanSelect.innerHTML = '<option value="">Pilih Jabatan</option>';
		jabatan.forEach(function (j) {
			if (j.Bidang === selectedBidang) {
				jabatanSelect.innerHTML += `<option value="${j.ID_Jabatan}">${j.Nama_Jabatan}</option>`;
			}
		});
	});
</script>
