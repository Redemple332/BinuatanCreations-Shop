@extends('layouts.app')
@section('content')
    	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					@livewire('cart.billing-details')

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Checkout</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($carts as $cart)
										<tr>
											<td class="thumb"> <img src="{{asset('storage/product_images/'.$cart->options->image)}}" alt=""></td>
											<td class="details">
												<a href="{{ route('products.single-item', ['product' => $cart->model->slug]) }}">{{ $cart->name }}</a>
												<ul>
													<li><span>Size: {{ $cart->options->size }}</span></li>
													<li><span>Color: {{ $cart->options->color }}</span></li>
												</ul>
											</td>
											<td class="price text-center"><strong>&#8369;{{ $cart->price }}</strong><br><del class="font-weak"><small>$40.00</small></del></td>
											<td class="qty text-center">
												<p>{{ $cart->qty }}</p>
											</td>
											<td class="total text-center"><strong class="primary-color">&#8369;{{ $cart->subtotal }}</strong></td>	
										</tr>
									@empty
										<h1>Walang laman</h1>
									@endforelse
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">{{Cart::instance('default')->subtotal()}}</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">$97.50</th>
									</tr>
								</tfoot>
							</table>
						   @if (Cart::instance('default')->count())
								<div class="pull-right">
									<button class="primary-btn">Place Order</button>
								</div>
						   @endif

						</div>
				
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection