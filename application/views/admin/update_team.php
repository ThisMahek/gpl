<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Update Team</h4>
             </div>
             <div class="col-md-4 col-4">
             </div>
         </div>
             
     </div>
     <div class="card-body">
         <form action="" method="">
             <div class="row">
                 <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Name</label>
                         <input type="text" class="form-control"  name="" value="" required>
                     </div>
                 </div>
                 <div class="col-md-12">
                      <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"  class="hidden-field" name="image[]" id="slider0" onchange="preview(this,0)">
                                         <img src="" alt="" id="image0">
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                                  </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Sports Category</label>
                        <select class="form-control" name="" required>
                            <option value="">Cricket</option>
                            <option value="">Football</option>
                        </select>
                     </div>
                 </div>
                   <div class="col-lg-12 col-md-12">
                              <div class="mb-3">
                                                        <label for="choices-multiple-remove-button" class="mb-2">Select Team Member</label>
                                                       <select class="js-example-basic-single" name="state" multiple="multiple">
                                                          <option value="AL">Alabama</option>
                                                          <option value="WY">Wyoming</option>
                                                        </select>
                             </div>
               </div>
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Email</label>
                         <input type="email" class="form-control"  name="" value="" required>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Mobile No</label>
                         <input type="tel" class="form-control" name="" value="" required>
                     </div>
                 </div>
                
                    <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">City</label>
                         <input type="text" class="form-control" name="" value="" required>
                     </div>
                 </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">State</label>
                        <select class="form-control" name="" required>
                            <option value="">Uttar Pradesh</option>
                            <option value="">Madhya Pradesh</option>
                        </select>
                     </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Address</label>
                         <textarea class="form-control" name=""></textarea>
                     </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">About</label>
                         <textarea class="summernote" name=""></textarea>
                     </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Achievements</label>
                         <textarea class="summernote" name=""></textarea>
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group mb-3 form-check">
                                                    <input id="opentoplay" type="checkbox" class="form-check-input" name="future" required="" data-pristine-required-message="You must accept the terms and conditions">
                                                    <label class="form-check-label" for="opentoplay">Open to Play</label><br>
                      </div>
                 </div>
             </div>
             <button class="btn btn-primary">Submit</button>
         </form>
     </div>
 </div>

<?php include('includes/footer.php')?>