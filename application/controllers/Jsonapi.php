<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
include_once(APPPATH . 'libraries/Doc2Txt.class.php');

class Jsonapi extends JobportalGlobal_Controller {
	
	public function getposition()
	{
			$this->load->model('mdl_general/mdl_position');
	      	$result['position_result']  = $this->mdl_position->get_position($this->lang_code);
	      	$result['region_location']  = $this->mdl_position->get_region_location($this->lang_code);
	      	$result['country_location'] = $this->mdl_position->get_country_location($this->lang_code);
	      	$result['area_exp'] 	    = $this->mdl_position->get_area_exp($this->lang_code);
	      	echo json_encode($result);
	}

	public function searchAllJob(){
		$jsondata = file_get_contents("php://input");
		$searchField = json_decode($jsondata);
		$sf_spos = $searchField->spos;
    	$sf_scn  = $searchField->scn;

    	$this->load->model('mdl_general/mdl_search');
		$result['search_result'] = $this->mdl_search->searchAllJob($sf_spos, $sf_scn);
		$result['total_result'] = count($result['search_result']);
		echo json_encode($result);
	}

	public function set_lang_cookie(){
		$post_data = file_get_contents("php://input");
		$data = json_decode($post_data);
		$this->input->set_cookie('lang_cookie',$data->request_lang,0);
	}

	public function set_fromlang($request_lang = null, $source_domain = null){
		if($request_lang != null && $source_domain !=null){
			if($source_domain == 'projectstart2.com'){
				$this->input->set_cookie('lang_cookie',$request_lang,0);
				// echo '({"status":"success"})'; // No callback need.
				//echo 'success';//json_encode(array('status'=>'success'));
				if(isset($_GET['callback'])){
					echo $_GET['callback'] . '({"status":"success"})';	
				}
				else{
					echo '{"status":"success"}';	
				}
			}
		}
		// $post_data = file_get_contents("php://input");
		// $data = json_decode($post_data);
		// $this->input->set_cookie('lang_cookie',$data->request_lang,0);
	}

	public function setuser($source_domain =null){
		if($source_domain !=null ){
			if($source_domain == 'projectstart2.com'){
				$this->input->set_cookie('userinfo',$_GET['userinfo'],0);
				if(isset($_GET['callback'])){
					echo $_GET['callback'] . "([".json_encode($_GET['userinfo'])."])";
					exit;
				}
				else{
					echo '{"status":"success"}';
					exit;
				}
			}
		}
	}


	public function check_mandrill(){
		// $this->load->model('Mdl_ssouser');
		// $result = $this->Mdl_ssouser->get_sel_profile();
		// print_r($result);
		$this->load->library('mandrill');
		$data['username'] = 'Yash Dewangan';
		$message = $this->load->view('notvalid',$data,TRUE);
		$email = array(
			'html' => $message,
			'subject' => 'Single sign on Registration',
			'from_email' => 'noreply@example.com',
			'from_name' => 'Job Portal',
			'to' => array(array('email' => 'vicky.yash999@gmail.com' ))
      	);
	    $mail_result = $this->mandrill->messages_send($email);
	    print_r($mail_result);
	}

