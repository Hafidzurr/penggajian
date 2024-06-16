<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/dataGaji/tambahDataAksi') ?>">

				<div class="form-group">
					<label>NIP Pegawai</label>
					<select name="Pegawai_NIP" id="Pegawai_NIP" class="form-control">
						<option value="">Pilih NIP</option>
						<?php foreach ($pegawai as $p): ?>
							<option value="<?php echo $p->NIP ?>" data-gaji-pokok="<?php echo $p->Gaji_Pokok ?>"
								data-persentase-bonus="<?php echo $p->Persentase_Bonus ?>">
								<?php echo $p->NIP . " - " . $p->Nama ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('Pegawai_NIP', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Gaji Pokok</label>
					<input type="text" name="Gaji_Pokok" id="Gaji_Pokok" class="form-control" readonly>
					<?php echo form_error('Gaji_Pokok', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Bonus</label>
					<input type="text" name="Bonus" id="Bonus" class="form-control" readonly>
					<?php echo form_error('Bonus', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>PPH 5%</label>
					<input type="text" name="PPH_5" id="PPH_5" class="form-control" readonly>
					<?php echo form_error('PPH_5', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Total Gaji</label>
					<input type="text" name="Total_Gaji" id="Total_Gaji" class="form-control" readonly>
					<?php echo form_error('Total_Gaji', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Bulan</label>
					<input type="text" name="Bulan" class="form-control">
					<?php echo form_error('Bulan', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Tahun</label>
					<input type="text" name="Tahun" class="form-control">
					<?php echo form_error('Tahun', '<div class="text-small text-danger"></div>') ?>
				</div>

				<button type="submit" class="btn btn-success">Submit</button>

			</form>
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
		var selectedOption = this.options[this.selectedIndex];
		var gajiPokok = selectedOption.getAttribute('data-gaji-pokok');
		var persentaseBonus = selectedOption.getAttribute('data-persentase-bonus');

		var bonus = gajiPokok * (persentaseBonus / 100);
		var gajiTotal = parseFloat(gajiPokok) + parseFloat(bonus);
		var pph = gajiTotal * 0.05;
		var totalGaji = gajiTotal - pph;

		document.getElementById('Gaji_Pokok').value = formatRupiah(gajiPokok);
		document.getElementById('Bonus').value = formatRupiah(bonus);
		document.getElementById('PPH_5').value = formatRupiah(pph);
		document.getElementById('Total_Gaji').value = formatRupiah(totalGaji);
	});
</script>
