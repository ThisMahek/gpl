<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."/libraries/REST_Controller.php");  
require APPPATH . 'libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Api extends REST_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Common_model","CM");   
        $this->load->model("Api_model","AM");   
    }
    
	public function getsliders_get()
    {   
        $data = array();
        $result = $this->db->where('status',1)->get('tbl_slider')->result();
       // echo $this->db->last_query();die();
        if(!empty($result))
        {
            $data['data'] = $result;
            $data['code'] = 'HTTP_OK';
        }
        else
        {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
        }
         
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
	public function getIndex_get()
    {   
        $data = array();
        $result = $this->db->get('app_setting')->row();
        if(!empty($result))
        {
            $data['data'] = $result;
            $data['code'] = 'HTTP_OK';
        }
        else
        {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
        }
         
        $this->response($data, REST_Controller::HTTP_OK);
    }
public function getbanner_get()
{   
     $data = array();
     $result = $this->db->where('status',1)->get('tbl_banner')->result();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function gamecategory_get()
{   
     $data = array();
     $result = $this->db->where('status',1)->get('tb_gamecategory')->result();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function sportcategory_get()
{   
     $data = array();
     $result = $this->db->where('status',1)->get('tbl_sportcategory')->result();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}

public function register_post() 
{
    
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('mobile', 'Mobile',  'callback_varify_phone');
  //  $this->form_validation->set_rules('email', 'Email',  'callback_varify_email');
    $this->form_validation->set_rules('game_category', 'Game_Category', 'required|trim');
    $this->form_validation->set_rules('experience', 'Experience', 'required|trim');
    $this->form_validation->set_rules('state', 'State', 'required|trim');
    $this->form_validation->set_rules('district', 'District', 'required|trim');
    $this->form_validation->set_rules('city', 'City', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
     $this->form_validation->set_rules('pincode', 'Pincode', 'required|trim');
    $this->form_validation->set_rules('type', 'Type', 'required|trim');
       if($this->form_validation->run() == FALSE) 
            {
              $data["code"] = 'HTTP_INVALID';
              $data["message"] = strip_tags($this->form_validation->error_string());
            }
            else 
            {
    
$data=array();
        $array=array(
            'name'=>$this->input->post('name'),
            'username'=>$this->input->post('username'),
            'mobile'=>$this->input->post('mobile'),
            'email'=>isset($_POST['email'])?$_POST['email']:null,
            'game_category'=>$this->input->post('game_category'),
            'experience'=>$this->input->post('experience'),
            'state'=>$this->input->post('state'),
            'district'=>$this->input->post('district'),
            'city'=>$this->input->post('city'),
            'pincode'=>$this->input->post('pincode'),
            'password'=>base64_encode($this->input->post('password')),
            'type'=>$this->input->post('type'),
            'status'=>1
                );
                $user_id="";

         $data = $this->gen_otp_post($user_id,$this->input->post("mobile"));
        // $array['otp']=$data;
          $data['data'] = $array;
          
      
   
}
 
    $this->response($data, REST_Controller::HTTP_OK);
  
}
 
 
 
   public function gen_otp_post($id="",$phone="")
{
        $data = array();
        $response = array();
       
            $otp = ($this->input->post('otp'))?$this->input->post('otp'):rand(1000, 9999);
            $phone = $this->input->post('mobile');
            $check_otp = $this->db->where('mobile',$phone)->select('*')->get('tblotp')->num_rows();

                if($check_otp > 0)
                {
                    $data2['otp']=$otp;
                    $data2['mobile']=$phone;
                    $data2['user_id']='';
                    $data2['type']='r';
                    $this->db->where('mobile', $phone);
                    $q2= $this->db->update('tblotp', $data2);
               
                }
                else
                {  
                    $id="";
                    $q2 = $this->db->insert('tblotp',array('otp'=>$otp,'user_id'=>$id,'type'=>'r','mobile'=>$phone));
                }
                
              if($q2)
                {
                    
                     $data['code'] = 'HTTP_OK';
                    $data['otp'] = $otp;
                    $data["message"] = 'Otp send successfully';
                    
                }
                else
                {
                    $data['code'] = 'HTTP_NOT_FOUND';
                    $data["message"] = 'Something went wrong';
                }
                            
                        
                    return  $data   ; 
           //  return $this->response($data, REST_Controller::HTTP_OK);
  
}
public function otp_verification_signup_post()
{
            $data=array();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('mobile', 'Mobile',  'trim|required');
            $this->form_validation->set_rules('otp', 'OTP',  'trim|required');
            $this->form_validation->set_rules('data', 'Form Data',  'required');
                if ($this->form_validation->run() == FALSE) 
                {
                      $data['code'] = 'HTTP_INVALID';
                    $data["error"] =  strip_tags($this->form_validation->error_string());
                 }
                 else
                 {
                    $insrtarray = json_decode($this->input->post('data'));
                  
                    $array=array('otp'=>$this->input->post('otp'),'mobile'=>$this->input->post('mobile'));
                    $x = $this->db->where($array)->get('tblotp');
                     $otp_timedata=$this->db->get('app_setting')->row();
                     $otp_data=$x->row();
                 $date= date("Y-m-d H:i:s",strtotime($otp_data->updated_at	.' +'.$otp_timedata->otp_time.' seconds'));
                $current_date=date("Y-m-d H:i:s");
               
                    
                         if($x->num_rows() > 0 && $date > $current_date)
                         {
                            /*Register Users*/
                            
                            $this->CM->data_insert("tbl_users",$insrtarray);
                            $user_id = $this->db->insert_id();
                          
                           
                        $data["message"] = "User registered successfully";
                         $data['code'] = 'HTTP_OK';
                         }
                         else
                         {
                            $data["message"] = "Invalid otp";
                           $data['code'] = 'HTTP_NOT_FOUND';
                            $data['data'] = $insrtarray;
                         }
                  
                 }
    
   $this->response($data, REST_Controller::HTTP_OK);
}

  
public function varify_phone()
{
    
     $user_phone = $this->input->post('mobile');
     $id = $this->input->post('user_id');
          if($id)
          {
              $this->db->where('id!=',$id);
          }
    $rs = $this->db->where(['mobile'=>$user_phone,'status!='=>2])->get('tbl_users')->num_rows();
    
    if($rs==0)
    {
        //return $data['code'] = 'HTTP_OK';
    return TRUE;
    }
    else
    {
        
        $this->form_validation->set_message("varify_phone","Phone Number Is Already Exists");
        // return $data['code'] = 'HTTP_NOT_FOUND';
            return FALSE;
        
    }
    
}
public function varify_email()
{
    
     $email = $this->input->post('email');
       $id = $this->input->post('user_id');
          if($id)
          {
              $this->db->where('id!=',$id);
          }
    $rs2 = $this->db->where(['email'=>$email,'status!='=>2])->get('tbl_users')->num_rows();
  
    if($rs2==0)
    {
       
            return TRUE;
    }
    else
    {
    
       $this->form_validation->set_message("varify_email", "Email Already Register");
      //  return $data['code'] = 'HTTP_NOT_FOUND';
        return FALSE;
        
    }
    
}
public function createtournament_post() 
{
    
   $this->form_validation->set_rules('cover_image', 'Cover image', 'required|trim');
   $this->form_validation->set_rules('user_id', 'User_Id', 'required|trim');
    $this->form_validation->set_rules('tournament_title', 'Tournament Title', 'required|trim');
    $this->form_validation->set_rules('sports_category', 'Sports Category',  'required|trim');
    $this->form_validation->set_rules('fee', 'Fee',  'required|trim');
 $this->form_validation->set_rules('description', 'Description', 'required|trim');
    $this->form_validation->set_rules('tournament_status', 'Tournament status', 'required|trim');
     $this->form_validation->set_rules('state', 'state', 'required|trim');
      $this->form_validation->set_rules('city', 'City', 'required|trim');
  
    if($this->form_validation->run() == TRUE)
    {

        $array=array(
            'user_id'=>$this->input->post('user_id'),
            'tournament_title'=>$this->input->post('tournament_title'),
            'sports_category'=>$this->input->post('sports_category'),
            'fee'=>$this->input->post('fee'),
            'description'=>$this->input->post('description'),
            'status'=>$this->input->post('tournament_status'),
            'state'=>$this->input->post('state'),
            'city'=>$this->input->post('city'),
            //'status'=>1
                );
                
                $files =$_POST['cover_image'];
                $upload_path = 'assets/tournament_image/';
                $array['cover_image'] =  $this->AM->set_upload_files($upload_path ,$files,'png');
     $userdata=   $this->CM->data_insert("tbl_tournament",$array);
       
         if($userdata)
         {
            $data['code'] = 'HTTP_OK';
              $data['message']='Tournament created successfully.';   
         }
         else
         {
            $data['code'] = 'HTTP_INVALID';
              $data['message']='Unable to create tournament';
         }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }

    $this->response($data, REST_Controller::HTTP_OK);
  
}
 
public function updatetournament_post() 
{
    
   // $this->form_validation->set_rules('cover_image', 'Cover image', 'required|trim');
   $this->form_validation->set_rules('tournament_id', 'Tournament_Id', 'required|trim');
   $this->form_validation->set_rules('user_id', 'User_ID', 'required|trim');
    $this->form_validation->set_rules('tournament_title', 'Tournament Title', 'required|trim');
    $this->form_validation->set_rules('sports_category', 'Sports Category',  'required|trim');
    $this->form_validation->set_rules('fee', 'Fee',  'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'required|trim');
    $this->form_validation->set_rules('tournament_status', 'Tournament status', 'required|trim');
     $this->form_validation->set_rules('state', 'state', 'required|trim');
      $this->form_validation->set_rules('city', 'City', 'required|trim');
  
    if($this->form_validation->run() == TRUE)
    {
        // log_message('error',json_encode($_POST));
        // exit;

        $array=array(
            'user_id'=>$this->input->post('user_id'),
            'tournament_title'=>$this->input->post('tournament_title'),
            'sports_category'=>$this->input->post('sports_category'),
            'fee'=>$this->input->post('fee'),
            'description'=>$this->input->post('description'),
            'status'=>$this->input->post('tournament_status'),
                'state'=>$this->input->post('state'),
                'city'=>$this->input->post('city'),
                );
                if(isset($_POST['cover_image']) && !empty($_POST['cover_image']))
                {
                    $files =$_POST['cover_image'];
                    $upload_path = 'assets/tournament_image/';
                    $array['cover_image'] =  $this->AM->set_upload_files($upload_path ,$files,'png');
                }
     $userdata=   $this->CM->data_update("tbl_tournament",$array,array("id"=>$this->input->post("tournament_id")));
     

       
         if($userdata)
         {
            $data['code'] = 'HTTP_OK';
              $data['message']='Tournament updated successfully.';   
         }
         else
         {
            $data['code'] = 'HTTP_INVALID';
              $data['message']='Unable to update tournament';
         }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }

    $this->response($data, REST_Controller::HTTP_OK);
  
}
public function deletetournament_post() 
{
   $this->form_validation->set_rules('tournament_id', 'Tournament_Id', 'required|trim');
  
    if($this->form_validation->run() == TRUE)
    {

        $array=array(
            'status'=>2
                );
     $userdata=   $this->CM->data_update("tbl_tournament",$array,array("id"=>$this->input->post("tournament_id")));
       
         if($userdata)
         {
            $data['code'] = 'HTTP_OK';
              $data['message']='Tournament deleted successfully.';   
         }
         else
         {
            $data['code'] = 'HTTP_INVALID';
              $data['message']='Unable to delete tournament';
         }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }

    $this->response($data, REST_Controller::HTTP_OK);
  
}


    public function gettournament_post()
    {
        $data = array();
       // print_r('hi');
     
        $result=  $this->AM->get_tournamentdata();
      
      
        if(!empty($result)) {
            $data['data'] =  $result['result'];
            $data['total_page'] = ceil($result['num_row']);
            $data['current_page'] = $result['current_page'];
             //$data['data'] =  $result;
            $data['code'] = 'HTTP_OK';
        } else {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

public function allteamdata_post()
{   
    $data = array();
    $result = $this->AM->get_teamdata();
   // echo $this->db->last_query();die();
         if(!empty($result))
         
         {
            $data['data'] = $result['result'];
            $data['total_page'] = ceil($result['num_row']);
            $data['current_page'] = $result['current_page'];
            $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
        }
public function tournementdetail_post()
{   
     $data = array();
     $result=  $this->AM->get_singletournementdetail($this->input->post('tournament_id'));
     $data_usesr=  $this->AM->get_userdata($result['user_id']);
         if(!empty($result))
         {
            foreach($result as $results)
            
             $data['data'] = $result;
             $data['organised_by']=$data_usesr;
            //  echo $this->db->last_query();die();
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
              $data['organised_by']=array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function login_post() 
{
    $data=array();
      $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');
     
    if($this->form_validation->run() == TRUE){
       $userdata = $this->AM->login_get();
  //echo $this->db->last_query();die();
            if ($userdata['login_status'] == 1 ){

            $data['code'] = 'HTTP_OK';
            $data['message']='Login successfully';
            $data['data']=$userdata;
            }
            else if($userdata['login_status'] == 0)
            {

            $data['code'] = 'HTTP_NOT_FOUND';
            $data['message']= 'User does not exits'; 

            }
            else if($userdata['login_status'] == 2){

                $data['code'] = 'HTTP_NOT_FOUND';
                $data['message']= 'Your account is inactive'; 
    
                }
            else if($userdata['login_status'] == 3)
            {

            $data['code'] = 'HTTP_INVALID';
            $data['message']='Invalid password';

            }  
        }
    else
    {
     
        $data['code'] = 'HTTP_NOT_FOUND';
          $data['message'] = strip_tags($this->form_validation->error_string());
          
    }
  
    $this->response($data, REST_Controller::HTTP_OK);
  
}
public function sendotp_post() 
  {

        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        
       
      if($this->form_validation->run() == TRUE){
         $userdata = $this->AM->send_otp($this->input->post('mobile'));
    
            if ($userdata['status']==1)
            {

            $data['code'] = 'HTTP_OK';
            $data['message']='Otp send successfully';
            $data['otp']=$userdata['status_1'];
            }
            if ($userdata['status']==2){

            $data['code'] = 'HTTP_INVALID';
            $data['message']='Unable to send successfully';
            $data['otp']=array();
            }
            else if ($userdata['status']==3){

            $data['code'] = 'HTTP_INVALID';
            $data['message']='Please register firstly';
            $data['otp']=array();
            }

            else if ($userdata['status']==4)
            {
            $data['code'] = 'HTTP_INVALID';
            $data['message']='Invalid data';
            $data['otp']=array();  
            }

         }
    else
    {

    $data['code'] = 'HTTP_NOT_FOUND';
    $data['message'] = strip_tags($this->form_validation->error_string());

    }

      $this->response($data, REST_Controller::HTTP_OK);
    
  }

  public function verifyotp_post() 
  {

        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('otp', 'Otp', 'required|trim');
                if($this->form_validation->run() == TRUE){
                $userdata = $this->AM->verify_otp();
                
                if ($userdata['status']==1){
                
                $data['code'] = 'HTTP_OK';
                $data['message']='Otp verify successfully';
                $data['data']=$userdata;
                }
                else if($userdata['status']==0)
                {
                $data['code'] = 'HTTP_NOT_FOUND';
                $data['message']='Invalid otp';
                $data['data']=array();  
                }
                else if($userdata['status']==2)
                {
                $data['code'] = 'HTTP_NOT_FOUND';
                $data['message']='Phone number does not exits';
                $data['data']=array();  
                }
                else if($userdata['status']==3)
                {
                $data['code'] = 'HTTP_NOT_FOUND';
                $data['message']='Otp expired!';
                $data['data']=array();  
                }
    
      }
      else
      {
       
        $data['code'] = 'HTTP_NOT_FOUND';
            $data['message'] = strip_tags($this->form_validation->error_string());
            
      }
    
      $this->response($data, REST_Controller::HTTP_OK);
    
  }

  public function changepassword_post() {
    if(isset($_POST['new_password']) && isset($_POST['confirm_password']) && isset($_POST['mobile'])){
       if($_POST['new_password']== $_POST['confirm_password']){ 
          $updater['password'] = base64_encode($_POST['new_password']);
          $this->db->where('mobile',$this->input->post('mobile'))->or_where('email',$this->input->post('mobile'));
          $update=$this->db->update('tbl_users', $updater);
          if($this->db->affected_rows() == true)
          {
            $data['code'] = 'HTTP_OK';
              $data['message']='Password reset successfully';
          }
           else
           {
            $data['code'] = 'HTTP_INVALID';
            $data['message']='Try with different password';
          }
       }
       else{
        $data['code'] = 'HTTP_INVALID';
          $data['message']='Password and confirm password does not match';
    }
    } else{
        $data['code'] = 'HTTP_NOT_FOUND';
          $data['message'] = 'Parameters missing';
    }
  
    $this->response($data, REST_Controller::HTTP_OK);
  
}


        public function createteamplayer_post() 
        {
            $this->form_validation->set_rules('player_name', 'Player Name', 'required|trim');
           $this->form_validation->set_rules('position', 'Position', 'required|trim');
            $this->form_validation->set_rules('mobno', 'Mobile No', 'required|trim');
            //$this->form_validation->set_rules('email', 'Email',  'required|trim');
            $this->form_validation->set_rules('address', 'Address',  'required|trim');
            $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
          
            if($this->form_validation->run() == TRUE)
            {
        
                $array=array(
                    'user_id'=>$this->input->post('user_id'),
                    'player_name'=>$this->input->post('player_name'),
                    'position'=>$this->input->post('position'),
                    'mobno'=>$this->input->post('mobno'),
                    'email'=>isset($_POST['email'])?$_POST['email']:"",
                    'address'=>$this->input->post('address'),
                    'status'=>1
                        );
                        
            
             $userdata=   $this->CM->data_insert("tbl_teamplayers",$array);
               
                 if($userdata)
                 {
                    $data['code'] = 'HTTP_OK';
                      $data['message']='Player added successfully.';   
                 }
                 else
                 {
                    $data['code'] = 'HTTP_INVALID';
                      $data['message']='Unable to add player';
                 }
                
            }
            else
            {
                $data['message'] = strip_tags($this->form_validation->error_string());
              //  $data['data'] = array("Created at errorbase");
                $data['code'] = 'HTTP_NOT_FOUND';
            }
        
            $this->response($data, REST_Controller::HTTP_OK);
          
        }
        
        public function updateteamplayer_post() 
        {
            $this->form_validation->set_rules('player_id', 'Player_Id', 'required|trim');
            $this->form_validation->set_rules('player_name', 'Player Name', 'required|trim');
           $this->form_validation->set_rules('position', 'Position', 'required|trim');
            $this->form_validation->set_rules('mobno', 'Mobile No', 'required|trim');
           // $this->form_validation->set_rules('email', 'Email',  'required|trim');
            $this->form_validation->set_rules('address', 'Address',  'required|trim');
            $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
          
            if($this->form_validation->run() == TRUE)
            {
                $player_id=$this->input->post("player_id");
         $team_data=   $this->db->where('id',$player_id)->get('tbl_teamplayers')->row();
        
                $array=array(
                    'user_id'=>$this->input->post('user_id'),
                    'player_name'=>$this->input->post('player_name'),
                    'position'=>$this->input->post('position'),
                    'mobno'=>$this->input->post('mobno'),
                    'email'=>isset($_POST['email'])?$_POST['email']:$team_data->email,
                    'address'=>$this->input->post('address'),
                    
                        );
                        
                        $userdata=   $this->CM->data_update("tbl_teamplayers",$array,array("id"=>$player_id));
          // echo $this->db->last_query();die();
               
                 if($userdata)
                 {
                    $data['code'] = 'HTTP_OK';
                      $data['message']='Player updated successfully.';   
                 }
                 else
                 {
                    $data['code'] = 'HTTP_INVALID';
                      $data['message']='Unable to update player';
                 }
                
            }
            else
            {
                $data['message'] = strip_tags($this->form_validation->error_string());
              //  $data['data'] = array("Created at errorbase");
                $data['code'] = 'HTTP_NOT_FOUND';
            }
        
            $this->response($data, REST_Controller::HTTP_OK);
          
        }
        
        public function deleteteamplayers_post() 
        {
           $this->form_validation->set_rules('player_id', 'Player_Id', 'required|trim');
          
            if($this->form_validation->run() == TRUE)
            {
        
                $array=array(
                    'status'=>2
                        );
             $userdata=   $this->CM->data_update("tbl_teamplayers",$array,array("id"=>$this->input->post("player_id")));
               
                 if($userdata)
                 {
                    $data['code'] = 'HTTP_OK';
                      $data['message']='Player deleted successfully.';   
                 }
                 else
                 {
                    $data['code'] = 'HTTP_INVALID';
                      $data['message']='Unable to delete player';
                 }
                
            }
            else
            {
                $data['message'] = strip_tags($this->form_validation->error_string());
              //  $data['data'] = array("Created at errorbase");
                $data['code'] = 'HTTP_NOT_FOUND';
            }
        
            $this->response($data, REST_Controller::HTTP_OK);
          
        }
        public function getteamplayer_post()
{   
     $data = array();
     $result = $this->AM->get_teamplayer($this->input->post('user_id'));
    // echo $this->db->last_query();die();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}

public function allplayers_post()
{   
     $data = array();
  //   $page=$this->input->post("page");
           
  $result = $this->AM->get_allplayers();


         if($result)
         {
             $data['data'] = $result['result'];
             $data['total_page'] = ceil($result['num_row']);
               $data['current_page'] = $result['current_page'];
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}

public function teamdetail_post()
{   
     $data = array();
   // $players_data=  $this->AM->get_singlusersdata($this->input->post('id'));
     $result=  $this->AM->get_singlusersdata($this->input->post('team_id'),$this->input->post('type'));
     $achievementsdata=  $this->AM->get_achievements($this->input->post('team_id'));
     $gallerydata=  $this->AM->get_gallery($this->input->post('team_id'));
     $playersdata=  $this->AM->get_teamplayers($this->input->post('team_id'));

     
         if(!empty($result))
         {
           
           
             $data['data'] = $result;
           $data['achievements']=$achievementsdata;
           $data['gallery']=$gallerydata;
           $data['players']=$playersdata;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function playersdetail_post()
{   
     $data = array();

     $result=  $this->AM->get_singlusersdata($this->input->post('player_id'),$this->input->post('type'));
    // echo $this->db->last_query();die();
     $achievementsdata=  $this->AM->get_achievements($this->input->post('player_id'));
     $gallerydata=  $this->AM->get_gallery($this->input->post('player_id'));
    
         if(!empty($result))
         {
           
           
             $data['data'] = $result;
           $data['achievements']=$achievementsdata;
           $data['gallery']=$gallerydata;
          // $data['players']=$playersdata;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
	public function getnotification_get()
{   
     $data = array();
     $result = $this->db->select('id,title,DATE_FORMAT(created_at," %d-%m-%Y | %H:%i %p ") as date_time')->where('status',1)->get('tbl_notification')->result();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}


public function deletenotificaion_post() 
{
   $this->form_validation->set_rules('notification_id', 'Notification_Id', 'required|trim');
  
    if($this->form_validation->run() == TRUE)
    {

        $array=array(
            'status'=>2
                );
     $userdata=   $this->CM->data_update("tbl_notification",$array,array("id"=>$this->input->post("notification_id")));
       
         if($userdata)
         {
            $data['code'] = 'HTTP_OK';
              $data['message']='Notification deleted successfully.';   
         }
         else
         {
            $data['code'] = 'HTTP_INVALID';
              $data['message']='Unable to delete notification';
         }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }

    $this->response($data, REST_Controller::HTTP_OK);
  
}
       
  public function contactus_post() 
{
    $this->form_validation->set_rules('user_id', 'User_Id', 'required|trim');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('mobile', 'Mobile_No', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('query', 'Query', 'required|trim');

    if($this->form_validation->run() == TRUE)
    {

            $array=array(
            'user_id'=>$this->input->post('user_id'),
            'name'=>$this->input->post('name'),
            'mobile'=>$this->input->post('mobile'),
            'email'=>$this->input->post('email'),
            'address'=>$this->input->post('address'),
            'query'=>$this->input->post('query'),
            'status'=>1
            );
     $userdata=   $this->CM->data_insert("tbl_contact",$array);
       
         if($userdata)
         {
            $data['code'] = 'HTTP_OK';
              $data['message']='Query  sent successfully.';   
         }
         else
         {
            $data['code'] = 'HTTP_INVALID';
              $data['message']='Unable to sent query';
         }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }

    $this->response($data, REST_Controller::HTTP_OK);
  
}     
   
 	public function contactdetails_get()
{   
     $data = array();
     $result = $this->db->select('mobile,email,address')->where('status',1)->get('admin_details')->row();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}  
   
      	public function getterm_conditions_get()
{   
     $data = array();
     $result = $this->db->select('title')->where('status',1)->get('tbl_termcondition')->row();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}   
     	public function getprivacy_policy_get()
{   
     $data = array();
     $result = $this->db->select('title')->where('status',1)->get(' tbl_privacy')->row();
         if(!empty($result))
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}   
      
   	public function blockser_post()
{  
     $data = array();
     $result = $this->db->select('is_block')->where('id',$this->input->post('user_id'))->get('tbl_users')->row();
         if($result->is_block==1)
         {
             $data['data'] = $result;
             $data['code'] = 'HTTP_OK';
              $data['message'] = 'User is blocked';
             
         }
         else
         {
            $data['data'] = array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}   
public function update_personaldetails_post() 
{
     $this->form_validation->set_rules('user_id', 'User_Id', 'required|trim');

   
     if($this->input->post('type') == 'change_password')
     {
        $this->form_validation->set_rules('old_password', 'Old_password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New_password', 'required|trim');
     }
    if($this->form_validation->run() == TRUE)
    {
        $user_id=$this->input->post('user_id');
        $type=$this->input->post('type');
        $gallery_id=$this->input->post('gallery_id');
        $achievement_id=$this->input->post('achievement_id');
        $userdetails=   $this->AM->get_profiledetails($user_id);
        
// print_r($userdetails);exit;
        $array=array(
            'name'=>isset($_POST['name'])?$_POST['name']:$userdetails->name,
            'username'=>isset($_POST['username'])?$_POST['username']:$userdetails->username,
            'mobile'=>isset($_POST['mobile'])?$_POST['mobile']:$userdetails->mobile,
            'email'=>isset($_POST['email'])?$_POST['email']:$userdetails->email,
            'game_category'=>isset($_POST['game_category'])?$_POST['game_category']:$userdetails->game_category,
            'experience'=>isset($_POST['experience'])?$_POST['experience']:$userdetails->experience,
            'state'=>isset($_POST['state'])?$_POST['state']:$userdetails->state,
            'district'=>isset($_POST['district'])?$_POST['district']:$userdetails->district,
            'city'=>isset($_POST['city'])?$_POST['city']:$userdetails->city,
            'pincode'=>isset($_POST['pincode'])?$_POST['pincode']:$userdetails->pincode,
            'amount'=>isset($_POST['amount'])?$_POST['amount']:$userdetails->amount,
           
            'status'=>isset($_POST['status'])?$_POST['status']:$userdetails->status,
                );
        if(isset($_POST['image'])){
            $files =$_POST['image'];
            $upload_path = 'assets/user_image/';
            $array['image'] =  $this->AM->set_upload_files($upload_path ,$files,'png');
        }
        
        $userdata1=   $this->CM->data_update("tbl_users",$array,array("id"=>$user_id));

        if(isset($_POST['gallery_image']) && $type=='gallery_add'){

            $files =$_POST['gallery_image'];
            $upload_path = 'assets/gallery_image/';
            $array2['image'] =  $this->AM->set_upload_multi_files(" " ,$files,'png');
    
            $array2['user_id'] =  isset($_POST['user_id'])?$_POST['user_id']:$userdetails->user_id;
            $array2['status'] =1;
            $userdata1=$this->CM->data_insert("tbl_playergallery",$array2);
            if($userdata1){
                //  $data['img'] = $array2;
                $data['code'] = 'HTTP_OK';
                $data['message']='Gallery image added successfully.';   
            }else{
                // $data['img'] = $array2;
                $data['code'] = 'HTTP_INVALID';
                $data['message']='Unable to added gallery image';
            }
            return $this->response($data, REST_Controller::HTTP_OK);
        }
if($gallery_id!='' && $type=='gallery_edit')
{
 $files =$_POST['gallery_image'];

            $upload_path = 'assets/gallery_image/';
            $array3['image'] =  $this->AM->set_upload_multi_files(" " ,$files,'png');
    
    $userdata1=$this->CM->data_update("tbl_playergallery",$array3,array("id"=>$gallery_id,'user_id'=>$user_id));
     if($userdata1)
    {
    $data['code'] = 'HTTP_OK';
    $data['message']='Gallery image updated successfully.';   
    }
    else
    {
    $data['code'] = 'HTTP_INVALID';
    $data['message']='Unable to update galley image';
    }
   return $this->response($data, REST_Controller::HTTP_OK);
    
    
}
if($gallery_id!='' && $type=='gallery_delete')
{
    $array4['status']=2;
    $userdata1=$this->CM->data_update("tbl_playergallery",$array4,array("id"=>$gallery_id));
      if($userdata1)
    {
    $data['code'] = 'HTTP_OK';
    $data['message']='Gallery image deleted successfully.';   
    }
    else
    {
    $data['code'] = 'HTTP_INVALID';
    $data['message']='Unable to delete galley image';
    }
   return $this->response($data, REST_Controller::HTTP_OK);
    
}

//for about us

if($type=='aboutus_add_and_edit')
{
    $array_about=array(
      'description'=>isset($_POST['description'])?$_POST['description']:$userdetails->description,  
    );
       $x=  $this->CM->data_update("tbl_users",$array_about,array("id"=>$user_id));
     if($x)
    {
    $data['code'] = 'HTTP_OK';
    $data['message']='About us added successfully.';   
    }
    else
    {
    $data['code'] = 'HTTP_INVALID';
    $data['message']='Unable to add  about us';
    }
   return $this->response($data, REST_Controller::HTTP_OK);
}
// if($type=='achievement_add')
// {
//     $array5=array(
//         'title'=>isset($_POST['achievements_title'])?$_POST['achievements_title']:"",
//         'description'=>isset($_POST['achievements_desc'])?$_POST['achievements_desc']:"",
//         'user_id'=>$user_id,
//         'status'=>1,
//     );
//         $userdata1=$this->CM->data_insert("tbl_achievements",$array5);
//      if($userdata1)
//     {
//     $data['code'] = 'HTTP_OK';
//     $data['message']='Achievements added successfully.';   
//     }
//     else
//     {
//     $data['code'] = 'HTTP_INVALID';
//     $data['message']='Unable to added achievements';
//     }
//   return $this->response($data, REST_Controller::HTTP_OK);
// }

// if($achievement_id!='' && $type=='achievement_edit')
// {
// $array5=array(
//     'title'=>isset($_POST['achievements_title'])?$_POST['achievements_title']:$userdetails->achievements_title,
//     'description'=>isset($_POST['achievements_desc'])?$_POST['achievements_desc']:$userdetails->achievements_desc,
// );
//     $userdata1=$this->CM->data_update("tbl_achievements",$array5,array("id"=>$achievement_id,'user_id'=>$user_id));
//      if($userdata1)
//     {
//     $data['code'] = 'HTTP_OK';
//     $data['message']='Achievements updated successfully.';   
//     }
//     else
//     {
//     $data['code'] = 'HTTP_INVALID';
//     $data['message']='Unable to update achievements';
//     }
//   return $this->response($data, REST_Controller::HTTP_OK);
    
// }
// if($achievement_id!='' && $type=='achievement_delete')
// {
//     $array5['status']=2;
//     $userdata1=$this->CM->data_update("tbl_achievements",$array5,array("id"=>$achievement_id,'user_id'=>$user_id));
//      if($userdata1)
//     {
//     $data['code'] = 'HTTP_OK';
//     $data['message']='Achievements deleted successfully.';   
//     }
//     else
//     {
//     $data['code'] = 'HTTP_INVALID';
//     $data['message']='Unable to delete achievements';
//     }
//   return $this->response($data, REST_Controller::HTTP_OK);
// }
  
if($type=='change_password')
{
     $oldpassword=$userdetails->password;
     $currentpassword=base64_encode($this->input->post('new_password'));
     $old_password_from_user=base64_encode($this->input->post('old_password'));
     if($oldpassword == $old_password_from_user){
         
     
   
        if($oldpassword != $currentpassword)
        {
            $array6['password']= base64_encode($this->input->post('new_password'));
            $userdata1=$this->CM->data_update("tbl_users",$array6,array("id"=>$user_id));
            if($userdata1)
            {
                $data['code'] = 'HTTP_OK';
                $data['message']='Password changed successfully.'; 
            }
            else
            {
                $data['code'] = 'HTTP_INVALID';
                $data['message']='Unable to change password.';
            }
       
        }
        else
        {
            $data['code'] = 'HTTP_INVALID';
            $data['message']='New password can\'t be similar as old password';
           // $this->response($data, REST_Controller::HTTP_OK);
          
        }
     }else{
        $data['code'] = 'HTTP_INVALID';
        $data['message']='Old password is not matching!';
     }
    
   return $this->response($data, REST_Controller::HTTP_OK);
}
    if($userdata1)
    {
    $data['code'] = 'HTTP_OK';
    $data['message']='Profile updated successfully.';   
    }
    else
    {
    $data['code'] = 'HTTP_INVALID';
    $data['message']='Unable to update profile';
    }
        
    }
    else
    {
        $data['message'] = strip_tags($this->form_validation->error_string());
      //  $data['data'] = array("Created at errorbase");
        $data['code'] = 'HTTP_NOT_FOUND';
    }
  
 
    $this->response($data, REST_Controller::HTTP_OK);
  


}
public function getstate_get()
{   
     $data = array();
     $state = $this->db->where('status',1)->order_by('name','ASC')->get('tbl_state')->result();
    //   $city = $this->db->where('status',1)->get('tbl_city')->result();
         if(!empty($state) ) 
         {
             $data['state'] = $state;
            // $data['city'] = $city;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
            $data['state'] = array();

            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function getdistrict_post()
{   
     $data = array();
     $city = $this->db->where('status',1)->where('state_id',$this->input->post('state_id'))->order_by('name','ASC')->get('tbl_district')->result();
    
    //   $city = $this->db->where('status',1)->get('tbl_city')->result();
         if(!empty($city)) 
         {
             
            $data['city'] = $city;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
           
             $data['city']=array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function getcity_post()
{   
  $state_id=  json_decode($this->input->post('state_id'));
  $district_id=$this->input->post('district_id');
 
     $data = array();
     if($district_id)
     {
         $this->db->where('district_id',$district_id);
     }
     if($state_id)
     {
         $this->db->or_where_in('state_id',$state_id);
     }
     
     $city = $this->db->where('status',1)->order_by('name','ASC')->group_by('name')->get('tbl_city')->result();

         if(!empty($city)) 
         {
             
            $data['city'] = $city;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
           
             $data['city']=array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}
public function getpincode_post()
{   
     $data = array();
     $city = $this->db->where('status',1)->where('city_id',$this->input->post('city_id'))->get('tbl_pincode')->result();
    
    //   $city = $this->db->where('status',1)->get('tbl_city')->result();
         if(!empty($city)) 
         {
             
            $data['city'] = $city;
             $data['code'] = 'HTTP_OK';
             
         }
         else
         {
           
             $data['city']=array();
            $data['code'] = 'HTTP_NOT_FOUND';
         }
         
     $this->response($data, REST_Controller::HTTP_OK);
   
}


 public function manage_achievement_post() 
            {
            
               $data=array();
            $this->form_validation->set_rules('user_id', 'User_id', 'required|trim');
           if($this->form_validation->run() == false){
          $data['code'] = 'HTTP_INVALID';
            $data['message'] = 'parameter missing';
        }
        else
        {
        // $userdata = $this->api_model->manage_activity();
   
     $user_id=$_POST['user_id'];
                    $insert_data=array();
                    $post = (isset($_POST['achievement']))?json_decode($_POST['achievement']):array();
                            //     $c='[{"id":"","achievement_name":"new ths"},{"id":"","achievement_name":"tst tjis"}]';
                            // $post=json_decode($c);

 
              $remove_ids = (isset($_POST['remove_id']))?json_decode($_POST['remove_id']):array();
                   // $remove_ids =[1,4];
          if($post)
          {
             
                foreach($post as $post_data)
                {

                    $check_id =isset($post_data->id)?$post_data->id:'';
              
                  
                   
                    if($check_id == null || $check_id == " " )
                    {
                
                    $insert_data = array
                            (
                                    'user_id'=> $user_id,
                                    'status'=> 1,
        				      	'title' => $post_data->achievement_name,
        					);
                 $x= $this->db->insert('tbl_achievements', $insert_data);
                        if($x)
                        {
                       $data['code'] = 'HTTP_OK';
                        $data['message']='Achievement added successfully.';   
                        }
                        else
                        {
                     $data['code'] = 'HTTP_INVALID';
                        $data['message']='Unable to add achievement';
                        }  

                }
                    else
                    {
                                    $insert_data = array(
                                    'title' => $post_data->achievement_name,
                                    );
                               $x=  $this->db->where('user_id',$user_id)->where('id',$post_data->id)->update('tbl_achievements', $insert_data);
                            if($x)
                            {
                           $data['code'] = 'HTTP_OK';
                            $data['message']='Achievement updated successfully.';   
                            }
                            else
                            {
                          $data['code'] = 'HTTP_INVALID';
                            $data['message']='Unable to Update achievement';
                            }  

                    }
                 
                } 
            
          }
          
              if(!empty($remove_ids))
                {
                $insert_data3['status'] =2; 
                $x=  $this->db->where_in('id',$remove_ids)->update('tbl_achievements', $insert_data3);
                if($x)
                            {
                            $data['code'] = 'HTTP_OK';
                            $data['message']='Achievement deleted successfully.';   
                            }
                            else
                            {
                            $data['code'] = 'HTTP_INVALID';
                            $data['message']='Unable to delete Achievement';
                            }  

                }
      }
            
            
            
            
            
            $this->response($data, REST_Controller::HTTP_OK);
            
            }
            
            public function manage_gallery_post() 
            {
            
               $data=array();
            $this->form_validation->set_rules('user_id', 'User_id', 'required|trim');
           if($this->form_validation->run() == false){
          $data['code'] = 'HTTP_INVALID';
        $data['message'] = 'parameter missing';
        }
        else
        {
        // $userdata = $this->api_model->manage_activity();
   
     $user_id=$_POST['user_id'];
                    $insert_data=array();
                  $post = (isset($_POST['gallery']))?json_decode($_POST['gallery']):array();
                            //     $c='[{"id":"","achievement_name":"new ths"},{"id":"","achievement_name":"tst tjis"}]';
                            
//$c='[{"id":"","gallery_image":"/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAAAAIQAABtbnRyUkdC\nIFhZWiAAAAAAAAAAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAA\nAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlk\nZXNjAAAA8AAAAHRyWFlaAAABZAAAABRnWFlaAAABeAAAABRiWFlaAAABjAAAABRyVFJDAAABoAAA\nAChnVFJDAAABoAAAAChiVFJDAAABoAAAACh3dHB0AAAByAAAABRjcHJ0AAAB3AAAADxtbHVjAAAA\nAAAAAAEAAAAMZW5VUwAAAFgAAAAcAHMAUgBHAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAA\nAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z3Bh\ncmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABYWVogAAAAAAAA9tYAAQAAAADT\nLW1sdWMAAAAAAAAAAQAAAAxlblVTAAAAIAAAABwARwBvAG8AZwBsAGUAIABJAG4AYwAuACAAMgAw\nADEANv/bAEMAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAf/bAEMBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIBDgEOAMBIgACEQEDEQH/xAAfAAAABQUB\nAQAAAAAAAAAAAAAAAwQICQIFBgcKAQv/xACWEAAABAMDBggJBgYIDQoNASkBBAUGAgMHABEhCBIU\nFTFBE1FhcYGRofAJFiIjJCWxwdEyMzQ14fEXQkRFUlQKJkNTVWJkdBgZNlZjZXOChJSWotcnWHJ1\nhZKTmKTWGjc4Rld3g5WXo6WytLbiKDlHZmd2tbfCxNJ4hoeIp7jH1Eizw8Xk8iloptPY4+X0KqjG\nyNXz9f/EAB4BAAAHAQEBAQAAAAAAAAAAAAADBAUGBwgCCQEK/8QAcBEAAQIEAwUEBgUECgwJCQAT\nAQQRAgMFIQAGMQcSQVFhExRxgQgikaHB8BUksdHhFiMyNBcYJTNCRFVWYvEJJjdFUlRkcnWSlJU1\nNjhDV2N2lrInRlNldIKiwtIZhKTU4ihHd5OltNOFo7W2ZoOz/9oADAMBAAIRAxEAPwDlnsLCwtjf\nH6UMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwM\nCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsL\nCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMCwsLCwwMGQgI50YxXXdY9g9X\nwsXzbO91qxHyIQ3CI39A4c4Y8Q2czkhZK1UMtXKJpxk0UilEoHZUZQOwz1lWA1LRGq2UdNNuF0uh\neNQw3gSQEVLNXEsI1ZUiIIySIKqmnDErSpZy1TISppJiUKYhDAAOdrcdBq56HDPmCt0vLdFqVZrK\ngJKXSKfFUahUIiABDDckv0ch7dWZ2xRR5uMUWIcWA44YB7eYbOQQMjvK+dqaVWGtknZSzqRzkrhS\niq3KG1PWkufIvxEsdJNXQYhxG+HODk2W+nF4PPwbNAPB10dlU4pUkxrjpWZxRSqVU9wlChl2v9xA\nnFCRk4aMRCMKM3CQFwhSGknRQpaPDpkQQKCyoqysqSHyisiEBAZEoBuC/wAiG4MQxDC7DHZjfxXg\nFrbQbLoJiYTFy+IKTu+rBDaF9228SDxAdtXazHHnTmn0+J0iqKEuUcmy1NMSTDBBUKnUSIqhCCIe\n07jCiPdN7WEQzDEQxiMJ9UfIr/oEMuX/AFlmVp/xc6xf8yrD+gQy5f8AWWZWn/FzrF/zKt9d3R5H\n73B/wcPL/F5O94WGjSP3uD/eQ/8AwvJ3vCy39i6lf4/URp/zcDfwefD1ffiM/t+84fzJy9/ty7p/\nR6/Nn+RF/QIZcv8ArLMrT/i51i/5lWH9Ahly/wCssytP+LnWL/mVb67mjSv3uX/wcPw5+44DRpX7\n3K/3kPw5+44dfsXU/wDlaocP4I6fj4seeB+37zh/MnL3+3run9H5bwf5Ef8AQIZcv+ssytP+LnWL\n/mVYf0CGXL/rLMrT/i51i/5lW+u9wEr9CD/ew/8AwvP3HAcBK/Qg/wB7D/8AC8/ccB+xfT/5VqH+\nqOnX58zjr9v7nT+ZGXv9uXf/AEePybfIh/oEMuX/AFlmVp/xc6xf8yrD+gQy5f8AWWZWn/FzrF/z\nKt9dzRpX73K/3kPw5+44DRpX73K/3kPw5+44D9i6n/ytUOH8EdPx8WPPHP7fvOH8ycu/7eu/+n5Y\n9H+RH/QIZcn+ssytf+LpWL/mVz9wxH9Ahlx/6y7Ky/4ulYv+ZPP3DH67mjSv3uV/vIfhz9xwGjSv\n3uV/vIfhz9xw5GyxACP3XX8P+bh6fj7OuB+38zf/ADJy9/t67p/QPX2eD/Ij/oEMuP8A1l+Vl/xd\nKx/8yrD+gQy5f9ZZlaf8XOsX/Mq313NGlfvcr/eQ/Dn7jgNGlfvcr/eQ/Dn7jh0Nl1P/AJWqHD+C\nOn4+w88D9v5m/wDmTl7/AG9d0/oePzr8iP8AoEMuX/WWZWn/ABc6xf8AMqw/oEMuX/WWZWn/ABc6\nxf8AMq313NGlfvcr/eQ/Dn7jgNGlfvcr/eQ/Dn7jgP2Lqf8AytUOH8EdPx8WPPA/b95w/mTl7/b1\n3T+j8t4P8iP+gQy5f9ZZlaf8XOsX/Mqw/oEMuX/WWZWn/FzrF/zKt9d7gJX6EH+9h/8AhefuOA4C\nV+hB/vYf/hefuOA/Yvp/8q1D/VHTr8+Zx1+39zp/MjL3+3Lv/o8fk2+RD/QIZcv+ssytP+LnWL/m\nVYf0CGXL/rLMrT/i51i/5lW+u7o0n96g/wB5B8O93NeNHk/vUP8AvIOTk73c1/H7F1P/AJSX/wCr\nB069Bjn9v3nD+ZOXv9vXdP6Py3g/yIv6BDLl/wBZZlaf8XOsX/MqyM/kQ5ayUVnn1TI9ypksgXlj\nONnD+T7VkkSkhxmjRxrAAYdo3W+vVo8n97h/3kP/AMLyB1WKiLyc35qXEO35EIX7eTk27LuS30bL\nqU1l9QfrLhZ2AHEchfH0en3nAmEzckZeLN/H10JIBBLHsyBxGh8OGPi+RRxxCEuMI4OD/Em4DyY4\nBv39Fw2AXxXQw4X37R2jtxHmC310srvI0oLlu0eV6K19Yye6mofnylRJNwRCRcDScpQsdLJ7mai+\nUzT6OuEYDhsjHHBMEgopR0+jK8pTRlRWSzvzPvCceDwqF4NjKTM0ZdKtMdrKcqJE86R1DEpwEh3M\noVI0kgVVIs0E8o928cLQkXShp14BDGnLIQwJbjSwCFZnyMtoMrvMmf3tI/rEgiKCwYxB2IvcglrO\nQ4fUGw30qcv7X6gKDUacMtZoJPZoSuC2XUkUIchCsKRGRHBYxS4oYYm3jAZkMMUUMdmywsLC0Bxr\nPw04Pr54FhYWFhgYFhYWFhgYFhYWFhgYFhYWFhgYFhYWFhgYFhYWFhgYFhYWFhgYFhYWFhgYFhYW\nFhgYFhYWFhgYVSykc2Xn/ibOnk5+TG+3sZWZDfffFdsG/wBuGHL7tljikzDM"}]';                          
                            
                          //   $post=json_decode($c);
                            
                            

 
            $remove_ids = (isset($_POST['remove_id']))?json_decode($_POST['remove_id']):array();
        //   $a=array();
        //              $remove_ids =json_decode($a);
          if(!empty($post))
          {
             
                foreach($post as $post_data)
                {

                    $check_id =isset($post_data->id)?$post_data->id:'';
              
                  
                   
                    if($check_id == null || $check_id == " " )
                    {
                
                $insert_data['user_id']=$user_id;
                   $insert_data['status']=1;
        //   if(isset($_POST['image'])){
            $files =$post_data->gallery_image;
            $upload_path = 'assets/gallery_image/';
            $insert_data['image'] =  $this->AM->set_upload_files($upload_path ,$files,'png');
        //}
                 $x= $this->db->insert('tbl_playergallery', $insert_data);
                        if($x)
                        {
                       $data['code'] = 'HTTP_OK';
                        $data['message']='Gallery image added successfully.';   
                        }
                        else
                        {
                     $data['code'] = 'HTTP_INVALID';
                        $data['message']='Unable to add gallery image ';
                        }  

                }
                    else
                    {
                        $files =$post_data->gallery_image;
            $upload_path = 'assets/gallery_image/';
            $insert_data['image'] =  $this->AM->set_upload_files($upload_path ,$files,'png');
                                    // $insert_data = array(
                                    // 'title' => $post_data->achievement_name,
                                    // );
                               $x=  $this->db->where('user_id',$user_id)->where('id',$post_data->id)->update('tbl_playergallery', $insert_data);
                            if($x)
                            {
                           $data['code'] = 'HTTP_OK';
                            $data['message']='Gallery image updated successfully.';   
                            }
                            else
                            {
                          $data['code'] = 'HTTP_INVALID';
                            $data['message']='Unable to Update gallery image ';
                            }  

                    }
                 
                } 
            
          }
          
              if(!empty($remove_ids))
                {
                $insert_data3['status'] =2; 
                $x=  $this->db->where_in('id',$remove_ids)->update('tbl_playergallery', $insert_data3);
                if($x)
                            {
                            $data['code'] = 'HTTP_OK';
                            $data['message']='Gallery image deleted successfully.';   
                            }
                            else
                            {
                            $data['code'] = 'HTTP_INVALID';
                            $data['message']='Unable to delete gallery image';
                            }  

                }
      }
            
            
            
            
            
            $this->response($data, REST_Controller::HTTP_OK);
            
            }

 public function get_check_Email_post()
            {   
                 $data = array();
                 $email=$this->input->post('email'); 
                 $type=$this->input->post('type');
    $this->db->select('tbl_users.id,tbl_users.name,tbl_users.username,tbl_users.mobile,tbl_users.email,tbl_users.game_category,tbl_users.experience,tbl_users.district,tbl_district.name as district_name,tbl_users.description,tbl_users.amount,tbl_users.image,tbl_users.status,tbl_users.city, tbl_city.name as city_name,tbl_users.state, tbl_state.name as state_name,
    tbl_users.pincode,tbl_pincode.name as pincode_name,tbl_users.password,
    tb_gamecategory.title as game_category,tbl_users.is_block,tbl_users.game_category as game_category_id,tbl_users.type');
    $this->db->join('tb_gamecategory',' tb_gamecategory.id=tbl_users.game_category','left');
    $this->db->join('tbl_city','tbl_city.id=tbl_users.city','left');
    $this->db->join('tbl_state',' tbl_state.id=tbl_users.state','left');
    $this->db->join('tbl_district',' tbl_district.id=tbl_users.district','left');
    $this->db->join('tbl_pincode',' tbl_pincode.id=tbl_users.pincode','left');
    $q1= $this->db->where('tbl_users.status in(0,1)')->where('tbl_users.type',$type)->group_start()->where('tbl_users.mobile',$email)->or_where('tbl_users.email',$email)->group_end()->get('tbl_users');
   // echo $this->db->last_query();die();
                 $result = $q1->row();
                 
                 $result_no = $q1->num_rows();
                 if( $result_no>0 && !empty($result))
                 {
                    
                        
                        $data['code'] = 'HTTP_OK';
                         $data['message'] = "Email already register";
                          $data['data'] = $result;
                         
                     
                 }
                 else
                 {
              
                        
                        $data['code'] = 'HTTP_INVALID';
                         $data['message'] = "Email not found";
                         $data['data'] = array();
                     }
                      
                     
             $this->response($data, REST_Controller::HTTP_OK);
            } 
            public function send_request_to_join_team_post()
            {   
            $data = array();
            $result = $this->AM->send_request_to_join_team();
            if($result)
            {
            $data['message'] = "Request sent successfully!";
            $data['code'] = 'HTTP_OK';
            
            }
            else
            {
            $data['message'] = "Unable to sent request!";
            $data['code'] = 'HTTP_NOT_FOUND';
            }
            $this->response($data, REST_Controller::HTTP_OK);
            }
              public function accept_reject_player_post()
            {   
            $data = array();
            $result = $this->AM->accept_reject_player();
            if($result)
            {
            $data['message'] = "Status changed successsfully!";
            $data['code'] = 'HTTP_OK';
            
            }
            else
            {
            $data['message'] = "Unable to change status!";
            $data['code'] = 'HTTP_NOT_FOUND';
            }
            
            $this->response($data, REST_Controller::HTTP_OK);
            
            }
            
}