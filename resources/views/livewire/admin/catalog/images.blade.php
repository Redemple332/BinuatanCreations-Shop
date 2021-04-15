<div>
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Image</h1>
 
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <p class="text-primary m-0 font-weight-bold">List of Image <a href="{{ route('admin.product.create') }}"  class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i>Add</a></p>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Image</th>
                           <th class="center">Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th class="center">Action</th>
                       </tr>
                   </tfoot>
                   <tbody>                            
                       <tr>
                           <td>KAYAB</td>
                           <td>imshr</td>
                           <td class="center">
                              <button type="button" title="Edit" class="btn btn-primary btn-sm" id="edit-item-size" data-item-id=""><span class="fa fa-edit fw-fa"></span></button>
                              <button type="button" id="delete-item-size" data-item-id="" class="btn btn-danger btn-sm"  data-hover="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
                           </td> 
                       </tr>                        
                   </tbody>
               </table>
           </div>
       </div>
   </div>
   <!-- DataTales Example -->
 </div>