<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Notification</h4>
             </div>
             <div class="col-md-4 col-4">
                 <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#add">+ Add</button>
             </div>
         </div>
     </div>
     <div class="card-body">
           <table class="table table-bordered table-responsive datatable nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                      <?php  if(isset($manage_notificaion)):
                          $i=0;  
                        ?>
                      <?php  foreach($manage_notificaion as $row):
                      $i++;
                        ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <!-- <td><?= $row['title']?></td> -->
                                        <td><button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#about<?= $row['id']?>"><i class="bx bx-info-circle"></i> About</button></td>
                                        <td>
                                    <?php 
                                     if($row['status'] == 1)
                                         {
                                    ?> 
                              <a  onclick="return confirm('Are you sure you want to inactive?');" href='<?= base_url()?>Notification/update_notification_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Active</button></a>
                                     <?php
                                          }
                                           else
                                          {    
                                      ?>
                               <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>Notification/update_notification_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    <?php
                                        }
                                      ?>
                                                </td>
                                              <!--   <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td> -->

                                                <td>
                                                  <div class="action-btn">
                                                      <!--<button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update<?= $row['id']?>"><i class=" bx bxs-pencil"></i></button>-->
                                                      <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                                                      <a href="<?= base_url('Notification/delete_notification')?>/<?=$row['id']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this user?');"class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i> </button></a>
                                                  </div>
                                                </td>
                                             </tr>
                                            <?php endforeach;?>
                                            <?php endif;?>

                                            <!--  <tr>
                                                <td>1</td>
                                                <td>We'll Keep you updated everytime</td>
                                                <td><button class="btn btn-danger btn-sm">Inactive</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <button class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td>
                                             </tr>
                                          -->
                                         
                     </tbody>
          </table>
     </div>
 </div>
 <!--add modal-->
   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('notification/add_notification')?>" method="post">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Title</label>
                                       <textarea  name="title" class="form-control" required></textarea>
                                   </div>
                                   
                                   <div class="mb-3">
                                   <label for="vehicle1"> All</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="select_all" name="all" value="1"><br>
                                   
                                    <label for="vehicle1">Game category </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="game_category" name="game" value="1" data-filter  ><br>
                                   
                                    <label for="vehicle1">Team</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="team" name="team" value="1" data-filter><br>
                                   
                                    <label for="vehicle1">Player</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="player" name="player" value="1" data-filter><br>
                                   
                                   </div>
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active"  name="status"   <?= ('checked')?'1':'0'?> checked>
                                     <label class="form-check-label" for="active"></label>
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->
 <!--add modal-->
 <?php  if(isset($manage_notificaion)): ?>
 <?php  foreach($manage_notificaion as $row): ?>
   <div class="modal fade" id="update<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('notification/update_notification')?>" method="post">
                          <div class="modal-body">
                                    <div class="mb-3">
                                       <label class="mb-2">Title</label>
                                       <textarea  name="title" class="form-control"><?= $row['title']?></textarea>
                                   </div>
                                   <input type="hidden"  name="id" value="<?= $row['id']?>">
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="active"  name="status" <?= ($row['status']=='1')?'checked':'unchecked'?>>
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







 <!--about player-->
 <!--add modal-->
 <?php if(!empty($manage_notificaion)):?>
 <?php foreach($manage_notificaion as $row): ?> 
   <div class="modal fade" id="about<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">
                          <div class="modal-body">
                              <p><?= $row['title']?></p>
                               <!-- <h6 class="mb-2">Player Details</h6> -->
                                <!-- <div class="row">
                                    <div class="col-4 mb-2">
                                        City
                                    </div>
                                    <div class="col-8 mb-2">
                                        Agra
                                    </div>
                                    <div class="col-4 mb-2">
                                        State
                                    </div>
                                    <div class="col-8 mb-2">
                                        U.P
                                    </div>
                                    <div class="col-4 mb-2">
                                        Address
                                    </div>
                                    <div class="col-8 mb-2">
                                        Sadar Bazaar, Agra
                                    </div>
                                    
                                    <h6 class="mb-2 mt-3">Achievements</h6>
                                    <div>
                                        <ul>
                                            <li>2 Times DDL Football Tournament 2017 & 2020, Winner.</li>
                                            <li>Best Team Leader awarded in 2021.</li>
                                            <li>Winner, Agra Football Tournament 2017.</li>
                                        </ul>
                                    </div>
                                </div> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Submit</button>-->
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
 <!--add modal-->
<!--about player-->
 <!--add modal-->
<?php include('includes/footer.php')?>

      <script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  
  <script>
      
//       $("[data-filter]").change(function() {
//     if(this.checked) {
//     alert(this.checked);
    

       
//           let getInput = [];
//         $.map($(`input[data-filter]`), (v, i) => {             
//             if($(v).is(":checked")){
             
//                 getInput.push(`${$(v).attr('name')}=${$(v).val()}`);
                
            
//             }else{
//                 getInput.push(`${$(v).attr('name')}=`);
//             }
                    
//         })
//         getInput = getInput.join('&');
        
//         console.log(getInput);
//     }
// });
  </script>
  
  
  
  
  
  
  <script>
  

    $("#select_all").change(function() {
        if (($(this).is(":checked"))) {
            $("[data-filter]").prop('checked', true);
        } else {
            $("[data-filter]").prop('checked', false);
        }
    })
    $("[data-filter],#select_all").change(function() {
        if (($("[data-filter]:checked").length == ($("[data-filter]").length))) {
            $("#select_all").prop('checked', true);
        } else {
            $("#select_all").prop('checked', false);
        }
          let getInput = [];
        $.map($(`input[data-filter],#select_all`), (v, i) => {             
            if($(v).is(":checked")){
             
                getInput.push(`${$(v).attr('name')}=${$(v).val()}`);
                
            }else{
                getInput.push(`${$(v).attr('name')}=`);
            }
                    
        })
        getInput = getInput.join('&');
        
        // console.log(getInput);
        
        
        
    })
    // let collectID = [];
    // $("#nextpage").click(function() {
    //     $("[data-select]").each(function() {
    //         if (($(this).is(":checked"))) {
    //             collectID.push($(this).val())
    //         }
    //     })

    //     urlSeg = collectID.join("_");
    //     $("#nextpage").attr("href", "https://fewr.in/seekers-list-by-subcategory?ids=" + urlSeg)
    // })
    
  </script>
