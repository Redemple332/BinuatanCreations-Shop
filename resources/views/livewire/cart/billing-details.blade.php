<div>
 
    <div class="col-md-6">
        <div class="billing-details">
            <p>Already a customer ? <a href="#">Login</a></p>
            <div class="section-title">
                <h3 class="title">Billing Details</h3>
            </div>
           
            @if ($addresses)
                <div class="form-group">
                    <select wire:model="addressId"class="input">
                        @foreach ($addresses  as $address )
                            <option value="{{ $address->id}}">{{$address->street}}, {{$address->barangay}}, {{$address->city}}, {{$address->region}}, {{$address->province}} {{$address->postalcode}}</option>
                        @endforeach
                    </select>
                </div>
                <button wire:click="addAddress" type="button"  class="primary-btn">Add </button>
                
                <br>
                @if ($default_address)
                    {{$default_address->street}}, {{$default_address->barangay}}, {{$default_address->city}}, {{$default_address->region}}, {{$default_address->province}} {{$default_address->postalcode}}
                    <a wire:click="editAddress({{ $default_address->id }})" ><i class="fa fa-edit"></i></a>
                    <a wire:click="removeAddress({{ $default_address->id }})" ><i class="fa fa-times"></i></a>
                @endif
            @else
                <form wire:submit.prevent="saveAddress" method="POST">
                    <div class="form-group">
                        <input wire:model="fullname" class="input" type="text"  placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input wire:model="mobile" class="input" type="tel"  placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                        <input wire:model="region" class="input" type="text"  placeholder="Region">
                    </div>
                    <div class="form-group">
                        <input wire:model="province"  class="input" type="text"  placeholder="Province">
                    </div>
                    <div class="form-group">
                        <input wire:model="city" class="input" type="text"  placeholder="City">
                    </div>
                    <div class="form-group">
                        <input wire:model="barangay"  class="input" type="text"  placeholder="Barangay">
                    </div>
                    <div class="form-group">
                        <input wire:model="street" class="input" type="text"  placeholder="Street">
                    </div>
                    <div class="form-group">
                        <input wire:model="postalcode" class="input" type="text"  placeholder="Postal Code">
                    </div>
                    <div class="form-group">
                        <input wire:model="full_address" class="input" type="text"  placeholder="Full Address">
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
                <input type="radio" name="payments" id="payments-1" checked>
                <label for="payments-1">Direct Bank Transfer</label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <p>
                </div>
            </div>
            <div class="input-checkbox">
                <input type="radio" name="payments" id="payments-2">
                <label for="payments-2">Cheque Payment</label>
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
