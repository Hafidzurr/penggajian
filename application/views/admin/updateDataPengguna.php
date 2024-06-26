<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<?php foreach ($pengguna as $i): ?>
				<form method="POST" action="<?php echo base_url('admin/dataPengguna/updateDataAksi') ?>">

					<div class="form-group">
						<label>Nama dan NIP</label>
						<select name="Pegawai_NIP" class="form-control">
							<?php foreach ($pegawai as $p): ?>
								<option value="<?php echo $p->NIP ?>" <?php echo ($i->Pegawai_NIP == $p->NIP) ? 'selected' : ''; ?>>
									<?php echo $p->Nama . ' - ' . $p->NIP ?>
								</option>
							<?php endforeach; ?>
						</select>
						<?php echo form_error('Pegawai_NIP', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="hidden" name="ID_Pengguna" class="form-control" value="<?php echo $i->ID_Pengguna ?>">
						<input type="text" name="Username" class="form-control" value="<?php echo $i->Username ?>">
						<?php echo form_error('Username', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<input type="password" name="Password" id="password" class="form-control"
								value="<?php echo $i->Password ?>">
							<div class="input-group-append">
								<button type="button" class="btn btn-outline-secondary"
									onclick="togglePasswordVisibility()">Show</button>
							</div>
						</div>
						<?php echo form_error('Password', '<div class="text-small text-danger"></div>') ?>
					</div>

					<div class="form-group">
						<label>Role</label>
						<select name="Role" class="form-control">
							<option value="admin" <?php echo ($i->Role == 'admin') ? 'selected' : ''; ?>>Admin</option>
							<option value="pegawai" <?php echo ($i->Role == 'pegawai') ? 'selected' : ''; ?>>Pegawai</option>
							<option value="hrd" <?php echo ($i->Role == 'hrd') ? 'selected' : ''; ?>>HRD</option>
						</select>
						<?php echo form_error('Role', '<div class="text-small text-danger"></div>') ?>
					</div>

					<button type="submit" class="btn btn-success">Update</button>

				</form>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<script>
	function togglePasswordVisibility() {
		var passwordInput = document.getElementById('password');
		var passwordToggle = document.querySelector('.input-group-append button');
		if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
			passwordToggle.textContent = 'Hide';
		} else {
			passwordInput.type = 'password';
			passwordToggle.textContent = 'Show';
		}
	}
</script>
