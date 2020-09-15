<?php $__env->startSection('body'); ?>

<div class="table-responsive">

 <form action="/admin/updateProductFrom/<?php echo e($product->id); ?>" method="post">

 <?php echo e(@csrf_field()); ?>

 
 <div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="<?php echo e($product->name); ?>" required>
 </div>

 <div class="form-group">
  <label for="description">Description</label>
  <input type="text" class="form-control" name="description" id="description" placeholder="description" value="<?php echo e($product->description); ?>" required>
 </div>

 <div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" name="type" id="type" placeholder="type" value="<?php echo e($product->type); ?>" required>
 </div>
 
 <div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo e($product->price); ?>" required>
 </div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/admin/editProductForm.blade.php ENDPATH**/ ?>