<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Profile</h4></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('You are logged in!')); ?>

<br><br>

                    <p><b>Name:</b><?php echo Auth::user()->name; ?></p>
                    <p><b>Email:</b><?php echo Auth::user()->email; ?></p>

                    <a href="<?php echo e(route('allproducts')); ?>" class="btn btn-warning">Main website</a>
                    <?php if($userData->isAdmin()): ?>
                    <a href="<?php echo e(route('adminDisplayProducts')); ?>" class="btn btn-primary">Admin Dashboard</a>
                    <?php else: ?>
                      <a href="#" class="btn btn-primary">You are not admin</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/home.blade.php ENDPATH**/ ?>