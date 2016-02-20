<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
	
class JobSeeker extends JobportalGlobal_Controller{
	function __construct() 
  	{
		parent::__construct();
		$this->load->model('mdl_jseeker/mdl_jobseeker');
		$this->load->language('job_seeker', get_language_folder($this->lang_code));
		if(!$this->input->cookie('userinfo')){
			redirect('http://dev2.lightspeedwl.com/serviceauth/login?continueurl='.current_url());
		}
		
	}

	public function index()
	{	
		redirect('myjobs/dashboard');		
	}

	public function dashboard()
	{	
		$data['title'] = 'Dashboard';
		$data['jobseeker_profile'] = $this->mdl_jobseeker->get_profile();
		$data['jobseeker_position_applied'] = $this->mdl_jobseeker->get_applied_position();
		$data['content'] = 'jseeker/js_views/dashboard';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function myprofile()
	{	
		$data['title'] = 'My Profile';
		$data['position_result']   = $this->mdl_position->get_position($this->lang_code);
		$data['area_exp'] 	       = $this->mdl_position->get_area_exp($this->lang_code);
		$data['jobseeker_profile'] = $this->mdl_jobseeker->get_profile();
		if(!isset($data['jobseeker_profile'])){
			redirect(base_url().'allusers/startupjobseeker');
		}
		$data['jobseeker_position_applied'] = $this->mdl_jobseeker->get_applied_position();

		$data['content'] = 'jseeker/js_views/myprofile';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function myresume()
	{	
		$data['title'] = 'My Resume';
		$data['jobseeker_profile'] = $this->mdl_jobseeker->get_profile();
		if(!isset($data['jobseeker_profile'])){
			redirect(base_url().'allusers/startupjobseeker');
		}
		$data['content'] = 'jseeker/js_views/myresume';
		$this->load->view('jseeker/templates/js_layout_resume',$data);
	}

	public function usermessages()
	{	
		$data['title'] = 'Messages';
		$data['content'] = 'jseeker/js_views/usermessages';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function temp_availibility()
	{	
		$data['title'] = 'Temporary Availability';
		$data['jobseeker_profile'] = $this->mdl_jobseeker->get_profile();
		if(!isset($data['jobseeker_profile'])){
			redirect(base_url().'allusers/startupjobseeker');
		}		
		$data['position_result']   = $this->mdl_position->get_position($this->lang_code);
		$data['area_exp'] 	       = $this->mdl_position->get_area_exp($this->lang_code);
		$data['country_location'] = $this->mdl_position->get_country_location($this->lang_code);
		$data['jobseeker_position_applied'] = $this->mdl_jobseeker->get_applied_position();
		$data['content'] = 'jseeker/js_views/temp_availibility';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function tempappliedjobs()
	{	
		$data['title'] = 'Temporary Applied Jobs';
		$data['content'] = 'jseeker/js_views/tempappliedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function tempsavedjobs()
	{	
		$data['title'] = 'Temporary Saved Jobs';
		$data['content'] = 'jseeker/js_views/tempsavedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function tempmatchjobs()
	{	
		$data['title'] = 'Temporary Matched Jobs';
		$data['content'] = 'jseeker/js_views/tempmatchjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function machedjobs()
	{	
		$data['title'] = 'Mached Jobs';
		$data['content'] = 'jseeker/js_views/machedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function savedjobs()
	{	
		$data['title'] = 'Saved Jobs';
		$data['content'] = 'jseeker/js_views/savedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function appliedjobs()
	{	
		$data['title'] = 'Applied Jobs';
		$data['content'] = 'jseeker/js_views/appliedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function shortlistedjobs()
	{	
		$data['title'] = 'Shortlisted Job Lists';
		$data['content'] = 'jseeker/js_views/shortlistedjobs';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

	public function messagedetails()
	{	
		$data['title'] = 'Message title';
		$data['content'] = 'jseeker/js_views/messagedetails';
		$this->load->view('jseeker/templates/js_layout',$data);
	}

}
?>