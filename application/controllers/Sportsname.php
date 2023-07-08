<?php
class Sportsname extends MY_Controller
{
    public function add_sports()
    {
        if(isset($_POST['submit']))
        {
    
            $table="tb_gamecategory";
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array['title']=$this->input->post('title');  
                        $x=$this->addtables($table,$array);
                        if($x)
                                {
                                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Sports name added successfully</div>');
                                }
                                else
                                {
                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add sports name </div>');
                                }
                redirect("admin/manage_sportsname"); 
        }
     
     }

     public function  update_sports_status()
     { 
        $tab =  'tb_gamecategory';
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
                redirect(base_url()."admin/manage_sportsname");

                    }
     public function delete_sports($id)
    {
      $tab = 'tb_gamecategory';
      $res=$this->deleteTable($id,$tab); 
     if($res==1)
            {
                $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Sport deleted successfully</div>');
            }
        else 
            {
                $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete sport</div>');
            }
                redirect(base_url()."admin/manage_sportsname");
    } 
 public function update_sports()
    {
        if(isset($_POST['update']))
           {
            $table = "tb_gamecategory";           
            $id = $this->input->post("id");
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array["title"]=$this->input->post("title");

        //  echo "<pre>";   print_r($array);exit;
           
                                               $x =$this->UpdateTable($id,$table,$array); 
                                                if($x)
                                                    {
                                                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Sports updated successfully</div>');
                                                    }
                                                else
                                                    {
                                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update sports</div>');
                                                    }                            
          redirect(base_url()."admin/manage_sportsname");

}
  
}

  
}







?>