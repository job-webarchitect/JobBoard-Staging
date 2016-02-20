<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){		
			$ssoid = 124;
			$this->load->model('mdl_general/mdl_general');
		    $data = array(
				'ssoinfo' 	=> encode($ssoid),
				'ssofname' 	=> encode('Namas'),
				'ssolname' 	=> encode('JM'),
				'ssoemail' 	=> encode('namasjm@gmail.com'),
				'ssogender' => encode('male'),
				'ssodob' 	=> encode('1996-03-10'),
				'ssocountry'=> encode('India'),
				'ssomstatus'=> encode('0'),
				'ssocontact'=> encode('9945789865'),
				'ssopic'=> encode('')
			);
			
			$this->input->set_cookie('userinfo',json_encode($data),0);
			
			// Check User Type
			$userData = $this->mdl_general->checkUserType($ssoid);
			
			if(!empty($userData)) { 
				$this->input->set_cookie('portalInfo',encode($userData),0);
			}
		    $this->load->view('welcome_message');
	}
}
