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
                        <a href="{{ route('products.single-item', ['product' => $cart->model->slug]) }}">{{ $cart->name }}</a>
                        <ul>
                            <li><span>Size: {{ $cart->options->size }}</span></li>
                            <li><span>Color: {{ $cart->options->color }}</span></li>
                        </ul>
                    </td>
                    <td class="price text-center"><strong>&#8369;{{ $cart->price }}</strong><br><del class="font-weak"><small>$40.00</small></del></td>
                    <td class="qty text-center">
                        <button  wire:click="decreaseQty('{{ $cart->rowId }}')" type="button">-</button>
                            <input style="text-align:center" class="input" type="number" disabled value="{{ $cart->qty }}">
                        <button wire:click="increaseQty('{{ $cart->rowId }}')" type="button">+</button>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </td>
                    <td class="total text-center"><strong class="primary-color">&#8369;{{ $cart->subtotal }}</strong></td>
                    <td class="text-right">
                        <button  wire:click="removeCart('{{ $cart->rowId }}')" type="button" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
                    </td>
                    
                </tr>
            @empty
                <h1>Walang laman</h1>
            @endforelse
        </tbody>
    </table>
</div>
