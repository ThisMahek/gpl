<?php
class Player extends My_Controller
{

    public function __construct()
	{
		parent::__construct();
	    $this->load->model('AdminModel/Adminmodel','AM');	
		if($this->session->userdata('id') != true)
        {
          redirect('adminlogin/login');
        }

	}
    public function create_player()
            {
                    $table = "tbl_teamplayers";
                    $post= $this->input->post();
                    // echo "<pre>"; print_r($post);exit;
                    $array['user_id'] = $post['user_id'];
                    $array['player_name'] = $post['player_name'];
                    $array['mobno'] = $post['mobile'];
                    $array['position'] = $post['role'];
                    $array['address'] = $post['address'];
                    $status = $this->input->post('status');
                    $array['status']=  $status=='on'?'1':'0';
         
                                $x=$this->addtables($table,$array);
                                if($x)
                                    {
                                       $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Player added successfully</div>');
                                    }
                                else
                                    {
                                         $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add player</div>'); 
                                    }
                                redirect("admin/manage_player");        



}





public function  update_player_status()
   { 
      $tab =  'tbl_teamplayers';
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
                    redirect("admin/manage_player");  
}
            public function delete_player($id)
               {
            $tab = 'tbl_teamplayers';
            $res=$this->deleteTable($id,$tab); 
            if($res==1)
                    {
                        $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Tournament deleted successfully</div>');
                    }
            else 
                    {
                        $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete Tournament</div>');
                    }
                        redirect("admin/manage_player");  
                } 
            

public function update_player()
{
  if(isset($_POST["update"]))
    { 
                    $tab = 'tbl_teamplayers';
                    $id  =  $this->input->post("id");
                    $post= $this->input->post();
                    $array['user_id'] = $post['user_id'];
                    $array['player_name'] = $post['player_name'];
                    $array['mobno'] = $post['mobile'];
                    $array['position'] = $post['role'];
                    $array['address'] = $post['address'];
                    $status = $this->input->post('status');
                    $array['status']=  $status=='on'?'1':'0';
                         $x =$this->UpdateTable($id,$tab,$array); 
                                if($x)
                                        {
                                           $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Player updated successfully</div>');
                                        }
                                  else
                                        {
                                           $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update </div>');
                                        }
                            }
                                redirect(base_url()."admin/manage_player");
                            }

}


?>