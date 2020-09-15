<?php $__env->startSection('body'); ?>

<div class="table-responsive">

 <form action="<?php echo e(route('adminSendCreateProductForm')); ?>" method="POST" enctype="multipart/form-data">
 <?php echo e(@csrf_field()); ?>

 
 <div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Product Name"  required>
 </div>

 <div class="form-group">
  <label for="description">Description</label>
  <input type="text" class="form-control" name="description" id="description" placeholder="description" required>
 </div>

 <div class="form-group">
  <label for="image">Image</label>
  <input type="file" class="form-control-file" name="image" id="image"  required>
 </div>

 <div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" name="type" id="type" placeholder="type"  required>
 </div>
 
 <div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
 </div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/admin/createProductForm.blade.php ENDPATH**/ ?>