<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
/**
* 
*
*/
class JobBoard extends JobportalGlobal_Controller{
	function __construct() {
		parent::__construct();
	}

	public function index()
	{	
		$this->load->language('home',get_language_folder($this->lang_code));
		$data['title'] = 'Welcome To Job Portal';
		$data['content'] = 'general/general_views/home';
		$this->load->view('general/templates/gen_layout_front',$data);
	}

	public function searchresult()
	{	
		$data['title'] = 'Search Result';
		$data['content'] = 'general/general_views/search_result';
		$this->load->view('general/templates/gen_layout_front',$data);
	}

	public function Jobdetails()
	{	
		$data['title'] = 'Job Detail';
		$data['content'] = 'general/general_views/job_details';
		$this->load->view('general/templates/gen_layout_front',$data);
	}

	public function hotjobs()
	{	
		$data['title'] = 'Job Detail';
		$data['content'] = 'general/general_views/hot_jobs';
		$this->load->view('general/templates/gen_layout_front',$data);
	}

	public function postvacancy(){
		if(!$this->input->cookie('userinfo')){
			redirect(SSO_URL.'/serviceauth/login?continueurl='.current_url());
		}
		else {
			$result = $this->mdl_general->check_user();
			// print_r($result);
			foreach ($result as $rkey => $r_value) {
				if($r_value['user_type_flg'] == '2'){
					redirect(base_url().'employer/new_job');
					break;
				}
			}
			redirect(base_url().'allusers/get_started');
		}
	}
}
?>