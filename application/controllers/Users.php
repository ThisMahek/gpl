<?php
class Users extends My_Controller
{

           public function __construct()
                	{
        		parent::__construct();
        	    $this->load->model('AdminModel/Usermodel','UM');	
        	    $this->load->model('AdminModel/Tournamentmodel','TM');	
        	    $this->load->model('AdminModel/Adminmodel','AM');	
                		if($this->session->userdata('id') != true)
                        {
                          redirect('adminlogin/login');
                        }
                    }
                public function add_users()
                        {
                            if(isset($_POST['submit']))
                            {
                                $post= $this->input->post();
                                $table = "tbl_users";
                                $array['type'] = $post['type'];
                                $array['name'] = $post['name'];
                                 $array['username'] = $post['username'];
                                $array['email'] = $post['email'];
                                $array['password'] = base64_encode($post['password']);
                                $array['game_category'] = $post['game_category'];
                                $array['mobile'] = $post['phone'];
                                $array['state'] = $post['state'];
                                $array['district'] = $post['district'];
                                $array['city'] = $post['city'];
                                $array['pincode'] = $post['pincode']?$post['pincode']:'';
                                $status = $this->input->post('status');
                                $array['status']=  $status=='on'?'1':'0';
                                 {
                               $file=$_FILES["image"];
        			                $MyFileName="";
            		         if(strlen($file['name'])>0)
            			       {
            				$image = $file["name"];
            				$config['upload_path'] = './uploads/';
            			    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['file_name']=$image;
            				$this->load->library("upload",$config);
            				$filestatus=$this->upload->do_upload('image');
                    				if($filestatus==true) 
                    				  {
                    					 $MyFileName=$this->upload->data('file_name');
                    					 $array['image']= "/uploads/".$MyFileName;
                    				  }
                    				  else
                    				  {
                    					 $error = array('error' => $this->upload->display_errors());
                    					 $result=$error;
                    				  }
            			      }
            		
                            $x=$this->addtables($table,$array);
                            if($x)
                            {
                            $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">Users added successfully</div>');
                            redirect(base_url()."admin/manage_user");
                            }
                            else
                            {
                            $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to add users </div>');
                            redirect(base_url()."admin/manage_user");
                            }
                            redirect("admin/manage_user");        
                    }
                
                        }else{
                            redirect('admin/manage_user');
                        }
                        }
     
            public function  update_users_status()
                     { 
                  $tab =  'tbl_users';
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
                          redirect(base_url()."admin/manage_user");
}


            public function delete_user($id)

               {
            $tab = 'tbl_users';
            $res=$this->deleteTable($id,$tab); 
            if($res==1)
                    {
                        $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">User deleted successfully</div>');
                    }
            else 
                    {
                        $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to delete user</div>');
                    }
                    redirect(base_url()."admin/manage_user");
                } 
            

                public function update_users()
                            {
                              if(isset($_POST["update"]))
                                { 
                                        $tab=  'tbl_users';
                                        $id = $this->input->post("id");
                                        $post = $this->input->post();
                                        $array['name']=$this->input->post("name");
                                           $array['username']=$this->input->post("username");
                                        $array['type']= $this->input->post("type");
                                        
                                          $array['game_category'] = $post['game_category'];
                                            $array['state'] = $post['state'];
                                              $array['district'] = $post['district'];
                                            $array['city'] = $post['city'];
                                            $array['pincode'] = $post['pincode'];
                                	
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
                                                           $image_path = ("uploads/".$data['file_name']);
                                                           $array['image']= $image_path;    
                                                       }
                                                       
                                            }
                                         
