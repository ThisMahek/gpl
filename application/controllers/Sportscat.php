<?php
class Sportscat extends MY_Controller
{
    public function add_category()
    {
        if(isset($_POST['submit']))
        {
            $table=" tbl_sportcategory";
            $array['title']=$this->input->post('title');  
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array['status']= '1';
                        $x=$this->addtables($table,$array);
                        if($x)
                                {
                                $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Sports category added successfully</div>');
                                }
                                else
                                {
                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add sports category </div>');
                                }
                redirect("admin/manage_category"); 
        }
     
     }

     public function  update_sport_category_status()
     { 
        $tab =  'tbl_sportcategory';
        $id = $_GET['id'];
        $sval = $_GET['status'];
  
      if($sval == 1)
          {
              $status = 0;
          }
      else
          {
              $status = 1;
          }
  
      $data = array(
                    'status'=> $status
                   );
                 $x=$this->updatestatus($tab,$data,$id); 
                if ($x)
                      {
                          $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Status updated successfully</div>');
                      }
              else
                      {
                          $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update staus</div>');
                      }
                redirect(base_url()."admin/manage_category");

                    }



     public function delete_category($id)

{
$tab = 'tbl_sportcategory';
$res=$this->deleteTable($id,$tab); 
if($res==1)
     {
         $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Category deleted successfully</div>');
     }
else 
     {
         $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete category</div>');
     }
        redirect(base_url()."admin/manage_category");
 } 







 public function update_category()
    {
        if(isset($_POST['update']))

        {
            
            $table = "tbl_sportcategory";           
            $id = $this->input->post("id");
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array["title"]=$this->input->post("title");
           
                                               $x =$this->UpdateTable($id,$table,$array); 
                                                if($x)
                                                    {
                                                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Category updated successfully</div>');
                                                    }
                                                else
                                                    {
                                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update category</div>');
                                                    }                            
          redirect(base_url()."admin/manage_category");

}
  
}

  
}







?>