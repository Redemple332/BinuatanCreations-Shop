<div>
    <!-- Product Single -->
    @forelse ($wishlist as $product)
        <div class="col-md-3 col-sm-6 col-xs-6">
            <form wire:submit.prevent="addToCart({{ $product->id }}, '{{ $product->rowId }}')" method="POST">
                <!-- Product Single -->
                <div class="product product-single ">
                    <div class="product-thumb">
                        <div class="product-label">
                            @if ($product->model->updated_at->diffinDays() < 30)
                                <span>New</span>   
                            @endif    
                      
                            @if ($product->model->discount->percent)
                            <span class="sale">-{{ $product->model->discount->percent }}&#37;</span>
                            @endif
                            
                        </div>                     
        
                        <a class="main-btn quick-view" href="{{ route('products.single-item', ['product' => $product->model->slug]) }}"><i class="fa fa-search-plus"></i> View</a>
                        
                        @forelse ( $product->model->images->take(1) as $image )
                            {{-- <img src="{{$image->imagePath}}" alt="">  --}}
                            <img  src="{{asset('storage/product_images/'.$image->image )}}" alt="">
                        
                        @empty
                        <img src="no_image.jpg" alt=""> 
                        @endforelse     
                    </div>
                    <div class="product-body">
                        <h3 class="product-price"> &#8369;{{ $product->model->discount->percent != 0 ?number_format($product->model->discounted_price,2): $product->model->price }}
                            @if( $product->model->discount->percent)
                                <del class="product-old-price">&#8369;{{  $product->model->price }}</del>
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

                            <button wire:click="removeToWishlist({{ $product->id }})" type="button" class="main-btn icon-btn fill-heart"><i class="fa fa-heart"></i></button>
                            <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Move to Cart</button>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->        
            </form>
        </div> 
        @empty
        <h1>No item in wishlist</h1>
    @endforelse 
    <!-- /Product Single -->
</div>
