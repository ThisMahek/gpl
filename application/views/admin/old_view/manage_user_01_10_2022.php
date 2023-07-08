<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
      <?= $this->session->flashdata('error')?>
      <?= $this->session->flashdata('success')?>
     <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Users</h4>
             </div>
             <div class="col-md-4 col-4">
                 <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#add"     data-add_user >+ Add</button>
             </div>
     </div>
     </div>
            <div class="card-body">
                <!--filter-->
        <div class="data-filters">
            <!--<h6>Filters</h6>-->
            <div class="row">
                
                    <div class="col-md-2">
                         <div class="mb-3">
                             <label class="mb-2">Type</label>
                            <select class="form-control" name="type"   data-users_filter   required>
                                <option value="">select user type</option>
                               <option  value = "1">Team</option>
                              <option value= "0">Individual player</option>
                            </select>
                         </div>
                     </div> 
              
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="mb-2">Sport Category</label>
                        <select class="form-control" name="sports" data-users_filter required>
                            <option value="">All Sports</option>
                            <?php if(!empty($manage_game)):?>
                            <?php foreach($manage_game as $row):?>
                            <option value="<?= $row['id']?>" data-sportid="<?=$row['id'] ?>"><?= $row['title']?>
                            </option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
             
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="mb-2">State</label>
                        <select class="form-control" data-users_filter name="state" id="state_filter" required>
                            <option value="">select state</option>
                            <?php  if(!empty($manage_state)):?>
                            <?php foreach($manage_state as $row):?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="mb-2">City</label>
                        <select class="form-control" data-users_filter name="city" id="city_filter" required>
                            <option value="">select city</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="mb-2">Status</label>
                        <select data-users_filter class="form-control" name="now_playing" required>
                            <option value="">All</option>
                            <option value="1">Open To Play</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--filter-->
                
     <table  data-result_list_table  class="table table-bordered table-responsive   nowrap w-100">
           <!--<table class="table table-bordered table-responsive datatable nowrap w-100">-->
                                            <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Game Category</th>
                                                 <th>State</th>
                                                 <th>City</th>
                                                 <th>Pincode</th>
                                                <!-- <th>Password</th> -->
                                                <!-- <th>Address</th> -->
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                      <?php if(!empty($manage_users)):
                        $i=0;
                        ?>
                      <?php foreach($manage_users as $row):
                        $i++;
                        ?>
                                            <tr>
                                                <td><?= $i?></td>
                                                <td><?= $row['type']==1?'Team user':'Individual user'?></td>
                                                <td><img src="<?= base_url()?><?= $row['image']?>" class="user-img"><?= $row['name']?></td>
                                                <td><a class="text-color" href="tel:+91 9999999999">+91<?= $row['mobile']?></a></td>
                                                <td><a class="text-color" href="mailto:user@gmail.com"><?= $row['email']?></a></td>
                                                   <!-- <td><input type="password" class="form-control" name="" value="234567"></td> -->
                                                <!-- <td>Jhansi</td> -->
                                                <!-- <td><button class="btn btn-success btn-sm">Active</button></td> -->
                                                
                                                
                                                  <td><?= $row['title']?></td>
                                                    <td><?= $row['sname']?></td>
                                                    <td><?= $row['cname']?></td>
                                                    <td><?= $row['pincode']?$row['pincode']:''?></td>
                                                  <td>
                                  <?php 
                                 if($row['status'] == 1)
                                   {
                                   ?> 
                              <a  onclick="return confirm('Are you sure you want to inactive?');" href='<?= base_url()?>users/update_users_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-success btn-sm">Active</button></a>
                              <?php
                                  }
                                 else
                                 {?>
                               <a  onclick="return confirm('Are you sure you want to active?');" href='<?= base_url()?>users/update_users_status?id=<?=$row['id']?>&status=<?=$row['status']?>'><button class="btn btn-danger btn-sm">Deactive</button></a>
                              <?php
                                 }
                                 ?>
                              </td> 
                                    <td>
                                      <div class="action-btn">
                                          <button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update<?= $row['id']?>"><i class=" bx bxs-pencil"></i></button>
                                          <!-- <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> -->
                                          <a href="<?= base_url('users/delete_user')?>/<?=$row['id']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this user?');"class="btn btn-danger btn-sm"><i class="bx bxs-trash" aria-hidden="true"></i> </button></a>
                                      </div>
                                    </td>
                                 </tr>
                          <?php endforeach;?>               
                           <?php endif;?>              
                     </tbody>
          </table>
     </div>
 </div>
 <!--add modal-->
   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                          
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form   action="<?= base_url('Users/add_users')?>" method="post" enctype="multipart/form-data"  form_payment>
                          <div class="modal-body">
                              
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="name" class="form-control" required  oninput="FullnameValidation(this.value,'name_span','submit')"   >
                                       <span id="name_span"></span>
                                   </div>
                                   
                                   <div class="mb-3">
                                       <label class="mb-2">Type</label>
                                       <!-- <input type="text" name="name" class="form-control" required> -->
                                       <select   name="type" class="form-control"  data-user_select_type required   id="select_type">
                                        <option>Select option</option>
                                       <option  value = "1">Team</option>
                                       <option value= "0">Individual player</option>
                                       </select>
                                   </div>
                                      <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)" required>
                                         <img src="" alt="" id="image0" >
                                        <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                                     </div>
                                  <span id="image_span" style="color:red"></span>
                                   <div class="mb-3">
                                       <label class="mb-2">Email</label>
                                       <input type="email" class="form-control" name="email"    oninput="validatemail(this.value)"  id="email" required>
                                       <span id="emaierror" style="color:red"></span>
                                       <div id= "alert_message_email"></div> 
                                   </div>
                                   
                                   <div class="mb-3">
                                       <label class="mb-2">Mobile No</label>
                                       <input type="number" class="form-control" name="phone"  oninput="phonenumberValidation(this.value,'pnumber','submit')"  id="phone" required>
                                       <span id="pnumber" style="color:red"></span>
                                   </div>
                                  <!--<div class="mb-3">
                                       <label class="mb-2">Password</label>
                                       <input type="password" class="form-control" value="" name="password"> 
                                   </div> -->
                                <!--    <div class="mb-3">
                                       <label class="mb-2">Address</label>
                                       <textarea class="form-control"  name="address"></textarea>
                                   </div> -->
                                   
                                   
                      <div class="col-md-12   data-filters" >
                     <div class="mb-3">
                         <label class="mb-2">Game category</label>
                        <select class="form-control"  name="game_category"id="game_category	" required>
                        <option value="">select game</option>
                            <?php  if(!empty($manage_game)):?>
                            <?php foreach($manage_game as $game_row):?>
                            <option value="<?= $game_row['id']?>"><?= $game_row['title']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select> 
                     </div>
                </div>
                                   
                                   
                    <div class="col-md-12   data-filters" >
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
                
            
                <div class="col-md-12">
                     <!-- <input type="text" class="form-control" name="city" value="" required>  -->
                     <div class="mb-3">
                     <label class="mb-2">District</label>
                     <select class="form-control" data-filter name="district" id="district" required>
                     <option value="">select district</option>
                     </select>
                    </div>
                </div>
                
                
                <div class="col-md-12">
                     <!-- <input type="text" class="form-control" name="city" value="" required>  -->
                     <div class="mb-3">
                     <label class="mb-2">City</label>
                     <select class="form-control" data-filter name="city" id="city" required>
                     <option value="">select city</option>
                     </select>
                    </div>
                </div>
             
                   <div class="col-md-12"   id="pincode_div" >
                     <!-- <input type="text" class="form-control" name="city" value="" required>  -->
                     <div class="mb-3">
                     <label class="mb-2">Pincode</label>
                     <select class="form-control" data-filter name="pincode" id="pincode" >
                     <option value="">select pincode</option>
                     </select>
                    </div>
                </div>
                
                
                 <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                    <input type="checkbox" class="form-check-input" id="active"  name="status" <?= ('checked')?'1':'0'?> checked>
                     <label class="form-check-label" for="active"></label>
                  </div>
                 </div>
                 
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Submit</button>
                  </div>
                  
                      </form>
                    </div>
                  </div>
                </div>
 <!--add modal-->


 <?php if(!empty($manage_users)):?>
 <?php foreach($manage_users as $row):?>
 <!--add modal-->
   <div class="modal fade" id="update<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= base_url('users/update_users')?>"  method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="mb-2">Name</label>
                                       <input type="text" name="name" class="form-control" value ="<?= $row['name']?>" >
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Type</label>
                                       <select   name="type" class="form-control" required>
                                        <option>Select option</option>
                                       <option  value = "1" <?= ($row['type']==1)?'selected':''?>>Team</option>
                                       <option value= "0" <?= ($row['type']==0)?'selected':''?>>Individual player</option>
                                       </select>
                                   </div>
                                   <input type="hidden" name="id" value="<?= $row['id']?>"> 
                                    <div class="mb-3">
                                      <label class="mb-2">Image</label>
                                        <input type="file"   name="image" id="slider0" onchange="preview(this,1)">
                                        <!-- <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)" required> -->
                                         <img src="<?= base_url()?><?= $row['image']?>" alt="" id="image0" height = 100px" >
                                       <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>
                                  </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Email</label>
                                       <input type="email"  class="form-control"  value="<?= $row['email']?>"  readonly>
                                   </div>
                                   <div class="mb-3">
                                       <label class="mb-2">Mobile No</label>
                                       <input type="type"  name="mobile" class="form-control" value="<?= $row['mobile']?>"readonly>
                                   </div>
                                   
                                   
                                   
                                   
                                   
                       <div class="col-md-12   data-filters" >
                     <div class="mb-3">
                         <label class="mb-2">Game category</label>
                        <select class="form-control"  name="game_category "id="game_category" required>
                        <option value="">select game</option>
                            <?php  if(!empty($manage_game)):?>
                            <?php foreach($manage_game as $game_row):?>
                         
                            <option value="<?= $game_row['id']?>"  <?= ($row['game_category']== $game_row['id']?'selected':'')?>><?= $game_row['title']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select> 
                     </div>
                </div>
                                 
                                   
                   <div class="col-md-12" >
                     <div class="mb-3">
                         <label class="mb-2">State</label>
                        <select class="form-control" data-filter_update name="state" id="state_update" required>
                        <option value="">select state</option>
                            <?php  if(!empty($manage_state)):?>
                            <?php foreach($manage_state as $row):?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select> 
                     </div>
                </div>
                
            
                <div class="col-md-12">
                     <div class="mb-3">
                     <label class="mb-2">District</label>
                     <select class="form-control" data-filter_update name="district" id="district_update" required>
                     <option value="">select district</option>
                     </select>
                    </div>
                </div>
                
                
                <div class="col-md-12">
                     <div class="mb-3">
                     <label class="mb-2">City</label>
                     <select class="form-control" data-filter_update name="city" id="city_update" required>
                     <option value="">select city</option>
                     </select>
                    </div>
                </div>
             
                <div class="col-md-12"   id="pincode_div" >
                     <div class="mb-3">
                     <label class="mb-2">Pincode</label>
                     <select class="form-control" data-filter_update name="pincode" id="pincode_update" >
                     <option value="">select pincode</option>
                     </select>
                    </div>
                </div>
                
                 <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                    <input type="checkbox" class="form-check-input" id="active"   name="status" <?= ($row['status']=='1')?'checked':'unchecked'?>>
                     <label class="form-check-label" for="active"></label>
                  </div>
                  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" type="submit"  name="update">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
 </div>
 <!--add modal-->
 <?php endforeach;?>
   <?php endif;?>
