<?php $__env->startSection('body'); ?>

<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>@id</th>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>type</th>
<th>Edit Image</th>
<th>Edit</th>
<th>Remove</th>
</tr>
</thead>
<tbody>

<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($product['id']); ?></td>
<td><img src="<?php echo e(asset('storage')); ?>/product_images/<?php echo e($product['image']); ?>" alt="<?php echo e(asset('storage')); ?>/product_images/<?php echo e($product['image']); ?>" width="100" height="100" style="max-height:220px"></td>
<!--<td><img src="<?php echo e(Storage::url('product_images/'.$product['image'])); ?>" alt="<?php// echo Storage::url($product['image']); ?>" width="100" height="100" style=max-height:220px></td>-->
<td><?php echo e($product['name']); ?></td>
<td><?php echo e($product['description']); ?></td>
<td><?php echo e($product['price']); ?></td>
<td><?php echo e($product['type']); ?></td>
<td><a href="<?php echo e(route('adminEditProductImageForm',['id'=>$product['id'] ])); ?>" class="btn btn-primary">Edit Image</a></td>
<td><a href="<?php echo e(route('adminEditProductForm',['id'=>$product['id'] ])); ?>" class="btn btn-primary">Edit</a></td>
<td><a href="<?php echo e(route('adminDeleteProduct',['id'=>$product['id'] ])); ?>" class="btn btn-danger">Remove</a></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
<?php echo e($items->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/admin/displayProducts.blade.php ENDPATH**/ ?>