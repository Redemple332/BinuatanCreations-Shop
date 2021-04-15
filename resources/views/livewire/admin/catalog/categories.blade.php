<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Categories <button  class="btn btn-primary btn-sm" wire:click.prevent="add"><i class="fas fa-plus"></i>Add</button></p>
        </div>
        
        <div  class="card-body">
            {{-- wire:ignore --}}
            <div  class="table-responsive">
                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">           
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th class="center">Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th class="center">Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>  
                        @forelse ($categories as $category)                                   
                            <tr>
                                <td>{{ $category->category}}</td>
                                <td class="center"><span class="badge {{ $category->status == 1 ?'badge-success': 'badge-danger' }} badge-counter">{{ $category->status == 1 ?'Active': 'Deactive' }}</span> </td>
                                <td class="center">
                                    <button wire:click.prevent="edit(({{ $category->id }}))" title="Edit" class="btn btn-primary btn-sm" ><span class="fa fa-edit fw-fa"></span></button>
                                    <a wire:click.prevent="showImage(({{  $category->id }}))"  class="btn btn-info btn-sm"  data-hover="tooltip" title="View"><span class="fa fa-eye"></span></a>
                                    <button  class="btn btn-danger btn-sm" wire:click.prevent="delete(({{ $category->id }}))"  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
                                </td> 
                              
                            </tr>     
                        @empty
                            {{-- <p>No Category fund.</p> --}}
                        @endforelse                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
 
    
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