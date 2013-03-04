<?php

/**
 * Description of translation_model
 *
 * @author geoffreyputzeyse
 */
class accueil_model extends MY_model {
	function construct()
    {
        parent::__construct();
    }
    
    function get_four_recette(){
	        
	   $this->db->select('recette.id,recette.desc,recette.titre,categorie.nom,membre.login,recette.date_ajout,recette.dificulte,recette.temps_preparation,recette.temps_cuisson,recette.nbre_personne,recette.id_categorie,recette.id_auteur')->from('recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	   $this->db->where('id_chef is null');
	   
	   $this->db->order_by("recette.id", "desc");
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
        
        
        function get_four_chef(){
	        
	   $this->db->select('recette.id,recette.desc,recette.titre,categorie.nom,membre.login,recette.date_ajout,recette.dificulte,recette.temps_preparation,recette.temps_cuisson,recette.nbre_personne,recette.id_categorie,recette.id_auteur,chef.nom as chef_nom,chef.prenom as chef_prenom,chef.pays,recette.id_chef')->from('recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	   $this->db->join('chef','chef.id =recette.id_chef');
	   $this->db->where('id_chef is not null');
	   $this->db->order_by("recette.id", "desc");
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