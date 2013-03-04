<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signup
 *
 * @author geoffreyputzeyse
 */
class favorit_model extends MY_model{
  
    function construct()
    {
       parent::__construct();
    }
    
    protected $table = 'favorit';
    
   
	    
	    function get_fav($where)
        {
        	$this->db->select('recette.preparation,recette.id as recette_id,recette.ingredient,recette.desc,recette.titre,
	   categorie.nom,membre.login,recette.date_ajout,recette.dificulte,
	   recette.temps_preparation,recette.temps_cuisson,
	   recette.nbre_personne,recette.id_categorie,recette.id_auteur,
	   ,recette.id_chef')->from('recette');
	   $this->db->join('favorit','recette.id=favorit.id_recette');
	   $this->db->join('membre','membre.id=recette.id_auteur');
	   $this->db->join('categorie','categorie.id=recette.id_categorie');
	   $this->db->where($where);
	   $this->db->order_by("favorit.id", "desc");
       		$query=$this->db->get();//get results
       		if($query->num_rows()>0)//if result>0
       		{
          		foreach ($query->result() as $row){
               	$data[]=$row;//create array with all results
           		}
           	return $data; //return results
       		}
        }
    

    
}