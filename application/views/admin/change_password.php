<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profile</h4>
                               </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <?php echo $this->session->flashdata('success');?>
                         <?php echo $this->session->flashdata('error'); ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                               <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Change Password</h5>
                                            </div>
                                        <form class="mt-4 pt-2" action="<?= base_url('adminlogin/change_adminpassword')?>" method="post">
                                            <div class="card-body">
                                               <div class="mb-3">
                                                            <label for="" class="form-label">Current password</label>
                                                            <input class="form-control" type="password" value="" id=""  name="password" required>
                                                 </div>
                                               <div class="mb-3">
                                                            <label for="" class="form-label">New password</label>
                                                            <input class="form-control" type="password" value="" id="password1" name="password1"   onchange="verifyPass()" required>
                                                 </div>

                                                 <div id="passMes_new"></div>
                                               <div class="mb-3">
                                                            <label for="" class="form-label">Confirm password</label>
                                                            <input class="form-control" type="password" value="" id="password2"  name="password2"    onchange="verifyPass()" required>
                                                 </div>

                                                 <div id="passMes"></div>
                                                 <button class="btn btn-primary w-md" type="submit"  id="submit" name="update_password" >Submit</button>
                                            </div>
                                        </form>
                                            <!-- end card body -->
                                        </div>
                                       <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                 </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->
                       </div>
                        <!-- end row -->
                        <!-- Modal -->
                        <script>
        var timeout = 3000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
       </script>


<script type="text/javascript">
  function verifyPass(){
    // alert('hel');
    var pw1 = document.getElementById("password1").value;
    var pw2 = document.getElementById("password2").value;
    var mes = document.getElementById("passMes");
    var new_mes = document.getElementById("passMes_new");
   /* if(pw1 == "" ){
    new_mes.innerHTML = "<span style='color: red;'>**Please enter your password!</span>";
    document.getElementById("submit_btn").disabled = true;
                  }
     else if(pw1 != "" ){
    new_mes.innerHTML = "<span style='color: red;'></span>";
    document.getElementById("submit_btn").disabled = false;
                  }*/
  if((pw1 != '' )&&(pw2 == ''))
    {
    mes.innerHTML = "<span style='color: red;'></span>";
      document.getElementById("submit").disabled = false; 
    // return;
    }
    
    else  if((pw1 == '' )&&(pw2 != ''))
    {
    mes.innerHTML = "<span style='color: red;'></span>";
      document.getElementById("submit").disabled = false; 
    // return;
    }
    
     else if((pw1 == '' )&&(pw2 == ''))
    {
    mes.innerHTML = "<span style='color: red;'></span>";
      document.getElementById("submit").disabled = false; 
    // return;
    }
    else if(pw1 == pw2){
      mes.innerHTML = "<span style='color: green;'>**Passwords matched successfully</span>";
      document.getElementById("submit").disabled = false;
    return;
    }
    
    else{
      mes.innerHTML = "<span style='color: red;'>**Passwords did not matched</span>";
        new_mes.innerHTML = "<span style='color: red;'></span>";
        document.getElementById("submit").disabled = true;
        return;
    
    }
  }
     
</script>
<?php include('includes/footer.php')?>