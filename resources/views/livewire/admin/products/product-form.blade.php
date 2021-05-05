<div>
    <h3 class="text-dark mb-4">Product Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary font-weight-bold m-0">Product Images</h6>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="card-body">
                    <center>
                       
                        @error('photos') <span class="text-xs danger">{{ $message }}</span> @enderror

                        @if ($photos)
                            @foreach ($photos as $photo)
                            <i class="fa fa-times cursor-pointer"aria-hidden="true" wire:click="remove({{$loop->index}})"></i>
                            <img src="{{ $photo->temporaryUrl() }}" width="300">
                            @endforeach                                       
                        @endif

                        @if ($images)
                        @foreach ($images as $image)
                        <i class="fa fa-times cursor-pointer"aria-hidden="true" wire:click="deleteImage({{$image->id}})"></i>
                            <img src="{{$image->imagePath}}" width="300">
                        @endforeach
                        @endif
                        
                        <br>
                        <div wire:loading wire:target="photos"><i class="fas fa-spinner fa-pulse fa-2x"></i></div> 

                        <div
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="btn btn-danger btn-block" @click="$refs.fileInput.click()">Upload Image</div>
            
                        <input x-ref="fileInput" type="file" multiple  wire:model="photos" hidden>
                        @error('photos')  <p style="color: orange" class="text-xs">{{ $message }}</p> @enderror
                    </center>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Product Information</p>
                        </div>
                   
                        <div class="card-body">    
                                <div class="form-group"><label for="productname"><strong>Product Name</strong></label>
                                    <input class="form-control" wire:model="form.name" type="text" placeholder="Enter product name..." required autofocus>                                   
                                </div>
                                {{-- DROPDOWN SUGGESSTION --}}
                                <div class="form-group"><label for="description"><strong>Descrition</strong></label>
                                    <textarea class="form-control" wire:model="form.description" type="text"  placeholder="Enter product description" required autofocus></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="quantity"><strong>Quantity</strong></label>
                                            <input class="form-control" wire:model="form.qty"  type="number" placeholder="Enter quantity..." required autofocus>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="originalprice"><strong>Original price</strong></label>
                                            <input class="form-control" wire:model="form.orp" type="number" placeholder="Enter original price..."  required autofocus>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="price"><strong>Price</strong></label>
                                            <input class="form-control" wire:model="form.price" type="number" placeholder="Enter price...."  required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="category"><strong>Category</strong></label>
                                            <div class="input-group">
                                                <select class="custom-select" wire:model="form.category_id">
                                                    <option value="none" selected>Choose...</option>
                                                    @foreach($categories as $category )     
                                                         <option value="{{ $category->id }}">{{ $category->category }}</option>     
                                                    @endforeach  
                                                </select>
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-secondary" type="button" wire:click="$emit('addCategory')"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            @error('form.category_id') <span class="text-xs text-danger">{{ $message }}</span> @enderror  
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="color"><strong>Color</strong></label>
                                            <div class="input-group">
                                                <select class="custom-select" wire:model="form.color_id">
                                                    <option value="none" selected>Choose...</option>
                                                    @foreach($colors as $color )     
                                                         <option value="{{ $color->id }}">{{ $color->name }}</option>     
                                                    @endforeach  
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" wire:click="$emit('addColor', '')"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            @error('form.color_id') <span class="text-xs text-danger">{{ $message }}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="size"><strong>Size</strong></label>
                                            <div class="input-group">
                                                <select class="custom-select" wire:model="form.size_id">
                                                     <option value="none"selected="">Choose...</option>
                                                    @foreach($sizes as $size )     
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>     
                                                    @endforeach  
                                                   
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" wire:click="$emit('addSize', '')"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            @error('form.size_id') <span class="text-xs text-danger">{{ $message }}</span> @enderror  
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="gender"><strong>Gender</strong></label>
                                            <select class="form-control input-sm" wire:model="form.gender" required autofocus>
                                                <option value="MEN AND WOMEN">MEN AND WOMEN</option>
                                                <option value="MEN">MEN</option>
                                                <option value="WOMEN">WOMEN</option>         
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="ship"><strong>Free shipping: </strong></label>
                                            <span class="custom-switch m-0">
                                                <input  class="custom-control-input" wire:model="form.ship" id="customSwitch" type="checkbox" >
                                                <label class="custom-control-label" for="customSwitch"></label>
                                            </span>
                                        </div>
                                    </div>  

                                    <div class="col">
                                        <div class="form-group"><label for="ship"><strong>Status: </strong></label>
                                            <span class="custom-switch m-0">
                                                <input  class="custom-control-input" wire:model="form.status" id="customSwitch1" type="checkbox" checked >
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </span>
                                        </div>
                                    </div> 
                                </div>    
                                <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-plus"></i> Save
                                </button>
                                <center> <div wire:loading wire:target="save"><i class="fas fa-spinner fa-spin fa-2x"></i></div> </center>
                                <input name="_token" type="hidden" value="{{ csrf_token()}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('admin.modals.create-category')
    @livewire('admin.modals.create-size')
    @livewire('admin.modals.create-color')
</div>
