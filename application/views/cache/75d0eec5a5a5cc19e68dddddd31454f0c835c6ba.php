<?php $__env->startSection('judul', 'Edit Menu'); ?>
<?php $__env->startSection('judul_halaman', 'Edit Menu'); ?>
<?php $__env->startSection('content'); ?>


<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 240px; width: 550px;">
	<div class="card-body p-4">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class=" d-none d-lg-block"></div>
			<div class="col-lg-12">
				<div class="p-4 mb-4">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4"><?php echo $__env->yieldContent('judul'); ?></h1>
					</div>
					<form class="user" enctype="multipart/form-data" action="<?php echo e(base_url('akun/update_menu')); ?>"
						method="POST">
						
						<div class="form-group">
							<div class="col-sm-15 mb-4">
								<input type="hidden" name="id_user" id="id_menu" value="<?php echo e($menu['id_menu']); ?>">
								<select type="text" class="form-control" id="kategori_menu" name="kategori_menu"
									value="<?php echo e($menu['kategori_menu']); ?>">
									<option>Makanan</option>
									<option>Minuman</option>
								</select>

							</div>
							<div class="col-sm-15 mb-4">
								<input type="text" class="form-control form-control-user" id="nama_menu"
									name="nama_menu" placeholder="Nama Menu" value="<?php echo e($menu['nama_menu']); ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-15 mb-4">
								<input type="text" class="form-control form-control-user" id="harga_menu"
									name="harga_menu" placeholder="Harga Menu" value="<?php echo e($menu['harga_menu']); ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-15 mb-4">
								<input type="text" class="form-control form-control-user" id="deskripsi"
									name="deskripsi" placeholder="Deskripsi" value="<?php echo e($menu['deskripsi']); ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 mr-3">
								<img src="<?php echo e(base_url('assets/img/daftar_menu/') . $menu['image_menu']); ?>"
									class="img-thumbnail">
							</div>
							<div class="col-sm-6">
								<div class="custom-file">
									<input type="hidden" id="gambar1" name="gambar1" value="<?php echo e($menu['image_menu']); ?>">
									<input class="form-control custom-file-input" type="file" id="gambar" name="gambar">
									<label for="gambar" class="custom-file-label">Choose File</label>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-user btn-block">
							Update Menu
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
<script>
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/edit_menu.blade.php ENDPATH**/ ?>