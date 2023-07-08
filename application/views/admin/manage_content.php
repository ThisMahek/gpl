<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     
     
     <div class="card-header">
         <div class="row">
             
               <?= $this->session->userdata('error');?>
      <?= $this->session->userdata('success');?>
      
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Contact</h4>
             </div>
         </div>
             
     </div>
     <div class="card-body">
           <table class="table table-bordered table-responsive datatable nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Name</th>
                                                <th>Email Id</th>
                                                <th>Mobile No</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                         <?php if(isset($manage_content)):
                         
                         $i=0;
                         ?>
                         <?php foreach($manage_content as $row):
                         $i++;
                         ?>
                                            <tr>
                                                <td><?= $i?></td>
                                                <td><?= $row['name']?></td>
                                                <td><?= $row['email']?></td>
                                                <td><?= $row['mobile']?></td>
                                                <td><?= $row['address']?></td>
                                                <!--<td><button class="btn btn-success btn-sm">Active</button></td>-->
                                                
                                                 <td>
                                                            <?php 
                                                          if($row['status'] == 1)
                                                            {
                                                            ?> 
                                                        <a  onclick="return confirm('Are you sure you want to inactive?');" href='<?= base_url()?>contact/update_contact_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Active</button></a>
                                                        <?php
                                                            }
                                                          else
                                                          {?>
                                                        <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>contact/update_contact_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Inactive</button></a>
                                                        <?php
                                                          }
                                                          ?>
                                              </td> 
                                                <td>
                                                  <div class="action-btn">
                                                      <a href="#"><button class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#update<?=$row['id']?>"><i class=" bx bxs-pencil"></i></button></a>
                                                  </div>
                                                </td>
                                             </tr>
                                             
                                             <?php endforeach;?>
                                             <?php endif;?>
                                             </tbody>
          </table>
     </div>
 </div>

      <?php if(isset($manage_content)):?>
     <?php foreach($manage_content as $row):?>
 <!--add modal-->
   <div class="modal fade" id="update<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url()?>contact/update_contact" method="post">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="name" class="form-control" value="<?= $row['name']?>">
                                   </div>
                                   <input type="hidden" name="id" value="<?= $row['id']?>">
                                   <div class="mb-3">
                                       <label class="mb-2">Email Id</label>
                                       <input type="text" name="email" class="form-control" value="<?= $row['email']?>">
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Mobile Number</label>
                                       <input type="text" name="mobile" class="form-control" value="<?= $row['mobile']?>">
                                   </div>
                                     <div class="mb-3">
                                       <label class="mb-2">Address</label>
                                       <textarea type="text" name="address" class="form-control"> value="<?= $row['address']?></textarea>
                                   </div>
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active" name="status" <?= ($row['status']=='1')?'checked':'unchecked'?>>
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit"   name="update" class="btn btn-primary">Update</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                
                <?php endforeach;?>
                  <?php endif;?>
 <!--add modal-->
<?php include('includes/footer.php')?>