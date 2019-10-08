<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $__env->yieldContent('judul_halaman'); ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo e(base_url('vendor/sbadmin2/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet"
		type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo e(base_url('vendor/sbadmin2/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="icon" type="image/png" href="<?php echo e(base_url('assets/img/logo.png')); ?>" />
	<script type="text/javascript" src="<?php echo e(base_url('assets/vendor/sweetalert/dist/sweetalert2.all.min.js')); ?>"></script>
	<link rel="stylesheet" href="<?php echo e(base_url('assets/vendor/sweetalert/dist/sweetalert2.min.css')); ?>">
	<script type="text/javascript" src="<?php echo e(base_url('vendor/sbadmin2/vendor/js/jquery.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(base_url('vendor/sbadmin2/vendor/js/bootstrap.js')); ?>"></script>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<?php echo $__env->make('include.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

					<!-- Topbar Search -->
					<form
						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>
						<li>
							<a href="<?php echo e(base_url('akun/keranjang')); ?>" class="fas fa-shopping-cart fa-lg mt-4"></a>
							<span class="badge badge-danger badge-counter"><?php
								$ci = &get_instance();
								echo count($ci->cart->contents());
								?></span>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e($user['nama']); ?></span>
								<img class="img-profile rounded-circle"
									src="<?php echo e(base_url('assets/img/profile/user/') . $user['image']); ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?php echo e(base_url('akun/profile')); ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Settings
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
									Activity Log
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<?php
					$ci = &get_instance();
					$pesan = $ci->session->flashdata('pesan');
					if($pesan['status_pesan'] == true && !empty($pesan)){
					echo '
						<script>
							Swal.fire({
								title: "SUCCESS",
								text: "Berhasil",
								type: "success",
								confirmButtonText: "Close"
							});
						</script>';
					} else if($pesan['status_pesan'] == false && !empty($pesan)){
					echo '<script>
							Swal.fire({
								title: "FAILED",
								text: "Gagal",
								type: "danger",
								confirmButtonText: "Close"
							});
						</script>';
					}
					?>
					<?php echo $__env->yieldContent('content'); ?>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2019</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?php echo e(base_url('akun/logout')); ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo e(base_url('vendor/sbadmin2/vendor/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(base_url('vendor/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

	<?php echo $__env->yieldContent('custom_script'); ?>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo e(base_url('vendor/sbadmin2/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo e(base_url('vendor/sbadmin2/js/sb-admin-2.min.js')); ?>"></script>
  
	<!-- Page level plugins -->
	<script src="<?php echo e(base_url('vendor/sbadmin2/vendor/chart.js/Chart.min.js')); ?>"></script>
  
	<!-- Page level custom scripts -->
	<script src="<?php echo e(base_url('vendor/sbadmin2/js/demo/chart-area-demo.js')); ?>"></script>
	<script src="<?php echo e(base_url('vendor/sbadmin2/js/demo/chart-pie-demo.js')); ?>"></script>
	<script src="<?php echo e(base_url('vendor/sbadmin2/js/demo/chart-bar-demo.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\restechno\application\views/layout/app.blade.php ENDPATH**/ ?>