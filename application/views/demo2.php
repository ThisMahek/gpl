<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
<div class="card shadow">
    <div class="card-header">
        <?= $this->session->flashdata('success');?>
        <?= $this->session->flashdata('error');?>
        <div class="row">
            <div class="col-md-8 col-8">
                <h4 class="mb-sm-0 font-size-18">Manage Tournament</h4>
            </div>
            <div class="col-md-4 col-4">
                <a href="<?= base_url()?>Admin/create_tournament"><button class="btn btn-primary float-right">+
                        Add</button></a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <!--filter-->
        <div class="data-filters">
            <!--<h6>Filters</h6>-->
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="mb-2">Sport Category</label>
                        <select class="form-control" name="sports" data-filter required>
                            <option value="">All Sports</option>
                            <?php if(!empty($sports_name)):?>
                            <?php foreach($sports_name as $row):?>
                            <option value="<?= $row['id']?>" data-sportid="<?=$row['id'] ?>"><?= $row['title']?>
                            </option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <!--     <div class="col-md-3">
                         <div class="mb-3">
                             <label class="mb-2">Team</label>
                            <select class="form-control" name="" required>
                                <option value="">All Team</option>
                                <?php  if(!empty($manage_team)):?>
                                <?php foreach($manage_team as $row):?>
                                  <option value="<?= $row['id']?>"><?=  $row['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                                
                            </select>
                         </div>
                     </div> -->
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="mb-2">City</label>
                        <select class="form-control" data-filter name="city" id="city" required>
                            <option value="">select city</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="mb-2">Status</label>
                        <select data-filter class="form-control" name="now_playing"  required>
                            <option value="">All</option>
                            <option value="1">Open To Play</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--filter-->
        <table class="table table-bordered table-responsive datatable nowrap w-100">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Tournament Name</th>
                    <th>Team Name</th>
                    <th>Sports Category</th>
                    <!-- <th>Organized By</th> -->
                    <th>Price</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody   id="select_tournament">

                


            </tbody>
        </table>
    </div>
</div>
<!--about player-->
<!--add modal-->
<?php if(!empty($manage_torunament)):?>
<?php foreach($manage_torunament as $row):?>
<div class="modal fade" id="about<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" name="">
                <div class="modal-body">
                    <!--<h6 class="mb-2">Player Details</h6>-->
                    <div class="row">
                        <!--<div class="col-4 mb-2">
                                        Series Name
                                    </div>
                                     <div class="col-8 mb-2">
                                       CCC Championship
                                    </div>
                                    <div class="col-4 mb-2">
                                        Match Date
                                    </div>
                                    <div class="col-8 mb-2">
                                       12/03/2022
                                    </div>
                                    <div class="col-4 mb-2">
                                       Match Time
                                    </div>
                                    <div class="col-8 mb-2">
                                       09:00 am to 14:00 pm
                                    </div>
                                    <div class="col-4 mb-2">
                                      Umpire
                                    </div>
                                    <div class="col-8 mb-2">
                                       Rajesh Yadav
                                    </div>
                                    <div class="col-4 mb-2">
                                       Location
                                    </div>
                                    <div class="col-8 mb-2">
                                      Heroes Playground, Gwalior
                                    </div>
                                    <div class="col-4 mb-2">
                                       Winning Prize
                                    </div>
                                    <div class="col-8 mb-2">
                                      Rs. 50000/-
                                    </div> -->

                        <h6 class="mb-2 mt-3">Note</h6>
                        <div>
                            <p><?= $row['description']?></p>
                        </div>
                    </div>
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





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    $("[data-filter]").on('change', (function() {
        let getInput = [];
        $.map($(`select[data-filter]`), (v, i) => {
            getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
        })
        getInput = getInput.join('&');
        // e.preventDefault();
        var stateID = $(this).val();
        // alert(stateID);
        if (stateID) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>tournaments/fetch_city?" + getInput,
                data: "state_id=" + stateID,
                success: function(html) {
                    let res = JSON.parse(html);
                    $.map(res.city_list, function(v, i) {
                        $(`#city`).append(`
                              ${v}
                        `);
                    });

                    $(`#select_tournament`).append(`
                    
                    $.map(res.tournament_list, function(v, i) {
                      `<tr>
                    <td>${v.id}</td>
                    <td><img src="<?= base_url()?>${v.cover_image}"
                            class="user-img">${v.tournament_title}</td>
                    <td>${v.name}</td>
                    <td>${v.title}</td>
                    <td>Rs.${v.fee}/-</td>
                    <td><button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal"
                            data-bs-target="#about${v.id}"><i class="bx bx-info-circle"></i> View
                            Details</button></td>
                    <td>
                        <?php 
                              if(${v.status} == 1)
                                {
                                ?>
                        <a onclick="return confirm('Are you sure you want to inactive?');"
                            href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                                class="btn btn-success btn-sm">Open Tournament</button></a>
                        <?php
                                                            }
                                                          else
                                                          {?>
                        <a onclick="return confirm('Are you sure you want to active?');"
                            href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                                class="btn btn-danger btn-sm">Close Tournament</button></a>
                        <?php
                                                          }
                                                          ?>
                    </td>
                    <td>
                        <div class="action-btn">
                            <!-- <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button> -->
                            <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                            <a href="<?= base_url()?>Admin/update_tournament/${v.tid}"><button
                                    class="btn btn-primary btn-sm btn-edit"><i class="bx bxs-pencil"></i></button></a>
                            <a href="<?= base_url('tournaments/delete_tournament')?>/${v.tid}"><button
                                    type="button"
                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                    class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i>
                                </button></a>
                        </div>
                    </td>
                </tr> `;
                    });

                    `);

                }
            });

        } else {
            $('#city').html('<option value="">select state first</option>');
        }

    }))
});
</script>
<?php include('includes/footer.php')?>




































