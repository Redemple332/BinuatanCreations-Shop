@extends('layouts.app')
@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				
				@livewire('template.products-sidebar')
				@livewire('products.products-main')
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<script type="text/javascript">
        window.addEventListener('urlChange', event =>{
			window.history.pushState("object or string", "Title", event.detail.url);
        })
    </script>
@endsection

