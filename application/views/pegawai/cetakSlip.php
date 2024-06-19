<html>

<head>
	<title><?php echo $title ?></title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.container {
			width: 80%;
			margin: auto;
			padding-top: 20px;
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.header h1 {
			margin: 0;
		}

		.content {
			border: 1px solid #000;
			padding: 20px;
		}

		.content table {
			width: 100%;
			border-collapse: collapse;
		}

		.content table,
		.content table th,
		.content table td {
			border: 1px solid #000;
		}

		.content table th,
		.content table td {
			padding: 10px;
			text-align: left;
		}

		.footer {
			margin-top: 20px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="header">
			<h1>Slip Gaji Pegawai</h1>
		</div>
		<div class="content">
			<table>
				<tr>
					<th>NIP</th>
					<td><?php echo $gaji->Pegawai_NIP ?></td>
				</tr>
				<tr>
					<th>Nama Pegawai</th>
					<td><?php echo $gaji->Nama_Pegawai ?></td>
				</tr>
				<tr>
					<th>Jabatan</th>
					<td><?php echo $gaji->Nama_Jabatan ?></td>
				</tr>
				<tr>
					<th>Bidang</th>
					<td><?php echo $gaji->Bidang ?></td>
				</tr>
				<tr>
					<th>Gaji Pokok</th>
					<td>Rp. <?php echo number_format($gaji->Gaji_Pokok, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th>Bonus</th>
					<td>Rp. <?php echo number_format($gaji->Bonus, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th>PPH 5%</th>
					<td>Rp. <?php echo number_format($gaji->PPH_5, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th>Total Gaji</th>
					<td>Rp. <?php echo number_format($gaji->Total_Gaji, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th>Tanggal Gajian</th>
					<td><?php echo date('d-m-Y', strtotime($gaji->Tanggal_Gajian)) ?></td>
				</tr>
			</table>
		</div>
		<div class="footer">
			<button onclick="window.print()">Cetak</button>
		</div>
	</div>
</body>

</html>
