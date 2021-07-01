<div>
    <div class="pull-right">
        <ul class="header-btns">
            <!-- Account -->
            <li class="header-account dropdown default-dropdown">
                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                    <div class="header-btns-icon">
                        <i class="fa fa-user-o"></i>
                    </div>
                    <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                </div>
                @guest
                    <a href="{{ route('login') }}" class="text-uppercase">Login</a> / <a href="{{ route('register') }}" class="text-uppercase">Join</a>
                @else
                <a href="" class="text-uppercase">{{ auth()->user()->username }}</a>
                @endguest

                <ul class="custom-menu">
                    @auth
                    <li><a href="#"><i class="fa fa-user-o"></i> {{ auth()->user()->username }} </a></li>
                    @endauth
                    <li><a href="{{ route('wishlist') }}"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                    <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                    <li><a href="{{ route('checkout') }}"><i class="fa fa-check"></i> Checkout</a></li>
                    @auth
                        <li>
                            <a href="{{ url('/logout')}}"><i class="fa fa-unlock-alt"></i> Log-out </a>
                        </li>
                    @endauth
                </ul>
            </li>
            <!-- /Account -->

            <!-- /Remove icon -->
            <style type="text/css"> 
				.dropdown-backdrop{
				  position: fixed;
				  top: 0;
				  right: 0;
				  bottom: 0;
				  left: 0;
				  z-index: 0;
				}
			</style>
            <!-- /Remove icon -->
            	
            <!-- Cart -->
            <li class="header-cart dropdown default-dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <div class="header-btns-icon">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="qty">{{ Cart::content()->count() }}</span>
                    </div>
                    <strong class="text-uppercase">My Cart:</strong>
                    <br>
                    <span>&#8369;{{Cart::subtotal()}}</span>
                </a>
                <div class="custom-menu">
                    <div id="shopping-cart">
                        <div class="shopping-cart-list">
                           @forelse ($carts as $cart )
                                <div class="product product-widget">
                                    <div class="product-thumb">
                                        <img src="{{asset('storage/product_images/'.$cart->options->image)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">&#8369;{{ $cart->price }}.00 <span class="qty">x{{ $cart->qty }}</span></h3>
                                        <h2 class="product-name"><a href="{{ route('products.single-item', ['product' => $cart->model->slug]) }}">{{ $cart->name }}</a></h2>
                                    </div>
                                    <a wire:click="removeCart('{{ $cart->rowId }}')" class="cancel-btn" ><i class="fa fa-trash"></i></a>
                                </div>
                           @empty
                               <p>Cart Empty</p>
                           @endforelse
                        </div>
                        <div class="shopping-cart-btns">
                            <a href="{{ route('cart') }}" class="main-btn">View Cart</a>
                            <a href="{{ route('checkout') }}" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- /Cart -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
                <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
        </ul>
    </div>
</div>
