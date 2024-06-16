<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<?php foreach ($gaji as $g): ?>
				<form method="POST" action="<?php echo base_url('admin/dataGaji/updateDataAksi') ?>">

					<input type="hidden" name="ID_Gaji" value="<?php echo $g->ID_Gaji ?>">

					<div class="form-group">
						<label>NIP Pegawai</label>
						<select name="Pegawai_NIP" id="Pegawai_NIP" class="form-control" readonly>
							<?php foreach ($pegawai as $p): ?>
								<option value="<?php echo $p->NIP ?>" data-gaji="<?php echo $p->Gaji_Pokok ?>"
									data-bonus="<?php echo $p->Persentase_Bonus ?>" <?php echo ($g->Pegawai_NIP == $p->NIP) ? 'selected' : '' ?>>
									<?php echo $p->NIP . ' - ' . $p->Nama ?>
								</option>
							<?php endforeach; ?>
						</select>
						<?php echo form_error('Pegawai_NIP', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Gaji Pokok</label>
						<input type="text" name="Gaji_Pokok" id="Gaji_Pokok" class="form-control"
							value="<?php echo 'Rp. ' . number_format($g->Gaji_Pokok, 0, ',', '.'); ?>" readonly>
						<?php echo form_error('Gaji_Pokok', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Bonus</label>
						<input type="text" name="Bonus" id="Bonus" class="form-control"
							value="<?php echo 'Rp. ' . number_format($g->Bonus, 0, ',', '.'); ?>" readonly>
						<?php echo form_error('Bonus', '<div class="text-small text-danger"></div>') ?>
						<input type="checkbox" id="enable_bonus" <?php echo ($g->Bonus > 0) ? 'checked' : '' ?>> Aktifkan
						Bonus
					</div>

					<div class="form-group">
						<label>PPH 5%</label>
						<input type="text" name="PPH_5" id="PPH_5" class="form-control"
							value="<?php echo 'Rp. ' . number_format($g->PPH_5, 0, ',', '.'); ?>" readonly>
						<?php echo form_error('PPH_5', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Total Gaji</label>
						<input type="text" name="Total_Gaji" id="Total_Gaji" class="form-control"
							value="<?php echo 'Rp. ' . number_format($g->Total_Gaji, 0, ',', '.'); ?>" readonly>
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
	function formatRupiah(angka) {
		var number_string = angka.toString(),
			sisa = number_string.length % 3,
			rupiah = number_string.substr(0, sisa),
			ribuan = number_string.substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		return 'Rp. ' + rupiah;
	}

	document.getElementById('Pegawai_NIP').addEventListener('change', function () {
		const selectedOption = this.options[this.selectedIndex];
		const gajiPokok = selectedOption.getAttribute('data-gaji');
		const persentaseBonus = selectedOption.getAttribute('data-bonus');
		const enableBonus = document.getElementById('enable_bonus').checked;

		const bonus = enableBonus ? (parseFloat(gajiPokok) * parseFloat(persentaseBonus) / 100) : 0;
		const pph = (parseFloat(gajiPokok) + bonus) * 0.05;
		const totalGaji = parseFloat(gajiPokok) + bonus - pph;

		document.getElementById('Gaji_Pokok').value = formatRupiah(gajiPokok.toString(), 'Rp. ');
		document.getElementById('Bonus').value = formatRupiah(bonus.toFixed(2).toString(), 'Rp. ');
		document.getElementById('PPH_5').value = formatRupiah(pph.toFixed(2).toString(), 'Rp. ');
		document.getElementById('Total_Gaji').value = formatRupiah(totalGaji.toFixed(2).toString(), 'Rp. ');
	});

	document.getElementById('enable_bonus').addEventListener('change', function () {
		const selectedOption = document.getElementById('Pegawai_NIP').options[document.getElementById('Pegawai_NIP').selectedIndex];
		const gajiPokok = selectedOption.getAttribute('data-gaji');
		const persentaseBonus = selectedOption.getAttribute('data-bonus');
		const enableBonus = this.checked;

		const bonus = enableBonus ? (parseFloat(gajiPokok) * parseFloat(persentaseBonus) / 100) : 0;
		const pph = (parseFloat(gajiPokok) + bonus) * 0.05;
		const totalGaji = parseFloat(gajiPokok) + bonus - pph;

		document.getElementById('Bonus').value = formatRupiah(bonus.toFixed(2).toString(), 'Rp. ');
		document.getElementById('PPH_5').value = formatRupiah(pph.toFixed(2).toString(), 'Rp. ');
		document.getElementById('Total_Gaji').value = formatRupiah(totalGaji.toFixed(2).toString(), 'Rp. ');
	});

	// Initial calculation for pre-filled values
	document.addEventListener('DOMContentLoaded', function () {
		const selectedOption = document.getElementById('Pegawai_NIP').options[document.getElementById('Pegawai_NIP').selectedIndex];
		const gajiPokok = selectedOption.getAttribute('data-gaji');
		const persentaseBonus = selectedOption.getAttribute('data-bonus');
		const enableBonus = document.getElementById('enable_bonus').checked;

		const bonus = enableBonus ? (parseFloat(gajiPokok) * parseFloat(persentaseBonus) / 100) : 0;
		const pph = (parseFloat(gajiPokok) + bonus) * 0.05;
		const totalGaji = parseFloat(gajiPokok) + bonus - pph;

		document.getElementById('Gaji_Pokok').value = formatRupiah(gajiPokok.toString(), 'Rp. ');
		document.getElementById('Bonus').value = formatRupiah(bonus.toFixed(2).toString(), 'Rp. ');
		document.getElementById('PPH_5').value = formatRupiah(pph.toFixed(2).toString(), 'Rp. ');
		document.getElementById('Total_Gaji').value = formatRupiah(totalGaji.toFixed(2).toString(), 'Rp. ');
	});
</script>
