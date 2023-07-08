<?php
class Usermodel extends CI_Model
{
   public function check_number($phone)
     {
     return  $this->db->get_where('tbl_users',['status'=>1,'mobile'=>$phone])->num_rows();
     }

     public function check_email($email)
     {
        return  $this->db->get_where('tbl_users',['status'=>1,'email'=>$email])->num_rows();  
     }
}
?>