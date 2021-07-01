<div>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div  class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @forelse ( $single_product->images as $image )
                                <div class="product-view">
                                    <img src="{{asset('storage/product_images/'.$image->image )}}" alt="">
                                </div>
                            @empty

                            @endforelse
                        </div>
                        <div id="product-view">
                            
                            @forelse ( $single_product->images as $image )
                                <div class="product-view">
                                    <img src="{{asset('storage/product_images/'.$image->image )}}" alt="">
                                </div>           
                            @empty

                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                @if ($single_product->updated_at->diffinDays() < 30)
                                    <span>New</span>   
                                @endif
                                @if ($single_product->discount->percent)
                                    <span class="sale">-{{ $single_product->discount->percent }}&#37;</span>
                                @endif
                            </div>
                            <h2 class="product-name">{{ $single_product->name }}</h2>
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <a href="#">3 Review(s) / Add Review</a>
                            </div>
                            <p><strong>Availability:</strong> In Stock</p>
                            <p><strong>Available Quantity:</strong> {{$single_product->qty}}</p>
                            <p><strong>Category:</strong> {{$single_product->category->category}}</p>
                            <p><strong>Color:</strong> {{$single_product->color->name}}</p>
                            <p><strong>Size:</strong> {{$single_product->size->name}}</p>
                            <div class="product-options">
                                <ul class="size-option">
                                    <li><span class="text-uppercase">Size:</span></li>
                                    @forelse ($product_sizes as $size )
                                        <li class="{{ $single_product->size_id == $size->id ?'active': '' }}"><a wire:click="singleProduct('{{ $size->slug}}')">{{ $size->code }}</a></li>  
                                    @empty
                                        
                                    @endforelse

                                </ul>
                                <ul class="color-option">
                                    <li><span class="text-uppercase">Color:</span></li>
                                    
                                    @forelse ($product_colors as $color)
                                        <li class="{{ $single_product->color_id== $color->id ?'active': '' }}"><a wire:click="singleProduct('{{ $color->slug}}')" style="background-color:{{ $color->code }};"></a></li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">QTY: </span>
                                    <input class="input" type="number">
                                </div>
                                <button wire:click="addToCart({{ $single_product->id }})" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                @php
                                       $wishlist_item = Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                                <div class="pull-right">
                                    @if ($wishlist_item->contains($single_product->id))
                                        <button wire:click="removeToWishlist({{ $single_product->id }})" type="button" class="main-btn icon-btn fill-heart"><i class="fa fa-heart"></i></button>
                                    @else
                                        <button wire:click="addToWishlist({{ $single_product->id }})" type="button" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    @endif
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{!! $single_product->description !!}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            <p>Your email address will not be published.</p>
                                            <form class="review-form">
                                                <div class="form-group">
                                                    <input class="input" type="text" placeholder="Your Name" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="input" type="email" placeholder="Email Address" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" placeholder="Your review"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Your Rating: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
   
</div>
