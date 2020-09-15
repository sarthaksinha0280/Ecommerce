<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
  <!-- breadcrumb start-->
  
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-10">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Shopping cart</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
		<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>

                        <?php $__currentLoopData = $cartItem->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo e(Storage::disk('local')->url('product_images/'.$item['data']['image'])); ?>" width="100" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo e($item['data']['name']); ?></a></h4>
                                <p><?php echo e($item['data']['description']); ?> - <?php echo e($item['data']['type']); ?></p>
								<p><?php echo e($item['data']['id']); ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo e($item['data']['price']); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="<?php echo e(route('IncreaseSingleProduct',['id' => $item['data']['id']])); ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($item['quantity']); ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="<?php echo e(route('DecreaseSingleProduct',['id' => $item['data']['id']])); ?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"> $<?php echo e($item['totalSinglePrice']); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo e(route('DeleteItemFromCart',['id' => $item['data']['id']])); ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					</tbody>
			            		<thead>
			                  	 <tr>

                                  <td>
                                    <h5>Subtotal</h5>
                                  </td>

								  <td></td>
								  <td></td>

                                  <td>
                                    <h5><?php echo e($cartItem->totalQuantity); ?></h5>
                                  </td>

								  <td>$<?php echo e($cartItem->totalPrice); ?></td>

			            		</thead>
				</table>
           <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo e(route('allproducts')); ?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/ecommerce/resources/views/cartproducts.blade.php ENDPATH**/ ?>