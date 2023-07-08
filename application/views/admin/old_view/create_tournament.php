<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
        <?= $this->session->flashdata('error');?>
        <?= $this->session->flashdata('success');?>
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Create Tournament</h4>
             </div>
             <div class="col-md-4 col-4">
             </div>
         </div>
             
     </div>
     <div class="card-body">
         <form action="<?= base_url('tournaments/create_tournament')?>" method="post" enctype="multipart/form-data">
             <div class="row">
   <!--           <div class="col-lg-12 col-md-12">
                 <div class="mb-3">
                    <label for="choices-multiple-remove-button" class="mb-2">Select Team Name </label>
                    <select class="js-example-basic-single" name="state" multiple="multiple">
                        <option value="Cricket Team Club">Cricket Team Club</option>
                        <option value="Cricket 20">Cricket 20</option>
                    </select>
                 </div>
               </div> -->
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
             <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Tournament Name</label>
                         <input type="text" class="form-control" name="title" value="" required>
                     </div>
                 </div>
                 <div class="col-md-12">
                      <div class="mb-3">
                        <label class="mb-2">Image</label>
                        <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)">
                            <img src="" alt="" id="image0">
                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                    </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Sports Category</label>
                        <select class="form-control" name="sport_name" required>
                        <?php if(!empty($sports_name)):?>
                            <option value="">select sports</option>
                            <?php foreach($sports_name  as $row): ?>
                                  
                            <option value="<?= $row['id']?>"><?= $row['title']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                     </div>
                 </div>
   
               <!--   <div class="col-md-6">
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
                 </div>
                
                    <div class="col-md-6">
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
              
                <div class="col-md-6   data-filters" >
                     <div class="mb-3">
                         <label class="mb-2">State</label>
                        <select class="form-control" data-filter name="state" id="state" required>
                        <option value="">select state</option>
                            <?php  if(!empty($manage_state)):?>
                            <?php foreach($manage_state as $row):?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select> 
                     </div>
                </div>
                <div class="col-md-6">
                     <!-- <input type="text" class="form-control" name="city" value="" required>  -->
                     <div class="mb-3">
                     <label class="mb-2">City</label>
                     <select class="form-control" data-filter name="city" id="city" required>
                     <option value="">select city</option>
                     </select>
                    </div>
                </div>
              <!-- <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Location</label>
                         <textarea class="form-control" name=""></textarea>
                     </div>
                 </div> -->

                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Fee</label>
                         <!-- <textarea class="form-control"  name=""></textarea> -->
                         <input type="number" class="form-control" name="fee" >
                     </div>
                 </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Description</label>
                         <textarea class="summernote" name="description"></textarea>
                     </div>
                 </div>
                 <div class="col-md-12">
                     <div class="form-group mb-3 form-check">
                        <input id="opentoplay" type="checkbox" class="form-check-input" name="status"data-pristine-required-message="You must accept the terms and conditions"       <?= ('checked')?'1':'0'?> checked>
                        <label class="form-check-label" for="opentoplay">Open Tournament</label><br>
                      </div>
                 </div>
             </div>
             <button class="btn btn-primary" type="submit" name="submit">Submit</button>
         </form>
     </div>
 </div>



 <script>
$(document).ready(function() {
    var result_list_table = '';
    $("[data-filter]").on('change', (function() {
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
                    $(`#city`).empty();
                    let res = JSON.parse(html);
                    $.map(res.city_list, function(v, i) {
                        $(`#city`).append(`
                              ${v}
                        `);
                    });


                }
            });

        } else {
            $('#city').html('<option value="">select state first</option>');
        }

    }))
});
</script>

<?php include('includes/footer.php')?>