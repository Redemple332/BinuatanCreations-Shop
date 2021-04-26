<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Categories <button  class="btn btn-primary btn-sm"  wire:click="$emit('addCategory')"><i class="fas fa-plus"></i>Add</button></p>
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
                                    <span class="custom-switch m-0">
                                        <input  class="custom-control-input"  wire:click="status({{ $category->id }}, '{{ $category->status }}')" 
                                        id="customSwitch{{ $category->id }}" type="checkbox" @if ($category->status == 1) checked @endif>
                                        <label class="custom-control-label" for="customSwitch{{ $category->id }}"></label>
                                    </span>
                                    <button wire:click.prevent="$emit('editCategory',{{ $category->id }})" title="Edit" class="btn btn-primary btn-sm" ><span class="fa fa-edit fw-fa"></span></button>
                                    <button wire:click.prevent="showImage(({{  $category->id }}))"  class="btn btn-info btn-sm"  data-hover="tooltip" title="View"><span class="fa fa-eye"></span></button>
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
    @livewire('admin.modals.create-category')
   
</div>