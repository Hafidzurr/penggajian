<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<!-- Content Row -->

	<div class="card" style="width: 60%">
		<div class="card-body">
			<?php if (isset($error)): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><?php echo $error; ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<form method="POST" action="<?php echo base_url('admin/dataPengguna/tambahDataAksi') ?>">

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="Username" class="form-control">
					<?php echo form_error('Username', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Password</label>
					<div class="input-group">
						<input type="password" name="Password" id="password" class="form-control">
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-secondary"
								onclick="togglePasswordVisibility()">Show</button>
						</div>
					</div>
					<?php echo form_error('Password', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>Role</label>
					<input type="text" name="Role" class="form-control">
					<?php echo form_error('Role', '<div class="text-small text-danger"></div>') ?>
				</div>

				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="Pegawai_NIP" class="form-control">
					<?php echo form_error('Pegawai_NIP', '<div class="text-small text-danger"></div>') ?>
				</div>

				<button type="submit" class="btn btn-success">Submit</button>

			</form>
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
