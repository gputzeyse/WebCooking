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
class login extends MY_controller{
  
    function construct()
    {
       parent::__construct();
    }
    
    function index()
    {
        
        //form validation (Login)
        
        $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[5]');
        
        $this->form_validation->run();
       
        // end form validation
        
        
        
        if($this->form_validation->run())
        {
            if($this->login_model->check_translator($this->input->post('email'),$this->input->post('password')))
            {
                redirect('login/membre');
            }
            else
            {
                
                $data['error']="Le mots de passe ou l'email est incorecte";
                $data['title']='WebCooking, Connexion pour les membres';
                $this->vues($data,'login.php');
            }
        }
        else
        {
            $data['title']='WebCooking, Connexion pour les membres';
            $this->vues($data,'login.php'); 
        }
    }
    
    function logout ()
    {
    	$this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('visible');
        $this->session->unset_userdata('loged');
        $this->session->sess_destroy();
        redirect(site_url());
        
        
    }
    
    public function membre()
    {
                    redirect('membre/espace_perso/'.$this->session->userdata('id'));
            
    }
    
    
    function inscription(){
        
        $data['title']='Nouveaux Membre';
        $this->vues($data,'form/new_membre.php'); 

    }
    
    function add(){
        $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_check_email');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('login','Pseudo','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('nom','Nom','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('prenom','Prénom','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('adresse','Adresse','trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_rules('code_postal','Code posatl','trim|required|xss_clean|min_length[4]');
        $this->form_validation->set_rules('ville','Ville','trim|required|xss_clean|min_length[2]');
        $this->form_validation->set_rules('date_naissance','Date de naissance','trim|required|xss_clean');

        
        $this->form_validation->run();
        if($this->form_validation->run())
        {
        $where = $this->membre_model->get_by_one(array('mail'=>$this->input->post('email')));
        	if($where == null){
        		$where=$this->membre_model->get_by_one(array('login'=>$this->input->post('login')));
        		if($where==null){
        	
            $data= array(
                    'mail'=>$this->input->post('email'),
                    'password'=> sha1($this->input->post('password')),
                    'login'=>$this->input->post('login'),
                    'nom'=>$this->input->post('nom'),
                    'prenom'=>$this->input->post('prenom'),
                    'adresse'=>$this->input->post('adresse'),
                    'code_postal'=>$this->input->post('code_postal'),
                    'ville'=>$this->input->post('ville'),
                    'date_naissance'=>$this->input->post('date_naissance'),
                    'acces'=>'3' );
              if($this->input->post('news')){
	              
	              $news= array('mail'=>$this->input->post('email'));
	              $this->newsletter_model->add($news);
              }
            
            $this->membre_model->add($data);
            
            if($this->login_model->check_translator($this->input->post('email'),$this->input->post('password')))
            {
                redirect('login/membre');
            }
            }else{
	            $data['title']='Nouveaux Membre';
	            	 $data['error']='le pseudo entrée est deja utilisé';
		            $this->vues($data,'form/new_membre.php'); 
            
        }}else{
	            $data['title']='Nouveaux Membre';
	            	 $data['error']='l\'email entrée est deja utilisé';
		            $this->vues($data,'form/new_membre.php'); 
            
        }}
        else{$data['title']='Nouveaux Membre';
        $this->vues($data,'form/new_membre.php'); 
        }
        
        
    }
}




