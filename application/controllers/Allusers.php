<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
	
class Allusers extends JobportalGlobal_Controller{
	function __construct() 
  	{
		parent::__construct();
		if(!$this->input->cookie('userinfo')){
			redirect(SSO_URL.'/serviceauth/login?continueurl='.current_url());
		}
	}

	public function get_started(){
		$data['title'] = 'Get Started';
		$data['company_list'] = $this->mdl_general->company_details('1');
		$data['agency_list'] = $this->mdl_general->company_details('2');
		$data['content'] = 'allusers/allusers_views/get_started';
		$this->load->view('allusers/templates/allusers_layout',$data);
	}

	public function startupjobseeker(){
		$result = $this->mdl_general->check_jobseeker();
		if($result['user_type_flg'] == 1){
			redirect('myjobs/dashboard');
		}

		$data['title'] 		= 'Get Started With Job Seeker';
		$data['area_exp'] 	= $this->mdl_position->get_area_exp($this->lang_code);
		$data['content'] 	= 'allusers/allusers_views/startupjobseeker';
		$this->load->view('allusers/templates/allusers_layout',$data);	
	}

	public function activate(){
		$data['title'] = 'Wait For Activation';
		$data['content'] = 'allusers/allusers_views/activate';
		$this->load->view('allusers/templates/allusers_layout',$data);
	}

	public function company_approval(){
		if(isset($_GET['accesstoken'])){
			$result = $this->mdl_general->check_company_accesstoken($_GET['accesstoken']);
			if($result){
				$data['title'] = 'Company Activation Successful';
				$data['content'] = 'allusers/allusers_views/activate_company';
				$this->load->view('allusers/templates/allusers_layout',$data);
			}
			else{
				$this->load->view('notvalid');	
			}
		}
	}

	public function startwithcompany(){
		$data['title'] 		= 'Get Started With Company';
		$data['area_exp'] 	= $this->mdl_position->get_area_exp($this->lang_code);
		$data['company_details'] = $this->mdl_general->check_company();
		$data['country_location'] = $this->mdl_position->get_country_location($this->lang_code);
		$data['content'] 	= 'allusers/allusers_views/startupcompany';
		$this->load->view('allusers/templates/allusers_layout',$data);
	}
}