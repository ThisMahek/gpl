<?php
class Contact extends MY_Controller
{


    public function  update_contact_status()
     { 
        $tab =  'tbl_contact';
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
                redirect(base_url()."admin/manage_content");

                    }




 public function update_contact()
    {
        if(isset($_POST['update']))
        {
            $table = "tbl_contact";           
            $id = $this->input->post("id");
            
            
        //  echo '<pre>';   print_r($this->input->post());exit;
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array["name"]=$this->input->post("name");
             $array["email"]=$this->input->post("email");
              $array["address"]=$this->input->post("address");
               $array["mobile"]=$this->input->post("mobile");
           
                                               $x =$this->UpdateTable($id,$table,$array); 
                                                if($x)
                                                    {
                                                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Contact updated successfully</div>');
                                                    }
                                                else
                                                    {
                                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update contact</div>');
                                                    }                            
          redirect(base_url()."admin/manage_content");

}
  
}

  
}







?>