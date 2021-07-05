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
							@livewire('cart.cart-checkout-value')						
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