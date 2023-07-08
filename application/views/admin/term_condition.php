<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Terms & Conditions</h4>
             </div>
             <div class="col-md-4 col-4">
             </div>
         </div>
             
     </div>
     <div class="card-body">
            <?= $this->session->flashdata('error')?>
          <?= $this->session->flashdata('success')?>
         <form action="" method="post">
             <div class="row">
            
                  <div class="col-md-12">
                     <div class="mb-3">
                         <label class="mb-2">Terms & Conditions</label>
                         <textarea class="summernote" name="title"><?= $manage_termcondition['title']?></textarea>
                     </div>
                 </div>
             </div>
             <button class="btn btn-primary" type="submit" name="submit">Update</button>
         </form>
     </div>
 </div>

<?php include('includes/footer.php')?>