                                                         $x =$this->UpdateTable($id,$tab,$array); 
                                                            if($x)
                                                                    {
                                                                    $this->session->set_flashdata('success','<div class="alert alert-success text-center" id="successMessage">User updated successfully</div>');
                                                                       redirect(base_url()."admin/manage_user");

                                                                    }
                                                              else
                                                                    {
                                                                    $this->session->set_flashdata('error','<div class="alert alert-danger text-center" id="successMessage">Unable to update users</div>');
                                                                      redirect(base_url()."admin/manage_user");

                                                                    }
                           
                                }else{
                                    redirect('admin/manage_user');
                                }
                                           //   print_R();
                                            //   echo "<pre>"; print_r($array);exit;
                            
     }






                public function sign_up()
                        {
                        
                            $otp = ozekiOTP(6);
                            //this function is helper function which is declared into the helper libarary
                            $phone = $this->input->post('phone');
                            $email = $this->input->post('email');
                                if(!empty($email))
                                {
                                    $sql = $this->UM->check_number($phone);
                                    $sql_email  =  $this->UM->check_email($email);
                                    if ($sql->num_rows() > 0) {
                                        echo json_encode(array("success" => false, "pmessage" => "Mobile number already registered",'type'=>'phone'));
                                    }
                                 else  if($sql_email->num_rows() > 0) 
                                    {
                                     echo json_encode(array("success" => false, "emessage" => "Email ID already registered",'type'=>'phone'));    
                                    }
                                 
                                }
                              
                        }




                public function fetch_state_city_district_pincode()
    {
      
        $state_id = isset($_GET['state']) ? $_GET['state'] : 0;
        $city_id = isset($_GET['city']) ? $_GET['city'] : 0;
        $district_id = isset($_GET['district'])?$_GET['district']:0;
        // $pincode = isset($_GET['pincode'])?$_GET['pincode']:0;

        // $tournament_data = $this->TM->selectdata($table, $status);
          
      /*   echo "<pre>";
         print_r('play_status'.$play_status);
         exit;  */
     
        $collectCity = [];
        $collectDistrict = [];
        //   $collectPincode = [];
       
      if(isset($state_id)  && ($state_id != 0) && ($city_id == 0) && ($district_id == 0))
        {
            $district_data = $this->db->get_where('tbl_district', ['state_id' => $state_id])->result_array();
            if (!empty($district_data) ) {
                $collectDistrict[] = '<option value="">select district</option>';
                 $collectCity[] = '<option value="">select district first</option>';
                  $collectPincode[] = '<option value="">select city first</option>';
                foreach ($district_data as $row)
                    {
                        $collectDistrict[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                echo json_encode(['district_list' => $collectDistrict,'city_list'=>$collectCity,'demo'=>'1']);
                   }
            else {
                $collectDistrict[] = '<option>select state first</option>';
            }
        }
        
        
        
        else if(isset($state_id)  && ($state_id != 0) && ($district_id != 0) && isset($district_id) &&($city_id==0))
        {
                $district_data = $this->db->get_where('tbl_district', ['state_id' => $state_id])->result_array();
                $city_data = $this->db->get_where('tbl_city', ['district_id' => $district_id])->result_array();
            if (!empty($district_data)  && !empty($city_data)) {
                $collectDistrict[] = '<option value="">select district</option>';
                foreach ($district_data as $row)
                            {
                                $collectDistrict[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                        $collectCity[] = '<option value="">select city</option>'; 
                         foreach ($city_data as $row)
                            {
                                $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                              $collectPincode[] = '<option value="">select city first</option>';
                      echo json_encode(['district_list' => $collectDistrict,'city_list'=>$collectCity,'demo'=>'2']);
                   }
               
            else {
                $collectDistrict[] = '<option>select district first</option>';
            }
        }
        
        
        
           else if(isset($state_id)  && ($state_id != 0) && ($district_id != 0) && isset($district_id)  && isset($city_id) && ($city_id != 0 ))
        {
            // $tournament_data_statewise = $this->TM->select_tournament_statewise($state_id);  
                $district_data = $this->db->get_where('tbl_district', ['state_id' => $state_id])->result_array();
                $city_data = $this->db->get_where('tbl_city', ['district_id' => $district_id])->result_array();
                // $pincode_data = $this->db->get_where('tbl_pincode', ['city_id' => $city_id])->result_array();
             
         
            if (!empty($district_data)  && !empty($city_data)  ) {
                $collectDistrict[] = '<option value="">select district</option>';
                foreach ($district_data as $row)
                            {
                                $collectDistrict[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                        $collectCity[] = '<option value="">select city</option>'; 
                         foreach ($city_data as $row)
                            {
                                $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            
                      
                      echo json_encode(['district_list' => $collectDistrict,'city_list'=>$collectCity, 'demo'=>'3']);
                   }
               
            else {
                $collectDistrict[] = '<option>select state first</option>';
                $collectCity[] = '<option>select city first</option>';
            }
        }
        
        
        
             else if(isset($state_id)  && ($state_id != 0) && ($district_id != 0) && isset($district_id)  && isset($city_id) && ($city_id != 0 ))
        {
            // $tournament_data_statewise = $this->TM->select_tournament_statewise($state_id);  
                $district_data = $this->db->get_where('tbl_district', ['state_id' => $state_id])->result_array();
                $city_data = $this->db->get_where('tbl_city', ['district_id' => $district_id])->result_array();
           
         
            if (!empty($district_data)  && !empty($city_data)) {
                $collectDistrict[] = '<option value="">select district</option>';
                foreach ($district_data as $row)
                            {
                                $collectDistrict[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                        $collectCity[] = '<option value="">select city</option>'; 
                         foreach ($city_data as $row)
                            {
                                $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                      echo json_encode(['district_list' => $collectDistrict,'city_list'=>$collectCity,'demo'=>'2']);
                   }
               
            else {
                $collectDistrict[] = '<option>select state first</option>';
            }
        }
        
        // else if(isset($state_id) && ($state_id != 0)  && isset($city_id)  && ($city_id != 0 && ($play_status==0) && ($sport_id == 0)))
        // {
        //     $tournament_data_state_city_wise = $this->TM->select_tournament_state_and_city_wise($state_id,$city_id);
        //     $collectCity = [];
        //     if (!empty($city_data) ) {
        //         $collectCity[] = '<option value="">select city</option>';
        //       foreach ($city_data as $row) {
        //             $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
        //         }  
        //     echo json_encode(['city_list' => [], 'tournament_statewise_list' => $tournament_data_state_city_wise,'demo'=>'4' ]);  
        //     }
        //     else {
        //         $collectCity[] = '<option>select state first</option>';
        //          }
        // }
        // else if(($sport_id == 0) && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0) && isset($play_status) && ($play_status != 0)){

        //      $select_tournament_state_city_play_status_wise = $this->TM->select_tournament_state_city_play_status_wise($state_id,$city_id,$play_status); 
        //     $collectCity = [];
        //     if (!empty($city_data) ) 
        //     {
        //     $collectCity[] = '<option value="">select city</option>';
        //         foreach ($city_data as $row) {
        //             $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
        //         } 
        //     echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_play_status_wise,'demo'=>'5']); 
            
        //     } 
        //     else {
        //         $collectCity[] = '<option>select state first</option>';
        //          }
        // }   
    //     else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0) && isset($play_status) && ($play_status != 0)){
            
    //         $select_tournament_state_city_play_status_sport_wise = $this->TM->tournament_data_state_city_playstatus_sport_wise($sport_id,$state_id,$city_id,$play_status); 

    //       $collectCity = [];
    //       if (!empty($city_data) ) 
    //       {
    //       $collectCity[] = '<option value="">select city</option>';
    //           foreach ($city_data as $row) {
    //               $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
    //           } 
    //       echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_play_status_sport_wise,'demo'=>'6' ]);  
    //       } 
    //       else {
    //           $collectCity[] = '<option>select state first</option>';
    //             }
    //   }   
       
//      else if(isset($sport_id)  && ($sport_id != 0) && isset($play_status) && ($play_status != 0)  && ($state_id == 0) &&  ($city_id == 0) ){
            
//     $select_tournament_play_status_sport_wise = $this->TM->tournament_playstatus_sport_wise($sport_id,$play_status); 

//       $collectCity = [];
//       if (empty($city_data) ) 
//       {
//       $collectCity[] = '<option value="">select state first</option>';
//           /*  foreach ($city_data as $row) {
//               $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
//           }  */
//       echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_play_status_sport_wise,'demo'=>'7' ]);  
//       } 
//       else {
//           $collectCity[] = '<option>select state first</option>';
//             } 
        
//   }  
//   else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)  && ($play_status == 0))
//   {
            
//     $select_tournament_state_city_sport_wise = $this->TM->tournament_data_stat_city_sport_wise($sport_id,$state_id,$city_id); 

//   $collectCity = [];
//   if (!empty($city_data) ) 
//   {
//   $collectCity[] = '<option value="">select city</option>';
//       foreach ($city_data as $row) {
//           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
//       } 
//   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_sport_wise,'demo'=>'8' ]);  
//   } 
//   else {
//       $collectCity[] = '<option>select state first</option>';
//         }
// }  

// else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) &&  ($city_id == 0)  &&  ($play_status != 0)){
            
//     $select_tournament_state_sport_playstatus_wise = $this->TM->select_tournament_state_sport_playstatus_wise($sport_id,$state_id,$play_status); 

//   $collectCity = [];
//   if (!empty($city_data) ) 
//   {
//   $collectCity[] = '<option value="">select city</option>';
//       foreach ($city_data as $row) {
//           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
//       } 
//   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_sport_playstatus_wise,'demo'=>'9' ]);  
//   } 
//   else {
//       $collectCity[] = '<option>select state first</option>';
//         }
// }  

// else if(($sport_id != 0) && isset($sport_id) && isset($state_id) && ($state_id != 0) &&  ($city_id == 0) && ($play_status == 0)){

//     $select_tournament_state_sport_wise = $this->TM->select_tournament_state_sport_wise($sport_id,$state_id); 
//   $collectCity = [];
//   if(!empty($city_data)) 
//   {
//   $collectCity[] = '<option value="">select city</option>';
//       foreach ($city_data as $row) {
//           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
//       } 
//   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_sport_wise,'demo'=>'10']); 
   
//   } 
//   else {
//       $collectCity[] = '<option>select state first</option>';
//         }
//     }

    // else if(($sport_id == 0)  && isset($state_id) && ($state_id != 0) &&  ($city_id == 0) && ($play_status != 0) && isset($play_status)){

    //     $select_tournament_state_playstatus_wise = $this->TM->select_tournament_state_playstatus_wise($state_id,$play_status); 
    //   $collectCity = [];
    //   if(!empty($city_data)) 
    //   {
    //   $collectCity[] = '<option value="">select city</option>';
    //       foreach ($city_data as $row) {
    //           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
    //       } 
    //   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_playstatus_wise,'demo'=>'11']); 
       
    //   } 
    //   else {
    //       $collectCity[] = '<option>select state first</option>';
    //         }
    //     }
        else{
            $collectCity[] = '<option>select district first</option>';
             $collectDistrict[] = '<option>select state first</option>';
         
            echo json_encode(['district_list'=>$collectDistrict,'city_list' =>$collectCity,'demo'=>'else']);      
        }
    }






       public function check_email()
                        {
                          
                                $table = "tbl_users";
                                $email  = $this->input->post('email');
                                $check_email = $this->db->get_where($table,['email'=>$email,'status'=>1])->row_array();
                                if(!empty($check_email))
                                {
                                //   echo "<script>
                                //   alert('email ID already exists');
                                //   window.location = '" . base_url("admin/manage_user") . "';
                                //   </script>";
                                 echo json_encode(array("success" => false, "emessage" => "Email ID already exists"));
                                   
                                }
              
                        }
                        
                        
                        
                        
                        
                        
                        
                         public function check_phone()
                        {
                          
                                $table = "tbl_users";
                                $mobile  = $this->input->post('phone');
                                $check_phone = $this->db->get_where($table,['mobile'=>$mobile,'status'=>1])->row_array();
                               
                                if(!empty($check_phone))
                                {
                               
                                 echo json_encode(array("success" => false, "emessage" => "Phone number already exists"));
                                   
                                }
              
                        }

      
                    public function fetch_users_filter()
                          {
        $table = "tbl_users";
        $status = 2;
        $state_id = isset($_GET['state']) ? $_GET['state'] : 0;
        $city_id = isset($_GET['city']) ? $_GET['city'] : 0;
        $game_id = isset($_GET['sports'])?$_GET['sports']:0;
        $type_id = isset($_GET['type'])?$_GET['type']:'';
        $play_status = isset($_GET['now_playing'])?$_GET['now_playing']:0;
        $city_data = $this->db->get_where('tbl_city', ['state_id' => $state_id])->result_array();
        

                 $users_data = $this->AM->selectdata_users($table,$status);
                 $collectCity = [];
                if(isset($state_id) && ($state_id != 0)  && ($city_id == 0) && ($play_status == 0) &&  ($game_id== 0) && ($type_id ==''))
                {
                    $users_data_statewise = $this->AM->user_data_state_wise($state_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_statewise ,'demo'=>'1' ] );  
                }
                
                  elseif(isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)   && ($game_id== 0) && ($type_id == '') && ($play_status==0))
                {
                    $users_data_state_city_wise = $this->AM->users_data_state_city_wise($state_id,$city_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_state_city_wise ,'demo'=>'2' ]);  
                }
                
                 elseif(isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)   && isset($game_id) && ($game_id != 0) && ($type_id == '') && ($play_status==0))
                {
                    $users_data_state_city_game_wise = $this->AM->users_data_state_city_game_wise($state_id,$city_id,$game_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_state_city_game_wise ,'demo'=>'3' ]);  
                }
                
                           elseif(isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)   && isset($game_id) && ($game_id != 0) && ($play_status != 0)  && ($type_id == ''))
                {
                    $users_data_state_city_game_playstatus_wise = $this->AM->users_data_state_city_game_playstatus_wise($state_id,$city_id,$game_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_state_city_game_playstatus_wise ,'demo'=>'4' ]);  
                }
                
                
              elseif(isset($play_status) && ($play_status != 0)&& ($state_id == 0) && ($city_id == 0)   &&  ($game_id == 0)   && ($type_id == ''))
                {
                    $users_data_playstatus_wise = $this->AM->users_data_playstatus_wise($play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_playstatus_wise ,'demo'=>'5' ]);  
                }
                
                 elseif(($game_id != 0) && ($play_status == 0) && ($state_id == 0) && ($city_id == 0) && ($type_id == ''))
                {
                    $users_data_game_wise = $this->AM->users_data_game_wise($game_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_game_wise ,'demo'=>'6' ]);  
                }
                 elseif( isset($type_id) && ($type_id !='') && ($game_id == 0) && ($play_status == 0) && ($state_id == 0) && ($city_id == 0))
                {
                    $users_data_usertype_wise = $this->AM->users_data_usertype_wise($type_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_wise ,'demo'=>'7' ]);  
                }
                
                      elseif( isset($type_id) && ($type_id !='')  && ($play_status != 0) && isset($play_status) && ($game_id == 0) && ($state_id == 0) && ($city_id == 0))
                {
                    $users_data_usertype_playstatus_wise = $this->AM->users_data_usertype_playstatus_wise($type_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_playstatus_wise ,'demo'=>'8' ]);  
                }
                
                
                
                        elseif( isset($type_id) && ($type_id !='')  && ($play_status != 0) && isset($play_status) && ($game_id != 0) && ($state_id == 0) && ($city_id == 0))
                {
                    $users_data_usertype_playstatus_game_wise = $this->AM->users_data_usertype_playstatus_game_wise($type_id,$game_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_playstatus_game_wise,'demo'=>'9' ]);  
                }
                
                  elseif( isset($type_id) && ($type_id !='')    && ($game_id != 0)&& ($play_status == 0)   && isset($game_id) && ($state_id == 0) && ($city_id == 0))
                {
                    $users_data_usertype_game_wise = $this->AM->users_data_usertype_game_wise($type_id,$game_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_game_wise,'demo'=>'10' ]);  
                }
                
                
                
                
            elseif( isset($type_id) && ($type_id !='') && ($state_id != 0)  && isset($state_id) && ($game_id == 0)&& ($play_status == 0)  && ($city_id == 0))
                {
                    $users_data_usertype_state_wise = $this->AM->users_data_usertype_state_wise($type_id,$state_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_state_wise,'demo'=>'11' ]);  
                }
                
                
                
                
          elseif( ($state_id != 0)  && isset($state_id) && ($game_id != 0)&& isset($game_id)&& ($play_status == 0) && ($type_id =='')   && ($city_id == 0))
                {
                    $users_data_game_state_wise = $this->AM->users_data_game_state_wise($game_id,$state_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_game_state_wise,'demo'=>'12' ]);  
                }
                
                
          elseif( ($state_id != 0)  && isset($state_id) && ($game_id != 0)&& isset($game_id)&& ($play_status != 0) && isset($play_status) && ($type_id =='')   && ($city_id == 0))
                {
                    $users_data_game_state_playstatus_wise = $this->AM->users_data_game_state_playstatus_wise($game_id,$state_id,$play_status);
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_game_state_playstatus_wise,'demo'=>'13' ]);  
                }
                
                
                                
          elseif( ($state_id != 0)  && isset($state_id) && ($game_id != 0)&& isset($game_id)&& ($play_status != 0) && isset($play_status) && ($type_id !='') && isset($type_id)   && ($city_id != 0) && isset($city_id))
                {
                    $users_data_game_state_city_usertype_playstatus_wise = $this->AM->users_data_game_state_city_usertype_playstatus_wise($game_id,$state_id,$city_id,$play_status,$type_id);
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_game_state_city_usertype_playstatus_wise,'demo'=>'14' ]);  
                }
                
                
                          elseif( ($state_id != 0)  && isset($state_id) && ($game_id != 0)&& isset($game_id)&& ($play_status == 0)  && ($type_id !='') && isset($type_id)   && ($city_id == 0) )
                {
                    $users_data_usertype_state_game_wise = $this->AM->users_data_usertype_state_game_wise($type_id,$state_id,$game_id);
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_state_game_wise,'demo'=>'15' ]);  
                }
                
                
                
                
                
                 elseif(isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)  && isset($game_id) && ($game_id != 0) && isset($type_id) && ($type_id != '') && ($play_status == 0))
                {
                    $users_data_state_city_game_usertype_wise = $this->AM->users_data_state_city_game_usertype_wise($state_id,$city_id,$game_id,$type_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_state_city_game_usertype_wise ,'demo'=>'16' ]);  
                }
                
                
                
                
                   elseif(isset($state_id) && ($state_id != 0)   && isset($game_id) && ($game_id != 0) && isset($type_id) && ($type_id != '') && ($play_status != 0) &&isset($play_status) && ($city_id== 0))
                {
                    $users_data_state_game_usertype_playstatus_wise = $this->AM->users_data_state_game_usertype_playstatus_wise($state_id,$game_id,$type_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_state_game_usertype_playstatus_wise ,'demo'=>'17' ]);  
                }
          
                   elseif(  isset($game_id) && ($game_id != 0) && ($play_status != 0) &&isset($play_status) && ($city_id== 0) && ($state_id == 0) && ($type_id == ''))
                {
                    $users_data_game_playstatus_wise = $this->AM->users_data_game_playstatus_wise($game_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_game_playstatus_wise ,'demo'=>'18' ]);  
                }
                
            elseif(  ($game_id==0) && ($play_status == 0)  && ($city_id!= 0)&& isset($city_id) && ($state_id != 0) && isset($state_id) && ($type_id != '') && isset($type_id))
                {
                    $users_data_usertype_state_city_wise =  $this->AM->users_data_usertype_state_city_wise($type_id,$state_id,$city_id); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_state_city_wise ,'demo'=>'19' ]);  
                }
                
                
                         
            elseif(  ($game_id==0) && ($play_status != 0)  && isset($play_status) && ($city_id!= 0)&& isset($city_id) && ($state_id != 0) && isset($state_id) && ($type_id != '') && isset($type_id))
                {
                    $users_data_usertype_playstatus_state_city_wise =  $this->AM->users_data_usertype_playstatus_state_city_wise($type_id,$state_id,$city_id,$play_status); 
                    $collectCity = [];
                    if (!empty($city_data) ) {
                        $collectCity[] = '<option value="">select city</option>';
                        foreach ($city_data as $row) {
                            $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    else {
                        $collectCity[] = '<option>select state first</option>';
                    }
                    echo json_encode(['city_list'=>$collectCity,'user_list' =>$users_data_usertype_playstatus_state_city_wise ,'demo'=>'20' ]);  
                }
                
                
                
                
                
                //
                
                else{
                     $collectCity[] = '<option>select state first</option>';
                   echo json_encode(['city_list'=>$collectCity,'user_list' => $users_data ,'demo'=>'else' ]);    
                }
                  
                          }








                    public function fetch_model_data()
                    {
                    $uid= $this->input->post('user_id');
                    $user_data = $this->AM->select_user_data($uid);
                    $state_list = $this->TM->get_states();
                    $city_list = $this->AM->get_city_list();
                    $district_list = $this->AM->get_district_list();
                    $game_list = $this->AM->get_gamescat();
                    
                    $state_id=$user_data['state'];
                    $district_id=$user_data['district'];
                    $city_id=$user_data['city'];
                    $type_id=$user_data['type'];
                    $game_id=$user_data['game_category'];
                    $pincode_id=$user_data['pincode']?$user_data['pincode']:'';
                    $collectState = [];
                    $collectDistrict = [];
                    $collectCity = [];
                    $collectType = [];
                   $collectType[] = '<option>select type</option>';
                   $collectType[] = '<option  value="0" '.($type_id== 0?"selected":"1" ).'> Individual player</option>'; 
                   $collectType[] = '<option  value="1" '.($type_id== 1?"selected":"0" ).'>Team</option>';  
                
                
                   
                if(!empty($user_data))
                {
                    $check_stattus = ($user_data['status']=='1')?'checked':'unchecked';
                
                       $collectGame[] = '<option>select game </option>';
                    if(!empty($game_list))
                    {
                        foreach($game_list as $game_row)
                            {
                             $collectGame[] = '<option  value="' . $game_row['id'] . '"   '.($game_row['id']==$game_id?"selected":"" ).'>' . $game_row['title'] . '</option>';   
                            }
                    }
                    
                    
                    
                    $collectState[] = '<option>select state </option>';
                    if(!empty($state_list))
                    {
                        foreach($state_list as $state_row)
                        {
                         $collectState[] = '<option  value="' . $state_row['id'] . '"   '.($state_row['id']==$state_id?"selected":"" ).'>' . $state_row['name'] . '</option>';   
                        }
                    }
          
                       if(!empty($district_list))
                    {
                        foreach($district_list as $district_row)
                        {
                         $collectDistrict[] = '<option  value="' . $district_row['id'] . '" '.($district_row['id']==$district_id?"selected":"" ).'>' . $district_row['name'] . '</option>';   
                        }
                    }
                
                         if(!empty($city_list))
                    {
                        foreach($city_list as $city_row)
                        {
                         $collectCity[] = '<option  value="' . $city_row['id'] . '" '.($city_row['id']==$city_id?"selected":"" ).'>' . $city_row['name'] . '</option>';   
                        }
                    }
                
                   echo json_encode(['user_list'=>$user_data,'state_list'=>$collectState,'district_list'=>$collectDistrict,'city_list'=>$collectCity,'type_list'=>$collectType,'game_list'=>$collectGame  ,'check_status'=>$check_stattus]);
                
                    }
}  }
                  


?>