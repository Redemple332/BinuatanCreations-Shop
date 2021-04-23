<div>
    <!-- addCategory Modal-->
    <div wire:ignore.self  class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="category"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            
                <form wire:submit.prevent="save" class="form-horizontal span6"  > 
                    <div class="modal-body" >
                        <div class="card text-white bg-dark mb-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label" for="modal-input-name">Category name</label>
                                    
                                    <input type="text" wire:model="category"  class="form-control" required autofocus>
                                    @error('category') <span style="color: orange" class="text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <center>
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}" width="300">
                                        @else
                                                                                
                                        @if ($image)
                                            <img src="{{ $image }}" width="300">
                                        @endif
                                            
                                        @endif
                                        <br>

                                        <div wire:loading wire:target="save"><i class="fas fa-spinner fa-spin fa-2x"></i></div> 
                                        <div wire:loading wire:target="photo"><i class="fas fa-spinner fa-pulse fa-2x"></i></div> 

                                        <div
                                            x-data="{ isUploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                                        >

                                        <hr class="sidebar-divider d-none d-md-block">

                                        <div class="bg-gradient-primary" @click="$refs.fileInput.click()">Upload Image</div>
                            
                                        <input x-ref="fileInput" type="file"  wire:model="photo" hidden>
                                        @error('photo')  <p style="color: orange" class="text-xs">{{ $message }}</p> @enderror
                                    </center>
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