<?php 
class MY_Controller extends CI_Controller
{
    public function __construct()
        {
        parent::__construct();
        $this->load->model("AdminModel/Adminmodel","AM");
        }
     
    public function addtables($table,$array)
        {
        return $this->AM->addtables($table,$array);
        }
     
    public function updatestatus($table,$data,$id)
        {
        return $this->AM->updatestatus($table,$data,$id);
        }
         
    public function deleteTable($id,$table)
        {
        return $this->AM->deleteTable($id,$table);
        }
    
    public function UpdateTable($id,$table,$array)
        {
            return $this->AM->UpdateTable($id,$table,$array); 
        }
            /*   public function imagepdf ($image= null ,$pdf=null)
                    {
                        
                    } */
    public function selectdata($table,$status)
            {
              return $this->AM->selectdata($table,$status);
            }

}


?>