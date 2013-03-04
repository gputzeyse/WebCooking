<?php

class like_model extends MY_model{
  
    function construct()
    {
       parent::__construct();
    }
    
    protected $table = 'like';
    
   
	    
	    function get_like($where)
        {
        	$this->db->select('recette.preparation,recette.id as recette_id,recette.ingredient,recette.desc,recette.titre,
	   categorie.nom,membre.login,recette.date_ajout,recette.dificulte,
	   recette.temps_preparation,recette.temps_cuisson,
	   recette.nbre_personne,recette.id_categorie,recette.id_auteur,
	   ,recette.id_chef')->from('recette');
	   $this->db->join('like','recette.id=like.id_recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	   $this->db->where($where);
	   $this->db->order_by("like.id", "desc");
       		$query=$this->db->get();//get results
       		if($query->num_rows()>0)//if result>0
       		{
          		foreach ($query->result() as $row){
               	$data[]=$row;//create array with all results
           		}
           	return $data; //return results
       		}
        }
        
        function top_like(){
	        $this->db->select('count(*) as nbre_like,id_recette,recette.titre,recette.dificulte')->from('like');
	        $this->db->join('recette','id_recette=recette.id');
	        $this->db->where('recette.id_chef is null');
	        $this->db->group_by("id_recette");
	        $this->db->order_by('nbre_like');
	        $this->db->limit(5);
	        $query=$this->db->get();
	   
	        
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }  

        }
        
        function top_chef(){
	        $this->db->select('count(*) as nbre_like,id_recette,recette.titre,recette.dificulte')->from('like');
	        $this->db->join('recette','id_recette=recette.id');
	        $this->db->where('recette.id_chef is not null');
	        $this->db->group_by("id_recette");
	        $this->db->order_by('nbre_like');
	        $this->db->limit(5);
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