<div>
    <x-loading-indicator />
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Coupons</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Coupons
                <button   wire:click="$emit('addCoupon','')" class="btn btn-primary btn-sm" hre>
                <i class="fas fa-plus"></i>Add
                </button>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Cart Value</th>
                            <th>Expiration Date</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Cart Value</th>
                            <th>Expiration Date</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                       @forelse ($coupons as $coupon )
                            <tr>
                                <td>{{ $coupon->code }}</td>
                                <td class="center"><span class="badge {{ $coupon->type == 'Fixed' ?'badge-primary': 'badge-success' }} badge-counter">{{ $coupon->type }}</span></td>                     
                                <td>
                                    @if ($coupon->type == 'Fixed' )
                                        &#8369;{{ $coupon->value }}
                                    @else
                                      {{ number_format($coupon->value) }}&#37;
                                    @endif
                                </td>
                                <td>&#8369;{{ $coupon->cart_value }}</td>
                                <td>{{ Carbon\Carbon::parse($coupon->expiry_date)->format('l jS \of F Y ') }}</td>
                                <td class="center"> 
                                    <button wire:click.prevent="$emit('addCoupon',{{ $coupon->id }})" title="Edit" class="btn btn-primary btn-sm" ><span class="fa fa-edit fw-fa"></span></button>
                                    <button  class="btn btn-danger btn-sm " wire:click.prevent="delete(({{ $coupon->id }}))"  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
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
    @livewire('admin.modals.create-coupon')
</div>
