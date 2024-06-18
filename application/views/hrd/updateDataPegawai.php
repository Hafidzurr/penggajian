<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<?php foreach ($pegawai as $p): ?>
				<form method="POST" action="<?php echo base_url('admin/dataPegawai/updateDataAksi') ?>">

					<div class="form-group">
						<label>NIP</label>
						<input type="text" name="NIP" class="form-control" value="<?php echo $p->NIP ?>" readonly>
						<?php echo form_error('NIP', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Nama Pegawai</label>
						<input type="text" name="Nama" class="form-control" value="<?php echo $p->Nama ?>">
						<?php echo form_error('Nama', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="Alamat" class="form-control" value="<?php echo $p->Alamat ?>">
						<?php echo form_error('Alamat', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="Tanggal_Lahir" class="form-control"
							value="<?php echo $p->Tanggal_Lahir ?>">
						<?php echo form_error('Tanggal_Lahir', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input type="date" name="Tanggal_Masuk" class="form-control"
							value="<?php echo $p->Tanggal_Masuk ?>">
						<?php echo form_error('Tanggal_Masuk', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Bidang</label>
						<select name="Bidang" id="BidangSelect" class="form-control">
							<option value="">Pilih Bidang</option>
							<?php
							$bidang = [];
							foreach ($jabatan as $j) {
								if (!in_array($j->Bidang, $bidang)) {
									$bidang[] = $j->Bidang;
									echo "<option value='{$j->Bidang}' " . ($p->Bidang == $j->Bidang ? 'selected' : '') . ">{$j->Bidang}</option>";
								}
							}
							?>
						</select>
						<?php echo form_error('Bidang', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Nama Jabatan</label>
						<select name="Jabatan_ID" id="JabatanSelect" class="form-control">
							<option value="">Pilih Jabatan</option>
						</select>
						<?php echo form_error('Jabatan_ID', '<div class="text-small text-danger"></div>') ?>
					</div>

					<button type="submit" class="btn btn-success">Submit</button>

				</form>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const jabatan = <?php echo json_encode($jabatan); ?>;
		const bidangSelect = document.getElementById('BidangSelect');
		const jabatanSelect = document.getElementById('JabatanSelect');

		const populateJabatanSelect = (selectedBidang, selectedJabatan) => {
			jabatanSelect.innerHTML = '<option value="">Pilih Jabatan</option>';
			const jabatanTampil = [];
			jabatan.forEach(function (j) {
				if (j.Bidang === selectedBidang && !jabatanTampil.includes(j.Nama_Jabatan)) {
					jabatanTampil.push(j.Nama_Jabatan);
					jabatanSelect.innerHTML += `<option value="${j.ID_Jabatan}" ${j.ID_Jabatan == selectedJabatan ? 'selected' : ''}>${j.Nama_Jabatan}</option>`;
				}
			});
		};

		bidangSelect.addEventListener('change', function () {
			const selectedBidang = this.value;
			populateJabatanSelect(selectedBidang, null);
		});

		// Set initial options based on current bidang
		const initialBidang = '<?php echo $p->Bidang; ?>';
		const initialJabatan = '<?php echo $p->Jabatan_ID; ?>';
		if (initialBidang) {
			bidangSelect.value = initialBidang;
			populateJabatanSelect(initialBidang, initialJabatan);
		}
	});
</script>
