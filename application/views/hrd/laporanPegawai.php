<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
		<form method="GET" action="<?php echo base_url('hrd/laporanPegawai/cetak') ?>" target="_blank">
			<input type="hidden" name="bulan" value="<?php echo isset($_POST['bulan']) ? $_POST['bulan'] : '' ?>">
			<input type="hidden" name="tahun" value="<?php echo isset($_POST['tahun']) ? $_POST['tahun'] : '' ?>">
			<button type="submit" class="btn btn-sm btn-primary">
				<i class="fas fa-print"></i> Cetak Laporan
			</button>
		</form>
	</div>

	<div class="card mb-4">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('hrd/laporanPegawai/filter') ?>">
				<div class="form-group row">
					<label for="bulan" class="col-sm-2 col-form-label">Bulan Masuk</label>
					<div class="col-sm-4">
						<select class="form-control" id="bulan" name="bulan">
							<option value="">--Pilih Bulan--</option>
							<?php for ($i = 1; $i <= 12; $i++): ?>
								<option value="<?php echo $i ?>"><?php echo date('F', mktime(0, 0, 0, $i, 10)) ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<label for="tahun" class="col-sm-2 col-form-label">Tahun Masuk</label>
					<div class="col-sm-4">
						<select class="form-control" id="tahun" name="tahun">
							<option value="">--Pilih Tahun--</option>
							<?php for ($i = date('Y'); $i >= 2000; $i--): ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-sm btn-primary">Tampilkan Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">NIP</th>
						<th class="text-center">Nama Pegawai</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Tanggal Lahir</th>
						<th class="text-center">Tanggal Masuk</th>
						<th class="text-center">Bidang</th>
						<th class="text-center">Jabatan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($pegawai as $p): ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td class="text-center"><?php echo $p->NIP ?></td>
							<td><?php echo $p->Nama ?></td>
							<td><?php echo $p->Alamat ?></td>
							<td class="text-center"><?php echo $p->Tanggal_Lahir ?></td>
							<td class="text-center"><?php echo $p->Tanggal_Masuk ?></td>
							<td class="text-center"><?php echo $p->Bidang ?></td>
							<td class="text-center"><?php echo $p->Nama_Jabatan ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
