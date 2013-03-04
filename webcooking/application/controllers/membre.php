<?php
	
	class membre extends MY_controller {
		function __construct()
		{
	       parent::__construct();
	    }
		
		function espace_perso(){
		if($this->session->userdata('loged')){
		$data['fav']=$this->favorit_model->get_fav(array('id_membre'=>$this->uri->segment('3')));
		$this->vues($data,'membre.php');
		}else{
			redirect(site_url());
		}
			
			
		}
		
		function add_fav(){
		
		
		
			$this->favorit_model->add(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id'),'date_ajout'=>date('Y-m-j')));
			redirect('recette/seul/'.$this->uri->segment('3'));
		}
		
		function del_fav(){
			$this->favorit_model->delete(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			redirect('recette/seul/'.$this->uri->segment('3'));
		}
		
		function add_like(){
			$this->like_model->add(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			redirect('recette/seul/'.$this->uri->segment('3'));
		}
		
		function del_like(){
			$this->like_model->delete(array('id_recette'=>$this->uri->segment('3'),'id_membre'=>$this->session->userdata('id')));
			redirect('recette/seul/'.$this->uri->segment('3'));
		}
		}
		
