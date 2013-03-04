<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------

class MY_Model extends CI_Model
{
    
	function list_by_id(){
            $this->db->select($this->table)->order_by('id');
            $query=$this->db->get();
            if($query->num_rows()>0)
                {
                    foreach ($query->result() as $row)
                    {
                        $data[]=$row;
                    }
                    return $data;   
                } 
        }
        
        
       function sort($sort){
       $this->db->select('*')->from($this->table)->order_by($sort);
       $query=$this->db->get();
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }  
    }
    
        function get(){
            
       $this->db->select('*')->from($this->table);
       $query=$this->db->get();
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }  
            
        }
        
        
        function update($data,$were){
        
        $this->db->update($this->table,$data,$were);
        
   		 }

    
        
}