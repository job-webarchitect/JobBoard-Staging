<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_Controller extends MY_Controller 
{

  function __construct() 
  {
		parent::__construct();
		$role = $this->session->userdata('role'); 
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission); 
		$uri = $this->uri->uri_string(); // for pos management.
		
		
		
		if($role  == '')
		{
		
			redirect('auth/login');
			exit(0);
		}
		
		/*foreach($arr as $num) {
		
				if($num!=0 && $uri!='admin/index' && $uri!='auth/logout' ) {
					
					 $this->session->set_flashdata('not-a-admin','No Access'); 
					 redirect('auth/noaccess');	  
				}
			
		}*/
		
		
		
	
		
		
		
		
		
  
	
  }
  
}

?>