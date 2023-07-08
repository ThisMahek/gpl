<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
      <?= $this->session->flashdata('error')?>
      <?= $this->session->flashdata('success')?>
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Slider</h4>
             </div>
             <div class="col-md-4 col-4">
                 <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#add">+ Add</button>
             </div>
         </div>
             
     </div>
     <div class="card-body">
           <table class="table table-bordered table-responsive datatable nowrap w-100  desktop_responsive">
                                            <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Url</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                      <?php if($manage_slider):?>
                      <?php 
                        $i=0;
                        foreach($manage_slider as $row ):
                        $i++;
                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $row['title']?></td>
                                                <td><img src="<?= base_url()?><?= $row['image']?>"></td>
                                                <td><?= $row['url']?></td>
                                                <!-- <td><button class="btn btn-success btn-sm">Active</button></td> -->
                                                <td>
                                  <?php 
                                 if($row['status'] == 0)
                                   {
                                   ?> 
                              <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>slider/update_slider_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Inactive</button></a>
                              <?php
                                  }
                                 else
                                 {?>
                               <a  onclick="return confirm('Are you sure you want to Inactive?');" href='<?= base_url()?>slider/update_slider_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Active</button></a>
                              <?php
                                 }
                                 ?>
                              </td> 
                                                <td>
                                                 <!--  <div class="action-btn">
                                                      <button class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div> -->

                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update<?= $row['id']?>"><i class=" bx bxs-pencil"></i></button>
                                                      <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                                                      <a href="<?= base_url('slider/delete_slider')?>/<?=$row['id']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this slider?');"class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i> </button></a>
                                                  </div>
                                                </td>
                                             </tr>
                                             <?php endforeach;?>
                                             <?php endif;?>
                                       <!--      <tr>
                                                <td>2</td>
                                                <td>Cricket Tournament</td>
                                                <td><img src="<?= base_url()?>assets/images/small/img-2.jpg"></td>
                                                <td>https://design.anshuwap.com/sport_tournament/Admin/manage_slider</td>
                                                <td><button class="btn btn-danger btn-sm">Inactive</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('slider/add_slider')?>"  method="post"  enctype="multipart/form-data">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Title</label>
                                       <input type="text"  class="form-control" name="title">
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Url</label>
                                       <input type="url" name="url" class="form-control">
                                   </div>
                                  <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)">
                                         <img src="" alt="" id="image0">
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                                  </div>
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active"  name="status" <?= ('checked')?'1':'0'?> checked  >
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->
 <!--add modal-->
<?php if(!empty($manage_slider)):?>
<?php foreach($manage_slider as $row):?>
   <div class="modal fade" id="update<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('slider/update_slider')?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">

                                   <div class="mb-3">
                                       <label class="mb-2">Title</label>
                                       <input type="hidden" name ="id" value="<?= $row['id']?>">
                                       <input type="text" name="title" class="form-control"  value="<?= $row['title']?>">
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Url</label>
                                       <input type="url" name="url" class="form-control" value="<?= $row['url']?>">
                                   </div>
                                  <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                      <input type="file"   name="image" id="slider0"  onchange="preview(this,0)" >
                                        <!-- <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)"> -->
                                         <img src="<?= base_url()?><?= $row['image']?>" alt="" id="image0" height="100px">
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                                  </div>

                                  <span id="sp_msg2<?=$row['id']?>" style="color:red"></span>

                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active" name="status"         <?= ($row['status']=='1')?'checked':'unchecked'?>>
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name ="update" class="btn btn-primary" id="submit">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
 <!--add modal-->
 <script>    	
function preview2(image,id){
     var filePath = image.value;
    // alert(filePath);
                       var allowedExtensions = /(\.jpg|\.png|\.jpeg )$/i;
                    
                       if(!allowedExtensions.exec(filePath)){
                    document.getElementById('sp_msg2'+id).innerHTML= '\n Please upload file having extensions .jpeg, .png, .jpeg only.';
                      document.getElementById("submit"+id).disabled=true;
                           return false;
                       }else{
                           //Image preview
                           if (image.files && image.files[0]) {
               				var reader = new FileReader();
               				reader.onload = function (e){
               					$('#slider0')
               						.attr('src', e.target.result)
               						.width(110)
               						.height(70);
               						document.getElementById('sp_msg2'+id).innerHTML=" ";
               					
               						  document.getElementById("submit"+id).disabled=false;
               				};
               				reader.readAsDataURL(image.files[0]);
               		 }
                       }
              
       	}
  </script>
<?php include('includes/footer.php')?>