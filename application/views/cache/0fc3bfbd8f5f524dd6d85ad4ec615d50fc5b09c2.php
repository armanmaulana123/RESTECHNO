<?php $__env->startSection('judul_halaman', 'Daftar Menu'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(base_url('akun/addCart')); ?>" method="POST">
<div class="row">
<?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <div class="card">
          <input type="hidden" name="id_menu" value="<?php echo e($m['id_menu']); ?>">
          <img name="image_menu" src="<?php echo e(base_url('assets/img/daftar_menu/') . $m['image_menu']); ?>" class="card-img-top">
          <div class="card-body">
            <h5 name="nama_menu" class="card-title"><?php echo e($m['nama_menu']); ?></h5>
            <p name="harga_menu" class="card-text">Harga : <?php echo e($m['harga_menu']); ?></p>
            <hr>
            <p name="stok_menu" class="card-text">Deskripsi : <?php echo e($m['deskripsi']); ?> </p>
            <div class="text-right">
              <a href="<?php echo e(base_url('akun/addCart/') . $m['id_menu']); ?>" class="btn btn-primary btn-sm">Add To Cart</a>
            </div>
          </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/daftar_menu_user.blade.php ENDPATH**/ ?>