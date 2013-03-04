<?php

/**
 * Description of translation_model
 *
 * @author geoffreyputzeyse
 */
class recette_model extends MY_model {
	function construct()
    {
        parent::__construct();
    }
    
    function recette($id) {
    	
	   $this->db->select('recette.preparation,recette.id as recette_id,recette.ingredient,recette.desc,recette.titre,
	   categorie.nom,membre.login,recette.date_ajout,recette.dificulte,
	   recette.temps_preparation,recette.temps_cuisson,
	   recette.nbre_personne,recette.id_categorie,recette.id_auteur,
	   ,recette.id_chef')->from('recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	  
	   
	   $this->db->where('recette.id', $id);
	   $query=$this->db->get();
	   
	   foreach ($query->result() as $rec){
	   	
	   return $rec;}	   
	   
	     }
	     
	 function chef($id) {
    	
	   $this->db->select('recette.preparation,recette.id as recette_id,recette.ingredient,recette.desc,recette.titre,
	   categorie.nom,membre.login,recette.date_ajout,recette.dificulte,
	   recette.temps_preparation,recette.temps_cuisson,
	   recette.nbre_personne,recette.id_categorie,recette.id_auteur,
	   ,recette.id_chef,chef.nom as chef_nom,chef.prenom as chef_prenom,chef.pays as chef_pays')->from('recette');
	   $this->db->join('chef','chef.id=recette.id_chef');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	  
	   
	   $this->db->where('recette.id', $id);
	   $query=$this->db->get();
	   
	   foreach ($query->result() as $rec){
	   	
	   return $rec;}	   
	   
	     }
	     
	     
	     function get_four_cat($id,$r){
	        
	   $this->db->select('recette.id,recette.desc,recette.titre,categorie.nom,membre.login,recette.date_ajout,recette.dificulte,recette.temps_preparation,recette.temps_cuisson,recette.nbre_personne,recette.id_categorie,recette.id_auteur,recette.id_chef')->from('recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	    $this->db->where('recette.id !=',$r);
	   $this->db->where('recette.id_categorie',$id);
	   $this->db->where('recette.id_chef is null');
	   $this->db->order_by("recette.id",'RANDOM');
	   $this->db->limit(4);
	   $query=$this->db->get();
	   
	        
       if($query->num_rows()>0)
       {
           foreach ($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }  

        }    
        
        
         function get_four_chef($id,$r){
	        
	   $this->db->select('categorie.nom,recette.id,recette.desc,recette.titre,chef.nom,chef.prenom,chef.pays,membre.login,recette.date_ajout,recette.dificulte,recette.temps_preparation,recette.temps_cuisson,recette.nbre_personne,recette.id_categorie,recette.id_auteur,recette.id_chef,chef.nom as chef_nom,chef.prenom as chef_prenom')->from('recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('chef','chef.id=recette.id_chef');
	   $this->db->join('categorie','categorie.id = recette.id_categorie');
	   $this->db->where('recette.id !=',$r);
	   $this->db->where('recette.id_categorie',$id);
	   $this->db->order_by("recette.id",'RANDOM');
	   $this->db->limit(4);
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