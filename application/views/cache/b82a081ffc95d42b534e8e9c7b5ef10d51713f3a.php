<?php $__env->startSection('judul_halaman', 'Daftar Menu'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
<?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <div class="card " >
            <img src="<?php echo e(base_url('assets/img/daftar_menu/') . $m['image_menu']); ?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?php echo e($m['nama_menu']); ?></h5>
            <p class="card-text">Harga : <?php echo e($m['harga_menu']); ?></p>
            <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-user" name="quantity" min="0">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                  </div>
            <hr>
            <p class="card-text">Stok Yang Tersedia : <?php echo e($m['stok_menu']); ?> </p>
                <div class="row">
                    <a href="<?php echo e(base_url('akun/hapus_menu/') . $m['id_menu']); ?>" class="btn btn-sm btn-danger">Hapus</a>&nbsp
                    <a href="<?php echo e(base_url('akun/edit_menu/') . $m['id_menu']); ?>" class="btn btn-sm btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/daftar_menu.blade.php ENDPATH**/ ?>