<div>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Products <a href="{{ route('admin.product.create') }}"  class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i>Add</a></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            {{-- <th>Image</th> --}}
                            <th>Products</th>
                            <th>Attributes</th>
                            <th>Status</th>
                            <th>Prices</th>
                            <th>Discount</th>
                            <th class="center">Quantity</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr><th></th>
                            {{-- <th>Image</th> --}}
                            <th>Products</th>
                            <th>Attributes</th>
                            <th>Status</th>
                            <th>Prices</th>
                            <th>Discount</th>
                            <th class="center">Quantity</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                        @forelse($products as $product )
                        <tr>
                            <td><div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck"></label>
                            </div></td>
                            {{-- <td>
                                @foreach($product->images->take(1) as $image )
                                    <a href="" ><img  style="width="40" height="40" src="{{ $image->imagePath }}" alt=""></a>
                                @endforeach
                            </td> --}}
                            <td><a href="" >{{ $product->name }}</a></td>  
                            <td> 
                                <span class="badge badge-info badge-counter">{{ $product->category->category}}</span>
                                <span class="badge badge-primary badge-counter">{{ $product->color->name}}</span>
                                <span class="badge badge-warning badge-counter">{{ $product->size->name}}</span>
                               
                            </td>
                            <td class="center"><span class="badge {{ $product->status == 1 ?'badge-success': 'badge-danger' }} badge-counter">{{ $product->status == 1 ?'Available': 'Not available' }}</span></td>                     
                            <td>&#8369;{{ $product->price }}</td>
                            
                            <td>{{ $product->discount->percent }}&#37; - 
                                &#8369;{{ number_format($product->discounted_price,2) }}
                                @if ($product->discount->percent == 0)
                                    <i wire:click="$emit('addDiscount',{{ $product->id }},{{0}})" class="fas fa-plus"></i>     
                                @endif
                               
                            
                            <td class="center">{{ $product->qty }}</td>
                            <td class="center">
                                <span class="custom-switch m-0">
                                    <input  class="custom-control-input"  
                                     id="customSwitch{{ $product->id }}" wire:click="status({{ $product->id }}, '{{ $product->status }}')" type="checkbox" @if ($product->status == 1) checked @endif>
                                    <label class="custom-control-label" for="customSwitch{{ $product->id }}"></label>
                                </span>
                                <button  class="btn btn-info btn-sm"  data-hover="tooltip" title="View"><span class="fa fa-eye"></span></button>
                                <a  title="Edit" class="btn btn-primary btn-sm" href="{{ route('admin.product.edit', ['product' => $product->id]) }}"><span class="fa fa-edit fw-fa"></span></a>
                                <button  class="btn btn-danger btn-sm" wire:click.prevent="delete(({{ $product->id }}))  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
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