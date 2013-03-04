<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------

class MY_controller extends CI_Controller
{
	/****************************************/
    /* name: is user                     	*/
    /* if is user redirect login page		*/
    /****************************************/
    function is_user()
    {
    	if($this->is_admin()==false)// if function is_admin return false
    	{
    		redirect('login');// redirect
    	}
    }
    /****************************************/
    /* name: is admin                    	*/
    /* if user is admin return true else	*/
    /* return false							*/
    /****************************************/
    function is_admin()
    {
        if($this->is_logged() && $this->session->userdata('admin')==1 )// if function is_logged=true and user is admin
        {
           return true; 
        }else{
        return false;}
    }
    /****************************************/
    /* name: is logged                     	*/
    /* if the user is logged return true 	*/
    /* else return false					*/
    /****************************************/
    function is_logged()
    {
    	if($this->session->userdata('email') && $this->session->userdata('logged')) //if session email exist and logged exist 
    	{
    		return true;
    	}else
    	{
    		return false;
    	}
    }
    
    /****************************************/
    /* name: vues	                    	*/
    /* $data: the data for the page			*/
    /* $include: the view file				*/
    /* load view file with data				*/
    /****************************************/
    public function vues( $data, $include)
	{
		$data['likes']=$this->like_model->top_like();
		$data['likesc']=$this->like_model->top_chef();
		$data['cat']=$this->nav->get();
		$data['includefile']=$include;//get view file name
		$this->load->view('layout',$data);//load view
	}
	/****************************************/
    /* name: count_links	                */
    /* count the number of links in string  */
    /* $string: the string					*/
    /* return number of links				*/
    /****************************************/
	function count_links($string)
	{
		$reg='#</a>#'; // search string
        preg_match_all($reg,$string,$matches); // get all results
        $links=0; 
        if($matches!=null)
        {              		
        	foreach($matches as $match)
        	{
         		foreach($match as $m){ // count the number of links
         			$links++;
        		}
         	}
		}return $links;// return number of links
	}
}