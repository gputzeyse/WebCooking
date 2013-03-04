<?php
	
	class accueil extends MY_controller {
		function __construct()
		{
	       parent::__construct();
	    }
		
		function index(){
			
			$data['rec']=$this->accueil_model->get_four_recette();
			$data['chefs']=$this->accueil_model->get_four_chef();
			$this->vues($data,'home.php');
		}
		
	}