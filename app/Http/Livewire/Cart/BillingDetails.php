<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Collection;

class BillingDetails extends Component
{

    public $selection;

    public $addresses;

    public $form;

    protected $rules = [
        'form.id'            => 'nullable|exists:App\Models\Address,id',
        'form.fullname'      => 'required',
        'form.mobile'        => 'required',
        'form.region'        => 'required',
        'form.province'      => 'required',
        'form.city'          => 'required', 
        'form.barangay'      => 'required',
        'form.street'        => 'required',
        'form.full_address'  => 'required',
        'form.postalcode'    => 'required',
    ];

    /**
     * constructor
     */
    public function mount()
    {
        $this->setupData();
    }

    public function render()
    {
        return view('livewire.cart.billing-details');
    }

    protected function updatedSelection($value)
    {
        $this->form         = collect(Address::findOrFail($value));
    }

    protected function setupData(Address $defaultAddress = null)
    {
        $this->addresses    = auth()->user()->addresses; 

        $defaultAddress     = $defaultAddress ? $defaultAddress : $this->addresses->first();

        $this->form         = collect($defaultAddress);

        $this->selection    = $this->form->get('id');
    }

    public function storeOrUpdateAddress() 
    {
        $this->validate();

        $address = $this->form->get('id') ? Address::find($this->form->get('id')) : new Address();
        $address->fill($this->form->all());
        $address->customer_id = auth()->id();
        $address->save();

        $this->setupData($address);
    }

    //SHOW FORM ADD ADDRRESS
    public function showFormAddress($isUpdate)
    {
        $this->reset('addresses'); 
        !$isUpdate && $this->form = collect();
    }

    //SHOW FORM EDIT ADDRESS
    public function editAddress(Address $address)
    {
        $this->reset('addresses'); 
        $this->form = collect($address->toArray());
    }

    //DELETE ADDRESS
    public function deleteAddress(Address $address)
    {
        $address->delete();
        $this->setupData();
    }
}
