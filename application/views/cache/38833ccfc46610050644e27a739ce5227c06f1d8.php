<?php $__env->startSection('judul', 'Edit User'); ?>
<?php $__env->startSection('judul_halaman', 'Edit User'); ?>
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
                        <form class="user" enctype="multipart/form-data" action="<?php echo e(base_url('akun/update_admin')); ?>" method="POST">
                            
                            <div class="form-group">
                                <div class="col-sm-15 mb-4">
                                    <input type="hidden" name="id_user" id="id_user" value="<?php echo e($edit['id_user']); ?>">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo e($edit['nama']); ?>" placeholder="Full Name">
                                </div>
                                <div class="col-sm-15 mb-4">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?php echo e($edit['email']); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-15 mb-4">
                                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Phone Number" value="<?php echo e($edit['no_hp']); ?>">
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-15 mb-4 mt-4">
                                    <textarea class="form-control form-control-user"  id="alamat" name="alamat" placeholder="Your Address" ><?php echo e($edit['alamat']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mr-3">
                                        <img src="<?php echo e(base_url('assets/img/profile/user/') . $edit['image']); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="custom-file">
                                        <input type="hidden" id="image1" name="image1" value="<?php echo e($edit['image']); ?>">
                                        <input class="form-control custom-file-input" type="file" id="image" name="image">
                                        <label for="image" class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update Account
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
    
    $('.custom-file-input').on('change',function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
    
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/edit_admin.blade.php ENDPATH**/ ?>