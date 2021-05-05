<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Discounts</h1>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">List of Discounts <button  class="btn btn-primary btn-sm"  wire:click="$emit('addColor','')"><i class="fas fa-plus"></i>Add</button></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Discounted price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Discounted price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>                            
                                          
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    @livewire('admin.modals.create-color')
</div>