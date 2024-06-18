<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.container {
			width: 80%;
			margin: 0 auto;
		}

		h1 {
			text-align: center;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		th,
		td {
			padding: 8px;
			text-align: center;
		}
	</style>
</head>

<body>

	<div class="container">
		<h1><?php echo $title ?></h1>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>NIP</th>
					<th>Nama Pegawai</th>
					<th>Alamat</th>
					<th>Tanggal Lahir</th>
					<th>Tanggal Masuk</th>
					<th>Bidang</th>
					<th>Jabatan</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($pegawai as $p): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $p->NIP ?></td>
						<td><?php echo $p->Nama ?></td>
						<td><?php echo $p->Alamat ?></td>
						<td><?php echo $p->Tanggal_Lahir ?></td>
						<td><?php echo $p->Tanggal_Masuk ?></td>
						<td><?php echo $p->Bidang ?></td>
						<td><?php echo $p->Nama_Jabatan ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		window.print();
	</script>

</body>

</html>
