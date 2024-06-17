<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Filter Form -->
	<form method="POST" action="<?php echo base_url('admin/LaporanGaji/filter') ?>">
		<div class="form-group">
			<label for="bulan">Bulan</label>
			<select name="bulan" id="bulan" class="form-control">
				<option value="">--Pilih Bulan--</option>
				<?php for ($i = 1; $i <= 12; $i++): ?>
					<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="tahun">Tahun</label>
			<select name="tahun" id="tahun" class="form-control">
				<option value="">--Pilih Tahun--</option>
				<?php for ($i = date('Y'); $i >= 2000; $i--): ?>
					<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Tampilkan Data</button>
	</form>

	<!-- Table -->
	<?php if (!empty($bulan) && !empty($tahun)): ?>
		<div class="mt-3">
			<h5>Menampilkan Data Pegawai Bulan: <?php echo $bulan ?> Tahun: <?php echo $tahun ?></h5>
			<button class="btn btn-success mb-3" onclick="printDiv('printArea')">Cetak Laporan Gaji</button>
			<div id="printArea">
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
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	<?php endif; ?>
</div>

<script>
	function printDiv(divId) {
		var printContents = document.getElementById(divId).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
