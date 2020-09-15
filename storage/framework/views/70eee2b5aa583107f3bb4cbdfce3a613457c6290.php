<?php $__env->startSection('body'); ?>

<div class="table-responsive">
<?php if($errors->any()): ?>
<div class="alert alert-danger">
<ul>
<li>(!! print_r($errors->all()) !!)</li>
</ul>
</div>
<?php endif; ?>

<h3>Current Image</h3>
<div><img src="<?php echo e(asset('storage')); ?>/product_images/<?php echo e($product['image']); ?>" width="100" height="100" style="max-height:220px" alt="<?php echo e(asset('storage')); ?>/product_images/<?php echo e($product['image']); ?>"></div>




<form action="/admin/updateProductImage/<?php echo e($product->id); ?>" method="post" enctype="multipart/form-data"><!--multipart/form-data //this is very important for the image store-->
<?php echo e(@csrf_field()); ?>


<div class="form-group">
<label for="description">Update Image:</label>
<input type="file" class="" name="image" id="image" placeholder="Image" value="<?php echo e($product->image); ?>" required>
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>




</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/admin/editProductImageForm.blade.php ENDPATH**/ ?>