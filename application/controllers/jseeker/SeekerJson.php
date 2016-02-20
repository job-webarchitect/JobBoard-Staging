<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
include_once(APPPATH . 'libraries/Doc2Txt.class.php');

class SeekerJson extends JobportalGlobal_Controller{
	function __construct() 
  	{
		parent::__construct();
		$this->load->model('mdl_jseeker/mdl_seekerjson');
		$this->load->language('job_seeker', get_language_folder($this->lang_code));
		if(!$this->input->cookie('userinfo')){
			redirect(SSO_URL.'/serviceauth/login?continueurl='.current_url());
		}
		
	}

	public function index(){
		$this->load->view('notvalid');
	}

	public function update_degree(){
		$jsondata = file_get_contents("php://input");
		$update_degree = json_decode($jsondata);
		// print_r($update_degree);
		// echo $update_degree->degree;
		$update_val = array();
		if(isset($update_degree->education->degree)){
			$update_val['education'] = $update_degree->education->degree;
			if(isset($update_degree->education->degree) && ($update_degree->education->degree == 'OTHER'))
			$update_val['edu_other'] = $update_degree->education->other_qual;
			else
			$update_val['edu_other'] = '';
			// print_r($update_val);
			// exit;
			$result = $this->mdl_seekerjson->update_degree($update_val);
			if($result){
				echo json_encode(array('status'=>'success'));
			}
			else{
				echo json_encode(array('status'=>'failed'));	
			}
		}
		else{
			$this->load->view('notvalid');
		}
	}

	public function update_work(){
		$jsondata = file_get_contents("php://input");
		$update_work = json_decode($jsondata);
		// print_r($update_work);
		// echo $update_degree->degree;
		// return false;
		$update_val = array();
		if(isset($update_work->work->totalexp)){

			$update_val['industry_exp'] = $update_work->work->totalexp;
			$update_val['present_company'] = $update_work->work->presentcmpny;
			$update_val['present_company_exp'] = $update_work->work->pexp;
			$update_val['current_position'] = $update_work->work->pposition;
			
			if(isset($update_work->work->pcurrency))
			 $update_val['current_sal_curr'] = $update_work->work->pcurrency;
			if(isset($update_work->work->pcurrency))
			 $update_val['current_salary'] = $update_work->work->pcurrent_sal;
			
			// print_r($update_val);
			// exit;
			$result = $this->mdl_seekerjson->update_work($update_val);
			if($result){
				echo json_encode(array('status'=>'success'));
			}
			else{
				echo json_encode(array('status'=>'failed'));	
			}
		}
		else{
			$this->load->view('notvalid');
		}
	}

	public function update_other(){
		$jsondata = file_get_contents("php://input");
		$update_other = json_decode($jsondata);
		$update_val = array();
		if(isset($update_other->other->notice_period)){
			$update_val['notice_period'] = $update_other->other->notice_period;
			$update_val['industry_exp'] = $update_other->other->area_exp;
			$update_val['display_companyname'] = $update_other->other->company_display;
			$update_val['displayname'] = $update_other->other->name_display;
			$update_val['areaofexp'] = $update_other->other->area_exp;
			
			if(isset($update_other->other->ecurrency))
			 $update_val['expected_sal_curr'] = $update_other->other->ecurrency;
			if(isset($update_other->other->esalary))
			 $update_val['expected_salary'] = $update_other->other->esalary;
			if(isset($update_other->other->skill))
			 $update_val['skills'] = $update_other->other->skill;
			if(isset($update_other->other->esalary))
			 $update_val['passport_no'] = $update_other->other->passport;
			if(isset($update_other->other->esalary))
			 $update_val['membership_status'] = $update_other->other->memstatus;
			if(isset($update_other->other->membership_desc))
			 $update_val['membership_desc'] = $update_other->other->membership_desc;
			if(isset($update_other->other->condition))
			 $update_val['condition'] = $update_other->other->condition;
			if(isset($update_other->other->briefnote))
			 $update_val['brief_note'] = $update_other->other->briefnote;

			// print_r($update_val);
			// exit;
			$result = $this->mdl_seekerjson->update_other($update_val);
			if($result){
				echo json_encode(array('status'=>'success'));
			}
			else{
				echo json_encode(array('status'=>'failed'));	
			}
		}
		else{
			$this->load->view('notvalid');
		}
	}

