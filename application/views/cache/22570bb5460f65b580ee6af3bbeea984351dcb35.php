<?php $__env->startSection('judul_halaman', 'Profile'); ?>
<?php $__env->startSection('content'); ?>

<div class="card o-hidden border-0 shadow-lg mx-auto" style="width:400px; ">
<img class="card-img-top" style="border-radius: 50px;" src="<?php echo e(base_url('assets/img/profile/user/') . $user['image']); ?>" alt="Card image">
    <div class="card-body">
    <h4 class="card-title"><?php echo e($user['nama']); ?></h4>
    <hr/>
    <p class="card-text">Email : <?php echo e($user['email']); ?></p>
    <p class="card-text">No. Handphone : <?php echo e($user['no_hp']); ?> </p>
    <p class="card-text">Alamat : <?php echo e($user['alamat']); ?></p> 
    <p class="card-text">Sebagai : <?php echo e($user['nama_level']); ?> </p>
    <p class="card-text">Terdaftar sejak : <?php echo e($user['tanggal_pendaftaran']); ?> </p>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
    <script>
    
    // Page Akun
    
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/profile.blade.php ENDPATH**/ ?>