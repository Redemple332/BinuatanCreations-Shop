<div>
    <table class="shopping-cart-table table">
        <thead>
            <tr>
                <th>Product</th>
                <th></th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($carts as $cart)
                <tr>
                    <td class="thumb"> <img src="{{asset('storage/product_images/'.$cart->options->image)}}" alt=""></td>
                    <td class="details">
                        <a href="{{ route('products.single-item', ['product' => $cart->model->slug]) }}">{{ $cart->name }}</a>
                        <ul>
                            <li><span>Size: {{ $cart->options->size }}</span></li>
                            <li><span>Color: {{ $cart->options->color }}</span></li>
                        </ul>
                    </td>
                    <td class="price text-center"><strong>&#8369;{{ number_format($cart->price ,2) }}</strong><br><del class="font-weak"><small>$40.00</small></del></td>
                    <td class="qty text-center">
                        <p>{{ $cart->qty }}</p>
                    </td>
                    <td class="total text-center"><strong class="primary-color">&#8369;{{ number_format($cart->subtotal, 2) }}</strong></td>	
                </tr>
            @empty
                <h1>Walang laman</h1>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="empty" colspan="3"></th>
                <th>SUBTOTAL</th>
                <th colspan="2" class="sub-total">{{Cart::instance('default')->subtotal()}}</th>
            </tr>
            @if (Session::has('coupon'))
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>DISCOUNT ({{ Session::get('coupon')['code'] }}) 
                        <a wire:click="removeCoupon" ><i class="fa fa-times"></i></a>
                    </th>
                    <td colspan="2">{{ number_format($discount, 2) }}</td>
                </tr>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>SUB TOTAL WITH DISCOUNT</th>
                    <th colspan="2" class="sub-totaL">₱{{ number_format($subtotalAfterDiscount,2)}}</th>
                </tr>

                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TAX({{ config('cart.tax') }}%)</th>
                    <td colspan="2">{{ number_format($taxAfterDiscount,2)}}</td>
                </tr>

                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TOTAL</th>
                    <th colspan="2" class="total">₱{{ number_format($totalAfterDiscount,2) }}</th>
                </tr>
            @else
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TAX</th>
                    <td colspan="2">{{ number_format(Cart::instance('default')->tax(), 2) }}</td>
                </tr>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>SHIPING</th>
                    <td colspan="2">Free Shipping</td>
                </tr>
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TOTAL</th>
                    <th colspan="2" class="total">₱{{number_format( Cart::instance('default')->total(),2) }}</th>
                </tr>
            @endif

        </tfoot>
    </table>
    @if (Cart::instance('default')->count())
        <div class="pull-right">
        @if (!Session::has('coupon'))
                <div class="form-group">
                    <div class="input-checkbox">
                        <input type="checkbox" id="register">
                        <label class="font-weak" for="register">I have coupon code</label>
                        <div class="caption">
                            @if (Session::has('coupon_message'))
                                <div class="alert alert-danger" role="danger">{{ Session::get('coupon_message') }} </div>
                            @endif
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                            <input  wire:model="couponCode" class="input" placeholder="Enter Your Coupon">
                            <button  wire:click="applyCouponCode" type="button" class="primary-btn">Apply Coupon</button>
                            
                        </div>
                    </div>
                </div>
        @else
            
        @endif
            <button  type="button" class="primary-btn">Place Order</button>
        
        </div>
    @endif
</div>
