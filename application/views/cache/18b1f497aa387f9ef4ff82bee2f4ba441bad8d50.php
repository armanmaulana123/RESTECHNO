<?php $__env->startSection('judul', 'Registration'); ?>
<?php $__env->startSection('judul_halaman', 'Login Page'); ?>
<?php $__env->startSection('content'); ?>

<form class="user" enctype="multipart/form-data" action="<?php echo e(base_url('auth/aksi_register')); ?>" method="POST">
    <div class="form-group">
      <div class="col-sm-15 mb-3">
        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Full Name">
      </div>
      <div class="col-sm-15">
        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Phone Number">
        </div>
    </div>
    <div class="form-group">
        <textarea class="form-control form-control-user" id="alamat" name="alamat" placeholder="Your Address"></textarea>
    </div>
    <div class="form-group">
        <input class="form-control" type="file" id="image" name="image">
    </div>
<button type="submit" class="btn btn-primary btn-user btn-block">
      Register Account
    </button>
  </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/register.blade.php ENDPATH**/ ?>