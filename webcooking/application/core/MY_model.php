<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------

class MY_Model extends CI_Model
{
    

	
    /****************************************/
    /* name: sort		                    */
    /* $sort:sort by $valeur:value of champs*/
    /* $champs:	where						*/
    /****************************************/
 
       function sort($sort,$champ = array(), $valeur = null){
       $this->db->select('*')->from($this->table)->where($champ,$valeur)->order_by($sort); //querry
       $query=$this->db->get();//get result
       if($query->num_rows()>0) // if result>0
       {
           foreach ($query->result() as $row){
               $data[]=$row; 
           }
           return $data;//return array of results
       }  
    }
    
    /****************************************/
    /* name: get		                    */
    /* get all table		    	 		*/
    /****************************************/
    function get(){
            
       $this->db->select('*')->from($this->table);//query
       $query=$this->db->get();//get results
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;// return all results
       }  
            
        }
        
        /****************************************/
   		/* name: get_by		                    */
    	/* get all table with were clause		*/
    	/*return all results					*/
    	/****************************************/
        function get_by($where)
        {
        	$this->db->select('*')->from($this->table)->where($where);//query
       		$query=$this->db->get();//get results
       		if($query->num_rows()>0)//if result>0
       		{
          		foreach ($query->result() as $row){
               	$data[]=$row;//create array with all results
           		}
           	return $data; //return results
       		}
        }
        
        /****************************************/
   		/* name: get_by_one		                */
    	/* get all table with were clause		*/
    	/*return one result 					*/
    	/****************************************/
        function get_by_one($where)
        {
        	$this->db->select('*')->from($this->table)->where($where);//query
       		$query=$this->db->get();//get all results
       		if($query->num_rows()>0)
       		{
          		foreach ($query->result() as $row){}// loop
           		return $row;// return the last row
       		}
        }
       	/****************************************/
   		/* name: add    		                */
    	/* add data 							*/
    	/****************************************/
        function add($data)
         {
            $this->db->insert($this->table,$data);// insert
         }
    	/****************************************/
   		/* name: update   		                */
    	/* update data 							*/
    	/****************************************/
        function update($data,$where){
       
        $this->db->where($where);//were
        $this->db->update($this->table,$data);//update data
        
   		 }
   		 /****************************************/
   		/* name: delete   		                */
    	/* delete data 							*/
    	/****************************************/
   		 function delete($where)
   		{
   			$this->db->where($where);//were
   			$this->db->delete($this->table);//delete
  		}
}