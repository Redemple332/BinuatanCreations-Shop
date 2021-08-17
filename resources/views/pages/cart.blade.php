@extends('layouts.app')
@section('content')
    	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Order Review</h3>
						</div>
						@livewire('cart.cart-content')  
						
						<div class="pull-left">
							<a href="{{route('products')}}" class="primary-btn">Add Order</a>
						</div>

						@if (Cart::instance('default')->count())
							<div class="pull-right">
								<a href="{{ route('checkout') }}" class="primary-btn">Place Order</a>
							</div>
						@endif
					</div>

				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection