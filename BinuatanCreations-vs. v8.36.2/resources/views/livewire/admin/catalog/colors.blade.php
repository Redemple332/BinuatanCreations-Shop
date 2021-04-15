<div>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Colors</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <p class="text-primary m-0 font-weight-bold">List of Colors <a href="{{ route('admin.product.create') }}"  class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i>Add</a></p>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Color</th>
                          <th>Code</th>
                          <th class="center">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Color</th>
                          <th>Code</th>
                          <th class="center">Action</th>
                      </tr>
                  </tfoot>
                  <tbody>                            
                      <tr>
                          <td>Blue</td>
                          <td>333333343</td>
                          <td class="center">
                              <button type="button"  class="btn btn-primary btn-sm" ><span class="fa fa-edit fw-fa"></span></button>
                              <button  class="btn btn-danger btn-sm" wire:click.prevent="delete(({{ 1 }}))"  data-hover="tooltip" title="View"><span class="fa fa-trash"></span></button>
                          </td> 
                      </tr>                        
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- DataTales Example -->
</div>