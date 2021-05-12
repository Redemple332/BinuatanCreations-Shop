<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use App\Models\Coupon;

class CreateCoupon extends Component
{
    protected $listeners = ['addCoupon'];

    public $code, $type, $value, $cart_value, $expiry_date;

    public $couponId;

     //Show modal add
     public function addCoupon($couponId)
     {
         
        if($couponId){
        $this->couponId = $couponId;
        $coupon = Coupon::findOrFail($couponId);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->expiry_date = $coupon->expiry_date;
        $this->cart_value = $coupon->cart_value;
        }

        else{
            $this->reset();
        }
        $this->dispatchBrowserEvent('openModalCoupon');
     }
 
      //Save Category
      public function save(){


        $this->validate([

            'code' => 'required|unique:coupons,code,'.$this->couponId,
            'type' => 'required|in:Fixed,Percent',
            'value' => 'required|numeric|min:1',
            'cart_value' => 'required|numeric|min:1', 
            'expiry_date' => 'required', 
        ]);
        

        //UPDATE
        if($this->couponId)
        {
            Coupon::findOrFail($this->couponId)->update([
                'code'        => $this->code, 
                'type'        => $this->type,
                'value'       => $this->value,
                'cart_value'  => $this->cart_value,
                'expiry_date' => $this->expiry_date,
            ]);
       
            $message = ' coupon updated successfully!';
        }
        
        //ADD
        else
        {        
            Coupon::create([
                'code'       => $this->code, 
                'type'       => $this->type,
                'value'      => $this->value,
                'cart_value' => $this->cart_value,
                'expiry_date' => $this->expiry_date,
            ]);
            $message = 'New coupon added successfully!';
        }
        $this->emit('updatedCoupon');
        $this->reset();
        $this->dispatchBrowserEvent('closeModalCoupon');
        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);
     
    }
    public function render()
    {
        return view('livewire.admin.modals.create-coupon');
    }

    
}