<?php include('includes/footer.php')?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script>
function validatemail() {
    var email = document.getElementById("email").value;
    // var phone = ("#phone").val();
    // alert(phone);
    var reg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (email != '') {
        // console.log(typeof email,reg.test(email))
        if (reg.test(email)) {
            document.getElementById("emaierror").innerHTML = "";
            document.getElementById("submit").disabled = false;
            
            
            $.ajax({
                type: "post",
                url: "<?= base_url()?>Users/check_email",
                data: {
                    email: email,
                },
                dataType: "dataType",
                complete: function (response) {
                    // console.log(JSON.parse(response.responseText))
                let success=JSON.parse(response.responseText).success;
                    
                    if (success) {
                      
                        $("#emaierror").html("<span style='color:red'></span>");
                    }
                    else {
                             let res=JSON.parse(response.responseText);
                              $("#emaierror").html("<span style='color:red'>"+res.emessage+"</span>"); 
                              document.getElementById("submit").disabled = true;
                              return false;
                         }
                }
            });
            
            
            
            
        }
        else {
            document.getElementById("emaierror").innerHTML = "Please Enter valid email";
            document.getElementById("submit").disabled = true;
        }
    }else{
        document.getElementById("emaierror").innerHTML = "";
            document.getElementById("submit").disabled = false; 
    }
}


   </script>
   
   



               <script>
            function phonenumberValidation(vals,msg,btn)
            {
            let reg = /^[56789]{1}[0-9]{9}$/;
          
              if(vals == '')
                 {
                     $("#"+msg).html("");
                     $("#"+btn).attr('disabled',false);
                 }
               else  if(!reg.test(vals))
                 {
                     $("#"+msg).html("<span style='color:red'>Please enter valid mobile number.</span>");
                     $("#"+btn).attr('disabled',true);  
                    return;
                 }
                 else{
                 $("#"+msg).html("");
                 $("#"+btn).attr('disabled',false); 
                
                
                 $.ajax({
                type: "post",
                url: "<?= base_url()?>Users/check_phone",
                data: {
                    phone : vals,
                },
                dataType: "dataType",
                complete: function (response) {
                    // console.log(JSON.parse(response.responseText))
                let success=JSON.parse(response.responseText).success;
                    
                    if (success) {
                        // alert(JSON.parse(response.responseText).message);
                        //   location.reload();
                        // // window.location.href="<?=base_url()?>User_Controller/login";
                        // $("#form_payment .total_balance").text(JSON.parse(response.responseText).wallet_balance);
                        // $("#form_payment .withdraw_amount").val('');
                        // document.getElementById("form_payment").reset(); 
                        $("#pnumber").html("<span style='color:red'></span>");
                    }
                    else {
                        
                       let res=JSON.parse(response.responseText);
                          $("#pnumber").html("<span style='color:red'>"+res.emessage+"</span>"); 
                          document.getElementById("submit").disabled = true;
                          return false;
                    }
                }
            });
                 }
 }
              </script>


            <script>
                function FullnameValidation(vals,msg,btn)
            {
            let reg = /^[a-zA-Z\s]*$/;
            if(!reg.test(vals))
            {
                $("#"+msg).html("<i style='color:red'>Please Enter valid  Name</i>");
                     $("#"+btn).attr('disabled',true);  
                 }
                 else
                 {
                     $("#"+msg).html("");
                     $("#"+btn).attr('disabled',false);
                 }
 }
            </script>