	public function set_usertype(){
		$post_data = file_get_contents("php://input");
		$data = json_decode($post_data);
		// print_r($data);
		// exit;
	if($data){
		$user_details = $this->mdl_general->check_user($data->all_details->roletype);
		// echo $this->db->last_query();
		
		// exit;
		if($user_details) {
			if($user_details['user_type_flg'] == '1'){
				echo json_encode(array('status'=>'success','moveto'=>'jobseeker'));
			}
			else if($user_details['user_type_flg'] == '2'){
				echo json_encode(array('status'=>'success','moveto'=>'employer'));
			}
			else if($user_details['user_type_flg'] == '3'){
				echo json_encode(array('status'=>'success','moveto'=>'agency'));
			}
			else if($user_details['user_type_flg'] == '4'){
				echo json_encode(array('status'=>'success','moveto'=>'consultancy'));
			}
		}
		else 
		{
			// echo "else";
			// exit;
			if($data->all_details->roletype == 1){
				$this->mdl_general->add_usertype($data->all_details->roletype);
				echo json_encode(array('status'=>'success','moveto'=>'startjobseeker'));
			}
			else if($data->all_details->roletype == 2){
				// [roletype] => 2
				$this->mdl_general->add_usertype($data->all_details->roletype);
            	$company_details = array();
            	$employer_details = array();
            	if($data->all_details->company_name == 'new'){
					$company_details = array(
            		  'company_name' => $data->all_details->new_company,
            		  'unique_compid'=> substr($data->all_details->new_company, 0,2),
            		  'companytype'  => '1',
					  'master_employerid' => $this->jp_id,
					  'addedby' 	 => '1',
					  'approved_status' => '0',
					  'accesstoken'  => encode($data->all_details->new_company),
					  'dateadded' 	 => date('Y-m-d h:i:s')
					  );
					$this->mdl_general->add_company($company_details);

					$company_id	= $this->db->insert_id();
					$load_lang 	= $this->mdl_general->get_language($this->ssocountry);
					$employer_details = array(
						'employerid' 	=> $this->jp_id,
						'company_id' 	=> $company_id,
						'approve_status'=> '1',
						'employer_role' => '1',
						'country_code' 	=> $this->ssocountry,
		 				'language_code' => $load_lang['language_code'],
		 				'permission_jobposting' => '1',
		 				'permission_databasestats' => '1',	
					);
					$this->mdl_general->add_employer($employer_details);
					$this->load->library('mandrill');
					$msg_data['username'] = $this->ssofname.' '.$this->ssolname;
					$message = $this->load->view('mail/company_registered',$msg_data,TRUE);
					$email = array(
						'html' => $message,
						'subject' => 'Company Approval request',
						'from_email' => 'noreply@example.com',
						'from_name' => 'Job Portal',
						'to' => array(array('email' => $this->ssoemail ))
			      	);
				    $mail_result = $this->mandrill->messages_send($email);
					echo json_encode(array('status'=>'success','moveto'=>'activate'));
            	}
            	else{
            		
            	}
            }
            else if($data->all_details->roletype == 3){
            	// [roletype] => 3
            	$this->mdl_general->add_usertype($data->all_details->roletype);
            	$company_details = array();
            	if($data->all_details->agency_name == 'new'){
					$company_details = array(
            		  'company_name' => $data->all_details->new_agency,
            		  'unique_compid'=> substr($data->all_details->new_agency, 0,2),
            		  'companytype'  => '2',
					  'master_employerid' => $this->jp_id,
					  'addedby' 	 => '1',
					  'approved_status' => '0',
					  'accesstoken'  => encode($data->all_details->new_agency),
					  'dateadded' 	 => date('Y-m-d h:i:s')
					  );
					$this->mdl_general->add_company($company_details);

					$company_id	= $this->db->insert_id();
					$load_lang 	= $this->mdl_general->get_language($this->ssocountry);
					$employer_details = array(
						'employerid' 	=> $this->jp_id,
						'company_id' 	=> $company_id,
						'approve_status'=> '1',
						'employer_role' => '1',
						'country_code' 	=> $this->ssocountry,
		 				'language_code' => $load_lang['language_code'],
		 				'permission_jobposting' => '1',
		 				'permission_databasestats' => '1',	
					);
					$this->mdl_general->add_employer($employer_details);
					$this->load->library('mandrill');
					$msg_data['username'] = $this->ssofname.' '.$this->ssolname;
					$message = $this->load->view('mail/company_registered',$msg_data,TRUE);
					$email = array(
						'html' => $message,
						'subject' => 'Recruitment agency approval request',
						'from_email' => 'noreply@example.com',
						'from_name' => 'Job Portal',
						'to' => array(array('email' => $this->ssoemail ))
			      	);
				    $mail_result = $this->mandrill->messages_send($email);
					echo json_encode(array('status'=>'success','moveto'=>'activate'));
            	}
            }
            else if($data->all_details->roletype == 4){
            	$this->mdl_general->add_usertype($data->all_details->roletype);
            		$company_details = array(
            		  'company_name' => $data->all_details->consultancy,
            		  'unique_compid'=> substr($data->all_details->consultancy, 0,2),
            		  'companytype'  => '3',
					  'master_employerid' => $this->jp_id,
					  'addedby' 	 => '1',
					  'approved_status' => '0',
					  'accesstoken'  => encode($data->all_details->consultancy),
					  'dateadded' 	 => date('Y-m-d h:i:s')
					  );
					$this->mdl_general->add_company($company_details);

					$company_id	= $this->db->insert_id();
					$load_lang 	= $this->mdl_general->get_language($this->ssocountry);
					$employer_details = array(
						'employerid' 	=> $this->jp_id,
						'company_id' 	=> $company_id,
						'approve_status'=> '1',
						'employer_role' => '1',
						'country_code' 	=> $this->ssocountry,
		 				'language_code' => $load_lang['language_code'],
		 				'permission_jobposting' => '1',
		 				'permission_databasestats' => '1'	
					);
					$this->mdl_general->add_employer($employer_details);
					$this->load->library('mandrill');
					$msg_data['username'] = $this->ssofname.' '.$this->ssolname;
					$message = $this->load->view('mail/company_registered',$msg_data,TRUE);
					$email = array(
						'html' => $message,
						'subject' => 'Consultancy approval request',
						'from_email' => 'noreply@example.com',
						'from_name' => 'Job Portal',
						'to' => array(array('email' => $this->ssoemail ))
			      	);
				    $mail_result = $this->mandrill->messages_send($email);
					echo json_encode(array('status'=>'success','moveto'=>'activate'));
            }
		}
		
	  }
	}


