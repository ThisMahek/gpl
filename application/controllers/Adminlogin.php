<?php
class Adminlogin extends CI_Controller
{

    public function __construct()
	{
	   parent::__construct();
	   $this->load->model('AdminModel/Adminmodel','AM');
       if ($this->session->has_userdata('id'))
           {
              redirect('admin');	
           }
	}



    public function index()
       {
        $email_id=$this->input->post('email');
        $pw1= $this->input->post('password');  
        $password = md5($pw1);
        if(isset($_POST['submit']))
        {
        $result=$this->AM->CheckEmail($email_id);
        if($result->num_rows()== 1)
            {  
                 $res=$result->row_array();
            if($res['password']==$password)
                {
                    $data=array(
                   'id'=>$res['id'],
                   'email'=>$res['email']
                          );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Login Successfully!</div>');
                    redirect(base_url()."admin/index");
                }
             else
                {
                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Sorry! Invalid email id and password</div>');
                    redirect(base_url()."adminlogin/login");
                }
            }
                else
                    {
                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Sorry!User id</div>');
                    redirect(base_url()."adminlogin/login");
                    }
     

            }else{
                    redirect('admin/login');
                 }

       }

        public function change_adminpassword()
            {
                $user_id= $this->session->userdata('id');
                $admin = $this->AM->admin_profile($user_id);
            if(isset($_POST['update_password']))
            {     
                  $current = $admin['password'];
                  $password= md5($this->input->post('password'));
            if($password == $current)
            {
                $newpassword= $this->input->post('password1');
           if($this->AM->change_password($newpassword))
               {
                 $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage"> Password Updated Successfully</div>');
                 redirect(base_url()."admin/index");
               }                    
            }
            else
            {
                $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Current Password does not match please try again..</div>');
                 redirect(base_url()."admin/change_password");
            }
            }else{
                    redirect('admin/change_password');
                 }
            
       }
       public function login()
       { 
            $data['page_name']='login';
            $this->load->view('admin/login', $data);
       }



    

}



?>