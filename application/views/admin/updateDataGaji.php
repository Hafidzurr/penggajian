<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<?php foreach ($gaji as $g): ?>
				<form method="POST" action="<?php echo base_url('admin/DataGaji/updateDataAksi') ?>">

					<div class="form-group">
						<label>NIP Pegawai</label>
						<input type="hidden" name="ID_Gaji" class="form-control" value="<?php echo $g->ID_Gaji ?>">
						<select name="Pegawai_NIP" id="Pegawai_NIP" class="form-control">
							<option value="">Pilih Pegawai</option>
							<?php foreach ($pegawai as $p): ?>
								<option value="<?php echo $p->NIP ?>" <?php echo ($g->Pegawai_NIP == $p->NIP) ? 'selected' : '' ?>><?php echo $p->NIP . ' - ' . $p->Nama ?></option>
							<?php endforeach; ?>
						</select>
						<?php echo form_error('Pegawai_NIP', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Gaji Pokok</label>
						<input type="text" name="Gaji_Pokok" id="Gaji_Pokok" class="form-control"
							value="<?php echo $g->Gaji_Pokok ?>" readonly>
						<?php echo form_error('Gaji_Pokok', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Bonus</label>
						<input type="text" name="Bonus" id="Bonus" class="form-control" value="<?php echo $g->Bonus ?>"
							readonly>
						<?php echo form_error('Bonus', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>PPH 5%</label>
						<input type="text" name="PPH_5" id="PPH_5" class="form-control" value="<?php echo $g->PPH_5 ?>"
							readonly>
						<?php echo form_error('PPH_5', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Total Gaji</label>
						<input type="text" name="Total_Gaji" id="Total_Gaji" class="form-control"
							value="<?php echo $g->Total_Gaji ?>" readonly>
						<?php echo form_error('Total_Gaji', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Bulan</label>
						<input type="text" name="Bulan" class="form-control" value="<?php echo $g->Bulan ?>">
						<?php echo form_error('Bulan', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="Tahun" class="form-control" value="<?php echo $g->Tahun ?>">
						<?php echo form_error('Tahun', '<div class="text-small text-danger"></div>') ?>
					</div>

					<button type="submit" class="btn btn-success">Update</button>

				</form>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<script>
	const pegawai = <?php echo json_encode($pegawai); ?>;
	const pegawaiSelect = document.getElementById('Pegawai_NIP');
	const gajiPokokInput = document.getElementById('Gaji_Pokok');
	const bonusInput = document.getElementById('Bonus');
	const pph5Input = document.getElementById('PPH_5');
	const totalGajiInput = document.getElementById('Total_Gaji');

	pegawaiSelect.addEventListener('change', function () {
		const selectedNIP = this.value;
		const selectedPegawai = pegawai.find(p => p.NIP === selectedNIP);
		if (selectedPegawai) {
			const gajiPokok = selectedPegawai.Gaji_Pokok;
			const bonus = gajiPokok * (selectedPegawai.Persentase_Bonus / 100);
			const pph5 = (gajiPokok + bonus) * 0.05;
			const totalGaji = gajiPokok + bonus - pph5;

			gajiPokokInput.value = gajiPokok.toLocaleString('id-ID');
			bonusInput.value = bonus.toLocaleString('id-ID');
			pph5Input.value = pph5.toLocaleString('id-ID');
			totalGajiInput.value = totalGaji.toLocaleString('id-ID');
		} else {
			gajiPokokInput.value = '';
			bonusInput.value = '';
			pph5Input.value = '';
			totalGajiInput.value = '';
		}
	});

	// Trigger the change event to calculate initial values
	pegawaiSelect.dispatchEvent(new Event('change'));
</script>
