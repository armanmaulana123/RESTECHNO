<?php $__env->startSection('judul_halaman', 'Menu Makanan'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card" style="width:400px">
        <img class="card-img-top" src="<?php echo e(base_url('assets/img/menu_makanan/')); ?>" alt="Card image">
        <div class="card-body">
        <h4 class="card-title"><?php echo e($menu_makanan['nama_menu']); ?></h4>
            <p class="card-text">Some example text.</p>
            <a href="#" class="btn btn-primary">See Profile</a>
        </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
    <script>
    
    // Page Akun
    
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/member/daftar_menu.blade.php ENDPATH**/ ?>