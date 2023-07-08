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
                        <select data-filter class="form-control" name="now_playing" required>
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
            <tbody id="select_tournament">



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
    var result_list_table = '';
    $("[data-filter]").on('change', (function() {
            let getInput = [];
            $.map($(`select[data-filter]`), (v, i) => {
                getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
            })
            getInput = getInput.join('&');
        });

        function getlist(stateID, getInput) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>tournaments/fetch_city?" + getInput,
                data: "state_id=" + stateID,
                success: function(html) {
                    if (result_list_table != '') {
                        result_list_table.clear()
                        result_list_table.destroy();
                    }
                    let res = JSON.parse(html);
                    $(`#city`).empty();
                    $.map(res.city_list, function(v, i) {
                        $(`#city`).append(`
                              ${v}
                            `);
                    });
                    result_list_table = $(`[data-result_list_table]`).DataTable();
                    $.map(res.tournament_statewise_list, function(v, i) {
                        var btn_text = '';
                        if (v.status == 1) {
                            /*  let btn_text='Open Tournament';
                            let confirm_mess='Are you sure you want to Inactive?'; */
                            // console.log('if');
                            var btn_text = `<a onclick="return confirm('Are you sure you want to inactive?')" href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                        class="btn btn-success btn-sm">Open Tournament</button></a>`;
                        } else if (v.status == 0) {
                            var btn_text = `<a onclick="return confirm('Are you sure you want to active?')" href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                        class="btn btn-danger btn-sm">Open Tournament</button></a>`;
                        }
                        $(`#select_tournament`).append(`     
                              <tr>
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
                    ${btn_text}                                     
                    </td>


                    <td>
                        <div class="action-btn">
                            <!-- <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update"><i class=" bx bxs-pencil"></i></button> -->
                            <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                            <a href="<?= base_url()?>Admin/update_tournament/${v.tid}"><button
                                    class="btn btn-primary btn-sm btn-edit"><i class="bx bxs-pencil"></i></button></a>
                            <a href="<?= base_url('tournaments/delete_tournament')?>/${v.tid}"><button
                                    type="button"
                                    onclick="return confirm('Are you sure you want to delete this tournament?');"
                                    class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i>
                                </button></a>
                        </div>
                    </td>
                    </tr>
                        `);
                    });


                }
            });

        }
        getlist();
        /* else {
                    $('#city').html('<option value="">select state first</option>');
                } */
    )
});
</script>
<?php include('includes/footer.php')?>