<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order#</th>
                            <th>Customer</th>
                            <th>DateOrdered</th>
                            <th>Prices</th>
                            <th>PaymentMethod</th>
                            <th class="center">Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Order#</th>
                            <th>Customer</th>
                            <th>DateOrdered</th>
                            <th>Prices</th>
                            <th>PaymentMethod</th>
                            <th class="center">Status</th>
                            <th class="center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td><a href="">12</a></td>
                            <td><a href="">Redemple Marcelo</a></td>
                            <td>july 2 2000</td> 
                            <td>₱1200</td>
                            <td>Gcash</td>
                            <td class="center"><span class="badge 
                                {{  $status == 'Pending'? 'badge-warning':'' }}
                                {{  $status == 'Confirmed'? 'badge-success':'' }}
                                {{  $status == 'Shipped'? 'badge-secondary':'' }}
                                {{  $status == 'Delivered'? 'badge-primary':'' }}
                                {{  $status == 'Cancelled'? 'badge-danger':'' }}
                                {{  $status == 'Refunded'? 'badge-dark':'' }}
                                badge-counter">{{ $status }}</span></td>
                            <td class="center">
                                @if($status == 'Pending')
                                    <a  wire:click="cancel" class="btn btn-danger btn-circle btn-sm" data-hover="tooltip" title="Cancel">
                                        <i class="fas fa-times" ></i>
                                    </a>
                                    <a  wire:click.prefetch="confirm" class="btn btn-success btn-circle btn-sm" data-hover="tooltip" title="Confirm">
                                     <i class="fas fa-check"></i>
                                    </a>
                                @endif
                                @if($status == 'Cancelled')
                                    <a  wire:click="cancel" class="btn btn-danger btn-circle btn-sm disabled">
                                        <i class="fas fa-ban" ></i>
                                    </a>
                                    <a  wire:click="confirm" class="btn btn-success btn-circle btn-sm disabled">
                                    <i class="fas fa-ban"></i>
                                    </a>
                                @endif
                                @if($status == 'Confirmed')
                                    <a  wire:click="cancel" class="btn btn-danger btn-circle btn-sm" data-hover="tooltip" title="Delete">
                                        <i class="fas fa-times" ></i>
                                    </a>
                                    <a  wire:click="ship" class="btn btn-secondary btn-circle btn-sm" data-hover="tooltip" title="Ship">
                                        <i class="fas fa-truck"></i>
                                    </a>
                                @endif
                                @if($status == 'Shipped')
                                <a  class="btn btn-danger btn-circle btn-sm disabled">
                                    <i class="fas fa-ban" ></i>
                                </a>
                                <a  wire:click="deliver" class="btn btn-primary btn-circle btn-sm" data-hover="tooltip" title="Deliver">
                                    <i class="fas fa-clipboard-check"></i>
                                </a>
                                @endif
                                @if($status == 'Delivered')
                                    <a  class="btn btn-danger btn-circle btn-sm disabled">
                                        <i class="fas fa-ban" ></i>
                                    </a>
                                    <a  wire:click="refund" class="btn btn-dark btn-circle btn-sm" data-hover="tooltip" title="Refund">
                                        <i class="fas fa-people-carry"></i>
                                    </a>
                                @endif
                                @if($status == 'Refunded')
                                    <a  class="btn btn-danger btn-circle btn-sm disabled">
                                        <i class="fas fa-ban" ></i>
                                    </a>
                                    <a  wire:click="cancel" class="btn btn-danger btn-circle btn-sm" data-hover="tooltip" title="Cancel">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->

</div>
