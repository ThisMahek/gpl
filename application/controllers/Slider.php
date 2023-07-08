<?php
class Slider extends MY_Controller
    {
        public function __construct()
           {
              parent::__construct();
             
           }
        public function add_slider()
             {
                if(isset($_POST['submit']))
                {
                    $table="tbl_slider";
                    $array['title']=$this->input->post('title'); 
                    $status = $this->input->post('status');
                    $array['status']=  $status=='on'?'1':'0';
                    $array['url']=$this->input->post('url');  
                    $config['allowed_types'] = 'pdf|gif|jpeg|png|jpg';
			        $config['upload_path'] = './uploads/';
                    $config['encrypt_name'] = true;
                    $this->load->library('upload',$config);
	                     if($this->upload->do_upload('image'))
                                   {	
                                        $data= $this->upload->data();
                                        $image_path = ("uploads/".$data['file_name']);
                                        $array['image']= $image_path;    
                                    }
                            
                                $x=$this->addtables($table,$array);
                                if($x)
                                {
                                $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Slider added successfully</div>');
                                // redirect(base_url()."admin/manage_slider");
                                }
                                else
                                {
                                $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add slider </div>');
                                // redirect(base_url()."admin/manage_slider");
                                }
                                redirect("admin/manage_slider"); 
                }
             
             }

     public function  update_slider_status()
   { 
      $tab =  'tbl_slider';
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
              redirect(base_url()."admin/manage_slider");
}


public function delete_slider($id)

{
$tab = 'tbl_slider';
$res=$this->deleteTable($id,$tab); 
if($res==1)
     {
         $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Slider deleted successfully</div>');
     }
else 
     {
         $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete slider</div>');
     }
     redirect(base_url()."admin/manage_slider");
 } 







 public function update_slider()
{


if(isset($_POST['update']))

{
    $table = "tbl_slider";           
    $id = $this->input->post("id");
    $array['url'] = $this->input->post("url");
    $array["title"]=$this->input->post("title");
    $status = $this->input->post('status');
    $array['status']=  $status=='on'?'1':'0';
    $file = $_FILES["image"]; 
    $MyFileName="";
            if(strlen($file['name'])>0)
                {
                    $image=$file["name"];
                    $config['allowed_types'] = 'pdf|gif|jpeg|png|jpg';
                    $config['upload_path'] = './uploads/';
                    $config['encrypt_name'] = true;
                    $config['file_name']=$image;
                    $this->load->library("upload",$config);
                        if($this->upload->do_upload('image'))
                            {	
                                    $data= $this->upload->data();
                                    $post= $this->input->post();
                                    $image_path = ("uploads/".$data['file_name']);
                                    $array['image']= $image_path;  
                                    $x =$this->UpdateTable($id,$table,$array); 
                                        if($x)
                                            {
                                            $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Users added successfully</div>');
                                            redirect(base_url()."admin/manage_slider");
                                            }
                                        else
                                            {
                                            $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add users </div>');
                                            redirect(base_url()."admin/manage_slider");
                                            }     
                           }
                                      else
                                            {
                                            $error = array('error' => $this->upload->display_errors());
                                            $result=$error;
                                            } 
                               }

}
          redirect(base_url()."admin/manage_slider");

}
    }


?>