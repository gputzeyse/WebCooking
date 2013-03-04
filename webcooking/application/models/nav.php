<?php

/**
 * Description of translation_model
 *
 * @author geoffreyputzeyse
 */
class nav extends MY_model {
	
	function construct()
    {
        parent::__construct();
    }
    
    
    
    function get(){
            
       $this->db->select('*')->from('categorie');
       $query=$this->db->get();
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }  
            
        }
}