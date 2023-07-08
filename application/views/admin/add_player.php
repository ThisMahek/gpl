<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Add Player</h4>
             </div>
             <div class="col-md-4 col-4">
             </div>
         </div>
             
     </div>
     <div class="card-body">
         <form action="<?= base_url('Player/create_player')?>" method="post">
         <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Select Team Name</label>
                        <select class="form-control" name="user_id" required>
                            <?php if(!empty($manage_team)):?>
                                <option value="">select team</option>
                            <?php foreach($manage_team  as $row): ?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                     </div>
                 </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Name</label>
                         <input type="text" class="form-control"  name="player_name" value="" required>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Email</label>
                         <input type="email" class="form-control"  name="email" value="" required>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Mobile No</label>
                         <input type="tel" class="form-control" name="mobile" value="" required>
                     </div>
                 </div>
               <!--    <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Price (Per Match)</label>
                         <input type="number" class="form-control" name="" value="" required>
                     </div>
                 </div> -->
            <!--      <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Sports Category</label>
                        <select class="form-control" name="" required>
                            <option value="">Cricket</option>
                            <option value="">Football</option>
                        </select>
                     </div>
                 </div> -->
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Role</label>
                        <!-- <select class="form-control" name="" required>
                            <option value="">Captain</option>
                            <option value="">Batsman</option>
                        </select> -->
                        <input type="text"  name="role" class="form-control" >
                     </div>
                 </div>
                 
                <!-- <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">City</label>
                         <input type="text" class="form-control" name="" value="" required>
                     </div>
                 </div> -->
                <!--   <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">State</label>
                        <select class="form-control" name="" required>
                            <option value="">Uttar Pradesh</option>
                            <option value="">Madhya Pradesh</option>
                        </select>
                     </div>
                 </div> -->
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Address</label>
                         <textarea class="form-control" name="address"></textarea>
                     </div>
                 </div>
                 <!--  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">About</label>
                         <textarea class="summernote" name=""></textarea>
                     </div>
                 </div> -->
              <!--     <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Achievements</label>
                         <textarea class="summernote" name=""></textarea>
                     </div>
                 </div> -->
                  <div class="col-md-12">
                     <div class="form-group mb-3 form-check">
                        <input id="opentoplay" type="checkbox" class="form-check-input" name="status"  data-pristine-required-message="You must accept the terms and conditions">
                        <label class="form-check-label" for="opentoplay">Open to Play</label><br>
                      </div>
                 </div>
             </div>
             <button class="btn btn-primary" type="submit" name="submit">Submit</button>
         </form>
     </div>
 </div>

<?php include('includes/footer.php')?>