	public function upload_files_server(){
	  if(isset($_FILES['res1-file']) &&  $_FILES['res1-file']['name'] != ''){
		$file_name = rand('11111','99999').str_replace(' ', '-', $_FILES['res1-file']['name']);
		if(move_uploaded_file($_FILES['res1-file']['tmp_name'], DIR_UPLOAD . $file_name)){			
			echo json_encode(array('status'=>'success','file_name'=>$file_name));
		}
		else{
			echo json_encode(array('status'=>'failed'));
		}
	 }
	}

	public function upload_files(){
	 if(isset($_FILES['res1-file']) &&  $_FILES['res1-file']['name'] != ''){
		$file_name = rand('11111','99999').str_replace(' ', '-', $_FILES['res1-file']['name']);
		if(move_uploaded_file($_FILES['res1-file']['tmp_name'], DIR_UPLOAD . $file_name)){
			if(isset($_POST['old_file_name'])){
				if (file_exists ( DIR_UPLOAD . $_POST['old_file_name'] ) && is_file ( DIR_UPLOAD . $_POST['old_file_name'])) {
					unlink ( DIR_UPLOAD . $_POST['old_file_name'] );
				}
			}

			if($_FILES['res1-file']['type'] == 'application/pdf'){
				$txt = pdf2text (DIR_UPLOAD . $file_name);
			}
			else{
				$docObj = new Doc2Txt(DIR_UPLOAD . $file_name);
				$txt = $docObj->convertToText();
			}
			$update_val = array();
			$update_val['resume'] = $file_name;
			$update_val['resume_textformat'] = $txt;
			$update_val['cvupdate_date'] = date('Y-m-d');
			if($this->mdl_seekerjson->update_resume($update_val)){
				echo json_encode(array('status'=>'success','file_name'=>$file_name));
			}
			else{
				echo json_encode(array('status'=>'failed'));
			}
		}
		else{
			echo json_encode(array('status'=>'failed'));
		}
	 }
	}

	public function update_temp(){
		$jsondata = file_get_contents("php://input");
		$update_other = json_decode($jsondata);
		$update_val = array();
		if(isset($update_other->temp->avail_date_from)){
		$update_val['areaofexp'] = $update_other->temp->area_exp;
      	$update_val['tempavailable_from'] = date('Y-m-d', strtotime($update_other->temp->avail_date_from));
       	$update_val['tempavailable_to'] = date('Y-m-d', strtotime($update_other->temp->avail_date_till));

    	if(isset($update_other->temp->condition)){
        	$update_val['temp_condition'] = $update_other->temp->condition;
        }
        if(isset($update_other->temp->briefnote)){
        	$update_val['temp_briefnote'] = $update_other->temp->briefnote;
        }
        if(isset($update_other->temp->mypre_location)){
        	$update_val['mypresent_locationid'] = $update_other->temp->mypre_location;
        }
        if(isset($update_other->temp->ecurrency)){
        	$update_val['expected_sal_curr'] =  $update_other->temp->ecurrency;
        }
        if(isset($update_other->temp->esalary)){
        	$update_val['expected_salary'] = $update_other->temp->esalary;
        }
        if(isset($update_other->temp->sec_mail)){
        	$update_val['alternate_email'] = $update_other->temp->sec_mail;
        }
        if(isset($update_other->temp->sec_mobile)){
        	$update_val['alternate_mobileno'] = $update_other->temp->sec_mobile;
        }

	        if($this->mdl_seekerjson->update_temp($update_val)){
				echo json_encode(array('status'=>'success'));
			}
			else{
				echo json_encode(array('status'=>'failed'));
			}
    	}
    	else{
			echo json_encode(array('status'=>'failed'));
		}
	}

}
