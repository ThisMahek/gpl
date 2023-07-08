<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
     <?= $this->session->flashdata('error')?>
      <?= $this->session->flashdata('success')?>
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Game Name</h4>
             </div>
             <div class="col-md-4 col-4">
                 <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#add">+ Add</button>
             </div>
         </div>
             
     </div>
     <div class="card-body">
       
           <table class="table table-bordered table-responsive datatable nowrap w-100 ">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Game Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                      <?php if($manage_sports):
                       $i=0;
                      ?>
                      <?php foreach($manage_sports as $row):
                       
                        $i++;
                        ?>
                                            <tr>
                                                <td><?=  $i?></td>
                                                <td><?= $row['title']?></td>
                                                <!-- <td>-</td> -->
                                                <!-- <td><img src="<?= base_url()?>assets/images/login-page.png" class="game-img"></td> -->
                                                <!-- <td><button class="btn btn-success btn-sm">Active</button></td> -->

                                                <td>
                                    <?php 
                                     if($row['status'] == 1)
                                         {
                                    ?> 
                              <a  onclick="return confirm('Are you sure you want to inactive?');" href='<?= base_url()?>sportsname/update_sports_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Active</button></a>
                                     <?php
                                          }
                                           else
                                          {    
                                      ?>
                               <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>sportsname/update_sports_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    <?php
                                        }
                                      ?>
                                                </td> 
                                               <!--  <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td> -->

                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update<?= $row['id']?>"><i class=" bx bxs-pencil"></i></button>
                                                      <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                                                      <a href="<?= base_url('sportsname/delete_sports')?>/<?=$row['id']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this user?');"class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i> </button></a>
                                                  </div>
                                                </td>
                                             </tr>

                                             <?php endforeach;?>
                                             <?php endif;?>
                                         <!--    <tr>
                                                <td>1</td>
                                                <td>Football</td>
                                                <td>-</td>
                                                <td><img src="<?= base_url()?>assets/images/login-page.png" class="game-img"></td>
                                                <td><button class="btn btn-danger btn-sm">Inactive</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td>
                                             </tr> -->
                      </tbody>
          </table>
     </div>
 </div>
 <!--add modal-->
   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Sport Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('sportsname/add_sports')?>" method="post">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="title" class="form-control"  required>
                                   </div>
                                   <!-- <div class="mb-3">
                                       <label class="mb-2">Select Parent Category</label>
                                      <select class="form-control" name="sport_category">
                                        <?php foreach($sports_category as $row):?>
                                          <option value="<?= $row['id']?>"><?= $row['title']?></option>
                                          <?php endforeach;?>
                                      </select>
                                   </div> -->
                               <!--  div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"  class="hidden-field" name="image[]" id="slider0" onchange="preview(this,0)">
                                         <img src="" alt="" id="image0">
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i>  Image</span></label>
                                  </div> -->
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active" name="status"   <?= ('checked')?'1':'0'?> checked>
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="type" class="btn btn-primary" name="submit">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->
 <!--add modal-->
  <?php if($manage_sports):?>
  <?php foreach($manage_sports as $row):?>
   <div class="modal fade" id="update<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Sports Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('sportsname/update_sports')?>" method="post">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="title" class="form-control" value="<?=$row['title']?>" >
                                   </div>
                                   <input type="hidden" name="id" value="<?= $row['id']?>">
                                  <!--   <div class="mb-3">
                                       <label class="mb-2">Select Parent Category</label>
                                      <select class="form-control" name="">
                                          <option>Cricket</option>
                                          <option>Football</option>
                                      </select>
                                   </div> -->
                                  <!-- <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"  class="hidden-field" name="image[]" id="slider0" onchange="preview(this,0)">
                                         <img src="" alt="" id="image0">
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i>  Image</span></label>
                                  </div> -->
                                  
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active"  name="status" <?= ($row['status']=='1')?'checked':'unchecked'?> >
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>

                <?php endforeach;?>
                <?php endif;?>
 <!--add modal-->
<?php include('includes/footer.php')?>