<div>
    
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

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select wire:model="sortBy" class="input">
									<option value="price">Default</option>
									<option value="ship">Free shipping</option>
									<option value="updated_at">Latest</option>
									<option value="sales">Top sale</option>
									<option value="price">Prices</option>
								</select>
								<button wire:click="orderBy" class="main-btn icon-btn"><i class="{{ $orderBy == 'ASC' ? 'fa fa-arrow-up' : 'fa fa-arrow-down' }}"></i></button>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select wire:model="pagination" class="input">
									<option value="1">10</option>
									<option value="2">20</option>
									<option value="3">30</option>
								</select>
							</div>
							{{$products->links('livewire.template.pagination-links')}}
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
                            @include('livewire.template.products-template')
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
					
					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
									<button wire:click="orderBy" class="main-btn icon-btn"><i class="{{ $orderBy == 'ASC' ? 'fa fa-arrow-up' : 'fa fa-arrow-down' }}"></i></button>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select  wire:model="pagination" class="input">
										<option value="1">10</option>
										<option value="2">20</option>
										<option value="3">30</option>
								</select>
							</div>
							{{$products->links('livewire.template.pagination-links')}}
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
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
</div>
