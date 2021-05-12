<div>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Discounts</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Discounts <a  href="{{ route('admin.products') }}" class="btn btn-primary btn-sm" hre><i class="fas fa-plus"></i>Add</a></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="center">Attributes</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Discounted price</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th class="center">Attributes</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Discounted price</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                       @forelse ($discounts as $discount )
                            <tr>
                                {{-- <td>{{ $discount->name }}</td>
                                <td class="center">
                                    <span class="badge badge-info badge-counter">{{ $discount->category->category}}</span>
                                    <span class="badge badge-primary badge-counter">{{ $discount->color->name}}</span>
                                    <span class="badge badge-warning badge-counter">{{ $discount->size->name}}</span>
                                </td>
                                <td>&#8369;{{ $discount->price }}</td> 
                                <td>{{ $discount->discount->percent }}&#37;</td> 
                                <td>&#8369;{{ $discount->discounted_price }}</td>
                                <td></td> --}}

                                <td>{{ $discount->product->name }}</td>
                                <td class="center">
                                    {{-- <span class="badge badge-info badge-counter">{{ $discount->category->category}}</span>
                                    <span class="badge badge-primary badge-counter">{{ $discount->color->name}}</span>
                                    <span class="badge badge-warning badge-counter">{{ $discount->size->name}}</span> --}}
                                </td>
                                <td>&#8369;{{ $discount->product->price }}</td> 
                                <td>{{ $discount->percent }}&#37;</td> 
                                <td>&#8369;{{ number_format($discount->discounted_price,2) }}</td>
                                <td class="center"> 
                                    <i wire:click="$emit('addDiscount',{{ $discount->product->id}},{{ $discount->id}})" class="fas fa-edit"></i>
                                    <button  class="btn btn-danger btn-sm" wire:click.prevent="$emit('delete',{{ $discount->id }})"  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
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
    @livewire('admin.modals.create-discount');
</div>