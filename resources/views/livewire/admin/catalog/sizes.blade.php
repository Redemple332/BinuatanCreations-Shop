<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sizes</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Sizes <button  class="btn btn-primary btn-sm"  wire:click="$emit('addSize','')"><i class="fas fa-plus"></i>Add</button></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Size</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                      @forelse ($sizes as $size )
                          <tr>
                              <td>{{ $size->name }}</td>
                              <td>{{ $size->code }}</td>
                              <td class="center"><span class="badge {{ $size->status == 1 ?'badge-success': 'badge-danger' }} badge-counter">{{ $size->status == 1 ?'Active': 'Deactive' }}</span></td>
                              <td class="center">
                                <span class="custom-switch m-0">
                                    <input  class="custom-control-input"  wire:click="status({{ $size->id }}, '{{ $size->status }}')" 
                                    id="customSwitch{{ $size->id }}" type="checkbox" @if ($size->status == 1) checked @endif>
                                    <label class="custom-control-label" for="customSwitch{{ $size->id }}"></label>
                                </span>
                                <button wire:click.prevent="$emit('addSize',{{ $size->id }})" title="Edit" class="btn btn-primary btn-sm" ><span class="fa fa-edit fw-fa"></span></button>
                                <button  class="btn btn-danger btn-sm" wire:click.prevent="delete(({{ $size->id }}))"  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
                              </td> 
                          </tr>
                      @empty
                          
                      @endforelse                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    @livewire('admin.modals.create-size')
</div>    