[11:19 AM, 9/23/2022] Vikash Kumar Binplus: <script>
     $(document).ready(function() {
         var result_list_table = '';
         $(`[data-filter][data-nested_select]`).change(function(e) {
             e.preventDefault();
             let obj = this;
             let obj_for_clear_next_selects = $(obj).attr('data-next');
             while (obj_for_clear_next_selects != '') {
                 next = `[data-filter="${obj_for_clear_next_selects}"]`
                 $(next).html($(next).attr(`data-default_option`))
                 obj_for_clear_next_selects = $(next).attr(`data-next`)
             }
             filter(obj)
             collect_filter_data()

         });
         $(`[data-filter]`).not(`[data-nested_select]`).change(function(e) {
             e.preventDefault();
             collect_filter_data()
         });

         function collect_filter_data() {
             let url_string = [];
             $.map($(`[data-filter]`), function(v, i) {
                 if ($(v).attr('type') == 'checkbox') {
                     url_string.push(`${$(v).attr(`name`)}=${($(v).is(':checked')) ? ($(v).val()) : ''}`);
                 } else {
                     url_string.push(`${$(v).attr('name')}=${$(v).val()}`);
                 }

             });
             console.log(url_string);
             game_results(url_string.join('&'))
         }

         function filter(obj = '') {
             let action = '';
             let value = '';
             if (obj == '') {
                 action = `get_sports_list`
                 value = "empty"
             } else {
                 action = (`get_${$(obj).attr(`data-next`)}_list`)
                 value = $(obj).find(':selected').val()
             }

             $.ajax({
                 type: "post",
                 url: "<?php echo base_url('User_API/result_filter_datas') ?>",
                 data: {
                     action: action,
                     value: value
                 },
                 async: true,
                 success: function(r) {
                     let res = JSON.parse(r)
                     if (res.success) {
                         if (obj == '') {
                             $(`[data-filter="sports"]`).empty();
                             $(`[data-filter="sports"]`).append($(`[data-filter="sports"]`).attr(
                                 `data-default_option`))
                             $.map(res.data.list, function(v, i) {
                                 $(`[data-filter="sports"]`).append(`
                                    <option value="${v.id}">${v.label}</option>
                                `)
                             });
                         } else {
                             obj = $(`[data-filter="${$(obj).attr(`data-next`)}"]`);
                             $(obj).empty();
                             $(obj).append($(obj).attr(`data-default_option`))
                             $.map(res.data.list, function(v, i) {
                                 $(obj).append(`
                                    <option value="${v.id}">${v.label}</option>
                                `)
                             });
                         }

                     }
                 }
             });
         }
         AFTER_LOGIN.push(filter);


         function game_results(search_param = '') {
             $.ajax({
                 type: "post",
                 url: "<?= base_url('User_API/results') ?>?" + search_param,
                 data: "",
                 async: true,
                 success: function(response) {
                     let res = JSON.parse(response);
                     if (res.success) {
                         if (result_list_table != '') {
                             result_list_table.clear()
                             result_list_table.destroy();
                         }
                         $.map(res.data.game_result, function(v, i) {
                             let name = ``;
                             let type = ``;
                             let result = ``;
                             if (v.type == 'Team') {
                                 name = v.team;
                             } else {
                                 name = v.session;
                             }
                             if (v.type == 'Team') {
                                 type = 'Match';
                             } else {
                                 type = 'Session';
                             }
                             if (v.decl != '') {
                                 result = v.decl;
                             } else {
                                 result = 'Not Declare';
                             }

                             $(`[data-result_list]`).append(`
                                <tr>
                                    <td scope="col">${v.created_at}</td>

                                    <td scope="col">${type}</td>
                                    <td scope="col">${name}</td>
                                    <td scope="col">${result}</td>
                                </tr>
                            `);
                         });
                         result_list_table = $(`[data-result_list_table]`).DataTable();
                     }
                 }
             });
         }


         AFTER_LOGIN.push(game_results);
     });
     </script>
[11:20 AM, 9/23/2022] Vikash Kumar Binplus: <div class="col-md-3 col-6">
                                 <div class="mb-3">
                                     <label class="mb-2">Sports</label>
                                     <select data-filter="sports" data-nested_select
                                         data-default_option="<option value='empty'>Select Sports</option>"
                                         data-next="tournament" name="sports" class="form-control">
                                         <option value="empty">Select Sports</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3 col-6">
                                 <div class="mb-3">
                                     <label class="mb-2">Tournaments</label>
                                     <select data-filter="tournament" data-nested_select
                                         data-default_option="<option value=''>Select Tournament</option>"
                                         data-next="matches" name="tournament" class="form-control">
                                         <option value=''>Select Tournament</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3 col-6">
                                 <div class="mb-3">
                                     <label class="mb-2">Matches</label>
                                     <select data-filter="matches" data-next="market"
                                         data-default_option="<option value=''>Select Match</option>" name="matches"
                                         data-nested_select class="form-control">
                                         <option value=''>Select Match</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3 col-6">
                                 <div class="mb-3">
                                     <label class="mb-2">Select Market</label>
                                     <select data-filter="market" data-next=""
                                         data-default_option="<option value=''>Select Market</option>" name="market"
                                         data-nested_select class="form-control">
                                         <option value=''>Select Market</option>
                                     </select>
                                 </div>
                             </div>