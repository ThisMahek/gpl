<?php
class Tournaments extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel/Adminmodel', 'AM');
        $this->load->model('AdminModel/Tournamentmodel', 'TM');
        if ($this->session->userdata('id') != true) 
        {
            redirect('adminlogin/login');
        }
    }
    public function create_tournament()
    {
        $table = "tbl_tournament";
        $post = $this->input->post();
        $array['user_id'] = $post['user_id'];
        $array['tournament_title'] = $post['title'];
        $array['sports_category'] = $post['sport_name'];
        $array['state'] = $post['state'];
        $array['city'] = $post['city'];
        $array['fee'] = $post['fee'];
        $array['description'] = $post['description'];
        $status = $this->input->post('status');
        $array['status'] = $status == 'on' ? '1' : '0';
        $config['allowed_types'] = 'pdf|gif|jpeg|png|jpg';
        $config['upload_path'] = './assets/tournament_image/';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image'))
            {
                $data = $this->upload->data();
                $post = $this->input->post();
                $image_path = ("assets/tournament_image/" . $data['file_name']);
                $array['cover_image'] = $image_path;
            }
              $x = $this->addtables($table, $array);
                if ($x) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="successMessage">Tournamnet added successfully</div>');
                        } else {
                        $this->session->set_flashdata('error', '<div class="alert alert-danger text-center" id="successMessage">Unable to add tournament </div>');
                          }
                      redirect("admin/manage_tournament");
    }

    public function update_tournament_status()
    {
        $tab = 'tbl_tournament';
        $id = $_GET['id'];
        $sval = $_GET['status'];

        if ($sval == 1) {
            $status = 0;
        }
        else {
            $status = 1;
        }

        $data = array(
            'status' => $status
        );
        $x = $this->updatestatus($tab, $data, $id);
        if ($x) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="successMessage">Status updated successfully</div>');
        }
        else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center" id="successMessage">Unable to update staus</div>');
        }
        redirect("admin/manage_tournament");
    }
    public function delete_tournament($id)
    {
        $tab = 'tbl_tournament';
        $res = $this->deleteTable($id, $tab);
        if ($res == 1) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="successMessage">Tournament deleted successfully</div>');
        }
        else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center" id="successMessage">Unable to delete Tournament</div>');
        }
        redirect("admin/manage_tournament");
    }



    
public function update_tournament()
    {
        if (isset($_POST["update"])) {
            $tab = 'tbl_tournament';
            $id = $this->input->post("id");
            $post = $this->input->post();
            $array['user_id'] = $post['user_id'];
            $array['tournament_title'] = $post['title'];
            $array['sports_category'] = $post['sport_name'];
            $array['state'] = $post['state'];
            $array['city'] = $post['city'];
            $array['fee'] = $post['fee'];
            $array['description'] = $post['description'];
            $status = $this->input->post('status');
            $array['status'] = $status == 'on' ? '1' : '0';
            $config['encrypt_name'] = true;
            $file = $_FILES["image"];
            $MyFileName = "";
            if (strlen($file['name']) > 0) {
                $image = $file["name"];
                $config['allowed_types'] = 'pdf|gif|jpeg|png|jpg';
                $config['upload_path'] = './assets/tournament_image/';
                $config['encrypt_name'] = true;
                $config['file_name'] = $image;
                $this->load->library("upload", $config);
                if ($this->upload->do_upload('image')) {
                    $data = $this->upload->data();
                    $image_path = ("assets/tournament_image/" . $data['file_name']);
                    $array['cover_image'] = $image_path;
                }

                $x = $this->UpdateTable($id, $tab, $array);
                if ($x) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center" id="successMessage">Tournament updated successfully</div>');
                }
                else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger text-center" id="successMessage">Unable to update Tournament</div>');
                }
            }
        }

        //    echo "<pre>"; print_r($array);exit;
        redirect(base_url() . "admin/manage_tournament");

    }



    public function fetch_filter_data()
    {
        $sport_id = $this->input->post('sport_id');
        echo $sport_id;
    }

    public function fetch_city()
    {
        $table = "tbl_tournament";
        $status = 2;
        $state_id = isset($_GET['state']) ? $_GET['state'] : 0;
        $city_id = isset($_GET['city']) ? $_GET['city'] : 0;
        $sport_id = isset($_GET['sports'])?$_GET['sports']:0;
        $play_status = isset($_GET['now_playing'])?$_GET['now_playing']:0;
        $city_data = $this->db->get_where('tbl_city', ['state_id' => $state_id])->result_array();
        $tournament_data = $this->TM->selectdata($table, $status);
        $collectCity = [];
        if(isset($play_status)  &&($play_status != 0 ) && ($city_id == 0) && ($state_id == 0) && ($sport_id==0))
        {
            $tournament_data_play_wise = $this->TM->tournament_data_play_wise($play_status); 
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
            echo json_encode(['city_list'=>$collectCity,'tournament_statewise_list' =>  $tournament_data_play_wise ,'demo'=>'1' ]);  
        }  
    else  if(isset($sport_id) && ($sport_id != 0 ) && ($city_id == 0) && ($state_id == 0) && ($play_status == 0))
        {
            $tournament_data_sport_wise = $this->TM->tournament_data_sport_wise($sport_id); 
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
            echo json_encode(['tournament_statewise_list' =>  $tournament_data_sport_wise ,'demo'=>'2']);  
        } 
       
       else if(isset($state_id)  && ($state_id != 0) && ($city_id == 0) && ($play_status == 0) &&  ($sport_id==0))
        {
            $tournament_data_statewise = $this->TM->select_tournament_statewise($state_id);  
            $collectCity = [];
            if (!empty($city_data) ) {
                $collectCity[] = '<option value="">select city</option>';
                foreach ($city_data as $row) {
                    $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $tournament_data_statewise ,'demo'=>'3']);
            }
            else {
                $collectCity[] = '<option>select state first</option>';
            }

        }
        else if(isset($state_id) && ($state_id != 0)  && isset($city_id)  && ($city_id != 0) && ($play_status==0) && ($sport_id == 0))
        {
            $tournament_data_state_city_wise = $this->TM->select_tournament_statewise($state_id);  
            // $tournament_data_state_city_wise = $this->AM->users_data_state_city_wise($state_id,$city_id); 
            $collectCity = [];
            if (!empty($city_data) ) {
                $collectCity[] = '<option value="">select city</option>';
               foreach ($city_data as $row) {
                    $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }  
            echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $tournament_data_state_city_wise,'demo'=>'4' ]);  
            }
            else {
                $collectCity[] = '<option>select state first</option>';
                 }
        }
        else if(($sport_id == 0) && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0) && isset($play_status) && ($play_status != 0)){

             $select_tournament_state_city_play_status_wise = $this->TM->select_tournament_state_city_play_status_wise($state_id,$city_id,$play_status); 
            $collectCity = [];
            if (!empty($city_data) ) 
            {
            $collectCity[] = '<option value="">select city</option>';
                foreach ($city_data as $row) {
                    $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
                } 
            echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_play_status_wise,'demo'=>'5']); 
            
            } 
            else {
                $collectCity[] = '<option>select state first</option>';
                 }
        }   else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0) && isset($play_status) && ($play_status != 0)){
            
            $select_tournament_state_city_play_status_sport_wise = $this->TM->tournament_data_state_city_playstatus_sport_wise($sport_id,$state_id,$city_id,$play_status); 

           $collectCity = [];
           if (!empty($city_data) ) 
           {
           $collectCity[] = '<option value="">select city</option>';
               foreach ($city_data as $row) {
                   $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
               } 
           echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_play_status_sport_wise,'demo'=>'6' ]);  
           } 
           else {
               $collectCity[] = '<option>select state first</option>';
                }
       }   
       
     else if(isset($sport_id)  && ($sport_id != 0) && isset($play_status) && ($play_status != 0)  && ($state_id == 0) &&  ($city_id == 0) ){
            
    $select_tournament_play_status_sport_wise = $this->TM->tournament_playstatus_sport_wise($sport_id,$play_status); 

       $collectCity = [];
       if (empty($city_data) ) 
       {
       $collectCity[] = '<option value="">select state first</option>';
          /*  foreach ($city_data as $row) {
               $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
           }  */
       echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_play_status_sport_wise,'demo'=>'7' ]);  
       } 
       else {
           $collectCity[] = '<option>select state first</option>';
            } 
        
   }   else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) && isset($city_id) && ($city_id != 0)  && ($play_status == 0)){
            
    $select_tournament_state_city_sport_wise = $this->TM->tournament_data_stat_city_sport_wise($sport_id,$state_id,$city_id); 

   $collectCity = [];
   if (!empty($city_data) ) 
   {
   $collectCity[] = '<option value="">select city</option>';
       foreach ($city_data as $row) {
           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
       } 
   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_city_sport_wise,'demo'=>'8' ]);  
   } 
   else {
       $collectCity[] = '<option>select state first</option>';
        }
}  

