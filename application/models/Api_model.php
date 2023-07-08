<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

public function get_tournamentdata()
{
     $page=$this->input->post("page");
           $page_limit = 2;
        $limit = "";
    $userId = $this->input->post('user_id');
    $sports_category = json_decode($this->input->post('sports_category'));
    $state = json_decode($this->input->post('state'));
    $city = json_decode($this->input->post('city'));
    $status = json_decode($this->input->post('status'));
    $search_name = $this->input->post('search_name');
    
    $select=$this->db->select("tb_gamecategory.title as sports_category , tbl_tournament.tournament_title, tbl_tournament.fee, tbl_tournament.description, tbl_tournament.status, tbl_tournament.cover_image as image,tbl_tournament.id as tournament_id,tbl_tournament.city as city_id,tbl_city.name as city,tbl_tournament.state as state_id,tbl_state.name as state ");
    $this->db->join('tb_gamecategory','tb_gamecategory.id=tbl_tournament.sports_category','left');
    $this->db->join('tbl_city','tbl_city.id=tbl_tournament.city','left');
    $this->db->join('tbl_state',' tbl_state.id=tbl_tournament.state','left');
    if($userId)
    {
        $this->db->where('tbl_tournament.user_id', $userId);
    }
    if($sports_category)
    {
        $this->db->where_in('tbl_tournament.sports_category', $sports_category);
    }
    if($state)
    {
        $this->db->where_in('tbl_tournament.state', $state);
    }
    if($city)
    {
        $this->db->where_in('tbl_tournament.city', $city);
    }
    
 if($status!='')
    {
      $this->db->where_in('tbl_tournament.status', $status);
    }
    if(!empty($search_name))
    {

      $this->db->like('tbl_tournament.tournament_title', $search_name);
    }
     if($page != ""){
            $limit .= (($page - 1) * $page_limit).",".$page_limit." ";
            $this->db->limit($page_limit,$limit);
        }
$q1= $this->db->where('tbl_tournament.status!=',2)->order_by('tbl_tournament.id','DESC')->get('tbl_tournament')->result();
//$q1= $this->db->where('tbl_tournament.status!=',2)->limit($page_limit,$limit)->get('tbl_tournament')->result();
// return $q1;
    return ['num_row'=>$this->db->where('tbl_tournament.status!=',2)->order_by('tbl_tournament.id','DESC')->get('tbl_tournament')->num_rows()/$page_limit,
     'result'=> $q1,
     'current_page'=>$page,
     
     ];
     
   
  
}

public function get_teamdata()
{
    $page=$this->input->post("page");
    $page_limit = 2;
    $limit = "";
    $type=$this->input->post('type');
    $userId = $this->input->post('user_id');
    $game_category = json_decode($this->input->post('game_category'));
    $state = json_decode($this->input->post('state'));
    $city = json_decode($this->input->post('city'));
    $status = json_decode($this->input->post('status'));
    $request_status = json_decode($this->input->post('request_status'));
    $search_name=$this->input->post('search_name');
     $player_id = $this->input->post('player_id');
    $query = $this->db->select('tb_gamecategory.title as game_category ,tbl_users.name as team_name,tbl_users.image,tbl_users.id as team_id,tbl_users.username,tbl_users.email,tbl_users.mobile,tbl_users.status,tbl_users.team_mobile_status,ifnull(join_player.status,"") as request_status,ifnull(DATE_FORMAT(join_player.updated_at,"%H:%i %p | %d-%m-%y "),"") as date')
    ->join('tb_gamecategory','tb_gamecategory.id=tbl_users.game_category','left')
    ->join('join_player','join_player.team_id=tbl_users.id','left');
    
    if($userId)
    {
        $this->db->where('tbl_users.id',$userId);
    }
    if($game_category)
    {
        $this->db->where_in('tbl_users.game_category',$game_category);
    }
    if($state)
    {
        $this->db->where_in('tbl_users.state',$state);
    }
    if($city)
    {
        $this->db->where_in('tbl_users.city',$city);
    }
    if($status!='')
    {
        $this->db->where_in('tbl_users.status',$status);
    }
    if($request_status!='')
    {
    $this->db->where_in('join_player.status',$request_status);
    }
    if($type=='history' && $player_id!="")
    {
    $this->db->where('join_player.player_id',$player_id);
    $this->db->order_by('join_player.id','DESC');
    }
    if(!empty($search_name))
    {
      $this->db->like('tbl_users.name', $search_name);
    }
    if($page != ""){
    $limit .= (($page - 1) * $page_limit).",".$page_limit." ";
    $this->db->limit($page_limit,$limit);
    }
   $team_data=$this->db->where(['tbl_users.status!='=>2,'type'=>1])->order_by('tbl_users.id','DESC')->group_by('tbl_users.id')->get('tbl_users');
  // echo $this->db->last_query();die();
   $q1= $team_data->result();
   if($type!="" && $player_id!="")
    {
    return ['num_row'=>$this->db->join('tbl_users','tbl_users.id=join_player.team_id','left')->where(['join_player.status!='=>3,'join_player.player_id'=>$player_id])->group_by('tbl_users.id')->get('join_player')->num_rows()/$page_limit,//$team_data->num_rows()/$page_limit,
     'current_page'=>$page,
     'result'=> $q1,
     ];
    }else{
        return ['num_row'=>$this->db->where(['tbl_users.status!='=>2,'tbl_users.type'=>1])->group_by('tbl_users.id')->get('tbl_users')->num_rows()/$page_limit,
     'current_page'=>$page,
     'result'=> $q1,
     ];
    }
  
}

