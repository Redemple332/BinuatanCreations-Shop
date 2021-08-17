<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Address;

class BillingDetails extends Component
{

    public $addresses, $default_address, $addressId;

    public $updateId = null;

    public 
        $fullname,
        $mobile,
        $region,
        $province,
        $city, 
        $barangay,
        $street, 
        $full_address,
        $postalcode
    ;

    public function mount()
    {
      //List of Userid
        $this->addresses = Address::where('customer_id', auth()->id())
        ->latest('updated_at')
        ->get();


        if($this->addresses->count() )
        {
            $this->default_address = Address::where('customer_id', auth()->id() )->latest('updated_at')->first();
        }
        else{
            $this->fullname = auth()->user()->name;
            $this->addresses = [];  
        }
    }

    public function render()
    {
        
        return view('livewire.cart.billing-details');
    }

    public function saveAddress()
    {
        //UPDATE ADDRESS
        if ($this->updateId)
        {
            Address::findOrFail($this->updateId)->update([
                'fullname' => $this->fullname,
                'mobile' => $this->mobile,
                'region' => $this->region,
                'province' => $this->province ,
                'city' => $this->city ,
                'barangay' => $this->barangay,
                'street' => $this->street ,
                'full_address' => $this->full_address,
                'postalcode' => $this->postalcode
            ]);
            $this->updatedAddressId();
            $this->updateId = null;
            $this->mount();   
        }

        //ADD ADDRESS
        else
        {
            Address::create([
                'customer_id' => Auth()->id(),
                'fullname' => $this->fullname,
                'mobile' => $this->mobile,
                'region' => $this->region,
                'province' => $this->province ,
                'city' => $this->city ,
                'barangay' => $this->barangay,
                'street' => $this->street ,
                'full_address' => $this->full_address,
                'postalcode' => $this->postalcode
            ]);

            $this->addresses = Address::where('customer_id', Auth()->id())->get();
            $this->mount();    
        }

    }

    //DROPDOWN UPDATE
    public function updatedAddressId()
    {
        $this->default_address = Address::find($this->addressId);   
    }

    //SHOW FORM ADD ADDRRESS
    public function addAddress()
    {
        $this->reset();
        $this->addresses = [];
        $this->fullname = auth()->user()->name;
        $this->updatedAddressId();
    }

    //DELETE ADDRESS
    public function removeAddress($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        $this->updatedAddressId();
        $this->mount();
    }

    //EDIT ADDRESS
    public function editAddress($id)
    {
        $this->addresses = [];

        $address = Address::findOrFail($id);
        $this->fullname = $address->fullname;
        $this->mobile = $address->mobile;
        $this->region = $address->region;
        $this->province = $address->province;
        $this->city = $address->city;
        $this->barangay = $address->barangay;
        $this->street = $address->street;
        $this->full_address = $address->full_address;
        $this->postalcode = $address->postalcode;
        
        $this->updateId = $id;
    }

}
