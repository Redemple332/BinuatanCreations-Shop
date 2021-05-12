<?php

namespace App\Http\Livewire\Admin\Promo;

use Livewire\Component;
use App\Models\Coupon;
class CouponIndex extends Component
{

    protected $listeners = ['deleteConfirmed', 'updatedCoupon' => 'render'];
    public $couponId;

    public function render()
    {
        return view('livewire.admin.promo.coupon-index',['coupons' =>Coupon::all()])->extends('livewire.admin.layouts.app');;
    }

    public function delete($couponId){
        $this->couponId =  $couponId;
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        $coupon = Coupon::findOrFail($this->couponId);
        $couponId = $coupon->code;
        $coupon->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' => $couponId.' coupon deleted successfully!' ]);

    }
}
