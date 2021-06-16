<div>
    <!-- Product Slick -->
    <div class="col-md-9 col-sm-6 col-xs-6">
        <div class="row">
            <div id="product-slick-1" class="product-slick">
                
                @forelse ($flashsale as $product)	
                    <livewire:template.products-template :product="$product" :wire:key="'product-template-'.$product->id">
                @empty
                    <center> <h1>No Product Available</h1> </center>
                @endforelse
            </div>
        </div>
    </div>
    <!-- /Product Slick -->
</div>
