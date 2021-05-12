<div>
    <!-- Modal -->
    <div wire:ignore.self  class="modal fade" id="modalDiscount" tabindex="-1" role="dialog" aria-labelledby="discount"
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Discount%</h5>
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
                                        <p class="text-primary m-0 font-weight-bold">Discount Information</p>
                                    </div>
                                
                                    <div class="card-body">    
                                        <div class="form-group"><label for="discount"><strong>{{ $name }} - &#8369;{{ $price }}</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">&#37;</span>
                                                </div>
                                                <input type="number" class="form-control @error('discount') is-invalid @enderror" wire:model="discount" placeholder="Enter discount...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">&#8369;</span>
                                                    <span class="input-group-text">{{ $discounted_price }}</span>
                                                </div>
                                            </div>   
                                            @error('discount') <span class="text-xs">{{ $message }}</span> @enderror      
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label ><strong>Date Schedule</strong></label>
                                                    <input class="form-control" type="date" placeholder="Enter quantity...">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label ><strong>Time Schedule</strong></label>
                                                    <input class="form-control" type="time" placeholder="Enter original price...">
                                                </div>
                                            </div>
                                        </div>

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
