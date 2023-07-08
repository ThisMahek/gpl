<?php
class Notification extends MY_Controller
{
    public function add_notification()
    {
        if(isset($_POST['submit']))
        {
            $table=" tbl_notification";
            $post= $this->input->post();
            $array['title']= $message = $this->input->post('title'); 
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
            $array['team_check'] = isset($post['team'])?$post['team']:0;
            $array['game_check'] = isset($post['game'])?$post['game']:0;
            $array['player_check'] = isset($post['player'])?$post['player']:0;
              
                        $x=$this->addtables($table,$array);
                        $title = "GPL play";
                        send_notice($title, $message);
                        if($x)
                                {
                                $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Notification added successfully</div>');
                                }
                                else
                                {
                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add notification </div>');
                                }
                redirect("admin/manage_notification"); 
        }
     
     }

     public function  update_notification_status()
     { 
        $tab =  'tbl_notification';
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
                redirect(base_url()."admin/manage_notification");

                    }



             public function delete_notification($id)
        
                {
                $tab = 'tbl_notification';
                $res=$this->deleteTable($id,$tab); 
                if($res==1)
                     {
                         $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Notificationdeleted successfully</div>');
                     }
                else 
                     {
                         $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete Notification</div>');
                     }
                        redirect(base_url()."admin/manage_notification");
                 } 



 public function update_notification()
    {
        if(isset($_POST['update']))
        { 
            $table = "tbl_notification";           
            $id = $this->input->post("id");
            $array["title"]=$this->input->post("title");
            $status = $this->input->post('status');
            $array['status']=  $status=='on'?'1':'0';
                    $x =$this->UpdateTable($id,$table,$array); 
                    if($x)
                        {
                        $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Notification updated successfully</div>');
                        }
                    else
                        {
                        $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update Notification</div>');
                        }                            
          redirect(base_url()."admin/manage_notification");

}
  
}

  
}







?>