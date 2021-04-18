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
                            <th>Image</th>
                            <th>Products</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Prices</th>
                            <th>Discount%</th>
                            <th>Discount Prices</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr><th></th>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Prices</th>
                            <th>Discount%</th>
                            <th>Discount Prices</th>
                            <th>Quantity</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                        @foreach($products as $product )
                        <tr>
                            <td><div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck"></label>
                            </div></td>
                            <td><a href="" ><img  style="width="40" height="40" src="" alt=""></a></td>
                            <td><a href="" >{{ $product->name }}</a></td>  
                            <td> 
                            @foreach($product->attributes as $attribute)
                                @if($attribute->attribute == 'size')
                                 {{ $attribute->value }}
                                @endif
                            @endforeach
                        </td>
                            <td>Available</td>                       
                            <td>₱12</td>
                            <td>12%</td>
                            <td>₱122</td>
                            <td>2</td>
                        </tr> 
                        @endforeach            
                    </tbody>
                </table>
              
                {{$products->links()}}
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
</div>