public function get_allplayers()
{
     $page=$this->input->post("page");
     $page_limit = 4;
     $limit = "";
    $team_id=$this->input->post('team_id'); 
    $type=$this->input->post('type'); 
    $userId = $this->input->post('user_id');
    $game_category = json_decode($this->input->post('game_category'));
    $state = json_decode($this->input->post('state'));
    $city = json_decode($this->input->post('city'));
    $status = json_decode($this->input->post('status'));
    $request_status = json_decode($this->input->post('request_status'));
    $search_name =$this->input->post('search_name');
    $this->db->select('tbl_users.image,tbl_users.username,tb_gamecategory.title as game_category,tbl_users.amount,tbl_users.email,tbl_users.mobile,tbl_users.status,tbl_users.id,tbl_users.player_mobile_status,ifnull(join_player.status,"") as request_status,ifnull(DATE_FORMAT(join_player.updated_at,"%H:%i %p | %d-%m-%y "),"") as date');
    $this->db->join('tb_gamecategory','tb_gamecategory.id=tbl_users.game_category','left');
    $this->db->join('join_player','join_player.player_id=tbl_users.id','left');
    if($game_category)
    {
    $this->db->where_in('tbl_users.game_category',$game_category);
    }
    if($state)
    {
    $this->db->where_in('tbl_users.state',$state);
    }
    if($city)
    {
    $this->db->where_in('tbl_users.city',$city);
    }
    if($status!='')
    {
    $this->db->where_in('tbl_users.status',$status);
    }
    if($request_status!='')
    {
    $this->db->where_in('join_player.status',$request_status);
    }
    if($type=='history' && $team_id!="")
    {
    $this->db->where('join_player.team_id',$team_id);
    $this->db->order_by('join_player.id','DESC');
    }
    if(!empty($search_name))
    {

      $this->db->like('tbl_users.username', $search_name);
    }
     if($page != ""){
            $limit =(($page - 1) * $page_limit).",".$page_limit." ";
        $this->db->limit($page_limit,$limit);
        }
        //$q1= $team_data->result();
        $q1= $this->db->where(['tbl_users.type'=>0,'tbl_users.status!='=>2])->order_by('tbl_users.id','DESC')->group_by('tbl_users.id')->get('tbl_users')->result();
        //echo $this->db->last_query();die();
   if($type!="" && $team_id!="")
    {
    return ['num_row'=>$this->db->join('tbl_users','tbl_users.id=join_player.player_id','left')->where(['join_player.status!='=>3,'join_player.team_id'=>$team_id])->group_by('tbl_users.id')->get('join_player')->num_rows()/$page_limit,//$team_data->num_rows()/$page_limit,
     'current_page'=>$page,
     'result'=> $q1,
     ];
    }else{
        
     return ['num_row'=> $this->db->where(['tbl_users.type'=>0,'tbl_users.status!='=>2])->group_by('tbl_users.id')->get('tbl_users')->num_rows()/$page_limit,
     'result'=> $q1 ,   
     'current_page'=>$page,];
    }
  
   
}