<script>
    // var remaining2=0;
    // $("#email").onchange(function (e) {  
    //   function  register(){
    //     e.preventDefault();
    //     if(remaining2<=0){
    //         $.ajax({
    //             type: "post",
    //             url: "<?= base_url()?>Users/sign_up",
    //             data: {
    //                 email : $("#email").val(),
    //                   },
    //                  dataType: "dataType",
    //                   complete: function (response) {
    //                 console.log(JSON.parse(response.responseText))
    //                 let success=JSON.parse(response.responseText).success;
    //                 if(success)
    //                         {
    //                     let email=JSON.parse(response.responseText).email;
    //                          $("#email").attr('disabled',true); 
    //                          $("#alert_message_email").empty();
    //                          }
    //                          else{
    //                          let res=JSON.parse(response.responseText);
    //                          if(res.emessage!=undefined){
    //                       $("#alert_message_email").html("<span style='color:red'>"+res.emessage+"</span>"); 
    //                       return;
    //                       }
    //                       $('#alert_message_email').fadeIn(300,(e)=>{
    //                       $(e).delay(3000).queue(
    //                       $('#alert_message_email').fadeOut(3000)
    //                         )
    //                       });
    //                              }
    //                           }

    //                       });
      
    //                       }
                        
    //   }
           
