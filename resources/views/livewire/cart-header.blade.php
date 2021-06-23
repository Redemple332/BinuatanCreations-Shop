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
                <a href="{{ route('login') }}" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
                <ul class="custom-menu">
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                    <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                    <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                    <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                    <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                    <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                    <li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" >
                            @csrf
                            <button type="submit"><i class="fa fa-unlock-alt"></i> Log-out </button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </li>
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
                                        <h2 class="product-name"><a href="#">{{ $cart->name }}</a></h2>
                                    </div>
                                    <a wire:click="removeCart('{{ $cart->rowId }}')" class="cancel-btn" ><i class="fa fa-trash"></i></a>
                                </div>
                           @empty
                               <p>Cart Empty</p>
                           @endforelse
                        </div>
                        <div class="shopping-cart-btns">
                            <a href="{{ route('cart') }}" class="main-btn">View Cart</a>
                            <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
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
