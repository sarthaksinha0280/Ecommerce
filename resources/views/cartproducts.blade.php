@include('layouts.header');
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

                        @foreach($cartItem->items as $item)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" width="100" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item['data']['name']}}</a></h4>
                                <p>{{$item['data']['description']}} - {{$item['data']['type']}}</p>
								<p>{{$item['data']['id']}}</p>
							</td>
							<td class="cart_price">
								<p>{{$item['data']['price']}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{route('IncreaseSingleProduct',['id' => $item['data']['id']])}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{route('DecreaseSingleProduct',['id' => $item['data']['id']])}}"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"> ${{$item['totalSinglePrice']}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('DeleteItemFromCart',['id' => $item['data']['id']])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                      @endforeach
					
					</tbody>
			            		<thead>
			                  	 <tr>

                                  <td>
                                    <h5>Subtotal</h5>
                                  </td>

								  <td></td>
								  <td></td>

                                  <td>
                                    <h5>{{$cartItem->totalQuantity}}</h5>
                                  </td>

								  <td>${{$cartItem->totalPrice}}</td>

			            		</thead>
				</table>
           <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('allproducts')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

@include('layouts.footer')