<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 55vh; margin-top: 40px;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <div class="card-body">
            <h3 class="text-center mb-4 fw-bold" style="font-size: 32px;"><?php echo e(__('Dashboard')); ?></h3>

            <?php if(session('status')): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <p class="text-center"><?php echo e(__("You're logged in!")); ?></p>

            <div class="text-center mt-4">
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger w-100"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>
                
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\Laravel_google_login_app\resources\views/dashboard.blade.php ENDPATH**/ ?>