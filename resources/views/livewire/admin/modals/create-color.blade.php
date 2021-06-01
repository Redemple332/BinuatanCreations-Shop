<div>
    <!-- addCategory Modal-->
    <div wire:ignore.self  class="modal fade" id="modalColor" tabindex="-1" role="dialog" aria-labelledby="category"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add Color</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            
                <form wire:submit.prevent="save" class="form-horizontal span6"  > 
                    <div class="modal-body" >
                        <div class="card text-white bg-dark mb-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label">Color name</label>
                                    <input type="text" wire:model="name"  class="form-control" required autofocus>
                                    @error('name') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" >Color picker</label>
                                    <input type="color" class="form-control form-control-color" value="{{ $code }}" id="exampleColorInput"  title="Choose your color" wire:model="code" required autofocus>
                                    @error('code') <span  class="text-xs text-danger">{{ $message }}</span> @enderror
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