	public function save_jobseekerstartup(){
		$post_data = file_get_contents("php://input");
		$data = json_decode($post_data,true);
		$data_save = array();
		if(isset($data['jobseekerdata']['resumename'])){
			if (file_exists ( DIR_UPLOAD . $data['jobseekerdata']['resumename'] ) && is_file ( DIR_UPLOAD . $data['jobseekerdata']['resumename'])) {
				$ext = pathinfo($data['jobseekerdata']['resumename'], PATHINFO_EXTENSION);
				
				if($ext == 'pdf'){
					$txt = pdf2text (DIR_UPLOAD . $data['jobseekerdata']['resumename']);
				}
				else{
					$docObj = new Doc2Txt(DIR_UPLOAD . $data['jobseekerdata']['resumename']);
					$txt = $docObj->convertToText();
				}					

				$data_save['resume'] = $data['jobseekerdata']['resumename'];
				$data_save['resume_textformat'] = $txt;
			}
		}

		if(isset($data['jobseekerdata']['eposition'])){
		foreach ($data['jobseekerdata']['eposition'] as $ep_key => $ep_value) {
			$pos_app_data = array(
				'userid'	=> $this->jp_id,
				'positionid'=> $ep_value
				);
			$save_result = $this->mdl_general->save_jobseeker_position($pos_app_data);
		}
		}

		
		
		$data_save['userid'] = $this->jp_id;
		$data_save['education'] = $data['jobseekerdata']['degree'];

		if($data['jobseekerdata']['degree'] == 'OTHER'){
			$data_save['edu_other'] = $data['jobseekerdata']['other_qual'];
		}

		$data_save['areaofexp'] = $data['jobseekerdata']['area_exp'];
		$data_save['industry_exp'] = $data['jobseekerdata']['totalexp'];
	    $data_save['present_company'] = $data['jobseekerdata']['presentcmpny'];
	    $data_save['present_company_exp'] = $data['jobseekerdata']['pexp'];
	    $data_save['current_position'] = $data['jobseekerdata']['pposition'];
	    if(isset($data['jobseekerdata']['pcurrency'])){
	    	$data_save['current_sal_curr'] = $data['jobseekerdata']['pcurrency'];
		}
		if(isset($data['jobseekerdata']['pcurrent_sal'])){
	    	$data_save['current_salary'] = $data['jobseekerdata']['pcurrent_sal'];
		}
		if(isset($data['jobseekerdata']['ecurrency'])){
	    	$data_save['expected_sal_curr'] = $data['jobseekerdata']['ecurrency'];
		}
		if(isset($data['jobseekerdata']['esalary'])){
	    	$data_save['expected_salary'] = $data['jobseekerdata']['esalary'];
	    }
	    if(isset($data['jobseekerdata']['skill'])){
	    	$data_save['skills'] = $data['jobseekerdata']['skill'];
		}
		if(isset($data['jobseekerdata']['notice_period'])){
	    	$data_save['notice_period'] = $data['jobseekerdata']['notice_period'];
		}
		if(isset($data['jobseekerdata']['company_display'])){
	    	$data_save['display_companyname'] = $data['jobseekerdata']['company_display'];
		}
	    if(isset($data['jobseekerdata']['passport'])){
	    	$data_save['displayname'] = $data['jobseekerdata']['name_display'];
		}

	    if(isset($data['jobseekerdata']['passport'])){
	    	$data_save['passport_no'] = $data['jobseekerdata']['passport'];
		}
		if(isset($data['jobseekerdata']['memstatus'])){
	    	$data_save['membership_status'] = $data['jobseekerdata']['memstatus'];
		}
		if(isset($data['jobseekerdata']['membership_desc'])){
	    	$data_save['membership_desc'] = $data['jobseekerdata']['membership_desc'];
	    }
	    if(isset($data['jobseekerdata']['condition'])){
	    	$data_save['condition'] = $data['jobseekerdata']['condition'];
		}
		if(isset($data['jobseekerdata']['briefnote'])){
	    	$data_save['brief_note'] = $data['jobseekerdata']['briefnote'];
	    }
           
/*
		$data_save = array(
			'userid'	=> $this->jp_id,
		    'education' => $data['jobseekerdata']['degree'],
		    // 'education' => $data['jobseekerdata']['other_qual'],
		    'areaofexp' => $data['jobseekerdata']['area_exp'],
		    'industry_exp' => $data['jobseekerdata']['totalexp'],
		    'present_company' => $data['jobseekerdata']['presentcmpny'],
		    'present_company_exp' => $data['jobseekerdata']['pexp'],
		    'current_position' => $data['jobseekerdata']['pposition'],
		    'current_sal_curr' => $data['jobseekerdata']['pcurrency'],
		    'current_salary' => $data['jobseekerdata']['pcurrent_sal'],
		    'expected_sal_curr' => $data['jobseekerdata']['ecurrency'],
		    'expected_salary' => $data['jobseekerdata']['esalary'],
		    'skills' => $data['jobseekerdata']['skill'],
		    'notice_period' => $data['jobseekerdata']['notice_period'],
		    'display_companyname' => $data['jobseekerdata']['company_display'],
		    'displayname' => $data['jobseekerdata']['name_display'],
		    'passport_no' => $data['jobseekerdata']['passport'],
		    'membership_status' => $data['jobseekerdata']['memstatus'],
		    'membership_desc' => $data['jobseekerdata']['membership_desc'],
		    'condition' => $data['jobseekerdata']['condition'],
		    'brief_note' => $data['jobseekerdata']['briefnote']
		);
		*/
		
		$result = $this->mdl_general->save_jobseeker_data($data_save);
		if($result && $save_result){
			echo json_encode(array("status"=>'success',"moveto"=>'jobseeker'));
		}
		else{
			echo json_encode(array("status"=>'failed'));	
		}
	}


