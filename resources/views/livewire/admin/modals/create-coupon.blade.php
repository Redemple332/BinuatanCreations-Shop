<div>
    <x-loading-indicator />
    <!-- Modal -->
    <div wire:ignore.self  class="modal fade" id="modalCoupon" tabindex="-1" role="dialog" aria-labelledby="coupon"
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Coupon Information</p>
                                    </div>
                                
                                    <div class="card-body">    
   
                                        <div class="form-group"><label ><strong>Coupon code</strong></label>
                                            <input class="form-control" wire:model.lazy="code" type="text" placeholder="Enter coupon code...">
                                        </div>
                                        @error('code') <span class="text-xs text-danger">{{ $message }}</span> @enderror  

                                        <div class="form-group"><label ><strong>Coupon Type</strong></label>
                                            <select class="form-control input-sm" wire:model.lazy="type">
                                                <option value="none" selected>Choose...</option>
                                                <option value="Fixed">Fixed</option> 
                                                <option value="Percent">Percent</option>    
                                            </select>
                                        </div>
                                        @error('type') <span class="text-xs text-danger">{{ $message }}</span> @enderror  
                                    
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label ><strong>Coupon value</strong></label>
                                                    <input class="form-control" wire:model.lazy="value" type="number" placeholder="Enter coupon value...">
                                                </div>
                                                @error('value') <span class="text-xs text-danger">{{ $message }}</span> @enderror  
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label ><strong>Coupon cart value</strong></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">&#8369;</span>
                                                        </div>
                                                        <input class="form-control" wire:model.lazy="cart_value" type="number" placeholder="Enter coupon cart value...">
                                                    </div>
                                                </div>
                                                @error('cart_value') <span class="text-xs text-danger">{{ $message }}</span> @enderror  
                                            </div>
                                        </div>
                                        <div class="form-group"><label ><strong>Expiration date</strong></label>
                                            <input class="form-control" wire:model.lazy="expiry_date" type="date" placeholder="Enter coupon code...">
                                        </div>
                                        @error('expiry_date') <span class="text-xs text-danger">{{ $message }}</span> @enderror  

                                    </div>
                                </div>
                            </div>
                        </div> 
                       
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    
    
</div>