</script>




       <script>
$(document).ready(function() {
  
    $("[data-add_user]").on('click',function(){
             $("#pincode_div").hide();
    });
});
       </script>


       <script>
        $(document).ready(function() {
          
            $("[data-user_select_type]").on('change',function(){
                let filter_attr =this.getAttribute("name");
        
                 var typeID = $(this).val();
                 if(typeID == 1)
                 {
                     $("#pincode_div").show();
                 }else{
                     $("#pincode_div").hide();
                 }
                    
            });
        });
       </script>





 <script>
$(document).ready(function() {
    var result_list_table = '';
    
    $("[data-filter]").on('change', (function() {
        let filter_attr =this.getAttribute("name");
       
        if(filter_attr=='state'){
            $('#district').empty()
            $('#city').empty()
            $('#pincode').empty()
        }
        if(filter_attr=='district'){
            $('#city').empty()
            $('#pincode').empty()
        }
        if(filter_attr=='city'){
            $('#pincode').empty()
        }
        
        let getInput = [];
        $.map($(`select[data-filter]`), (v, i) => {
            getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
        })
        getInput = getInput.join('&');
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>Users/fetch_state_city_district_pincode?" + getInput,
                data: "",
                success: function(html) {
                    // $(`[data-filter] [name="city"]`).empty();
                   console.log(filter_attr)
                    let res = JSON.parse(html);
                    if(filter_attr == 'state')
                    {
                        $(`#district`).empty();
                        $.map(res.district_list, function(v, i) {
                            $(`#district`).append(`
                                  ${v}
                            `);
                        });
                        
                         $.map(res.city_list, function(v, i) {
                            $(`#city`).append(`
                                  ${v}
                            `);
                        });
                        
                        $.map(res.pincode_list, function(v, i) {
                            $(`#pincode`).append(`
                                  ${v}
                            `);
                        });
                    }
                  else if((filter_attr == 'district'))
                    {
                          $(`#city`).empty();
                        $.map(res.city_list, function(v, i) {
                            $(`#city`).append(`
                                  ${v}
                            `);
                        });
                        
                          $.map(res.pincode_list, function(v, i) {
                        $(`#pincode`).append(`
                              ${v}
                        `);
                    });
                        
                    }
                    
                    
                 else if((filter_attr == 'city'))
                    {
                
                              $(`#pincode`).empty();
                           $.map(res.pincode_list, function(v, i) {
                            $(`#pincode`).append(`
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












 <script>
$(document).ready(function() {
    var result_list_table = '';
    
    $("[data-filter_update]").on('change', (function() {
        let filter_attr =this.getAttribute("name");
        let mymodel=$(this).closest(`.model`);
        console.log(mymodel);
        if(filter_attr=='state'){
            $(mymodel).find('#district_update').empty()
            $(mymodel).find('#city_update').empty()
            $(mymodel).find('#pincode_pincode').empty()
        }
        if(filter_attr=='district'){
            $(mymodel).find('#city_update').empty()
            $(mymodel).find('#pincode_update').empty()
        }
        if(filter_attr=='city'){
            $(mymodel).find('#pincode_update').empty()
        }
        
        let getInput = [];
        console.log($(mymodel).find(`select[data-filter_update]`))
        $.map($(mymodel).find(`select[data-filter_update]`), (v, i) => {
            getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
        })
        getInput = getInput.join('&');
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>Users/fetch_state_city_district_pincode?" + getInput,
                data: "",
                success: function(html) {
                    // $(`[data-filter] [name="city"]`).empty();
                  console.log(filter_attr)
                    let res = JSON.parse(html);
                    if(filter_attr == 'state')
                    {
                        $(mymodel).find(`#district`).empty();
                        $.map(res.district_list, function(v, i) {
                            $(mymodel).find(`#district_update`).append(`
                                  ${v}
                            `);
                        });
                        
                         $.map(res.city_list, function(v, i) {
                            $(mymodel).find(`#city_update`).append(`
                                  ${v}
                            `);
                        });
                        
                        $.map(res.pincode_list, function(v, i) {
                            $(mymodel).find(`#pincode_update`).append(`
                                  ${v}
                            `);
                        });
                    }
                  else if((filter_attr == 'district'))
                    {
                          $(`#city`).empty();
                        $.map(res.city_list, function(v, i) {
                            $(mymodel).find(`#city_update`).append(`
                                  ${v}
                            `);
                        });
                        
                          $.map(res.pincode_list, function(v, i) {
                        $(mymodel).find(`#pincode_update`).append(`
                              ${v}
                        `);
                    });
                        
                    }
                    
                    
                 else if((filter_attr == 'city'))
                    {
                        
                      
                              $(mymodel).find(`#pincode_update`).empty();
                          $.map(res.pincode_list, function(v, i) {
                            $(mymodel).find(`#pincode_update`).append(`
                                  ${v}
                            `);
                        });
                        
                    }
                    


                }
            });

        } else {
            $(mymodel).find('#city_update').html('<option value="">select state first</option>');
        }

    }))
});
</script>












