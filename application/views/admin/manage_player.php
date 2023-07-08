<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
        <?= $this->session->flashdata('success')?>
        <?= $this->session->flashdata('error')?>
         <!--<div class="row">-->
         <!--    <div class="col-md-8 col-8">-->
         <!--        <h4 class="mb-sm-0 font-size-18">Manage Players</h4>-->
         <!--    </div>-->
         <!--    <div class="col-md-4 col-4">-->
         <!--        <a href="<?= base_url()?>Admin/add_player"><button class="btn btn-primary float-right">+ Add</button></a>-->
         <!--    </div>-->
         <!--</div>-->
             
     </div>
     <div class="card-body">
          <!--filter-->
             <!--<div class="data-filters">-->
                 <!--<h6>Filters</h6>-->
             <!--    <div class="row">-->
                     <!--<div class="col-md-3"></div>-->
             <!--        <div class="col-md-4">-->
             <!--            <div class="mb-3">-->
             <!--                <label class="mb-2">Category</label>-->
             <!--               <select class="form-control" name="" required>-->
             <!--                   <option value="">All Category</option>-->
             <!--                   <option value="">Uttar Pradesh</option>-->
             <!--                   <option value="">Madhya Pradesh</option>-->
             <!--               </select>-->
             <!--            </div>-->
             <!--        </div>-->
             <!--        <div class="col-md-4">-->
             <!--            <div class="mb-3">-->
             <!--                <label class="mb-2">State</label>-->
             <!--               <select class="form-control" name="" required>-->
             <!--                   <option value="">All State</option>-->
             <!--                   <option value="">Uttar Pradesh</option>-->
             <!--                   <option value="">Madhya Pradesh</option>-->
             <!--               </select>-->
             <!--            </div>-->
             <!--        </div>-->
             <!--        <div class="col-md-4">-->
             <!--            <div class="mb-3">-->
             <!--                <label class="mb-2">Status</label>-->
             <!--               <select class="form-control" name="" required>-->
             <!--                   <option value="">All</option>-->
             <!--                   <option value="">Open To Play</option>-->
             <!--                </select>-->
             <!--            </div>-->
             <!--        </div>-->
             <!--    </div>-->
             <!--</div>-->
             <!--filter-->
           <table class="table table-bordered table-responsive datatable nowrap w-100 desktop_responsive">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Team Name</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>About</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                     <tbody>
                        
                     <?php if(!empty($manage_players)):
                       $i=0;?>
                        <?php foreach($manage_players as $row):  
                            $i++; 
                            ?> 
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['player_name']?></td>
                                    <td><img src="<?= base_url()?><?= $row['image']?>" class="user-img"><?= $row['name']?></td>
                                    <td> +91 <?= $row['mobno']?></a></td>
                                    <td> <?= $row['email']?></td>
                                    <td><?= $row['position']?></td>
                                    <td><button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#about<?= $row['pid']?>"><i class="bx bx-info-circle"></i> About</button></td>
                                    <!-- <td><button class="btn btn-success btn-sm">Open to play</button></td> -->
                                    <td>
                                            <?php 
                                            if($row['status'] == 1)
                                            {
                                            ?> 
                                        <a  onclick="return confirm('Are you sure you want to inactive?');" href='<?= base_url()?>Player/update_player_status?id=<?=$row['pid']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Open Tournament</button></a>
                                        <?php
                                            }
                                            else
                                            {?>
                                        <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>Player/update_player_status?id=<?=$row['pid']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Close Tournament</button></a>
                                        <?php
                                            }
                                            ?>
                                     </td> 
                                    <td>
                                        <!-- <div class="action-btn">
                                            <a href="<?= base_url()?>Admin/update_player"><button class="btn btn-primary btn-sm btn-edit"><i class="bx bxs-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                        </div> -->

                                        <div class="action-btn">
                                                      <!-- <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button> -->
                                                      <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                                                      <a href="<?= base_url()?>Admin/update_player/<?= $row['pid']?>"><button class="btn btn-primary btn-sm btn-edit"><i class="bx bxs-pencil"></i></button></a>
                                                      <a href="<?= base_url('player/delete_player')?>/<?=$row['pid']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this player?');"class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i> </button></a>
                                                  </div>
                                    </td>
                                    </tr>
                                         <?php  endforeach;?>
                                         <?php  endif;?>
                                         
                     </tbody>
          </table>
     </div>
 </div>
<!--about player-->
 <!--add modal-->
 <?php if(!empty($manage_players)):?>
 <?php foreach($manage_players as $row): ?> 
   <div class="modal fade" id="about<?= $row['pid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">
                          <div class="modal-body">
                              <p><?= $row['address']?></p>
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
<?php include('includes/footer.php')?>

      <script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>