public function set_upload_files($upload_path ,$files,$type="")
{
    $image_base64 = base64_decode($files);
    
    if($type!="" && $type!=null){
        $file = $upload_path . uniqid() . '.'.$type;
    }else{
        $file = $upload_path . uniqid() . '.png';
    }
    file_put_contents($file, $image_base64); 
    $image = $file;
    return $image;
}
public function set_upload_multi_files($upload_path ,$files,$type="")
{
$files=json_decode($files);
     $upload_path = 'assets/gallery_image/';
    $collectArr=[];
    foreach($files as $each_image){
       
        $image_base64 = base64_decode($each_image);
      
        if($type!="" && $type!=null){
            $name=uniqid() . '.'.$type;
            $file = $upload_path . $name;
        }else{
             $name=uniqid() . '.png';
            $file = $upload_path . $name;
        }
        file_put_contents($file, $image_base64); 
        $collectArr[]=$image = $name;
    }
    
   
    return json_encode($collectArr);
}
public function get_tournementdetail($id)
{
    $this->db->select('tbl_sportcategory.title,tbl_tournament.user_id,tbl_tournament.id,tbl_tournament.tournament_title, tbl_tournament.fee as amount, tbl_tournament.description, tbl_tournament.status, tbl_tournament.cover_image as image');
    $this->db->join('tbl_sportcategory','tbl_sportcategory.id=tbl_tournament.sports_category','left');

   return $this->db->where('tbl_tournament.status',1)->where('tbl_tournament.user_id',$id)->get('tbl_tournament')->result_array();
}




