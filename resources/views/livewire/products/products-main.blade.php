<div>
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
                    <option value="percent">Top sale</option>
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
            
            @forelse ($products as $product)
                <div class="col-md-4 col-sm-6 col-xs-6">	
                    <livewire:template.products-template :product="$product" :wire:key="'product-template-'.$product->id">
                </div>
            @empty
                <center> <h1>No Product Available</h1> </center>
            @endforelse
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
