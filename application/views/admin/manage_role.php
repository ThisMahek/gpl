<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Role</h4>
             </div>
             <div class="col-md-4 col-4">
                 <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#add">+ Add</button>
             </div>
         </div>
             
     </div>
     <div class="card-body">
           <!--filter-->
             <div class="data-filters">
                 <!--<h6>Filters</h6>-->
                 <div class="row">
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="mb-2">Category</label>
                            <select class="form-control" name="" required>
                                <option value="">All Category</option>
                                <option value="">Cricket</option>
                                <option value="">Football</option>
                            </select>
                         </div>
                     </div>
                 </div>
             </div>
             <!--filter-->
           <table class="table table-bordered table-responsive datatable nowrap w-100 ">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Role Name</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Captain</td>
                                                <td>Cricket</td>
                                                <td><button class="btn btn-success btn-sm">Active</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td>
                                             </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Captain</td>
                                                <td>Cricket</td>
                                                <td><button class="btn btn-danger btn-sm">Inactive</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td>
                                             </tr>
                      </tbody>
          </table>
     </div>
 </div>
 <!--add modal-->
   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="" class="form-control">
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Select  Category</label>
                                      <select class="form-control" name="">
                                          <option>Cricket</option>
                                          <option>Football</option>
                                      </select>
                                   </div>
                                   <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active" checked="">
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->
 <!--add modal-->
   <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="" class="form-control">
                                   </div>
                                    <div class="mb-3">
                                       <label class="mb-2">Select Category</label>
                                      <select class="form-control" name="">
                                          <option>Cricket</option>
                                          <option>Football</option>
                                      </select>
                                   </div>
                                   <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active" checked="">
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->
<?php include('includes/footer.php')?>