<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" -->
<!--   integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="-->
<!--   crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<script>
//   $("#form_payment").submit(function (e) { 
//       e.preventDefault();
//           var phone = $("#phone").val();
//           var email = $("#email").val();
//           let phone_reg = /^[56789]{1}[0-9]{9}$/;
//           var email_reg =  /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
          
//          if(!email_reg.test(email))  {
//          $("#email_span").html("<i style='color:red'>Please enter valid ifsc code</i>");
//           return false;
//         }
         
//             if(!phone_reg.test(phone))  {
//          $("#pnumber").html("<i style='color:red'>Please enter valid phone number</i>");
//           return false;
//         }    

//       $.ajax({
//           type: "post",
//           url: ($("#form_payment").attr('action')),
//           data: {
//               phone:phone,
//               email: email,
//               verify:"submit",
//           },
//           dataType: "dataType",
//           complete: function (response) {
//             //   console.log(JSON.parse(response.responseText))
//             //   let success=JSON.parse(response.responseText).success;
//             // if(success){
//             //     alert(JSON.parse(response.responseText).message);
//             //     //   location.reload();
//             //     // window.location.href="<?=base_url()?>User_Controller/login";
//             //     $("#form_payment .total_balance").text(JSON.parse(response.responseText).wallet_balance);
//             //     $("#form_payment .withdraw_amount").val('');
//             //     document.getElementById("form_payment").reset(); 
//             //   }
//             //   else{
//             //       alert(JSON.parse(response.responseText).message);
//             //   } 
//           }
//       });
//   }
</script>








