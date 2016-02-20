<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');

class Employer extends JobportalGlobal_Controller
{
	public $companyid,$unique_compid;
	public function __construct()
	{
		parent::__construct();
		if(!$this->input->cookie('userinfo')){
			redirect('http://dev2.lightspeedwl.com/serviceauth/login?continueurl='.current_url());
		}
		
		$this->load->model('mdl_company/Mdl_employer');
		//$this->load->library('Mandrill'); 
		//$this->config->load('paypal');
		$this->load->library('Cart');
		$this->load->helper('geo_location');
		$this->load->language('common',get_language_folder($this->lang_code));
		if($this->jp_id !='')
		{
			$res_company_detail = $this->Mdl_employer->get_companyid($this->jp_id);
			if($res_company_detail)
			{
				$this->companyid = $res_company_detail['company_id']; 
				$this->unique_compid = $res_company_detail['unique_compid']; 
			}
		}
	}
	
	public function dashboard()
	{
		$emp_content['title'] = "Employer Dashboard";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/home";
		
		$emp_content['resEmployerDetails'] = $this->Mdl_employer->getEmployerDetails($this->jp_id);
		
		// Active Jobs
		$emp_content['activeJobsCollection'] = $this->Mdl_employer->getJobsCollection('active',$this->jp_id);
		// Expired Jobs
		$emp_content['inActiveJobsCollection'] = $this->Mdl_employer->getJobsCollection('expired',$this->jp_id);
		// Posted Jobs
		$emp_content['postedJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id);
		// Job Response
		$emp_content['responseJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id,'yes');
		// No Response
		$emp_content['noresponseJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id,'no');
		
		// Reminder Message Colelction
		$emp_content['reminderCollection'] = $this->Mdl_employer->getReminderColelction('active',$this->jp_id);
		
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}

	public function dashboard_notify() {
		$emp_content['title'] = "Notification";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/dashboard_notify";
		
		// Active Jobs
		$emp_content['activeJobsCollection'] = $this->Mdl_employer->getJobsCollection('active',$this->jp_id);
		// Expired Jobs
		$emp_content['inActiveJobsCollection'] = $this->Mdl_employer->getJobsCollection('expired',$this->jp_id);
		// Posted Jobs
		$emp_content['postedJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id);
		// Job Response
		$emp_content['responseJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id,'yes');
		// No Response
		$emp_content['noresponseJobsCollection'] = $this->Mdl_employer->getJobsCollection('posted_jobs',$this->jp_id,'no');
		
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}

	public function cart_page()
	{
		$this->config->load('paypal');
		$paypal_config = array(
							'Sandbox' => $this->config->item('Sandbox'),
							'APIUsername' => $this->config->item('APIUsername'),
							'APIPassword' => $this->config->item('APIPassword'),
							'APISignature' => $this->config->item('APISignature'),
							'APISubject' => '',
							'APIVersion' => $this->config->item('APIVersion')
						);
		$this->load->library('Paypal_Pro', $paypal_config);
		$data = 'id=it1| qty=1| name=T-Shirt| price=$9.95';

		$data_log = $this->paypal_pro->Logger('paypal_success_log',$data);


		/*$job_cart_data = array(
					'id'=>'1',
					'name'=>'Web Developer',
					'hot_job'=>1,
					'advertise_job'=>0,
					'qty'=>1,
					'price'=>100
					);
		print_r($job_cart_data);
		$this->cart->insert($job_cart_data);
		print_r($this->cart->contents());
		exit;*/

		
		/*$this->cart->insert($data);
		print_r($this->cart->contents()); 
		 exit;*/
		
	}

	public function view_jobs()
	{
		$emp_content['title'] = "View all posted jobs";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/view_jobs";
		
		$emp_content['jobsCollection'] = $this->Mdl_employer->getJobsCollection('listing');
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*
	 * Vie Jobs in Detailed
	 */
	public function get_job($job_id=0) {
		$emp_content['title'] = "Job Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/job_details";
		
		// get job details
		$emp_content['job_details'] = $this->Mdl_employer->getJobDetails($job_id);
			
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*
	 * Add New Job
	 */
	public function add_new_job($id=0) {
		$Langtrans_myself = FALSE;
		$Langtrans_company = FALSE;
		$lang_trans_data = array();
		$emp_content['edit_details'] = array();

		// Job Title
		if($id == 0) { 
			$emp_content['title'] = "Post new job";
			$emp_content['job_header'] = "Add Job";
			$emp_content['job_sub_header_regular'] = "Add Regular Job";
			$emp_content['job_sub_header_temp'] = "Add Temporary Job";
		} else {
			$emp_content['title'] = "Edit job";
			$emp_content['job_header'] = "Edit Job";
			$emp_content['job_sub_header_regular'] = "Edit Regular Job";
			$emp_content['job_sub_header_temp'] = "Edit Temporary Job";
			// get job details
			$emp_content['edit_details'] = $this->Mdl_employer->getJobDetails($id);
		}
		
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		     
		// Get Area of Experience
		$emp_content['area_experience'] = $this->Common_model->getAreaExperienceCollection(1);
		
		// Get Language Collection
		$emp_content['languageCollection'] = $this->Common_model->getLanguageCollection(1);
		
		// Get Qualification Collection
		$emp_content['qualificationCollection'] = $this->Common_model->getQualificationCollection(1);
		
		// Get Salary Min Collection
		$emp_content['salaryMinCollection'] = $this->Common_model->getSalaryCollection(1,'min');
		
		// Get Salary Max Collection
		$emp_content['salaryMaxCollection'] = $this->Common_model->getSalaryCollection(1,'max');
		
		// Get Work Exp Collection
		$emp_content['workExpCollection'] = $this->Common_model->getWorkExpCollection(1);
		
		// Get Job Location
		$emp_content['job_location'] = $this->Common_model->getCountriesCollection(1);

		// Form POST
		if(!empty($this->input->post())) { 
			$job_quali = $this->input->post('job_qualification');
			$other_job_quali = ($job_quali== '4') ? $this->input->post('other_qual') : "";

			$other_lang_trans = ($this->input->post('other_lang_opt') == 'yes') ? 1: 0;
			
			if($this->input->post('job_type') == '1' || $emp_content['edit_details']['job_type'] == '1'){
				$job_rotation_flag = $this->input->post('rotation_flag');
				$rotation_ondays = ($job_rotation_flag== '0') ? "" :  $this->input->post('job_ondays');
				$rotation_offdays = ($job_rotation_flag== '0') ? "" :  $this->input->post('job_offdays');	
				$temp_available_from = "";
				$temp_available_to = "";
			} else {
				$job_rotation_flag = 0;
				$rotation_ondays = "";
				$rotation_offdays = "";
				$temp_available_from = date('Y-m-d',strtotime($this->input->post('temp_available_from')));
				$temp_available_to = date('Y-m-d',strtotime($this->input->post('temp_available_to')));
			}
			

			$hot_job_ads = ($this->input->post('job_adv_hotjob') == '') ? 0 :  $this->input->post('job_adv_hotjob');
			$advertise_jobs = ($this->input->post('job_advertisement') == '') ? 0 :  $this->input->post('job_advertisement');
			
			$job_position_name = trim($this->input->post('position'));
			$job_position = $this->Mdl_employer->get_jobpos_id($job_position_name);
			$position_price = $this->Mdl_employer->get_position_cost($job_position);				
			$hotjob_price = $this->Mdl_employer->get_hotjob_cost($hot_job_ads);
			$advertise_price = $this->Mdl_employer->get_advertise_cost($advertise_jobs);

			$translate_mylang = $this->input->post('mytrans_lang');
			$translate_complang = $this->input->post('compserv_lang');

			if(count($translate_mylang)>0) {
				$Langtrans_myself = TRUE;
				for($tl=0; $tl<count($translate_mylang);$tl++)
				{
					$transmy_desc[] = addslashes($this->input->post('myselfdesc_'.$translate_mylang[$tl]));
					$transmy_skills[] = addslashes($this->input->post('myselfskill__'.$translate_mylang[$tl]));
					$transmy_condition[] = addslashes($this->input->post('myselfcondition_'.$translate_mylang[$tl]));
				}
			}
			if(count($translate_complang)>0)
			{
				$Langtrans_company = TRUE;
				for($tcl=0; $tcl<count($translate_complang);$tcl++)
				{
					$transcomp_lang[] = $translate_complang[$tcl];
				}
			}

		   $add_new_rjob_data = array(
									'job_type'=>$this->input->post('job_type'),
									'language_id'=>$this->input->post('job_lang'),
									'company_id'=>$this->Common_model->getPortalInfo('company_id'),
									'positionid'=>$job_position['positionid'],
									'job_description'=>addslashes($this->input->post('job_desc')),
									'skills'=>addslashes($this->input->post('job_skills')),
									'workexperience_id_min'=>$this->input->post('job_wrexp_min'),
									'workexperience_id_max'=>$this->input->post('job_wrexp_max'),
									'areaofexpid'=>$this->input->post('job_area_exp'),
									'salary_id_min'=>$this->input->post('job_salary_min'),
									'salary_id_max'=>$this->input->post('job_salary_max'),
									'locationid'=>$this->input->post('job_location'),
									'rotation_flag'=>$job_rotation_flag,
									'rotation_ondays'=>$rotation_ondays,
									'rotation_offdays'=>$rotation_offdays,
									'noof_vacancy'=>$this->input->post('job_vacancy_count'),
									'advopening_date'=>date('Y-m-d',strtotime($this->input->post('job_adv_opendate'))),
									'advclosing_date'=>date('Y-m-d',strtotime($this->input->post('job_adv_closedate'))),
									'tempavail_startdate'=>$temp_available_from,
									'tempavail_enddate'=>$temp_available_to,
									'qualification_id'=>$job_quali,
									'other_qualification'=>$other_job_quali,
									'job_condition'=>addslashes($this->input->post('job_condition')),
									'multilingual_flag'=>$other_lang_trans,
									'hotjob_flag'=>$hot_job_ads,
									'advertisementjob_flag'=>$advertise_jobs,
									'jobpostingdate'=>date('Y-m-d'),
									'ip'=>$_SERVER['REMOTE_ADDR'],
									'job_postedby'=>$this->jp_id,
									'jobstatus'=>'0'
									);

			if($id == 0) { 
				$res_post_job_id = $this->Mdl_employer->post_new_job($add_new_rjob_data);
			} else {
				unset($add_new_rjob_data['job_type']);	
				unset($add_new_rjob_data['language_id']);	
				unset($add_new_rjob_data['company_id']);	
				unset($add_new_rjob_data['positionid']);	
				$res_post_job_id = $this->Mdl_employer->update_job_details($add_new_rjob_data,$id);
				redirect('employer/all_jobs');
			}
			if($Langtrans_myself == TRUE && $other_lang_trans == 1)	
			{
				//print_r($res_post_job_id);exit;
				if(count($translate_mylang)>0)
				{
					for($x=0; $x < count($translate_mylang); $x++)
					{
						$lang_trans_data = array(
											'jobid'=>$res_post_job_id,
											'job_description'=>$transmy_desc[$x],
											'job_skills'=>$transmy_skills[$x],
											'condition'=>$transmy_condition[$x],
											'dateadded'=>date('Y-m-d H:i:s'),
											'language_code'=>$translate_mylang[$x],
											'user_status'=>'0',
											);	
						$res_translate_data = $this->Mdl_employer->save_job_multilang($lang_trans_data);
					}
				}

				
			}
			
			if($res_post_job_id != false)
			{
				
				//$total_job_cost = $position_price['charge'] + $hotjob_price['adv_charge'] + $advertise_price['adv_charge']; 
				if($job_position_name != '')
				{
					$position_cart_data = array(
											'id'=>rand(1,9),
											'name'=>$job_position_name,
											'qty'=>1,
											'price'=>$position_price['charge']
											);
					$this->cart->insert($position_cart_data);	
				}
				if($hot_job_ads == 1)
				{
					$hotjob_cart_data = array(
											'id'=>rand(1,9),
											'name'=>'Hot Job',
											'qty'=>1,
											'price'=>$hotjob_price['adv_charge']
											);	
					$this->cart->insert($hotjob_cart_data);
				}
				if($advertise_jobs == 1)
				{
					$advertise_cart_data = array(
											'id'=>rand(1,9),
											'name'=>'Advertise Job',
											'qty'=>1,
											'price'=>$advertise_price['adv_charge']
											);
					$this->cart->insert($advertise_cart_data);
				}

				/*$job_cart_data = array(
									'id'=>rand(1,9),
									'name'=>$job_position_name,
									'post_jobid'=>$job_position['positionid'],
									'position_name'=>$job_position_name,
									'hot_job'=>$hot_job_ads,
									'advertise_job'=>$advertise_jobs,
									'qty'=>1,
									'price'=>$total_job_cost
									);
				$this->cart->insert($job_cart_data);*/
				redirect('employer/checkout');
				//print_r($this->cart->contents);exit;
				//echo "<li>".$res_post_job;	exit;
				/*if($this->input->post('translate_yourself') == 'yourself')
				{
					$lang_trans_code = $this->input->post('mytrans_lang');
					for($i=0; $i<count($lang_trans_code); $i++)
					{
						$lang_desc_field = "myselfdesc_".$lang_trans_code[$i];
						$lang_keyskill_field = "myselfskill_".$lang_trans_code[$i];
						$lang_condition_field = "myselfcondition_".$lang_trans_code[$i];*/	
						/*$multi_lang_desc[] = $this->input->post($lang_desc_field); 
						$multi_lang_keyskils[] = $this->input->post($lang_keyskill_field); 
						$multi_lang_condition[] = $this->input->post($lang_condition_field);*/ 
						/*$multi_lang_job_detail = array(
													'jobid'=>$res_post_job_id,
													'job_description'=>$this->input->post($lang_desc_field),
													'job_skills'=>$this->input->post($lang_keyskill_field),
													'condition'=>$this->input->post($lang_condition_field),
													'dateadded'=>date('Y-m-d H:i:s'),
													'language_code'=>$lang_trans_code[$i]
													);*/
						//print_r($multi_lang_job_detail);exit;
						/*$res_job_transalate = $this->Mdl_employer->translate_jobs($multi_lang_job_detail);
						if($res_job_transalate == true)
						{
							redirect('employer/all_jobs');
						}*/
					//}
				//}
			}

			/*if($this->input->post('translate_yourself') == 'yourself')
			{
				$lang_trans_code = $this->input->post('mytrans_lang');
				for($i=0; $i<count($lang_trans_code); $i++)
				{
					$lang_desc_field = "myselfdesc_".$lang_trans_code[$i];
					$lang_keyskill_field = "myselfskill_".$lang_trans_code[$i];
					$lang_condition_field = "myselfcondition_".$lang_trans_code[$i];	
				}
				
				$multi_lang_desc[] = $this->input->post($lang_desc_field); 
				$multi_lang_keyskils[] = $this->input->post($lang_keyskill_field); 
				$multi_lang_condition[] = $this->input->post($lang_condition_field); 
			}*/
			/*print_r($multi_lang_desc);
			print_r($add_new_rjob_data);exit;*/

			//print_r($res_post_job);exit;
		}
		/*elseif($this->input->post('job_type') && $this->input->post('job_type') == 'T')
		{
			$add_new_tjob_data = array(
									'job_type'=>$this->input->post(''),
									'language_code'=>$this->input->post(''),
									'company_id'=>$this->input->post(''),
									'positionid'=>$this->input->post(''),
									'job_description'=>$this->input->post(''),
									'skills'=>$this->input->post(''),
									'work_experience_min'=>$this->input->post(''),
									'work_experience_max'=>$this->input->post(''),
									'salary_min'=>$this->input->post(''),
									'salary_max'=>$this->input->post(''),
									'job_location'=>$this->input->post(''),
									'rotation_flag'=>$this->input->post(''),
									'rotation_ondays'=>$this->input->post(''),
									'rotation_offdays'=>$this->input->post(''),
									'noof_vacancy'=>$this->input->post(''),
									'advopening_date'=>$this->input->post(''),
									'advclosing_date'=>$this->input->post(''),
									'tempavail_startdate'=>$this->input->post(''),
									'tempavail_enddate'=>$this->input->post(''),
									'qualification'=>$this->input->post(''),
									'condition'=>$this->input->post(''),
									'multilingual_flag'=>$this->input->post(''),
									'hotjob_flag'=>$this->input->post(''),
									'advertisementjob_flag'=>$this->input->post(''),
									'language_translation_myself_flag'=>$this->input->post(''),
									'jobpostingdate'=>$this->input->post(''),
									'ip'=>$this->input->post(''),
									'job_postedby'=>$this->input->post(''),
									'jobstatus'=>$this->input->post(''),
									);
		}*/
		$emp_content['right_side'] = "company/company_views/add_job";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*
	 * Delete Job 
	 */
	public function delete_job($job_id=0) {
		$update_job_data = array();	
		$update_job_data['jobstatus']  = 2;	
		$this->Mdl_employer->update_job_details($update_job_data,$job_id);
		redirect('employer/all_jobs');
	}
	public function checkout()
	{
		$emp_content['title'] = "Checkout details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['session_data'] = $this->Mdl_employer->get_plan_sessdetail(); 
		$emp_content['right_side'] = "company/company_views/checkout";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	public function closed_job()
	{
		$emp_content['title'] = "Closed jobs details";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/closed_jobs";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function reopen_job()
	{
		$emp_content['title'] = "Post new job";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/reopen_job";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function edit_company()
	{
		$emp_content['title'] = "Modify Company Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/edit_company";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*
	 * Get Employer List
	 */
	public function view_employer() {
		$emp_content['title'] = "All employer details";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['all_records'] = $this->Mdl_employer->view_employers();
		$emp_content['right_side'] = "company/company_views/view_employers";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}

	
	public function add_employer()
	{
		if($this->input->post('fname'))
		{
			$emplr_email = $this->input->post('email');
			$emplr_fname = $this->input->post('fname');
			$emplr_lname = $this->input->post('lname');
			$job_permission = $this->input->post('jobpermission');
			if($job_permission == null){$job_permission=0;}
			$resume_permission = $this->input->post('resumepermission');
			if($resume_permission == null){$resume_permission=0;}
			$add_empl_data = array(
								'fname'=>$emplr_fname,
								'lname'=>$emplr_lname,
								'email'=>$emplr_email,
								'language_code'=>$this->input->post('language'),
								'country_code'=>$this->input->post('location'),
								'jobposting_permission'=>$job_permission,
								'resumestats_permission'=>$resume_permission,
								);
			$res_add_empl = $this->Mdl_employer->add_employer_temp($add_empl_data);
			if($res_add_empl == true)
			{
				$emplr_fromname['username'] = $emplr_fname.' '.$emplr_lname;
				$emplr_mail_message = $this->load->view('company/mail_templates/simple',$emplr_fromname,TRUE);
				
				$emplr_fromemail = 'admin@sundari.com';
				$emplr_email_senddata = array(
												'html'=>$emplr_mail_message,
												'subject'=>'Employer Registration',
												'from_email'=>$emplr_fromemail,
												'from_name'=>'Sundari Admin',
												'to'=>array(array('email'=>$emplr_email))
											);
				//print_r($emplr_email_senddata);exit;
				$emplr_mail_result = $this->mandrill->messages_send($emplr_email_senddata);
				if($emplr_mail_result[0]['status'] == 'sent')
				{
					$this->session->set_flashdata('mail_succ','You got one mail in your inbox shortly');	
				}
				else
				{
					$this->session->set_flashdata('mail_err','Employer has been added succesfully, Some error with mail....');	
				}
			}
			else
			{
				$this->session->set_flashdata('mesg_err','Employer has not been added');
			}
		}
		redirect('employer/all_employer');
	}
	public function unapprove_employer()
	{
		$emp_content['title'] = "All employer details";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/unapprove_employers";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function candidate_shortlist()
	{
		$emp_content['title'] = "Modify Company Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/shortlist_candidate_list";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function candidate_onhold()
	{
		$emp_content['title'] = "Modify Company Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/onhold_candidate_list";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function candidate_reject()
	{
		$emp_content['title'] = "Modify Company Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['right_side'] = "company/company_views/reject_candidate_list";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function saved_search()
	{
		$emp_content['title'] = "Saved Search Detail";
		$emp_content['top_search'] = "company/company_temp/top_search";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/saved_search";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function resume_search()
	{
		$emp_content['title'] = "Find Resume";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "";
		$emp_content['view_area_exp'] = $this->Common_model->getAreaExperienceCollection();
		$emp_content['view_regions'] = $this->Mdl_employer->view_regions();
		$emp_content['view_countries'] = $this->Common_model->getCountriesCollection();
		$emp_content['right_side'] = "company/company_views/resume_search";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function resume_search_result()
	{
		if($this->input->post('search_type') && $this->input->post('search_type') == 'R')
		{
			echo "Regular";
		}
		elseif($this->input->post('search_type') && $this->input->post('search_type') == 'T')
		{
			echo "Temporary";
		}
	}
	public function all_folders()
	{
		$emp_content['title'] = "All Folder Detail";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/all_folders";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function download_stats()
	{
		$emp_content['title'] = "Download Statistics";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/download_stats";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function get_report()
	{
		$emp_content['title'] = "Download Statistics Report";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/generate_report";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function plan_details()
	{
		$emp_content['title'] = "All resume plans";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['plans_data'] = $this->Mdl_employer->get_all_plans();
		$emp_content['current_plans_data'] = $this->Mdl_employer->get_current_plans();
		//print_r($emp_content['current_plans_data']);exit;
		$emp_content['right_side'] = "company/company_views/plan_detail";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	public function purchase_resume_plan()
	{
		if($this->uri->segment(4) != '')
		{

			$res_find_plan = $this->Mdl_employer->get_plan_detail($this->uri->segment(4));
			//print_r($res_find_plan);exit;
			$resume_sessionid = sha1($this->jp_id.'-'.$this->companyid.'-'.$res_find_plan['planid']);
			$resume_plan_cart = array(
									'sess_id'=>$resume_sessionid,
									'userid'=>$this->jp_id,
									'companyid'=>$this->companyid,
									'planid'=>$res_find_plan['planid'],
									'planname'=>$res_find_plan['planname'],
									'plan_price'=>$res_find_plan['price'],
									);
			//print_r($resume_plan_cart);exit;
			$res_plan_session = $this->Mdl_employer->resume_plan_session($resume_plan_cart);
			if($res_plan_session == true)
			{
				redirect('employer/checkout');
			}
		}
	}
	public function plan_history()
	{
		$emp_content['title'] = "All plans history";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/plans_history";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*******************************************************************************************************************************
	 *	EMAIL TEMPLATE SECTION
	 *******************************************************************************************************************************/
	
	/*
	 * List Email Template
	 */	
	public function email_templates() {
		$emp_content['title'] = "Email Template Details";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";		
		$emp_content['all_templates'] = $this->Mdl_employer->view_templates(1,'',$this->jp_id);
		$emp_content['right_side'] = "company/company_views/mail_template";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	
	/*
	 * Add Email Template
	 */	
	public function add_email_template() {
		$email_id = $this->input->post('tmpl_id');
		
		// Add / Edit Records
		if($this->input->post('tmpl_name')){
			$add_new_template = array(
										'userid'=>$this->jp_id,
										'template_name'=>$this->input->post('tmpl_name'),
										'subject'=>$this->input->post('tmpl_subj'),
										'template_from'=>$this->input->post('tmpl_from'),
										'message'=>$this->input->post('tmpl_mesg'),
										'signature'=>$this->input->post('tmpl_sign'),
										'created_date'=>date('Y-m-d')
									);			
			if(empty($email_id)) { 
				$res_add_template = $this->Common_model->insertRecords($add_new_template,'email_template_detail');

				// Check Success / Failure
				if($res_add_template == 1) {
					$this->session->set_flashdata('temp_succ','Your email template has been added successfully');
				} else {
					$this->session->set_flashdata('temp_err','Your email template has not been added');
				}
			} else {
				unset($add_new_template['userid']);	
				unset($add_new_template['created_date']);	
	
				$res_update_templ = $this->Common_model->updateRecords($add_new_template,'email_template_detail','templateid',$email_id);
		
				// Check Success / Failure
				if($res_update_templ == 1) {
					$this->session->set_flashdata('update_mail_succ','Email template has been updated successfully');
				} else {
					$this->session->set_flashdata('update_mail_err','Email template has not been updated');
				}
			}
		}
		redirect('employer/mail_template');
	}
	
	/*******************************************************************************************************************************
	 *	REMINDER SECTION
	 *******************************************************************************************************************************/
	
	/*
	 * Message Reminder
	 */	
	public function message_reminder() {
		$emp_content['title'] = "Message Reminder";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		
		// Insert New Records
		if($this->input->post('reminderdate')) {
			$reminder_insert = array(
									'reminderdatetime'=>date('Y-m-d H:i:s',strtotime($this->input->post('reminderdate'))),
									'message'=>$this->input->post('reminder_mesg'),
									'userid'=>$this->jp_id
									);
			$res_reminder = $this->Common_model->insertRecords($reminder_insert,'');
			
			// check Status / Failure
			if($res_reminder == true) {
				$emp_content['mesg_succ'] = "Reminder has been added successfully";	
			} else {
				$emp_content['mesg_err'] = "Reminder has not been added";	
			}
		}
		$emp_content['right_side'] = "company/company_views/add_reminders";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	
	/*******************************************************************************************************************************
	 *	BEST IN COMPANY
	 *******************************************************************************************************************************/
	
	/*
	 * Manage BestInCompany
	 */	
	public function bestin_company() {
		$emp_content['title'] = "Best in company";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$month_employ_image = "";

		if(isset($_FILES['employ_image']['name']) && $_FILES['employ_image']['name'] != '') {
			if($_FILES['employ_image']['type'] == 'image/jpeg' || $_FILES['employ_image']['type'] == 'image/jpg' || $_FILES['employ_image']['type'] == 'image/png' || $_FILES['employ_image']['type'] == 'image/gif') {
				$month_employ_image = str_replace("-","",$_FILES['employ_image']['name']);
				$month_employ_image = getRandomName(7).$month_employ_image;	
				//compress($_FILES['employ_image']['tmp_name'],DIR_IMAGE.$month_employ_image,60);
			} else {
				$this->session->set_flashdata("type_err","Employee image should be in jpeg, jpg, gif, png format only");	
			}
		}
		
		// ADD New Record
		if($this->input->post('employ_name')) {	
			$bestempmon_data = array(
										'userid'=>$this->jp_id,
										'company_id'=>$this->Common_model->getPortalInfo('company_id'),
										'person_image'=>$month_employ_image,
										'personname'=>$this->input->post('employ_name'),
										'unitname'=>$this->input->post('unit_name'),
										'shortdescription'=>$this->input->post('bestemp_description'),
										'monthname'=>$this->input->post('month'),
										'year'=>$this->input->post('year'),
										'startdate_show'=>date('Y-m-d',strtotime($this->input->post('from-date'))),
										'enddate_show'=>date('Y-m-d',strtotime($this->input->post('to-date'))),
										'charge_amount'=>0,//$this->input->post('bestemp_advertise_cost'),
										'declare_date'=>date('Y-m-d H:i:s')
									);
			$res_bestempmon_add = $this->Common_model->insertRecords($bestempmon_data,'best_employee_detail');
			
			// Check Success / Failure
			if($res_bestempmon_add == true) {
				$this->session->set_flashdata("mesg_succ","Your employee month data has been added succesfully");
			} else {
				$this->session->set_flashdata("mesg_err","Your employee month data has not been added");
			}
		}
		$emp_content['right_side'] = "company/company_views/bestin_company";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	
	/*
	 * Manage BestInYear
	 */	
	public function bestin_year() {
		$emp_content['title'] = "Best in company";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		if(isset($_FILES['bestyear_image']['name']) && $_FILES['bestyear_image']['name'] != '')
		{
			if($_FILES['bestyear_image']['type'] == 'image/jpeg' || $_FILES['bestyear_image']['type'] == 'image/jpg' || $_FILES['bestyear_image']['type'] == 'image/png' || $_FILES['bestyear_image']['type'] == 'image/gif')
			{
				$employ_year_image = str_replace("-","",$_FILES['bestyear_image']['name']);
				$employ_year_image = getRandomName(7).$employ_year_image;	
				//compress($_FILES['bestyear_image']['tmp_name'],DIR_IMAGE.$employ_year_image,60);
			}
			else
			{
				$this->session->set_flashdata("type_err","Employee image should be in jpeg, jpg, gif, png format only");	
			}
		}
		
		// Add New Record
		if($this->input->post('bestyear_unitname')) {	
			$bestempyear_data = array(
										'userid'=>$this->jp_id,
										'company_id'=>$this->Common_model->getPortalInfo('company_id'),	
										'unitphoto'=>$employ_year_image,
										'chiefname'=>$this->input->post('chief_name'),
										'unitname'=>$this->input->post('bestyear_unitname'),
										'shortdescription'=>$this->input->post('bestyear_desc'),
										'year'=>$this->input->post('bestyear_year'),
										'startdate_show'=>date('Y-m-d',strtotime($this->input->post('bestyear_fromdate'))),
										'enddate_show'=>date('Y-m-d',strtotime($this->input->post('bestyear_todate'))),
										'charge_amount'=>0,//$this->input->post('bestyear_advertisecost'),
										'declare_date'=>date('Y-m-d H:i:s')
									);
			
			$res_bestempmon_add = $this->Common_model->insertRecords($bestempyear_data,'best_unit_ofyear'); 
			
			// check Success / Failure
			if($res_bestempmon_add == true) {
				$this->session->set_flashdata("mesg_succ","Your employee year data has been added succesfully");
			} else {
				$this->session->set_flashdata("mesg_err","Your employee year data has not been added");
			}
			 
		}
		$emp_content['right_side'] = "company/company_views/bestin_company";
		$this->load->view('company/company_temp/emp_layout',$emp_content);
	}
	
	/*******************************************************************************************************************************
	 *	COMPLAINT SECTION
	 *******************************************************************************************************************************/
	/*
	 * Create Complaint
	 */		
	public function send_complain() {
		$emp_content['title'] = "Best in company";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		
		// Add Complaint
		if($this->input->post('complain_reason')) {
			$complain_data = array('userid'=>$this->jp_id,
												'company_id'=>$this->Common_model->getPortalInfo('company_id'),	
												'complain_reason'=>$this->input->post('complain_reason'),
												'complain_message'=>$this->input->post('complain_message')
												);
			
			$res_complain_res = $this->Common_model->insertRecords($complain_data,'complain_details');
			// Check Success / Failure
			if($res_complain_res == true) {
				$this->session->set_flashdata("mesg_succ","Complaint data has been registered succesfully");
			} else {
				$this->session->set_flashdata("mesg_err","Complaint data has not been registered");
			}					
		}
		$emp_content['right_side'] = "company/company_views/send_complain";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	public function activity_report()
	{
		$emp_content['title'] = "Best in company";
		$emp_content['top_search'] = "";
		$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
		$emp_content['right_side'] = "company/company_views/activity_report";
		$this->load->view('company/company_temp/emp_layout',$emp_content);	
	}
	public function checkout_payment()
	{
		$this->config->load('paypal');
	    $paypal_config = array(
							'Sandbox' => $this->config->item('Sandbox'),
							'APIUsername' => $this->config->item('APIUsername'),
							'APIPassword' => $this->config->item('APIPassword'),
							'APISignature' => $this->config->item('APISignature'),
							'APISubject' => '',
							'APIVersion' => $this->config->item('APIVersion')
						);
	
		if($paypal_config['Sandbox'])
		{
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
		}
	
		$this->load->library('Paypal_Pro', $paypal_config);
		$item_detail='';
		if($this->input->post('card_type'))
		{
			/*$pre_trans_detail = array(
									'userid'=>$this->jp_id,
									'transaction_amount'=>$this->input->post('paying_amt'),
									'transaction_purpose'=>$this->input->post('item_desc'),
									'transaction_date'=>date('Y-m-d'),
									);
			$res_pretrans_det = $this->Mdl_employer->send_pretrans_detail($pre_trans_detail);
			if($res_pretrans_det)
			{*/
				$DPFields = array(
	        					'paymentaction' => 'Sale',
	        					'ipaddress' => $_SERVER['REMOTE_ADDR'],
	        					'returnfmfdetails' => '1'
	    						);
	 
	    		$CCDetails = array(
	        					'creditcardtype' => $this->input->post('card_type'),
	        					'acct' => $this->input->post('card_num'),
	        					'expdate' => $this->input->post('exp_mon').$this->input->post('exp_year'),
	        					'cvv2' => $this->input->post('card_verval'),
	        					'startdate' => '',
	        					'issuenumber' => ''
	    						);
	 
				$PayerInfo = array(
	        					'email' => $this->input->post('ship_email'),
	        					'payerid' => '',
	        					'payerstatus' => '',
	        					'business' => 'Testers, LLC'
	    						);
	 
	    		$PayerName = array(
	        					'salutation' => '',
	        					'firstname' => $this->input->post('ship_fname'),
	        					'middlename' => '',
	        					'lastname' => $this->input->post('ship_lname'),
	        					'suffix' => ''
	    						);
	 
	    		$BillingAddress = array(
	        					'street' => $this->input->post('ship_street'),
	        					'street2' => '',
	        					'city' => $this->input->post('ship_city'),
	        					'state' => $this->input->post('ship_state'),
	        					'countrycode' => $this->input->post('country'),
	        					'zip' => $this->input->post('ship_zcode'),
	        					'phonenum' => $this->input->post('ship_phno')
								);
	 
	    		$ShippingAddress = array(
	        					'shiptoname' => $this->input->post('ship_fname'),
	        					'shiptostreet' => $this->input->post('ship_street'),
	        					'shiptostreet2' => '',
	        					'shiptocity' => $this->input->post('ship_city'),
	    						'shiptostate' => $this->input->post('ship_state'),
	    						'shiptozip' => $this->input->post('ship_zcode'),
	        					'shiptocountry' => $this->input->post('country'),
	        					'shiptophonenum' => $this->input->post('ship_phno')
	    						);
	 
				$PaymentDetails = array(
	        					'amt' => $this->input->post('paying_amt'),
	        					'currencycode' => 'USD',
	        					'itemamt' => $this->input->post('paying_amt'),
	    						'shippingamt' => '0.00',
	        					'shipdiscamt' => '',
	        					'handlingamt' => '',
	        					'taxamt' => '',
	        					'desc' => '',
	        					'custom' => '',
	        					'invnum' => '',
	        					'notifyurl' => ''
	    						); 
	 
	    		$OrderItems = array();
	    		$item_detail = $this->input->post('item_desc'); 
	    		$Item   = array(
	        					'l_name' => $item_detail,
	        					'l_desc' => '',
	        					'l_amt' => $this->input->post('paying_amt'),
	        					'l_number' => '',
	        					'l_qty' => '1',
	        					'l_taxamt' => '',
	        					'l_ebayitemnumber' => '',
	        					'l_ebayitemauctiontxnid' => '',
	        					'l_ebayitemorderid' => ''
	    						);
	    		array_push($OrderItems, $Item);
	 
			    $Secure3D = array(
			        'authstatus3d' => '',
			        'mpivendor3ds' => '',
			        'cavv' => '',
			        'eci3ds' => '',
			        'xid' => ''
			    );
	 
			    $PayPalRequestData = array(
			        'DPFields' => $DPFields,
			        'CCDetails' => $CCDetails,
			        'PayerInfo' => $PayerInfo,
			        'PayerName' => $PayerName,
			        'BillingAddress' => $BillingAddress,
			        'ShippingAddress' => $ShippingAddress,
			        'PaymentDetails' => $PaymentDetails,
			        'OrderItems' => $OrderItems,
			        'Secure3D' => $Secure3D
			    );

			    

			    //print_r($PayPalRequestData);	exit;
			    $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);
			    if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK']))
			    {
			    	$emp_content['title'] = "Checkout details";
					$emp_content['top_search'] = "";
					$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
			        $emp_content['paypal_errors'] = array('PayPalErrors'=>$PayPalResult['ERRORS']);
			        $emp_content['right_side'] = "company/company_views/checkout";
			        $this->load->view('company/company_temp/emp_layout',$emp_content);
			    }
			    else
			    {
			        // Successful call. Load view or whatever you need to do here.
			        $posttrans_data = array(
			        						'transactionid'=>$PayPalResult['TRANSACTIONID'],
			        						'userid'=>$this->jp_id,
			        						'transaction_amount'=>$PayPalResult['AMT'],
			        						'transaction_date'=>date('Y-m-d'),
			        						'transaction_detail'=>$PayPalResult['REQUESTDATA']['L_NAME0'],
			        						'transaction_username'=>$PayPalResult['REQUESTDATA']['FIRSTNAME'].' '.$PayPalResult['REQUESTDATA']['LASTNAME'],
			        						'transaction_email'=>$PayPalResult['REQUESTDATA']['EMAIL'],
			        						'transaction_location'=>$PayPalResult['REQUESTDATA']['COUNTRYCODE'],
			        						'transaction_status'=>'1'
			        						);

			        /*$paypal_succlog_data = 'AMT='.$PayPalResult['REQUESTDATA']['AMT'].'|ACCT='.$PayPalResult['REQUESTDATA']['ACCT'].'|CREDITCARDTYPE='.$PayPalResult['REQUESTDATA']['CREDITCARDTYPE'].'|FIRSTNAME='.$PayPalResult['REQUESTDATA']['FIRSTNAME'].'|LASTNAME='.$PayPalResult['REQUESTDATA']['LASTNAME'].'|STREET='.$PayPalResult['REQUESTDATA']['STREET'].'|CITY='.$PayPalResult['REQUESTDATA']['CITY'].'|STATE='.$PayPalResult['REQUESTDATA']['STATE'].'|ZIP='.$PayPalResult['REQUESTDATA']['ZIP'].'|COUNTRYCODE='.$PayPalResult['REQUESTDATA']['COUNTRYCODE'].'|CURRENCYCODE='.$PayPalResult['REQUESTDATA']['CURRENCYCODE'].'|EXPDATE='.$PayPalResult['REQUESTDATA']['EXPDATE'].'|IPADDRESS='. $PayPalResult['REQUESTDATA']['IPADDRESS'];*/

			        $res_posttrans_det = $this->Mdl_employer->save_transaction_data($posttrans_data);
			        //$paypalsucc_log = $this->paypal_pro->Logger('paypal_success_log',$paypal_succlog_data);
			        //$res_posttrans_det = 
			        $get_remaing_amount = $this->Mdl_employer->get_company_session_payment($this->companyid);
			        if($get_remaing_amount['price'] > 0)
			        {
				        if($get_remaing_amount['price'] ==  $PayPalResult['AMT'])
				        {
				        	$res_remove_session = $this->Mdl_employer->remove_company_session($this->companyid);
				        }
				    }
			        /*else
			        {
			        	$res_compsession_payment = $this->db->update_compsess_payment();
			        }*/
			        if($res_posttrans_det)
			        {
			        	$emp_content['title'] = "Checkout details";
						$emp_content['top_search'] = "";
						$emp_content['left_sidebar'] = "company/company_temp/left_sidebar";
			        	$emp_content['paypal_succ'] = array('PayPalResult'=>$PayPalResult);
			        	$emp_content['right_side'] = "company/company_views/paypal_success";
			        	$this->load->view('company/company_temp/emp_layout',$emp_content);	
			        }
			    }
			//}
		}
	}
}	

?>
