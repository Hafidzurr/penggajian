<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<!-- <div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div> -->
				<div class="sidebar-brand-text mx-3">HR WEBSITE</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('hrd/dashboard') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
					aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-database"></i>
					<span>Master Data</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('hrd/dataPegawai') ?>">Data Pegawai</a>
						<a class="collapse-item" href="<?php echo base_url('hrd/dataJabatan') ?>">Data Jabatan</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
					aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-money-check-alt"></i>
					<span>Transaksi</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
					data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<!-- <a class="collapse-item" href="<?php echo base_url('hrd/data_absensi') ?>">Data Absensi</a> -->
						<a class="collapse-item" href="<?php echo base_url('hrd/dataGaji') ?>">Data Gaji</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
					aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-scroll"></i>
					<span>Laporan</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('hrd/laporanGaji') ?>">Laporan Gaji</a>
						<a class="collapse-item" href="<?php echo base_url('hrd/laporanPegawai') ?>">Laporan Data
							Pegawai</a>
						<a class="collapse-item" href="<?php echo base_url('hrd/slipGaji') ?>">Slip Gaji</a>
					</div>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('user/gantiPassword') ?>">
					<i class="fas fa-fw fa-lock"></i>
					<span>Ganti Password</span></a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('welcome/logout') ?>">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

			<!-- Sidebar Message -->
			<!-- <div class="sidebar-card d-none d-lg-flex">
				<img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
				<p class="text-center mb-2"><strong>SB hrd Pro</strong> is packed with premium features, components, and more!</p>
				<a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-hrd-pro">Upgrade to Pro!</a>
			</div> -->

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- <h4 class="font-weight-bold">PT.BAROQAH TBK </h4> -->

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">






						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">SELAMAT DATANG
									<b><?php echo $this->session->userdata('Nama_Pegawai'); ?></b></span>
							</a>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
