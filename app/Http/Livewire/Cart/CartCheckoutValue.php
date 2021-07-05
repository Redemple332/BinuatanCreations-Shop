<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartCheckoutValue extends Component
{

    public $couponCode, 
    $discount,
    $subtotalAfterDiscount,
    $taxAfterDiscount,
    $totalAfterDiscount;

 

   
    
    public function applyCouponCode()
    {
       
        $coupon = Coupon::where('code', $this->couponCode)
        ->where('expiry_date', '>=', today())
        ->where('cart_value', '<=', Cart::instance('default')->subtotal())
        ->first();


        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);

    }

    public function calculatedDiscounts()
    {
        if (session()->has('coupon')) {
            
            if (session()->get('coupon')['type'] == 'Fixed') {
                
                $this->discount = session()->get('coupon')['value'];
            }
            else{
                $this->discount = (Cart::instance('default')->subtotal() * session()->get('coupon')['value']) / 100;
            }

            $this->subtotalAfterDiscount = Cart::instance('default')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount +  $this->taxAfterDiscount;
            
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon'); 
    }

    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('default')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }

            else{
                $this->calculatedDiscounts();
            }
        }

        
        $carts = Cart::content(); 
        return view('livewire.cart.cart-checkout-value', compact('carts'));
    }

}
