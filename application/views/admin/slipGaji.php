<div class="container-fluid">
	<div class="card" style="width: 60%; margin: 0 auto;">
		<div class="card-body">
			<h3 class="text-center"><?php echo $title ?></h3>
			<br><br>
			<div id="printArea">
				<table class="table">
					<tr>
						<td><strong>NIP</strong></td>
						<td><?php echo $gaji->NIP ?></td>
					</tr>
					<tr>
						<td><strong>Nama Pegawai</strong></td>
						<td><?php echo $gaji->Nama_Pegawai ?></td>
					</tr>
					<tr>
						<td><strong>Bidang</strong></td>
						<td><?php echo $gaji->Bidang ?></td>
					</tr>
					<tr>
						<td><strong>Jabatan</strong></td>
						<td><?php echo $gaji->Nama_Jabatan ?></td>
					</tr>
					<tr>
						<td><strong>Gaji Pokok</strong></td>
						<td>Rp. <?php echo number_format($gaji->Gaji_Pokok, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><strong>Bonus</strong></td>
						<td>Rp. <?php echo number_format($gaji->Bonus, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><strong>PPH 5%</strong></td>
						<td>Rp. <?php echo number_format($gaji->PPH_5, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><strong>Total Gaji</strong></td>
						<td>Rp. <?php echo number_format($gaji->Total_Gaji, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><strong>Tanggal Gajian</strong></td>
						<td><?php echo date('d-m-Y', strtotime($gaji->Tanggal_Gajian)) ?></td>
					</tr>
				</table>
			</div>
			<button class="btn btn-success" onclick="printDiv('printArea')">Cetak Slip Gaji</button>
		</div>
	</div>
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
