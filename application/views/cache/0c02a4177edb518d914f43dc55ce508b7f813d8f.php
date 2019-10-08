<?php $__env->startSection('register'); ?>

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
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/layout/register.blade.php ENDPATH**/ ?>