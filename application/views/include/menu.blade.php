<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-shopping-cart"></i>
		</div>
		<div class="sidebar-brand-text mx-3">RESTECHNO</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/index') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Interface
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	@if ($user['nama_level'] == 'member')

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/daftar_menu_user') }}">
			<i class="fas fa-fw fa-utensils"></i>
			<span>Menu Makanan</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span>Pesanan</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="{{ base_url('akun/data_pesanan_user/') }}">Data Pesanan</a>
				<a class="collapse-item" href="{{ base_url('akun/riwayat_pesanan/') }}">Riwayat Pesanan</a>
			</div>
		</div>
	</li>

	@endif

	@if ($user['nama_level'] == 'chef')

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/daftar_menu_chef') }}">
			<i class="fas fa-fw fa-utensils"></i>
			<span>Menu Makanan</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span>Pesanan</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="{{ base_url('akun/data_pesanan_chef') }}">Data Pesanan</a>
				<a class="collapse-item" href="{{ base_url('akun/pesanan_dibuat') }}">Pesanan Sedang Dibuat</a>
			</div>
		</div>
	</li>

	@endif

	@if ($user['nama_level'] == 'driver')

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/daftar_menu_driver') }}">
			<i class="fas fa-fw fa-utensils"></i>
			<span>Menu Makanan</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span>Pesanan</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="{{ base_url('akun/data_pesanan_driver') }}">Data Pesanan</a>
				<a class="collapse-item" href="{{ base_url('akun/pesanan_diantar') }}">Pesanan Sedang Diantar</a>
			</div>
		</div>
	</li>

	@endif


	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Addons
	</div>

	@if ($user['nama_level'] == 'admin')

	<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
				aria-controls="collapseTwo">
				<i class="fas fa-fw fa-shopping-cart"></i>
				<span>Pesanan</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Custom Components:</h6>
					<a class="collapse-item" href="{{ base_url('akun/data_pesanan_admin') }}">Data Pesanan</a>
					<a class="collapse-item" href="{{ base_url('akun/pesanan_selesai') }}">Pesanan Selesai</a>
				</div>
			</div>
		</li>
	

	<!-- Nav Item - Tambah Menu Makanan -->

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/daftar_menu_admin') }}">
			<i class="fas fa-fw fa-utensils"></i>
			<span>Menu Makanan</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/tambah_daftar_menu') }}">
			<i class="fas fa-fw fa-plus"></i>
			<span>Tambah Menu Makanan</span></a>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
			aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-user"></i>
			<span>User</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Utilities:</h6>
				<a class="collapse-item" href="{{ base_url('akun/data_admin') }}">Admin</a>
				<a class="collapse-item" href="{{ base_url('akun/data_member') }}">Member</a>
				<a class="collapse-item" href="{{ base_url('akun/data_chef') }}">Chef</a>
				<a class="collapse-item" href="{{ base_url('akun/data_driver') }}">Driver</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-user-plus"></i>
			<span>Add User</span>
		</a>
		<div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Users:</h6>
				<a class="collapse-item" href="{{ base_url('akun/registrasi_admin') }}">Tambah Admin</a>
				<a class="collapse-item" href="{{ base_url('akun/registrasi_driver') }}">Tambah Driver</a>
				<a class="collapse-item" href="{{ base_url('akun/registrasi_chef') }}">Tambah Chef</a>
				<div class="collapse-divider"></div>
			</div>
		</div>
		</span>

		@endif


	<li class="nav-item">
		<a class="nav-link" href="{{ base_url('akun/profile') }}">
			<i class="fas fa-fw fa-user"></i>
			<span>Profile</span></a>
	</li>

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->