<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Generate Slip Gaji</h1>
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<div class="card" style="width: 60%; margin: 0 auto;">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/SlipGaji/generate') ?>">
				<div class="form-group">
					<label>Pilih Pegawai</label>
					<select name="Pegawai_NIP" id="Pegawai_NIP" class="form-control">
						<?php foreach ($pegawai as $p): ?>
							<option value="<?php echo $p->NIP ?>"><?php echo $p->NIP . ' - ' . $p->Nama ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<button type="submit" class="btn btn-success">Generate Slip Gaji</button>
			</form>
		</div>
	</div>

</div>
