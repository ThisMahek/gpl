<?php
class Adminmodel extends CI_Model{
    public function addtables($table,$array)
        {
           $this->db->insert($table,$array);
           return   $this->db->insert_id();
        }
    public function updatestatus($table,$data,$id)
        {
            $this->db->where('id',$id);
            return $this->db->update($table,$data);
        }
    public function  deleteTable($id,$table)
        {
            $status['status']=2;
            return $this->db->where('id',$id)->update($table,$status);
        }
    public function  UpdateTable($id,$table,$array)
        {
            return $this->db->where('id',$id)->update($table,$array);
        }
      /*  public function showPracticalData()
        {
        return $this->db->select('tbl_practical.*,tbl_practical.id as pid,tbl_department.id as d_id,tbl_department.title as dp_title,tbl_subdepartment.id as sd_id,
        tbl_subdepartment.title as sd_title' )->from('tbl_practical')->where('tbl_practical.status!=',2)
        ->join('tbl_department','tbl_department.id = tbl_practical.course','left')
        ->join('tbl_subdepartment','tbl_subdepartment.id = tbl_practical.sub_course','left')
        ->order_by('tbl_practical.id','DESC')->get()->result();
        }  */

        public function CheckEmail($email)
        {
            $this->db->where('email',$email);
            return  $this->db->get('admin_details');
        }


        public function admin_profile($id)
        {
            return $this->db->where('id',$id)->get('admin_details')->row_array();
        }
        public function change_password($newpassword){      
            $data = array(
                'password' => md5($newpassword)
                );
                 $this->db->where('id', $this->session->userdata('id'));
              return  $this->db->update('admin_details', $data);
        
        }
         public function  get_admin_details($id)
            {
                return $this->db->get_where('admin_details',['id'=>$id])->row_array();
            }
        public function update_admin_profile($userid,$array)
           {
               return $this->db->where(['id'=>$userid,'status'=>1])->update('admin_details',$array);
           }
        public function  selectdata($table,$status)
            {
              return  $this->db->select('*')->where(['status!='=>  $status])->order_by('id','desc')->get($table)->result_array();
            }
        public function get_sports_category()
            {
                return $this->db->select('*')->where(['status!='=> 2])->get('tbl_sportcategory')->result_array();   
            }
                public function get_sports_type()
            {
                return $this->db->select('*')->where(['status'=> 1])->get('tbl_sportcategory')->result_array();   
            }
            
                 public function  get_gamescat()
            {
                return $this->db->select('*')->where(['status'=> 1])->get('tb_gamecategory')->result_array();   
            }
          
            public function get_team()
                  {
                    return $this->db->get_where('tbl_users',['status'=>1])->result_array();
                  }

            public function get_states_list()
            {
                return $this->db->get_where('tbl_state',['status'=>1])->result_array();   
            }

       public function  get_city_list()
          {
            return $this->db->get_where('tbl_city',['status'=>1])->result_array();   
          }


public function total_sports()
{
return  $this->db->select('count(id) count')->where(['status!='=>2])->get('tbl_sportcategory')->row()->count;
}
        //   $number_of_deposit=$this->db->select('count(id) count')->where('status',2)->get('deposits')->row()->count;
        //   $no_of_Withdrawal=$this->db->select('count(id) count')->where('status',2)->get('withdrawals')->row()->count;
        public function total_players()
        {
        return  $this->db->select('count(id) count')->where(['status!='=>2])->get('tbl_teamplayers')->row()->count;
        }  
        public function total_team()
        {
        return  $this->db->select('count(id) count')->where(['status!='=>2,'type'=>1])->get('tbl_users')->row()->count;
        }  

        public function total_tournament()
        {
        return  $this->db->select('count(id) count')->where(['status!='=>2])->get('tbl_tournament')->row()->count;
        }  
        
        public function selectdata_users($table,$status)   
              
