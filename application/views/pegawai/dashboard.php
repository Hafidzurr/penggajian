<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="alert alert-success font-weight-bold mb-4" style="width:65%">Selamat Datang, Anda Login Sebagai Pegawai
	</div>

	<div class="card" style="margin-bottom: 120px; width: 65%">
		<div class="card-header font-weight-bold bg-primary text-white">
			Data Pegawai
		</div>

		<div class="card-body">
			<div class="col-md-7">
				<?php if ($pegawai): ?>
					<?php foreach ($pegawai as $p): ?>
						<div class="card mb-3">
							<div class="card-header">
								<strong>NIP:</strong> <?php echo $p->NIP; ?>
							</div>
							<div class="card-body">
								<p><strong>Nama:</strong> <?php echo $p->Nama; ?></p>
								<p><strong>Tanggal Lahir:</strong> <?php echo $p->Tanggal_Lahir; ?></p>
								<p><strong>Tanggal Masuk:</strong> <?php echo $p->Tanggal_Masuk; ?></p>
								<p><strong>Bidang:</strong> <?php echo $p->Bidang; ?></p>
								<p><strong>Jabatan:</strong> <?php echo $p->Nama_Jabatan; ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p>Tidak ada data pegawai yang ditemukan.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

</div>
