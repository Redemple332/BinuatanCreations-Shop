<div>
 
    <div class="col-md-6">
        <div class="billing-details">
            <p>Already a customer ? <a href="#">Login</a></p>
            <div class="section-title">
                <h3 class="title">Billing Details</h3>
            </div>
            @if (!empty($addresses) && $addresses->isNotEmpty())
                <div class="form-group">
                    <select wire:model="selection" class="input">
                        @foreach ($addresses as $address )
                            <option value="{{ $address->id}}">{{$address->street}}, {{$address->barangay}}, {{$address->city}}, {{$address->region}}, {{$address->province}} {{$address->postalcode}}</option>
                        @endforeach
                    </select>
                </div>
                <button wire:click.prevent="showFormAddress(false)" type="button"  class="primary-btn">Add </button>
                
                <br>
                @if ($form->isNotEmpty())
                    {{-- {{ $form->street}}, {{$form->barangay}}, {{$form->city}}, {{$form->region}}, {{$form->province}} {{$form->postalcode}} --}}
                    {{ $form->join(', ') }}
                    <a wire:click.prevent="editAddress({{ $form->get('id') }})" ><i class="fa fa-edit"></i></a>
                    <a wire:click.prevent="deleteAddress({{ $form->get('id') }})" ><i class="fa fa-times"></i></a>
                @endif
            @else
                <form wire:submit.prevent="storeOrUpdateAddress" method="POST">
                    <div class="form-group">
                        <input wire:model.defer="form.fullname" class="input" type="text"  placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.mobile" class="input" type="tel"  placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.region" class="input" type="text"  placeholder="Region">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.province"  class="input" type="text"  placeholder="Province">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.city" class="input" type="text"  placeholder="City">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.barangay"  class="input" type="text"  placeholder="Barangay">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.street" class="input" type="text"  placeholder="Street">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.postalcode" class="input" type="text"  placeholder="Postal Code">
                    </div>
                    <div class="form-group">
                        <input wire:model.defer="form.full_address" class="input" type="text"  placeholder="Full Address">
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <button type="submit"  class="primary-btn">Save</button>
                        </div>
                    </div>                   
                </form>  
            @endif  
        </div>
    </div>
    <div class="col-md-6">
        <div class="shiping-methods">
            <div class="section-title">
                <h4 class="title">Shiping Methods</h4>
            </div>
            <div class="input-checkbox">
                <input type="radio" name="shipping" id="shipping-1" checked>
                <label for="shipping-1">Free Shiping -  $0.00</label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <p>
                </div>
            </div>
            <div class="input-checkbox">
                <input type="radio" name="shipping" id="shipping-2">
                <label for="shipping-2">Standard - $4.00</label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <p>
                </div>
            </div>
        </div>

        <div class="payments-methods">
            <div class="section-title">
                <h4 class="title">Payments Methods</h4>
            </div>
            <div class="input-checkbox">
           
                <input type="radio" value="cod"  name="payments" id="payments-1" checked>
                <label for="payments-1">Cash On Delivery</label>
                <div class="caption">
                    <p>Order Now Pay on Delivery<p>
                </div>
            </div>
            <div class="input-checkbox">
                <input type="radio"  name="payments" id="payments-2">
                <label for="payments-2">Credit Card Payment</label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <p>
                </div>
            </div>
            <div class="input-checkbox">
                <input type="radio" name="payments" id="payments-3">
                <label for="payments-3">Paypal System</label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <p>
                </div>
            </div>
        </div>
    </div>
</div>