              {
     
                  return $this->db->query("select tbl_users.*, tbl_users.id as uid,tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as sid,  tbl_pincode.name as pname,tbl_state.id ,tbl_state.name as sname ,tbl_city.name as cname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category   
                   left join tbl_pincode on tbl_pincode.id=tbl_users.pincode
                  left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id  WHERE tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();

   
              }
              
           public function   user_data_state_wise($state_id)
           
           
           {
                  return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();
 
           }
           
           
           
           
           
           
           
               public function select_user_data($uid)   
              
              {
     
                  return $this->db->query("select tbl_users.*, tbl_users.id as uid,tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as sid,  tbl_pincode.name as pname,tbl_state.id ,tbl_state.name as sname ,tbl_city.name as cname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category   
                   left join tbl_pincode on tbl_pincode.id=tbl_users.pincode
                  left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id  WHERE tbl_users.status != 2 and tbl_users.id = $uid ORDER BY tbl_users.id DESC ")->row_array();

   
              }
    
    
    
            public function get_district_list()
            {
                return $this->db->get_where('tbl_district',['status'=>1])->result_array();
            }
            
            
            
            
        public function  users_data_state_city_wise($state_id,$city_id)
            {
           
                    
                  return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id   and tbl_users.city = $city_id  and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();
 

    
            }
            
            
         public function   users_data_state_city_game_wise($state_id,$city_id,$game_id)
         
         {
            return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id   and tbl_users.city = $city_id  and tbl_users.game_category = $game_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
         }
         
        public function users_data_state_city_game_usertype_wise($state_id,$city_id,$game_id,$type_id)
       {
               return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id  and tbl_users.city = $city_id  and tbl_users.game_category = $game_id and tbl_users.type = $type_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();   
       }
       
       
    public function   users_data_state_city_game_playstatus_wise($state_id,$city_id,$game_id,$play_status)
    
    {
      if($play_status == 1)
          {

           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id   and tbl_users.city = $city_id  and tbl_users.game_category = $game_id and  tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id   and tbl_users.city = $city_id  and tbl_users.game_category = $game_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
 
          }  
          
          
        
    }
    
    
      public function   users_data_playstatus_wise($play_status)
          {
              if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE     tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
          
          
          }
          
          
              
          
         public function users_data_game_wise($game_id)
         
         {
              return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.game_category = $game_id  and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();   
         }
         
         
         
         
                public function users_data_usertype_wise($type_id)
         
         {
              return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();   
         }
         
         
     
         
         
               public function   users_data_usertype_playstatus_wise($type_id,$play_status)
          {
              if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
        
          
          }
          
          
        public function  users_data_usertype_playstatus_game_wise($type_id,$game_id,$play_status)
        
        {
             if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  and tbl_users.game_category = $game_id and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  and tbl_users.game_category = $game_id and tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
          
       
          
        }
        
        
        
        
        public function users_data_usertype_game_wise($type_id,$game_id)
            {
                     return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.game_category = $game_id and tbl_users.type = $type_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();
            }
            
            public function users_data_usertype_state_wise($type_id,$state_id)
            
            {
                return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id and tbl_users.type = $type_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
            }
            
            
             public function users_data_usertype_state_city_wise($type_id,$state_id,$city_id)
            
            {
                return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id and tbl_users.city = $city_id and tbl_users.type = $type_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
            }
            
            
         public function   users_data_game_state_wise($game_id,$state_id)
         
         {
            return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id and tbl_users.game_category = $game_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array();    
         }
         
         
         
             public function   users_data_game_state_playstatus_wise($game_id,$state_id,$play_status)
         {
           if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
          
         }
         
         
        public function  users_data_game_state_city_usertype_playstatus_wise($game_id,$state_id,$city_id,$play_status,$type_id)
         
         {
                    if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and tbl_users.type = $type_id and tbl_users.city = $city_id and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and tbl_users.type = $type_id and tbl_users.city = $city_id and   tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
         }
         
         
         
              public function users_data_usertype_state_game_wise($type_id,$state_id,$game_id)
            
            {
                return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.state = $state_id and tbl_users.type = $type_id and tbl_users.game_category = $game_id and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
            }
            
            
       public function   users_data_state_game_usertype_playstatus_wise($state_id,$game_id,$type_id,$play_status)
       {
              if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and tbl_users.type = $type_id  and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.state = $state_id  and tbl_users.game_category = $game_id and tbl_users.type = $type_id  and   tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
       }
       
       
                   
       public function   users_data_game_playstatus_wise($game_id,$play_status)
       {
              if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE  tbl_users.game_category = $game_id and   tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE and tbl_users.game_category = $game_id  and  tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
       }
       
       
       
       
                 
        public function  users_data_usertype_playstatus_state_city_wise($type_id,$state_id,$city_id,$play_status)
        
        {
             if($play_status == 1)
          {
           return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  and tbl_users.state = $state_id  and tbl_users.city = $city_id and tbl_users.status = 1  ORDER BY tbl_users.id DESC ")->result_array(); 

          }elseif($play_status==''){
          return $this->db->query("select tbl_users.*, tbl_users.id as uid,tbl_city.name as cname, tb_gamecategory.id,tb_gamecategory.title,tb_gamecategory.id as gid ,tbl_state.id ,tbl_state.name as sname from tbl_users  left join tb_gamecategory on tb_gamecategory.id=tbl_users.game_category left join tbl_state on tbl_users.state = tbl_state.id  left join tbl_city on tbl_users.city = tbl_city.id   WHERE tbl_users.type = $type_id  and tbl_users.state = $state_id  and tbl_users.city = $city_id  and tbl_users.status != 2  ORDER BY tbl_users.id DESC ")->result_array(); 
          }
          
       
          
        }
       
       
       
}
  ?>