else if(isset($sport_id) &&  ($sport_id !=0)  && isset($state_id) && ($state_id != 0) &&  ($city_id == 0)  &&  ($play_status != 0)){
            
    $select_tournament_state_sport_playstatus_wise = $this->TM->select_tournament_state_sport_playstatus_wise($sport_id,$state_id,$play_status); 

   $collectCity = [];
   if (!empty($city_data) ) 
   {
   $collectCity[] = '<option value="">select city</option>';
       foreach ($city_data as $row) {
           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
       } 
   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_sport_playstatus_wise,'demo'=>'9' ]);  
   } 
   else {
       $collectCity[] = '<option>select state first</option>';
        }
}  

else if(($sport_id != 0) && isset($sport_id) && isset($state_id) && ($state_id != 0) &&  ($city_id == 0) && ($play_status == 0)){

    $select_tournament_state_sport_wise = $this->TM->select_tournament_state_sport_wise($sport_id,$state_id); 
   $collectCity = [];
   if(!empty($city_data)) 
   {
   $collectCity[] = '<option value="">select city</option>';
       foreach ($city_data as $row) {
           $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
       } 
   echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_sport_wise,'demo'=>'10']); 
   
   } 
   else {
       $collectCity[] = '<option>select state first</option>';
        }
    }

    else if(($sport_id == 0)  && isset($state_id) && ($state_id != 0) &&  ($city_id == 0) && ($play_status != 0) && isset($play_status)){

        $select_tournament_state_playstatus_wise = $this->TM->select_tournament_state_playstatus_wise($state_id,$play_status); 
       $collectCity = [];
       if(!empty($city_data)) 
       {
       $collectCity[] = '<option value="">select city</option>';
           foreach ($city_data as $row) {
               $collectCity[] = '<option  value="' . $row['id'] . '">' . $row['name'] . '</option>';
           } 
       echo json_encode(['city_list' => $collectCity, 'tournament_statewise_list' => $select_tournament_state_playstatus_wise,'demo'=>'11']); 
       
       } 
       else {
           $collectCity[] = '<option>select state first</option>';
            }
        }
        else{
            $collectCity[] = '<option>select state first</option>';
            echo json_encode(['city_list' =>$collectCity,'tournament_statewise_list'=>$tournament_data,'demo'=>'else']);      
        }
    }

}




?>