<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profile</h4>
                               </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php echo $this->session->flashdata('success');?>
                         <?php echo $this->session->flashdata('error'); ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm order-2 order-sm-1">
                                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xl me-3">
                                                    
                                                            <img src="<?= base_url()?><?= $admin_details['image'] ?>" alt="" class="img-fluid rounded-circle d-block">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-16 mb-1"><?= $admin_details['name']?></h5>
                                                            <!-- <p class="text-muted font-size-13">Business Man</p> -->

                                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= $admin_details['mobile']?></div>
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= $admin_details['email']?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-auto order-1 order-sm-2">
                                                <div class="d-flex align-items-start justify-content-end gap-2">
                                                    <div>
                                                        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#profile_modal"><i class="me-1"></i> Profile Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">About</h5>
                                            </div>
                                            <form method="post" action="<?= base_url('admin/update_admin_details')?>">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Name</label>
                                                            <input class="form-control" type="text" value="<?= $admin_details['name'] ?>" name="name" id="" required>
                                                        </div>
                                                    </div>
                                                 <!--    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Designation</label>
                                                            <input class="form-control" type="text" value="" id="">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Email</label>
                                                            <input class="form-control" type="email" value="<?= $admin_details['email'] ?>" id=""  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Mobile No</label>
                                                            <input class="form-control" type="mobile no" value="<?= $admin_details['mobile'] ?>" id=""  name="mobile" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Address</label>
                                                           <textarea class="form-control"   name="address" value=""  required><?= $admin_details['address'] ?>
                                                           </textarea>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                 <button class="btn btn-primary w-md" tye="submit" name="submit">Submit</button>
                                            </div>
                                       </form>
                                            <!-- end card body -->
                                        </div>
                                       <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->
                       </div>
                        <!-- end row -->
                        <!-- Modal -->
                 <form method="post" action="<?= base_url()?>admin/change_profile_image"  enctype="multipart/form-data">
                <div class="modal fade" id="profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    
                      <div class="modal-body">
                                <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)">
                                <img src="" alt="" id="image0">
                                <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i>  Product Image</span></label>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
<?php include('includes/footer.php')?>