	public function save_companystartup(){
		//print_r($_POST);
		if(isset($_POST['company_name'])){
			$company_details = $this->mdl_general->check_company();
			//print_r($data['company_details']);
			$update_data = array(
			'company_name' => $_POST['company_name'],
	    	'address'	   => $_POST['comp_add'],
	    	'locationid'   => $_POST['comp_location'],
	    	'zipcode'	   => $_POST['comp_zipcode'],
	    	'pref_lang'	   => $_POST['comp_lang'],
	    	'contactname'  => $_POST['com_cp'],
	    	'contactemail' => $_POST['comp_email'],
	    	'contactphone' => $_POST['comp_contact'],
	    	'lasteditedbyid' => $this->jp_id,
	    	'lastedit'	   => date('Y-m-d h:i:s')
	    	);

	    	if(isset($_POST['con_mo']) && $_POST['con_mo'] != ''){
	    		$update_data['phoneno'] =	$_POST['con_mo'];
	    	}
	    	if(isset($_POST['comp_website']) && $_POST['comp_website'] != ''){
	    		$update_data['company_website'] = $_POST['comp_website'];
	    	}

	    	if($_FILES['company_logo']['name'] != ''){
	    		$filename = rand('111111','999999').str_replace(' ','-', $_FILES['company_logo']['name']);
        		compress($_FILES['company_logo']['tmp_name'],DIR_IMAGE . $filename,60);
	    		$update_data['companylogo'] 	= $filename;
	    	}

	    	$res_query = $this->mdl_general->update_company_data($update_data, $company_details['company_id']);
	    	if($res_query){
	    		echo json_encode(array('status'=>'success'));
	    	}
	    	else
	    	{
	    		echo json_encode(array('status'=>'failed'));
	    	}	
	    	// print_r($update_data);
    	}
	}


	public function matchingjobs(){
		
		$jsondata = file_get_contents("php://input");
		$searchField = json_decode($jsondata);
		// print_r($searchField);
		$pid_array = array();

		if(trim($searchField->pos1) != ''){
			$pid_array[]= $searchField->pos1;
		}
		
		if(trim($searchField->pos2) != ''){
			$pid_array[]= $searchField->pos2;
		}

		if(trim($searchField->pos3) != ''){
			$pid_array[]= $searchField->pos3;
		}
		
		// $pid_array = array('1','2','3');
		$this->load->model('mdl_general/mdl_search');
		$result['search_result'] = $this->mdl_search->matchingjobs(implode(", ", $pid_array));
		// echo $this->db->last_query();
		echo json_encode($result);
	}
}
?>