<div>

    <!-- addCategory Modal-->
    <div wire:ignore.self  class="modal fade" id="modalSize" tabindex="-1" role="dialog" aria-labelledby="category"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Size</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            
                <form wire:submit.prevent="save" class="form-horizontal span6"  > 
                    <div class="modal-body" >
                        <div class="card text-white bg-dark mb-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label">Size name</label>
                                    <input type="text" wire:model="name"  class="form-control" required autofocus>
                                    @error('name') <span style="color: orange" class="text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" >Size code</label>
                                    <input type="text" wire:model="code"  class="form-control" required autofocus>
                                    @error('code') <span style="color: orange" class="text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button> 
                    </div>
                </form> 

            </div>
        </div>
    </div>
</div>