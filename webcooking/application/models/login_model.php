<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author geoffreyputzeyse
 */
class login_model extends MY_model {
   
    function construct()
    {
        parent::__construct();
    }
    
    function check_translator($mail,$password)
    {
        
        $this->db->where('mail',$mail);
        $this->db->where('password',sha1($password));
        $q=$this->db->get('membre');
        
        if($q->num_rows()>0)
            {
                foreach($q->result() as $membre){
                $data=array('id'=>$membre->id,'login'=>$membre->login,'mail'=>$membre->mail,'acces'=>$membre->acces,'nom'=>$membre->nom,'prenom'=>$membre->prenom,'loged'=>true);}

                $this->session->set_userdata($data);
               
                return true;
            }
        
    }
}


