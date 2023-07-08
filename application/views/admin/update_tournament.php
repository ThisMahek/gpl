<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Update Tournament</h4>
             </div>
             <div class="col-md-4 col-4">
             </div>
         </div>
             
     </div>

     <div class="card-body">
         <form action="<?= base_url()?>tournaments/update_tournament"method="post" enctype="multipart/form-data">
         <div class="mb-3">
                <label class="mb-2">Select Team Name</label>
            <select class="form-control" name="user_id" required>
                <?php if(!empty($manage_team)):?>
                <option value="">select team</option>
                <?php foreach($manage_team  as $row2): ?>
                <option value="<?= $row2['id']?>"  <?= ($row['user_id']== $row2['id']?'selected':'')?>><?= $row2['name']?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
         </div>



             <div class="row">
                 <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Tournament Name</label>
                         <input type="text" class="form-control" name="title" value="<?= $row['tournament_title']?>" required>
                     </div>
                 </div>
                 <input type="hidden" name="id" value="<?= $row['tid']?>">
                 <div class="col-md-12">
                      <div class="mb-3">
                            <label class="mb-2">Image</label>
                            <input type="file"   name="image" id="slider0" onchange="preview(this,0)">
                                <img src="<?= base_url()?><?= $row['cover_image'] ?>" alt=""  height="100px"id="image0">
                            <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                     </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Sports Category</label>
                        <select class="form-control" name="sport_name" required>
                            <?php if(!empty($sports_name)):?>
                            <option value="">select sports</option>
                            <?php foreach($sports_name  as $row1): ?>     
                            <option value="<?= $row1['id']?>"  <?= ($row['sports_category']== $row1['id']?'selected':'')?>><?= $row1['title']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                     </div>
                 </div>



                
<!--                  <div class="col-lg-12 col-md-12">
                              <div class="mb-3">
                                                        <label for="choices-multiple-remove-button" class="mb-2">Select Team </label>
                                                       <select class="js-example-basic-single" name="state" multiple="multiple">
                                                          <option value="Cricket Team Club">Cricket Team Club</option>
                                                          <option value="Cricket 20">Cricket 20</option>
                                                        </select>
                             </div>
               </div> -->
                <!--  <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Match Date</label>
                         <input type="date" class="form-control"  name="" value="" required>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Match Start Time</label>
                         <input type="time" class="form-control" name="" value="" required>
                     </div>
                 </div> -->
                
                 <!--    <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Match End Time</label>
                         <input type="time" class="form-control" name="" value="" required>
                     </div>
                 </div>
                    <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Umpire</label>
                         <input type="text" class="form-control" name="" value="" required>
                     </div>
                 </div> -->

                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">State</label>
                        <select class="form-control" name="state"   data-filter name="state" id="state" required>
                            <option>select state</option>
                           <!--  <option value="<?= $row['state']?>" <?= ($row['state'] == 'up')?'selected':''?>>Utter Pradesh</option>
                            <option value="<?= $row['state']?>" <?= ($row['state'] == 'mp')?'selected':''?>>Madhya Pradesh</option> -->
                            <?php if($manage_state):?>
                            <?php foreach($manage_state as $row1):?>
                                <option value="<?= $row1['id']?>" <?= ($row['state'] == $row1['id'])?'selected':''?>><?= $row1['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                        </select>
                     </div>
                 </div>
                    <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">City</label>
                         <!-- <input type="text" class="form-control" name="city" value="<?= $row['city']?>" required> -->
                         <select class="form-control"   data-filter name="city" id="city" required>
                            <option>select city</option>
                            <?php if($manage_city):?>
                            <?php foreach($manage_city as $row2):?>
                                <option value="<?= $row2['id']?>" <?= ($row['city'] == $row2['id'])?'selected':''?>><?= $row2['name']?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                     </div>
                 </div>

                 <div class="col-md-6">
                     <div class="mb-3">
                         <label class="mb-2">Fee</label>
                         <!-- <textarea class="form-control"  name=""></textarea> -->
                         <input type="number" class="form-control" name="fee" value="<?= $row['fee']?>" >
                     </div>
                 </div>

              
                  <!-- <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Location</label>
                         <textarea class="form-control" name=""></textarea>
                     </div>
                 </div> -->

                 <!-- sports_name -->
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Description</label>
                         <textarea class="summernote"  name="description"><?= $row['description']?></textarea>
                     </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group mb-3 form-check">
                            <input id="opentoplay" type="checkbox" class="form-check-input" name="status"  <?= ($row['status']=='1')?'checked':'unchecked'?>  data-pristine-required-message="You must accept the terms and conditions">
                            <label class="form-check-label" for="opentoplay">Open Tournament</label><br>
                    </div>
                 </div>
             </div>
             <button class="btn btn-primary" type="submit" name="update">Submit</button>
         </form>
     </div>
 </div>


 <script>
$(document).ready(function() {
    var result_list_table = '';
    $("[data-filter]").on('change', (function() {
        let filter_attr =this.getAttribute("name");
        let getInput = [];
        $.map($(`select[data-filter]`), (v, i) => {
            getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
        })
        getInput = getInput.join('&');
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>tournaments/fetch_city?" + getInput,
                data: "state_id=" + stateID,
                success: function(html) {
                    // $(`[data-filter] [name="city"]`).empty();
                    let res = JSON.parse(html);
                    if(filter_attr != 'city')
                    {
                        $(`#city`).empty();
                        $.map(res.city_list, function(v, i) {
                            $(`#city`).append(`
                                  ${v}
                            `);
                        });
                    }

                }
            });

        } else {
            $('#city').html('<option value="">select state first</option>');
        }

    }))
});
</script>

<?php include('includes/footer.php')?>