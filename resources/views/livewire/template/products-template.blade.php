<div>
   <form wire:submit.prevent="addToCart({{ $product->id }})" method="POST">
        <!-- Product Single -->
        <div class="product product-single ">
            <div class="product-thumb">
                <div class="product-label">
                    @if ($product->updated_at->diffinDays() < 30)
                        <span>New</span>   
                    @endif
                    @if ($product->discount->percent)
                    <span class="sale">-{{ $product->discount->percent }}&#37;</span>
                    @endif
                    
                </div>
                
                @if($product->discount->date > now())
                    <livewire:template.products-countdown :flashsale="$product->discount->date" :wire:key="'product-countdown-'.$product->id">
                @endif

                <a class="main-btn quick-view" href="{{ route('products.single-item', ['product' => $product->slug]) }}"><i class="fa fa-search-plus"></i> View</a>
                
                @forelse ( $product->images->take(1) as $image )
                    {{-- <img src="{{$image->imagePath}}" alt="">  --}}
                    <img  src="{{asset('storage/product_images/'.$image->image )}}" alt="">
                
                @empty
                <img src="no_image.jpg" alt=""> 
                @endforelse     
            </div>
            <div class="product-body">
                <h3 class="product-price"> &#8369;{{ $product->discount->percent != 0 ?number_format($product->discounted_price,2): $product->price }}
                    @if( $product->discount->percent)
                        <del class="product-old-price">&#8369;{{ number_format($product->price, 2)  }}</del>
                    @endif
                </h3>                    
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                <div class="product-btns">
                                     
                   @if ($wishItem->contains($product->id))
                   <button wire:click="removeToWishlist({{ $product->id }})" type="button" class="main-btn icon-btn fill-heart"><i class="fa fa-heart"></i></button>
                   @else
                        <button wire:click="addToWishlist({{ $product->id }})" type="button" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                   @endif
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- /Product Single -->        
    </form>
</div>
