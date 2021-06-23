<div>
    <table class="shopping-cart-table table">
        <thead>
            <tr>
                <th>Product</th>
                <th></th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
                <th class="text-right"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($carts as $cart)
                <tr>
                    <td class="thumb"> <img src="{{asset('storage/product_images/'.$cart->options->image)}}" alt=""></td>
                    <td class="details">
                        <a href="#">{{ $cart->name }}</a>
                        <ul>
                            <li><span>Size: {{ $cart->options->size }}</span></li>
                            <li><span>Color: {{ $cart->options->color }}</span></li>
                        </ul>
                    </td>
                    <td class="price text-center"><strong>&#8369;{{ $cart->price }}</strong><br><del class="font-weak"><small>$40.00</small></del></td>
                    <td class="qty text-center"><input  class="input" type="number" value="{{ $cart->qty }}"></td>
                    <td class="total text-center"><strong class="primary-color">&#8369;{{ $cart->subtotal }}</strong></td>
                    <td class="text-right">
                        <button  wire:click="removeCart('{{ $cart->rowId }}')" type="button" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
                    </td>
                    
                </tr>
            @empty
                <h1>Walang laman</h1>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th class="empty" colspan="3"></th>
                <th>SUBTOTAL</th>
                <th colspan="2" class="sub-total">&#8369;{{Cart::subtotal()}}</th>
            </tr>
            <tr>
                <th class="empty" colspan="3"></th>
                <th>SHIPING</th>
                <td colspan="2">Free Shipping</td>
            </tr>
            <tr>
                <th class="empty" colspan="3"></th>
                <th>TOTAL</th>
                <th colspan="2" class="total">$97.50</th>
            </tr>
        </tfoot>
    </table>
</div>