<script>
$(document).ready(function() {
    var result_list_table = '';
    $("[data-users_filter]").on('change', (function() {
        let filter_attr =this.getAttribute("name");
        
        let getInput = [];
        $.map($(`select[data-users_filter]`), (v, i) => {             
            getInput.push(`${$(v).attr('name')}=${$(v).find(':selected').val()}`);
        })
        getInput = getInput.join('&');
        
        console.log(getInput);
        getlist(getInput,filter_attr)
    }))
    var stateID = $(this).val();
    function getlist(getInput ="",filter_attr="") {
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>users/fetch_users_filter?" + getInput,
            data: "",
            success: function(html) {
                let res = JSON.parse(html);
                console.log(res);
                if(filter_attr != 'city' && filter_attr != 'now_playing' && filter_attr != 'sports' &&  filter_attr != 'pincode')
                    $(`#city_filter`).empty();
                $.map(res.city_list, function(v, i) {
                    $(`#city_filter`).append(`
                              ${v}
                            `);
                });
           
              if (result_list_table != '') 
              {
                             result_list_table.clear()
                             result_list_table.destroy();
                         } 
                         var i=1;
                $.map(res.users_statewise_list, function(v, i) {
                    var btn_text = '';
                    i++;
                    if (v.status == 1) {
                        var btn_text = `<a onclick="return confirm('Are you sure you want to inactive?')" href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                        class="btn btn-success btn-sm">Open Tournament</button></a>`;
                    } else if (v.status == 0) {
                        btn_text = `<a onclick="return confirm('Are you sure you want to active?')" href='<?= base_url()?>tournaments/update_tournament_status?id=${v.tid}&status=${v.status}'><button
                             class="btn btn-danger btn-sm">Close Tournament</button></a>`;
                    }
                    $(`#select_tournament`).append(`     
                     <tr>
                    <td>${i}</td>
                    <td><img src="<?= base_url()?>${v.cover_image}"
                            class="user-img">${v.tournament_title}</td>
                    <td>${v.name}</td>
                    <td>${v.title}</td>
                    <td>Rs.${v.fee}/-</td>
                    <td>${v.sname}</td>
                    <td>${v.cname}</td>
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
                result_list_table = $(`[data-result_list_table]`).DataTable();
            }
        });
    }
    getlist("", "");
  
  
});
</script>








 <!--                  <div class="modal fade" id="update${'id'}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
 <!--                 <div class="modal-dialog modal-dialog-centered">-->
 <!--                   <div class="modal-content">-->
 <!--                     <div class="modal-header">-->
 <!--                       <h5 class="modal-title" id="exampleModalLabel">Update User</h5>-->
 <!--                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
 <!--                     </div>-->
 <!--                     <form action="<?= base_url('users/update_users')?>"  method="post" enctype="multipart/form-data">-->
 <!--                         <div class="modal-body">-->
 <!--                                  <div class="mb-3">-->
 <!--                                      <label class="mb-2">Name</label>-->
 <!--                                      <input type="text" name="name" class="form-control" value ="${v.name}" >-->
 <!--                                  </div>-->
 <!--                                  <div class="mb-3">-->
 <!--                                      <label class="mb-2">Type</label>-->
 <!--                                      <select   name="type" class="form-control" required>-->
 <!--                                       <option>Select option</option>-->
 <!--                                      <option  value = "1"  (${'type'}==1)?'selected':''>Team</option>-->
 <!--                                      <option value= "0"  (${'type'}==0)?'selected':''>Individual player</option>-->
 <!--                                      </select>-->
 <!--                                  </div>-->
 <!--                                  <input type="hidden" name="id" value="${'uid'}"> -->
 <!--                                   <div class="mb-3">-->
 <!--                                     <label class="mb-2">Image</label>-->
 <!--                                       <input type="file"   name="image" id="slider0" onchange="preview(this,1)">-->
                                        <!-- <input type="file"  class="hidden-field" name="image" id="slider0" onchange="preview(this,0)" required> -->
 <!--                                        <img src="<?= base_url()?>${v.image}" alt="" id="image0" height = 100px" >-->
 <!--                                      <label class="w-100" for="slider0"><span class="dashed-border"><i class="bx bx-image-add"></i> Image</span></label>-->
 <!--                                 </div>-->
 <!--                                  <div class="mb-3">-->
 <!--                                      <label class="mb-2">Email</label>-->
 <!--                                      <input type="email"  class="form-control"  value="${v.email}"  readonly>-->
 <!--                                  </div>-->
 <!--                                  <div class="mb-3">-->
 <!--                                      <label class="mb-2">Mobile No</label>-->
 <!--                                      <input type="type"  name="mobile" class="form-control" value="${v.mobile}"readonly>-->
 <!--                                  </div>-->
                                   
                 
            
 <!--               <div class="col-m</select>-->
 <!--                   </div>-->
 <!--               </div>-->
                
                
 <!--               <div class="col-md-12">-->
 <!--                    <div class="mb-3">-->
 <!--                    <label class="mb-2">City</label>-->
 <!--                    <select class="form-control" data-filter_update name="city" id="city_update" required>-->
 <!--                    <option value="">select city</option>-->
 <!--                    </select>-->
 <!--                   </div>-->
 <!--               </div>d-12">-->
 <!--                    <div class="mb-3">-->
 <!--                    <label class="mb-2">District</label>-->
 <!--                    <select class="form-control" data-filter_update name="district" id="district_update" required>-->
 <!--                    <option value="">select district</option>-->
                     
             
 <!--               <div class="col-md-12"   id="pincode_div" >-->
 <!--                    <div class="mb-3">-->
 <!--                    <label class="mb-2">Pincode</label>-->
 <!--                    <select class="form-control" data-filter_update name="pincode" id="pincode_update" >-->
 <!--                    <option value="">select pincode</option>-->
 <!--                    </select>-->
 <!--                   </div>-->
 <!--               </div>-->
                
 <!--                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">-->
 <!--                   <input type="checkbox" class="form-check-input" id="active"   name="status" (${status}=='1')?'checked':'unchecked'?>>-->
 <!--                    <label class="form-check-label" for="active"></label>-->
 <!--                 </div>-->
                  
 <!--                         </div>-->
 <!--                         <div class="modal-footer">-->
 <!--                           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>-->
 <!--                           <button  class="btn btn-primary" type="submit"  name="update">Submit</button>-->
 <!--                         </div>-->
 <!--                     </form>-->
 <!--                   </div>-->
 <!--                 </div>-->
 <!--</div>-->
                  <!--<button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#update${v.uid}"><i class=" bx bxs-pencil"></i></button>-->



