<?php
	
	class recette extends MY_controller {
		function __construct()
		{
	       parent::__construct();
	    }
		
		function seul(){
			$data['like']=$this->like_model->get_by(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			$data['rec']=$this->recette_model->recette($this->uri->segment('3'));	
			$data['fav']=$this->favorit_model->get_by(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			$data['fcat']=$this->recette_model->get_four_cat($data['rec']->id_categorie,$data['rec']->recette_id);	
			$this->vues($data,'recette.php');
		}
		
		function chef(){
			$data['like']=$this->like_model->get_by(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			$data['rec']=$this->recette_model->chef($this->uri->segment('3'));	
			$data['fav']=$this->favorit_model->get_by(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			$data['fcat']=$this->recette_model->get_four_chef($data['rec']->id_chef,$data['rec']->recette_id);	
			$this->vues($data,'recette_chef.php');
		}
		
	}