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
                    <center> <img style="border"  src="{{asset('asset2/img/dogs/image2.jpeg')}}" width="160" height="170">
                    </center>
                    <hr>
                    <input type="file" name="cover_image" >
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
                                    <input class="form-control" wire:model="form.name" type="text" placeholder="Enter product name..."  required autofocus>                                  
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
                                                <select class="custom-select" id="inputGroupSelect04">
                                                    <option selected>Choose...</option>
                                                    @foreach($categories as $category )     
                                                         <option value="{{ $category->ID }}">{{ $category->category }}</option>     
                                                    @endforeach  
                                                </select>
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-secondary" type="button" wire:click="$emit('addCategory')"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="size"><strong>Size</strong></label>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04">
                                                  <option selected>Choose...</option>
                                                  <option value="1">One</option>
                                                  <option value="2">Two</option>
                                                  <option value="3">Three</option>
                                                </select>
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-secondary" type="button">Add</button>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="color"><strong>Color</strong></label>
                                            <select class="form-control input-sm" wire:model="form.color_id" required autofocus>
                                            <option value="1">Select Color</option>
                                            <option value="1">Blue</option>     
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="namecode"><strong>Image</strong></label>
                                            <select class="form-control input-sm" wire:model="form.namecode" required autofocus >
                                            <option value="None">Select Image Collection</option>
                                            <option value="Sample">Sample</option>
                                            </select>
                                        </div>
                                    </div>
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
                                <div class="form-group"><label for="tag"><strong>TAGS</strong></label>
                                    <textarea class="form-control"  wire:model="form.tags" type="text" placeholder="Enter tags....." ></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                        
                                            <div class="custom-control custom-checkbox big">
                                                <input  type="checkbox" class="custom-control-input" id="customCheck">
                                                <label  class="custom-control-label" for="customCheck"><strong>New</strong></label>
                                            </div>
                                        </div>
                                    </div>  
                                    {{-- <div class="col">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox big">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck"><strong>Free shipping</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox big">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck"><strong>status</strong></label>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>    
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-plus"></i> Save
                                </button>
                                <input name="_token" type="hidden" value="{{ csrf_token()}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('admin.modals.create-category')
</div>
