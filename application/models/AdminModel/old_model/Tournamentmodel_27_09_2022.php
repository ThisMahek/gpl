<?php
class Tournamentmodel extends CI_Model
{
  public function addtables($table, $array)
  {
    $this->db->insert($table, $array);
    return $this->db->insert_id();
  }

  /*  public function showPracticalData()
   {
   return $this->db->select('tbl_practical.*,tbl_practical.id as pid,tbl_department.id as d_id,tbl_department.title as dp_title,tbl_subdepartment.id as sd_id,
   tbl_subdepartment.title as sd_title' )->from('tbl_practical')->where('tbl_practical.status!=',2)
   ->join('tbl_department','tbl_department.id = tbl_practical.course','left')
   ->join('tbl_subdepartment','tbl_subdepartment.id = tbl_practical.sub_course','left')
   ->order_by('tbl_practical.id','DESC')->get()->result();
   }  */

  public function selectdata($table, $status)
  {
    //  return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid  from tbl_tournament   inner join tbl_sportcategory  on tbl_sportcategory.id=tbl_tournament.sports_category   where tbl_tournament.status!= '2' ORDER BY tbl_tournament.id DESC")->result_array();

    // return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id ORDER BY tbl_tournament.id DESC ")->result_array();
    return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,tbl_state.name as sname from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state on tbl_tournament.state = tbl_state.id WHERE tbl_tournament.status != 2  ORDER BY tbl_tournament.id DESC ")->result_array();


  }
  // public function   fetch_tournament_data($id)
  //     {
  //      return  $this->db->get_where('tbl_tournament',['id'=>$id,'status !='=>2])->row_array(); 
  //     }
  public function fetch_tournament_data($id)
  {
    return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id where tbl_tournament.id =  $id  and tbl_tournament.status != 2 ")->row_array(); //    return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid  from tbl_tournament   inner join tbl_sportcategory  on tbl_sportcategory.id=tbl_tournament.sports_category  inner join  tbl_users on tbl_tournament.user_id = tbl_users.id  where tbl_tournament.status!= '2' and tbl_tournament.id = ' . $id . '  ORDER BY tbl_tournament.id DESC")->row_array(); 
  }


  public function selectdata_teamplyer($table, $status)
  {
    return $this->db->query("select tbl_teamplayers.*, tbl_teamplayers.id as pid, tbl_users.name,tbl_users.image ,tbl_users.id  from tbl_teamplayers   inner join tbl_users  on tbl_users.id=tbl_teamplayers.user_Id   where tbl_teamplayers.status!= '2' ORDER BY tbl_teamplayers.id DESC")->result_array();
  }


  public function fetch_player_data($id)
  {
    return $this->db->query("select tbl_teamplayers.*, tbl_teamplayers.id as pid ,tbl_users.id,tbl_users.name from tbl_teamplayers left join tbl_users on tbl_teamplayers.user_id = tbl_users.id where tbl_teamplayers.id =  $id ")->row_array();

  }


  public function get_states()
  {
    return $this->db->get_where('tbl_state', ['status!=' => 2])->result_array();
  }


  public function select_tournament_statewise($state_id)
  {
    return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,tbl_state.name as sname from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state = $state_id and  tbl_tournament.status != 2  ORDER BY tbl_tournament.id DESC ")->result_array();

  }

  public function select_tournament_state_and_city_wise($state_id, $city_id)
    {
        return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,tbl_state.name as sname from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state = $state_id  and tbl_tournament.city = $city_id  and  tbl_tournament.status != 2 ORDER BY tbl_tournament.id DESC ")->result_array();
    }

public function select_tournament_state_city_play_status_wise($state_id,$city,$paly_status)

      {
        if($status==1)
        {
          return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,tbl_state.name as sname from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state =
           $state_id  and tbl_tournament.city = $city_id and status = $paly_staus  ORDER BY tbl_tournament.id DESC ")->result_array();
        } else{
          return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,tbl_state.name as sname from tbl_tournament  left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state =
           $state_id  and tbl_tournament.city = $city_id  and tbl_tournament.status != 2  ORDER BY tbl_tournament.id DESC ")->result_array();
        }
      
      }


      public function tournament_data_stat_city_playstatus_sport_wise($sport_id,$state_id,$city,$paly_status)
        {
          return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,
          tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,
          tbl_state.name as sname from tbl_tournament 
           left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  
           left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state
            on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state =
          $state_id  and tbl_tournament.city = $city_id 
           and tbl_tournament.sports_category = $sport_id and tbl_tournament.status != 2 
            ORDER BY tbl_tournament.id DESC ")->result_array();  
        }



        public function tournament_data_stat_city_sport_wise($sport_id,$state_id,$city_id)
        {
          return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,
          tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,
          tbl_state.name as sname from tbl_tournament 
           left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  
           left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state
            on tbl_tournament.state = tbl_state.id  WHERE  tbl_tournament.state =
          $state_id  and tbl_tournament.city = $city_id 
           and tbl_tournament.sports_category = $sport_id and tbl_tournament.status != 2 
            ORDER BY tbl_tournament.id DESC ")->result_array();  
        }



       public function  tournament_data_sport_wise($sport_id)
       {
        return $this->db->query("select tbl_tournament.*, tbl_tournament.id as tid, tbl_sportcategory.id,
          tbl_sportcategory.title,tbl_sportcategory.id as sid ,tbl_users.name,tbl_state.id ,
          tbl_state.name as sname from tbl_tournament 
           left join tbl_sportcategory on tbl_sportcategory.id=tbl_tournament.sports_category  
           left join tbl_users on tbl_tournament.user_id = tbl_users.id  left join tbl_state
            on tbl_tournament.state = tbl_state.id  WHERE  
           tbl_tournament.sports_category = $sport_id and tbl_tournament.status != 2  
            ORDER BY tbl_tournament.id DESC ")->result_array(); 
       }

}
?>