public function get_userdata($id)
{
    $this->db->select('tbl_users.image,tbl_users.username,tb_gamecategory.title as game_category,tbl_users.email,tbl_users.mobile,tbl_users.id,tbl_users.name as team_name ');
    $this->db->join('tb_gamecategory',' tb_gamecategory.id=tbl_users.game_category','left');
    return $this->db->where(['tbl_users.status'=>1,'tbl_users.id'=>$id,'type'=>1])->get('tbl_users')->row_array();
}
public function login_get()
{
    $userdata = array();
//$query = $this->db->
    $this->db->select('tbl_users.id,tbl_users.name,tbl_users.username,tbl_users.mobile,tbl_users.email,tbl_users.game_category,tbl_users.experience,tbl_users.district,tbl_district.name as district_name,tbl_users.description,tbl_users.amount,tbl_users.image,tbl_users.status,tbl_users.city, tbl_city.name as city_name,tbl_users.state, tbl_state.name as state_name,
tbl_users.pincode,tbl_pincode.name as pincode_name,tbl_users.password,
    tb_gamecategory.title as game_category,tbl_users.is_block,tbl_users.game_category as game_category_id');
    $this->db->join('tb_gamecategory',' tb_gamecategory.id=tbl_users.game_category','left');
    $this->db->join('tbl_city','tbl_city.id=tbl_users.city','left');
    $this->db->join('tbl_state',' tbl_state.id=tbl_users.state','left');
         $this->db->join('tbl_district',' tbl_district.id=tbl_users.district','left');
     $this->db->join('tbl_pincode',' tbl_pincode.id=tbl_users.pincode','left');
   $query= $this->db->where('tbl_users.status in(0,1)')->where('tbl_users.mobile',$this->input->post('mobile'))->where('tbl_users.type',$this->input->post('type'))->or_where('tbl_users.email',$this->input->post('mobile'))->get('tbl_users');
//echo $this->db->last_query();die();
    if ($query->num_rows() > 0) 
    {
        $row = $query->row_array();
        if($row['status'] == 1 )
        {
            if($row['password'] == base64_encode($this->input->post('password')))
            {
                    $userdata = $row;
                    $userdata['login_status'] = 1;
            } 
           
            else
            {
                $userdata['login_status'] = 3;
            }
        } 
   

        else
        {
           $userdata['login_status'] = 2; 
        }
              
}
    else 
    {
        
        $userdata['login_status'] = 0;
    }
    
    
    
    return $userdata;
}

function send_otp($mobile){
    $otp_array=array();
   $user_data= $this->db->where('mobile',$mobile)->or_where('email',$mobile)->get('tbl_users');
   if($user_data->num_rows()>0)
   {
         
         if($user_data->row()->is_register==1)
         {
       $otp = rand(1000, 9999);
       $status=0;
       $check_otp=$this->db->query("select * from tblotp where mobile='".$mobile."' and type='f'");
       if($check_otp->num_rows()>0) {
           $q2=$this->db->query("update tblotp set otp='".$otp."' where mobile='".$mobile."' and type='f'");
       } 
       else 
       {
           $q2=$this->db->query("insert into tblotp (otp,type,mobile) values ('".$otp."','f','".$mobile."') ");
       }
       if($q2) 
       {
           $otp_array['status']=1;
           $otp_array['status_1']=$otp;
           // return $otp;
       }
           
          
       
       else 
       {
             $otp_array['status']=2;
          // return $status;
       }
       
         }
         
      else
       {
       $otp_array['status']=3;
       }
       
   }
   else
   {
       $otp_array['status']=4;
      // return 0;
   }
   return $otp_array;
}

public function verify_otp()
{
        $otp_verification = array();
        $mobile=$this->input->post('mobile');
       $otp=$this->input->post('otp');
       $user_data=$this->db->where(['mobile'=>$mobile,'type'=>'f'])->get('tblotp');
       
         $otp_timedata=$this->db->get('app_setting')->row();
       if($user_data->num_rows()>0)
        {
             
        $user_data_row = $user_data->row();
        $date= date("Y-m-d H:i:s",strtotime($user_data_row->updated_at	.' +'.$otp_timedata->otp_time.' seconds'));
        $current_date=date("Y-m-d H:i:s");
        if($date > $current_date)
        {
            // print_r($date);
            // print_r($current_date);
           if($user_data_row->otp==$otp)
            {
            $data=$this->db->where(['mobile'=>$mobile,'type'=>'f'])->get('tbl_users')->row_array();
            $otp_verification = $data;
            $otp_verification['status']=1;
            }
            else
            {
            $otp_verification['status']=0;
            }
        }
        else
        {
            $otp_verification['status']=3; 
        }
        }
        else
        {
        $otp_verification['status']=2; 
        }
        return $otp_verification;
}




public function get_teamplayer($id)
{
   
   return $this->db->where(['status'=>1,'user_id'=>$id])->order_by('id','DESC')->get('tbl_teamplayers')->result();
}


public function get_achievements($id)
{
    return $this->db->select('id,title as achievement_name')->where(['status'=>1,'user_id'=>$id])->get('tbl_achievements')->result_array();
}
public function get_gallery($id)
{
    return $this->db->select('id,image')->where(['status'=>1,'user_id'=>$id])->get('tbl_playergallery')->result_array();
}
public function get_teamplayers($id)
{
   
    $this->db->select('id,player_name,position');
   return $this->db->where(['status'=>1,'user_id'=>$id])->get('tbl_teamplayers')->result_array();
}
public function get_singletournementdetail($tournement_id)
{
    $this->db->select('tb_gamecategory.title as sport_category,tbl_tournament.user_id,tbl_tournament.tournament_title, tbl_tournament.fee as amount, tbl_tournament.description, tbl_tournament.status, tbl_tournament.cover_image as image');
    $this->db->join('tb_gamecategory','tb_gamecategory.id=tbl_tournament.sports_category','left');
//$this->db->join('tbl_users','tbl_users.id=tbl_tournament.user_id','left');
   return $this->db->where('tbl_tournament.status!=',2)->where('tbl_tournament.id',$tournement_id)->get('tbl_tournament')->row_array();
}
public function get_singlusersdata($id,$type)
{
    $this->db->select('tbl_users.id,tbl_users.name,tbl_users.username,tbl_users.mobile,tbl_users.email,tbl_users.game_category,tbl_users.experience,tbl_users.district,tbl_district.name as district_name,tbl_users.description,tbl_users.amount,tbl_users.image,tbl_users.status,tbl_users.city,tbl_city.name as city_name,tbl_users.state,tbl_state.name as state_name,
tbl_users.pincode,tbl_pincode.name as pincode_name,
    tb_gamecategory.title as game_category,ifnull(tbl_users.team_mobile_status,"") as team_mobile_status,ifnull(tbl_users.player_mobile_status,"") as player_mobile_status');
    $this->db->join('tb_gamecategory',' tb_gamecategory.id=tbl_users.game_category','left');
    $this->db->join('tbl_city','tbl_city.id=tbl_users.city','left');
    $this->db->join('tbl_state',' tbl_state.id=tbl_users.state','left');
         $this->db->join('tbl_district',' tbl_district.id=tbl_users.district','left');
     $this->db->join('tbl_pincode',' tbl_pincode.id=tbl_users.pincode','left');
    return $this->db->where(['tbl_users.status!='=>2,'tbl_users.id'=>$id,'type'=>$type])->get('tbl_users')->row_array();
}
public function get_profiledetails($user_id)
{
    $this->db->select('tbl_users.id,tbl_users.name,tbl_users.username,tbl_users.mobile,tbl_users.email,tbl_users.game_category,tbl_users.experience,tbl_users.district,tbl_district.name as district_name,tbl_users.description,tbl_users.amount,tbl_users.image,tbl_users.status,tbl_users.city ,tbl_users.state,
    tbl_users.pincode,tbl_pincode.name as pincode_name,tbl_users.password,
    
    tbl_achievements.title as achievements_title,tbl_achievements.description as achievements_desc, tbl_playergallery.image as gallery_image');
    $this->db->join('tbl_achievements','tbl_achievements.user_id=tbl_users.id','left');
    $this->db->join('tbl_playergallery',' tbl_playergallery.user_id=tbl_users.id','left');
    $this->db->join('tbl_city','tbl_city.id=tbl_users.city','left');
    $this->db->join('tbl_state',' tbl_state.id=tbl_users.state','left');
     $this->db->join('tbl_district',' tbl_district.id=tbl_users.district','left');
     $this->db->join('tbl_pincode',' tbl_pincode.id=tbl_users.pincode','left');
   return $this->db->where('tbl_users.is_register',1)->where('tbl_users.id',$user_id)->get('tbl_users')->row();
}
public function send_request_to_join_team()
{
    $array=array(
        'team_id'=>$this->input->post('team_id'),
        'player_id'=>$this->input->post('player_id'),
        );
        return $this->db->insert('join_player',$array);
}
public function accept_reject_player()
{
   $request_status= $this->input->post('request_status');
   $player_id=$this->input->post('player_id');
   $team_id=$this->input->post('team_id');
    $array=array(
        'team_id'=>$team_id,
        'player_id'=>$player_id,
        );
        $update= $this->db->where($array)->update('join_player',array('status'=>$request_status));
        	if($request_status == 1){
            			   $player_data= $this->db->where('id',$player_id)->get('tbl_users')->row();
            			   $city_data= $this->db->where('id',$player_data->city)->get(' tbl_city')->row();
            			   $district_data= $this->db->where('id',$player_data->district)->get('tbl_district')->row();
            			   $state_data= $this->db->where('id',$player_data->state)->get('tbl_state')->row();
            			   $insert_data=array(
                                    'player_name'=>$player_data->name,
                                    'position'=>" ",
                                    'mobno'=>$player_data->mobile,
                                    'email'=>$player_data->email,
                                    'address'=>$city_data->name.",".$district_data->name.",".$state_data->name.",".$player_data->pincode,
                                    'status'=>1,
                                    'user_id'=>$team_id,
            			       );
            			       $this->db->insert('tbl_teamplayers',$insert_data);
            			}
            			
        if ($this->db->affected_rows() == true) {
            			$userdata = 1;
            		} else {
            			$userdata = 0;
            		}
            return $userdata;		
}

}