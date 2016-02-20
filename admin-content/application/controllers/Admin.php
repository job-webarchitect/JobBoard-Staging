<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Login_Controller.php');	

session_start();
class Admin extends Login_Controller{

	
	function __construct()
	{
		parent::__construct();

		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('security');  
		$this->load->library('session');  
		$this->load->library('mandrill');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('Mdl_config'); 
		$this->load->model('/tank_auth/User_autologin'); 
		$this->load->model('/tank_auth/Users');
		
	
	  
		
		
	}
	
	
	
	
	
	public function index()  
	{	
		
		
 		$role = $this->session->userdata('role');
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
	
		$data['noofusers']=$this->Mdl_config->no_of_users(); 
		$data['jobsposted']=$this->Mdl_config->jobsposted(); 
		$data['downloadedresume']=$this->Mdl_config->downloaded_resume();
		$data['totalads']=$this->Mdl_config->total_ads();
		
		
		
		if ($message = $this->session->flashdata('message')) {
			$this->load->view('auth/general_message', array('message' => $message));
		}
		
		else {
			
			$i=0;
			foreach($arr as $num)  
			{
    		
				if($i==1) break;
				switch($num) {
			
				case '0' : 
					$data['title'] = 'Dashboard - Admin';
					$data['content'] = 'admin/admin_content/dashboard';
					$this->load->view('admin/templates/admin_layout',$data);
					break;
					
				case $num :
			
					$data['title'] = $role;
					$data['content'] = 'admin/admin_content/dashboard';
					$this->load->view('admin/templates/emp_layout',$data);
					break;
					
			} //switch
		
		
	
	$i++;} //forloop
}
	
}
	
	//configuration
	public function language()
	{	
		
		$data['title'] = 'Language - Admin';
		$data['content'] = 'admin/admin_content/configuration/language'; 
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function location()
	{	
		$data['location']=$this->Mdl_config->location();  
        $data['title'] = 'Language - location';
		$data['content'] = 'admin/admin_content/configuration/location';
		$this->load->view('admin/templates/admin_layout',$data);
	}


	//Mail Configuration
	public function mailsetting()
	{	
		
		if(!$this->input->post('header')) {
				$data['title'] = 'Language - Mailsetting';
				$data['content'] = 'admin/admin_content/configuration/mailsetting';
				$this->load->view('admin/templates/admin_layout',$data);
		} 
		
		else { 
		$data = array(
				'header_text' => $this->input->post('header'),  
				'subject' => $this->input->post('subject'),
				'content' => $this->input->post('content'),
				'footer_text' => $this->input->post('footer'),
				'lang_code' => $this->input->post('langcode'),
				'flg' => $this->input->post('flg')
				
				);
			
			$data['mailreg']=$this->Mdl_config->mail_regcomp_insert($data);
			$this->session->set_flashdata('message', 'Changes has been saved successfully'); 
		    redirect('admin/mailsetting/');
				  
		}
		
	}
	
	public function mailregcmpny()
	{	
		
		$data['title'] = 'Language - Register Company';
		$data['content'] = 'admin/admin_content/configuration/mailregcmpny';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function mailnotification()
	{	
		
		$data['title'] = 'Language - Notification';
		$data['content'] = 'admin/admin_content/configuration/mailnotification';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function mailrefund()
	{	
		
		$data['title'] = 'Language - Refund';
		$data['content'] = 'admin/admin_content/configuration/mailrefund';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function mailcheckout()
	{	
		
		$data['title'] = 'Language - Checkout';
		$data['content'] = 'admin/admin_content/configuration/mailcheckout';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	
	// Account Configuration
	public function account()
	{	
		
		$data['account']=$this->Mdl_config->account_detail(); 
		$data['title'] = 'Language - Account';
		$data['content'] = 'admin/admin_content/configuration/account';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function accountupdate()
	{	
		
		$data = array(
				'paypalemail_id' => $this->input->post('paypalemail'),
				'merchant_id' => $this->input->post('merchantid'),  
				'working_key' => $this->input->post('workingkey'),
				'currency' => $this->input->post('select_currency')
			);
		
		$this->Mdl_config->form_account_update($data);  
		$data['title'] = 'Language - Account Position';
	    $this->session->set_flashdata('message', 'Changes has been saved successfully'); 
		redirect('admin/account/');
	}
	
	
	
	// Position Configuration
	public function position()
	{	
		
		$data['position']=$this->Mdl_config->position(); 
		$data['title'] = 'Language - Position';
		$data['content'] = 'admin/admin_content/configuration/position';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function addposition()
	{	
		
		if(empty($this->input->post('pname_en'))) {
				
				$this->form_validation->set_rules('pname_en', 'Position Name', 'required');
				$this->form_validation->set_rules('pcode', 'Position Code', 'required');
			
			
			   if ($this->form_validation->run() == FALSE) {
			
				$data['title'] = 'Language - AddPosition';
				$data['content'] = 'admin/admin_content/configuration/addposition';
				$this->load->view('admin/templates/admin_layout',$data);
		   }	
				
		} 
		
		else { 
		
			$data = array(
				'positionname_en' => $this->input->post('pname_en'),  
				'positionname_fr' => $this->input->post('pname_fr'),
				'positionname_de' => $this->input->post('pname_de'),
				'positionname_es' => $this->input->post('pname_es'),
				'positionname_chi' => $this->input->post('pname_chi'),
				'positionname_ru' => $this->input->post('pname_ru'),
				'positionname_ar' => $this->input->post('pname_ar'),
				'date_added' => $this->input->post('pdate'),
				'date_modified' => $this->input->post('pmodify')
			);
			
			
			//Transfering data to Model
			$this->Mdl_config->form_insert($data);
			$data['message'] = 'Data Inserted Successfully';
			$data['content'] = 'admin/admin_content/configuration/addposition';
			$this->load->view('admin/templates/admin_layout',$data);
			}
	
}

	public function editposition()
	{	
		
		$id=$this->uri->segment(3);
		$data['editposition']=$this->Mdl_config->editposition($id); 
		$data['title'] = 'Language - Edit Position';
		$data['content'] = 'admin/admin_content/configuration/editposition';
		$this->load->view('admin/templates/admin_layout',$data);
	
	}
	
	public function updateposition()
	{	
		
		$id=$this->uri->segment(3);
		$data = array(
				'positionname_en' => $this->input->post('pname_en'),
				'positionname_fr' => $this->input->post('pname_fr'),
				'positionname_de' => $this->input->post('pname_de'),
				'positionname_es' => $this->input->post('pname_es'),
				'positionname_chi' => $this->input->post('pname_chi'),
				'positionname_ru' => $this->input->post('pname_ru'),
				'positionname_ar' => $this->input->post('pname_ar'),
				'date_added' => $this->input->post('pdate'),
				'date_modified' => $this->input->post('pmodify')
			);
		$this->Mdl_config->form_position_update($id,$data);  
		$data['title'] = 'Language - Update Position';
	    $this->session->set_flashdata('updatemessage', 'Data Updated Successfully'); 
		//$data['content'] = 'admin/admin_content/configuration/editposition/'.$id;
		redirect('admin/position/');
		
	}
	
	//Grade Configuration 
	public function grade() {
			
		$data['grade']=$this->Mdl_config->grade(); 
		$data['title'] = 'Grade';
		$data['content'] = 'admin/admin_content/configuration/grade';
		$this->load->view('admin/templates/admin_layout',$data);
		
		
	}
	
	// Add grades
	public function addgrade()
	{	
	
	 	if(empty($this->input->post('gname'))) {
				
				$this->form_validation->set_rules('gname', 'Grade Name', 'required');
				$this->form_validation->set_rules('gcharge', 'Price cannot be left empty', 'required|number');
				
				if ($this->form_validation->run() == FALSE) {
			
					$data['title'] = 'Language - AddGrade';
					$data['content'] = 'admin/admin_content/configuration/addgrade';
					$this->load->view('admin/templates/admin_layout',$data);
				}
		} 
		
		else { 
				
			$data = array(
				'grade_code' => $this->input->post('gname'),  
				'charge' => $this->input->post('gcharge'),
				'status' => '1',
				'dateadded' => date('Y-m-d\TH:i:sP')
				
			);
			
			
			//Transfering data to Model
			$this->Mdl_config->form_insert_grade($data);
			$data['title'] = 'Language - AddGrade';
			$data['message'] = 'Data Inserted Successfully';
			$data['content'] = 'admin/admin_content/configuration/addgrade';
			$this->load->view('admin/templates/admin_layout',$data);
		}
	
}

	// Edit grade
	public function editgrade()
	{	
		
		$id=$this->uri->segment(3);
		$data['editgrade']=$this->Mdl_config->editgrade($id); 
		$data['title'] = 'Language - Edit Grade';
		$data['content'] = 'admin/admin_content/configuration/editgrade';
		$this->load->view('admin/templates/admin_layout',$data);
	
	}
	
	//update Grade
	public function updategrade()
	{	
		
		$id=$this->uri->segment(3);
		$data = array(
				'grade_code' => $this->input->post('gname'),  
				'charge' => $this->input->post('gcharge'),
				'status' => '1',
				'dateadded' => date('Y-m-d\TH:i:sP')
				
			);
		$this->Mdl_config->form_grade_update($id,$data);  
		$data['title'] = 'Language - Update Grade';
	    $this->session->set_flashdata('message', 'Data Updated Successfully');
		$data['content'] = 'admin/admin_content/configuration/editgrade/'.$id;
		redirect('admin/editgrade/'.$id);
		
	}
	
	
	
	
	
	
	// Area Configuration
	public function area()
	{	
		
		$data['area']=$this->Mdl_config->area(); 
		$data['title'] = 'Language - Area';
		$data['content'] = 'admin/admin_content/configuration/area';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function addarea()
	{	
	
	 	if(empty($this->input->post('aname_en'))) {
				
				$this->form_validation->set_rules('aname_en', 'Area Name', 'required');
				$this->form_validation->set_rules('acode', 'Experience Code', 'required');
				
				if ($this->form_validation->run() == FALSE) {
			
					$data['title'] = 'Language - AddPosition';
					$data['content'] = 'admin/admin_content/configuration/addarea';
					$this->load->view('admin/templates/admin_layout',$data);
				}
		} 
		
		else { 
				
			$data = array(
				'areaofexpname_en' => $this->input->post('aname_en'),  
				'areaofexpname_fr' => $this->input->post('aname_fr'),
				'areaofexpname_de' => $this->input->post('aname_de'),
				'areaofexpname_es' => $this->input->post('aname_es'),
				'areaofexpname_ch' => $this->input->post('aname_chi'),
				'areaofexpname_ru' => $this->input->post('aname_ru'),
				'areaofexpname_ar' => $this->input->post('aname_ar'),
				'exp_code' => $this->input->post('acode'),
				'date_added' => $this->input->post('adate'),
				'date_modified' => $this->input->post('amodify')
			);
			
			
			//Transfering data to Model
			$this->Mdl_config->form_insert_area($data);
			$data['message'] = 'Data Inserted Successfully';
			$data['content'] = 'admin/admin_content/configuration/addposition';
			$this->load->view('admin/templates/admin_layout',$data);
			}
	
}

   public function editarea()
	{	
		
		$id=$this->uri->segment(3);
		$data['editarea']=$this->Mdl_config->editarea($id); 
		$data['title'] = 'Language - Edit Area Of Experience';
		$data['content'] = 'admin/admin_content/configuration/editarea';
		$this->load->view('admin/templates/admin_layout',$data);
	
	}
	
	public function updatearea()
	{	
		
		$id=$this->uri->segment(3);
		$data = array(
				'areaofexpname_en' => $this->input->post('aname_en'),
				'areaofexpname_fr' => $this->input->post('aname_fr'),
				'areaofexpname_de' => $this->input->post('aname_de'),
				'areaofexpname_es' => $this->input->post('aname_es'),
				'areaofexpname_ch' => $this->input->post('aname_chi'),
				'areaofexpname_ru' => $this->input->post('aname_ru'),
				'areaofexpname_ar' => $this->input->post('aname_ar'),
				'exp_code' => $this->input->post('acode'),  
				'date_added' => $this->input->post('adate'),
				'date_modified' => $this->input->post('amodify')
			);
		$this->Mdl_config->form_area_update($id,$data);  
		$data['title'] = 'Language - Update Area';
	    $this->session->set_flashdata('message', 'Data Updated Successfully');
		$data['content'] = 'admin/admin_content/configuration/editarea/'.$id;
		redirect('admin/editarea/'.$id);
		
	}
	
	
	//Tax Configuration
	public function tax()
	{	
		
		$data['showtax']=$this->Mdl_config->showtax();
		$data['title'] = 'Tax';
		$data['content'] = 'admin/admin_content/configuration/tax';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function addtax()
	{	
		
		if(empty($this->input->post('tname_en'))) {
				
				$this->form_validation->set_rules('tname_en', 'Tax Name', 'required');
				$this->form_validation->set_rules('tcode', 'Rate', 'required');
				
				if ($this->form_validation->run() == FALSE) 
				{
					$data['title'] = 'Tax';
					$data['content'] = 'admin/admin_content/configuration/addtax';
					$this->load->view('admin/templates/admin_layout',$data);
				} 
		}
		
		else { 
		$data = array(
				'tax_name' => $this->input->post('tname_en'), 
				'tax_name_fr' => $this->input->post('tname_fr'),  
				'tax_name_de' => $this->input->post('tname_de'),  
				'tax_name_es' => $this->input->post('tname_es'),  
				'tax_name_chi' => $this->input->post('tname_chi'),  
				'tax_name_ru' => $this->input->post('tname_ru'),  
				'tax_name_ar' => $this->input->post('tname_ar'),   
				'tax_rate' => $this->input->post('tcode'),
				'date_added' => $this->input->post('tdate'),
				'date_modified' => $this->input->post('tmodify')
				);
			
			$data['mailreg']=$this->Mdl_config->tax_fields_insert($data);
			$this->session->set_flashdata('taxmsg', 'Changes has been saved successfully'); 
		    redirect('admin/tax/');
		} 
	
	}
	
	public function edittax()
	{	
		
		$id=$this->uri->segment(3);
		$data['edittax']=$this->Mdl_config->edittax($id); 
		$data['title'] = 'Edit Tax';
		$data['content'] = 'admin/admin_content/configuration/edittax';
		$this->load->view('admin/templates/admin_layout',$data);
	
	}
	
	public function updatetax() {
		$id=$this->uri->segment(3);
		$data = array(
				'tax_name' => $this->input->post('tname_en'), 
				'tax_name_fr' => $this->input->post('tname_fr'),  
				'tax_name_de' => $this->input->post('tname_de'),  
				'tax_name_es' => $this->input->post('tname_es'),  
				'tax_name_chi' => $this->input->post('tname_chi'),  
				'tax_name_ru' => $this->input->post('tname_ru'),  
				'tax_name_ar' => $this->input->post('tname_ar'),   
				'tax_rate' => $this->input->post('tcode'),
				'date_added' => $this->input->post('tdate'),
				'date_modified' => $this->input->post('tmodify')
			);
		$this->Mdl_config->updatetax($id,$data);  
		$this->session->set_flashdata('updatetax', 'Data Updated Successfully'); 
		redirect('admin/tax/');	
		
	}
	
	
	//Resume Matching
	public function matchresume() {
		
		$data['matchedresume']=$this->Mdl_config->show_matched_resume();
		$data['title'] = 'Resume Match';
		$data['content'] = 'admin/admin_content/configuration/matchresume';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function addmatchresume() {
		
	if(empty($this->input->post('formula_name'))) {
				
				$this->form_validation->set_rules('formula_name', 'Formula Name', 'required');
				$this->form_validation->set_rules('value', 'Value', 'required');
				
				if ($this->form_validation->run() == FALSE) 
				{
			
					$data['title'] = 'Resume Match';
					$data['content'] = 'admin/admin_content/configuration/addmatchresume';
					$this->load->view('admin/templates/admin_layout',$data);
				}
		} 
		
		else { 
		$data = array(
				'formula_name' => $this->input->post('formula_name'), 
				'value' => $this->input->post('value'),  
				);
			
			$data['addmatchresume']=$this->Mdl_config->match_resume_insert($data);
			$this->session->set_flashdata('addmatchresume', 'Changes has been saved successfully'); 
		    redirect('admin/matchresume/');
		} 
	}
	
	public function editmatchresume()
	{	
		
		$id=$this->uri->segment(3);
		$data['editmatchresume']=$this->Mdl_config->edit_resume_insert($id); 
		$data['title'] = 'Edit Match';
		$data['content'] = 'admin/admin_content/configuration/editmatchresume';
		$this->load->view('admin/templates/admin_layout',$data);
	
	}
	
	public function updatematchresume() {
		$id=$this->uri->segment(3);
		$data = array(
				'formula_name' => $this->input->post('formula_name'), 
				'value' => $this->input->post('value'),  
		);
		$this->Mdl_config->update_resume_match($id,$data);  
		$this->session->set_flashdata('updatematchresume', 'Data Updated Successfully'); 
		redirect('admin/matchresume/');	
		
	}
	
	
	
	
	
	//users
	public function jobseeker()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='3')
		{
				$data['jobseeker']=$this->Mdl_config->js_info(); 
				$data['title'] = 'Language - Jobseeker';
				$data['content'] = 'admin/admin_content/users/jobseeker';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		if($user=='admin' && $permission=='0') {
			
				$data['jobseeker']=$this->Mdl_config->js_info(); 
				$data['title'] = 'Language - Jobseeker';
				$data['content'] = 'admin/admin_content/users/jobseeker';
				$this->load->view('admin/templates/admin_layout',$data);
		
		
		}
		}
	
	}  
	
	
	//Employer
	public function company()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && ($num=='1' ||  $num=='2'))
		{
			$data['employer']=$this->Mdl_config->emp_info();
			$data['title'] = 'Language - Company';
			$data['content'] = 'admin/admin_content/users/company';
			$this->load->view('admin/templates/emp_layout',$data);
		}
		elseif($user=='admin' && $permission=='0') {
			
			$data['employer']=$this->Mdl_config->emp_info();
			$data['title'] = 'Language - Company';
			$data['content'] = 'admin/admin_content/users/company';
			$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
	
	}
	
	public function comdetails() {
		
			$id = $this->uri->segment(3);
			$data['comdetails']=$this->Mdl_config->com_details($id);
			$data['title'] = 'Company Details';
			$data['content'] = 'admin/admin_content/users/comdetails';
			$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function allrequestlist()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && ($num=='1' ||  $num=='2'))
		{
			$data['requestlist']=$this->Mdl_config->emp_req_list();
			$data['title'] = 'Language - Allrequestlist';
			$data['content'] = 'admin/admin_content/users/allrequestlist';
			$this->load->view('admin/templates/emp_layout',$data);
		}
		elseif($user=='admin' && $permission=='0') {
		
			$data['requestlist']=$this->Mdl_config->emp_req_list();
			$data['title'] = 'Language - Allrequestlist';
			$data['content'] = 'admin/admin_content/users/allrequestlist';
			$this->load->view('admin/templates/admin_layout',$data);
		}
		}
	
	}
	
	
	
	public function approve()
	{	
		
		$data = array(
				'approved_status' => '1',
				'approved_by' => $this->session->userdata('id'),
				'approved_date' => date('Y-m-d\TH:i:sP')				
			);
		
		$param=$this->uri->segment(3);
		$res=$this->Mdl_config->get_email($param);
		echo $this->db->last_query();
		$email = $res['email'];
		
		$username = $res['first_name'];
		
		$data['approvedby']=$this->Mdl_config->approve_comp($data,$param); 
		$data['title'] = 'Language - appove';
	    
		$data['username'] = $username;
		$data['accesstoken'] = $res['accesstoken'];
		$message = $this->load->view('admin/mail/approve',$data,TRUE);
		$email = array(
			'html' => $message,
			'subject' => 'Company Registration',
			'from_email' => 'noreply@example.com',
			'from_name' => 'Job Portal',
			'to' => array(array('email' => $email ))
      	);
	    $mail_result = $this->mandrill->messages_send($email);  
	    $this->session->set_flashdata('message', 'Approved successfully'); 
		redirect('admin/company/');
	}
	
	public function unapprove()
	{	
		
		$data = array(
				'approve_status' => '0'				
			);
		
		$param=$this->uri->segment(3);
		$this->Mdl_config->unapprove_comp($data,$param);  
		$data['title'] = 'Language - unappove';
	    $this->session->set_flashdata('message', 'Changes has been saved successfully'); 
		redirect('admin/allrequestlist/');
	}
	
	//Recruiter
	public function recruitment()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='4')
		{
			
			$data['recruiter']=$this->Mdl_config->req_info();
			$data['title'] = 'Language - Recruitment';
			$data['content'] = 'admin/admin_content/users/recruitment';
			$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
			
			$data['recruiter']=$this->Mdl_config->req_info();
			$data['title'] = 'Language - Recruitment';
			$data['content'] = 'admin/admin_content/users/recruitment';
			$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
	}
	
	public function reqdetails() {
		
			$id = $this->uri->segment(3);
			$data['reqdetails']=$this->Mdl_config->req_details($id);
			$data['title'] = 'Recruiter Details';
			$data['content'] = 'admin/admin_content/users/reqdetails';
			$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function recrequestlist()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='4')
		{
			$data['recrequestlist']=$this->Mdl_config->rec_req_list();
			$data['title'] = 'Recruiterrequestlist';
			$data['content'] = 'admin/admin_content/users/recrequestlist';
			$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
			$data['recrequestlist']=$this->Mdl_config->rec_req_list();
			$data['title'] = 'Recruiterrequestlist';
			$data['content'] = 'admin/admin_content/users/recrequestlist';
			$this->load->view('admin/templates/admin_layout',$data);
		}
		}
	}
	
	public function approverec()
	{	
		
		$data = array(
				'approved_status' => '1',
				'approved_by' => $this->session->userdata('id'),
				'approved_date' => date('Y-m-d\TH:i:sP')				
			);
		
		$param=$this->uri->segment(3);
		$res=$this->Mdl_config->get_email($param);
	 	$email = $res['email'];
		$username = $res['first_name'];
		$data['accesstoken'] = $res['accesstoken'];
		
		$data['approvedby']=$this->Mdl_config->approve_rec($data,$param); 
		$data['title'] = 'Language - appove';
		
		$data['username'] = $username;
		$message = $this->load->view('admin/mail/approve',$data,TRUE);
		$email = array(
			'html' => $message,
			'subject' => 'Recruiter Registration',
			'from_email' => 'noreply@example.com',
			'from_name' => 'Job Portal',
			'to' => array(array('email' => $email ))
      	);
	    $mail_result = $this->mandrill->messages_send($email); 
		
	    $this->session->set_flashdata('message', 'Approved successfully'); 
		redirect('admin/recruitment/');
	}
	
	//consultancy
	public function consultancy()
	{	
		
		
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='5')
		{
				$data['consultant']=$this->Mdl_config->cons_info();
				$data['title'] = 'Language - Consultancy';
				$data['content'] = 'admin/admin_content/users/consultancy';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
				
				$data['consultant']=$this->Mdl_config->cons_info();
				$data['title'] = 'Consultancy';
				$data['content'] = 'admin/admin_content/users/consultancy';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		
		else {
			
				 $this->session->set_flashdata('not-a-admin','No Access'); 
				 redirect('admin/index/');	
			
		}
		}
	}
	
	public function consdetails() {
		
			$id = $this->uri->segment(3);
			$data['consdetails']=$this->Mdl_config->con_details($id);
			$data['title'] = 'Consultancy Details';
			$data['content'] = 'admin/admin_content/users/consdetails';
			$this->load->view('admin/templates/admin_layout',$data);
	}
	
	
	public function consultantlist()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='5')
		{
			$data['consultantlist']=$this->Mdl_config->cons_list();
			$data['title'] = 'Recruiterrequestlist';
			$data['content'] = 'admin/admin_content/users/consultantlist';
			$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
				
			$data['consultantlist']=$this->Mdl_config->cons_list();
			$data['title'] = 'Recruiterrequestlist';
			$data['content'] = 'admin/admin_content/users/consultantlist';
			$this->load->view('admin/templates/admin_layout',$data);	
		}
		}
	}
	
	public function approvecons()
	{	
		
		$data = array(
				'approved_status' => '1',
				'approved_by' => $this->session->userdata('id'),
				'approved_date' => date('Y-m-d\TH:i:sP')				
			);
			
		
		$param=$this->uri->segment(3);
		$res=$this->Mdl_config->get_email($param);
	 	$email = $res['email'];
		$username = $res['first_name'];
		$data['accesstoken'] = $res['accesstoken'];
		
		$data['approvedby']=$this->Mdl_config->approve_cons($data,$param); 
		$data['title'] = 'Language - appove';
		
		$data['username'] = $username;
		$message = $this->load->view('admin/mail/approve',$data,TRUE);
		$email = array(
			'html' => $message,
			'subject' => 'Consultancy Registration',
			'from_email' => 'noreply@example.com',
			'from_name' => 'Job Portal',
			'to' => array(array('email' => $email ))
      	);
	    $mail_result = $this->mandrill->messages_send($email);
		
		
	    $this->session->set_flashdata('message', 'Approved successfully'); 
		redirect('admin/consultancy/');
	}
	
	//translator
	public function translator()
	{	
		
		$data['title'] = 'Language - Translator';
		$data['content'] = 'admin/admin_content/users/translator';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
		public function addtranslator()
		{	
		
			$data['title'] = 'Language - Add Translator';
			$data['content'] = 'admin/admin_content/users/addtranslator';
			$this->load->view('admin/templates/admin_layout',$data);
		}
		
		public function assign()
		{	
		
			$data['title'] = 'Language - Assign Translator';
			$data['content'] = 'admin/admin_content/users/assign';
			$this->load->view('admin/templates/admin_layout',$data);  
		}
	
	
	
		//subadmin
	
		public function add()
		{	
		
		   
		    $permission = $this->session->userdata('permission');
			$role = $this->session->userdata('role');
			if($permission!=0 && $role!=admin) {
				
				 $this->session->set_flashdata('not-a-admin','No Access'); 
				 redirect('admin/index/');
					
			}
				
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				} else {
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
				}
			}
			$data['errors'] = array();

			$email_activation = $this->config->item('email_activation', 'tank_auth');

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success
						
						$email = $this->input->post('email');
						
						$data = array(
								'role' => $this->input->post('selectedrole'),
								'permission' => $this->input->post('selectedper')
						);  
						$this->Mdl_config->form_insert_subadmin($data,$email);
						$data['site_name'] = $this->config->item('website_name', 'tank_auth');
						$this->session->set_flashdata('approve', 'Approved successfully'); 
						redirect('admin/index');
						

					    if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

						$this->_send_email('activate', $data['email'], $data);

						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_1'));

					} else {
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
						
					}
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			
			$data['title']="Dashboard - Admin";
			$data['use_username'] = $use_username;
			$data['captcha_registration'] = $captcha_registration;
			$data['content']='auth/register_form';
			$data['use_recaptcha'] = $use_recaptcha;
			$this->load->view('admin/templates/admin_layout',$data);	
			
			
			
			
			
	}
	
	function _create_captcha()
	{
		$this->load->helper('captcha');

		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),
		));

		// Save captcha params in session
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));

		return $cap['image'];
	}

	/**
	 * Callback function. Check if CAPTCHA test is passed.
	 *
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');

		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);

		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;

		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}
	
	public function manage()
	{	
		
		$data['showsubadmins']=$this->Mdl_config->showsubadmins();
		$data['title'] = 'Language - Manage';
		$data['content'] = 'admin/admin_content/subadmin/manage';
		$this->load->view('admin/templates/admin_layout',$data);  
	}
	
	public function switchas() 
	{
		$data['showsubadmins']=$this->Mdl_config->showsubadmins();
		$data['title'] = 'Switch As';
		$data['content'] = 'admin/admin_content/subadmin/switch_as';
		$this->load->view('admin/templates/admin_layout',$data);  
	}
	
	public function assignas() {
	
	$id=$this->uri->segment(3);  //assignee
	$role_id=$this->input->post('user_id'); //assign to
	$role=$this->input->post('role');  
	
	//Assignee status
	$data['assigneestatus']=$this->Mdl_config->assigneestatus($id);
	foreach($data as $key) :
		$assignee_status = $key->status;
		$assignee_id=$key->id;
	endforeach;
	if($assignee_status==1) {
		$data = array('status' => '0');
	}
	$data['assignas']=$this->Mdl_config->update_subadmin($role,$role_id,$data,$id);
	
	// Assigner
	
	$result['getstatus']=$this->Mdl_config->getstatus($role_id);
	foreach($result as $key) :
		$current_status = $key->status;
		$current_id=$key->id;
	endforeach;
	if($current_status==1) {
		$result = array('status' => '0');
	}
	else {
		$result = array('status' => '1');
	}
	
	$result['assignas']=$this->Mdl_config->update_assigner($role_id,$result);
	$this->session->set_flashdata('assignasmsg', 'Approved successfully');
	redirect('admin/switchas');
	}
	
	public function subactivity()
	{	
		
		
		$data['title'] = 'Language - Activity';
		$data['content'] = 'admin/admin_content/subadmin/subactivity';
		$this->load->view('admin/templates/admin_layout',$data);
	}
	
	public function hotjobs() {
		
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='6')
		{
		
				$data['title'] = 'Hot Jobs';
				$data['joblists']=$this->Mdl_config->joblist();
				$data['content'] = 'admin/admin_content/ads/hotjobs';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
			
				$data['title'] = 'Hot Jobs';
				$data['joblists']=$this->Mdl_config->joblist();
				$data['content'] = 'admin/admin_content/ads/hotjobs';
				$this->load->view('admin/templates/admin_layout',$data);
			
			
		}
		}
	}
	
	public function addhotjob() {
		
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='6')
		{
		
				$data['hotjoblists']=$this->Mdl_config->hotjoblist();
				$data['title'] = 'Hot Jobs';
				$data['content'] = 'admin/admin_content/ads/addhotjob';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') {
			
				$data['hotjoblists']=$this->Mdl_config->hotjoblist();
				$data['title'] = 'Hot Jobs';
				$data['content'] = 'admin/admin_content/ads/addhotjob';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
		
	}
	
	public function addtohotjob() {
		
		
		$data = array(
				'hotjob_flag' => '1'
		);
		$id=$this->uri->segment(3);
		$data['addtohotjob']=$this->Mdl_config->addto_hotjob($id,$data); 
		$data['title'] = 'Language - appove';
	    $this->session->set_flashdata('message', 'Approved successfully'); 
		redirect('admin/hotjobs/');
		
	}
	
	
	public function advertisment() {
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='6')
		{
				$data['advertlists']=$this->Mdl_config->advertlist();
				$data['title'] = 'Advertisement Jobs';
				$data['content'] = 'admin/admin_content/ads/advertisment';
				$this->load->view('admin/templates/emp_layout',$data);
				
		}
		elseif($user=='admin' && $permission=='0') {
			
				$data['advertlists']=$this->Mdl_config->advertlist();
				$data['title'] = 'Advertisement Jobs';
				$data['content'] = 'admin/admin_content/ads/advertisment';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
		
	}
	
	public function addadvert() {
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='6')
		{
		
				$data['addnewadvert']=$this->Mdl_config->addnewadervt();
				$data['title'] = 'Add New Advertisment';
				$data['content'] = 'admin/admin_content/ads/addadvert';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['addnewadvert']=$this->Mdl_config->addnewadervt();
				$data['title'] = 'Add New Advertisment';
				$data['content'] = 'admin/admin_content/ads/addadvert';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
		
	}
	
	public function addtoadvertjob() {
		
	$data = array(
				'advertisementjob_flag' => '1'
		);
		$id=$this->uri->segment(3);
		$data['addtoadvertjob']=$this->Mdl_config->addto_advert($id,$data); 
		$data['title'] = 'Language - appove';
	    $this->session->set_flashdata('message', 'Approved successfully'); 
		redirect('admin/advertisment/');
		
	}
	
	//Payment Plan
	public function paymentplan()
	{	
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{
		
				$data['downloadresume']=$this->Mdl_config->download_resume();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/paymentplan';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['downloadresume']=$this->Mdl_config->download_resume();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/paymentplan';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}	
		}
		
	}
	public function addpayment()
	{	
		
			$permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
		
			if(empty($this->input->post('p_headline'))) {
			
				$this->form_validation->set_rules('plan_type','Select Options','required|greater_than[0]');
				$this->form_validation->set_rules('p_headline', 'Headline', 'required');
				$this->form_validation->set_rules('resume', 'Resume', 'required');
				$this->form_validation->set_rules('price', 'Price', 'required');
				$this->form_validation->set_rules('resume_viewed', 'Resume Viewed', 'required');
				$this->form_validation->set_rules('email_service', 'Email Service', 'required');
				$this->form_validation->set_rules('validity', 'Validity', 'required');
				
				if ($this->form_validation->run() == FALSE) 
				{
					foreach($arr as $num) {
						if($user!='admin' && $num=='9')
						{
							$data['title'] = 'Add Payment';
							$data['content'] = 'admin/admin_content/payment/addpayment';
							$this->load->view('admin/templates/emp_layout',$data);
						}
		
						if($user=='admin' && $permission=='0') 
						{
							$data['title'] = 'Add Payment';
							$data['content'] = 'admin/admin_content/payment/addpayment';
							$this->load->view('admin/templates/admin_layout',$data);
						}
				}
			}
		
		
		}
		else { 
			
			$data = array(
				'planname' => $this->input->post('p_headline'),  
				'download_noofresume' => $this->input->post('resume'),
				'price' => $this->input->post('price'),
				'validity' => $this->input->post('validity'),
				'view_noofresume' => $this->input->post('resume_viewed'),
				'used_email' => $this->input->post('email_service'),
				'status' => $this->input->post('selectedplan')
			);
			
			
			//Transfering data to Model
			 $this->Mdl_config->resume_download_insert($data);
			 $this->session->set_flashdata('resumemessage','Plan Added Successfully'); 
			 redirect('admin/paymentplan/');
		}
	}
	
	public function editresumedownload() {
		
			$id=$this->uri->segment(3);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			$permission = $this->session->userdata('permission');
			if($user!='admin' && $permission=='9')
			{
				$data['editresumedownload']=$this->Mdl_config->edit_download_resume($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editpayment';
				$this->load->view('admin/templates/emp_layout',$data);
				
			}
			
			if($user=='admin' && $permission=='0') 
			{
			
				$data['editresumedownload']=$this->Mdl_config->edit_download_resume($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editpayment';
				$this->load->view('admin/templates/admin_layout',$data);
				
			}
			
		
	}
	
	public function removeresumedownload() {
		
		$id=$this->uri->segment(3);
		$data['deleteresumedownload']=$this->Mdl_config->delete_download_resume($id);
		$this->session->set_flashdata('deletemessage','Plan Deleted Successfully'); 
		redirect('admin/paymentplan/');
			
		
	}
	
	public function updatepayment() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'planname' => $this->input->post('p_headline'),  
				'download_noofresume' => $this->input->post('resume'),
				'price' => $this->input->post('price'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatepayment']=$this->Mdl_config->update_download_resume($id,$data);
		$this->session->set_flashdata('updatemessage', 'Data Updated Successfully'); 
		redirect('admin/paymentplan/');
			
		
	}
	
	//View Resume
	public function viewresume()
	{	
		
		    $permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			foreach($arr as $num) {
			if($user!='admin' && $num=='9')
			{
				$data['viewresume']=$this->Mdl_config->view_resume();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/viewresume';
				$this->load->view('admin/templates/emp_layout',$data);
				
			}
			
			if($user=='admin' && $permission=='0') 
			{
				$data['viewresume']=$this->Mdl_config->view_resume();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/viewresume';
				$this->load->view('admin/templates/admin_layout',$data);
			
			}
		}
			
	}
	
	public function editviewresume() {
		
			$id=$this->uri->segment(3);
            $permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			foreach($arr as $num) {
			if($user!='admin' && $num=='8')
			{
				$data['editviewresume']=$this->Mdl_config->edit_email_service($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editviewresume';
				$this->load->view('admin/templates/emp_layout',$data); 
			}
			
			if($user=='admin' && $permission=='0') 
			{
				$data['editviewresume']=$this->Mdl_config->edit_email_service($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editviewresume';
				$this->load->view('admin/templates/admin_layout',$data);
				
			}
			}
			
		
	}
	
	public function removeviewresume() {
		
		$id=$this->uri->segment(3);
		$data['removeviewresume']=$this->Mdl_config->delete_email_service($id);
		$this->session->set_flashdata('deleteview','Plan Deleted Successfully'); 
		redirect('admin/viewresume/');
			
		
	}
	
	public function updateviewresume() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'planname' => $this->input->post('p_headline'),  
				'download_noofresume' => $this->input->post('resume'),
				'price' => $this->input->post('price'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updateviewresume']=$this->Mdl_config->update_download_resume($id,$data);
		$this->session->set_flashdata('updateview', 'Data Updated Successfully'); 
		redirect('admin/viewresume/');  
			
		
	}
	 
	//Email Service
	public function paymentemail()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	$data['emailservice']=$this->Mdl_config->email_service();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/paymentemail';
				$this->load->view('admin/templates/emp_layout',$data);
				
			}
			
			if($user=='admin' && $permission=='0') 
			{
				$data['emailservice']=$this->Mdl_config->email_service();
				$data['title'] = 'Payment';
				$data['content'] = 'admin/admin_content/payment/paymentemail';
				$this->load->view('admin/templates/admin_layout',$data);
				
			}
		}
	}
	
	public function editemailservice() {
		
		    $id=$this->uri->segment(3);
		    $permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			foreach($arr as $num) {
			if($user!='admin' && $num=='9')
			{	
		
					$data['editresumedownload']=$this->Mdl_config->edit_email_service($id);
					$data['title'] = 'Update Plan';
					$data['content'] = 'admin/admin_content/payment/editpayment';
					$this->load->view('admin/templates/emp_layout',$data); 
					
			}
			
			if($user=='admin' && $permission=='0') 
			{
					$data['editresumedownload']=$this->Mdl_config->edit_email_service($id);
					$data['title'] = 'Update Plan';
					$data['content'] = 'admin/admin_content/payment/editpayment';
					$this->load->view('admin/templates/admin_layout',$data); 
				
				
			}
		}
			
		
	}
	
	public function removeemailservice() {
		
		$id=$this->uri->segment(3);
		$data['deleteresumedownload']=$this->Mdl_config->delete_email_service($id);
		$this->session->set_flashdata('deleteemailmessage','Plan Deleted Successfully'); 
		redirect('admin/paymentemail/');
			
		
	}
	
	public function updateemailservice() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'planname' => $this->input->post('p_headline'),  
				'download_noofresume' => $this->input->post('resume'),
				'price' => $this->input->post('price'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updateemailservice ']=$this->Mdl_config->update_download_resume($id,$data);
		$this->session->set_flashdata('updateemailmessage', 'Data Updated Successfully'); 
		redirect('admin/paymentemail/');
			
		
	}
	
	
	//Mixed Plan
	public function paymentmixed()
	{	
		
		 	$permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			foreach($arr as $num) {
			if($user!='admin' && $num=='9')
			{	
					$data['mixedplan']=$this->Mdl_config->mixed_plan();
					$data['title'] = 'Payment';
					$data['content'] = 'admin/admin_content/payment/paymentmixed';
					$this->load->view('admin/templates/emp_layout',$data);
					
			}
			
			if($user=='admin' && $permission=='0') 
			{
					$data['mixedplan']=$this->Mdl_config->mixed_plan();
					$data['title'] = 'Payment';
					$data['content'] = 'admin/admin_content/payment/paymentmixed';
					$this->load->view('admin/templates/admin_layout',$data);
				
			}
			}
	}
	
	public function editmixedplan()
	{	
		
			$id=$this->uri->segment(3);
			$permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			foreach($arr as $num) {
			if($user!='admin' && $num=='9')
			{	
				$data['editmixedplan']=$this->Mdl_config->edit_mixed_plan($id);
				$data['title'] = 'Edit Mixed Plan';
				$data['content'] = 'admin/admin_content/payment/editmixedplan';
				$this->load->view('admin/templates/emp_layout',$data); 
				
			}
			
			if($user=='admin' && $permission=='0') 
			{
				$data['editmixedplan']=$this->Mdl_config->edit_mixed_plan($id);
				$data['title'] = 'Edit Mixed Plan';
				$data['content'] = 'admin/admin_content/payment/editmixedplan';
				$this->load->view('admin/templates/admin_layout',$data); 
				
			}
			}
	}
	
	public function removemixedplan() {
		
		$id=$this->uri->segment(3);
		$data['deletemixedplan']=$this->Mdl_config->delete_mixed_plan($id);
		$this->session->set_flashdata('removemixedplan','Plan Deleted Successfully'); 
		redirect('admin/paymentmixed/');
			
		
	}
	
	public function updatemixedplan() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'planname' => $this->input->post('p_headline'),  
				'download_noofresume' => $this->input->post('resume'),
				'price' => $this->input->post('price'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatemixedplan ']=$this->Mdl_config->update_mixed_plan($id,$data);
		$this->session->set_flashdata('updatemixedplan', 'Data Updated Successfully'); 
		redirect('admin/paymentmixed/');
			
		
	}

    // Advertisement Plan
    //Payment Plan
    public function advplan()
    {
        $permission = $this->session->userdata('permission');
        $arr = explode(',',$permission);
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role');
        foreach($arr as $num) {
            if($user!='admin' && $num=='9')
            {

                $data['adv']=$this->Mdl_config->show_adv_plan();
                $data['title'] = 'Advertisement';
                $data['content'] = 'admin/admin_content/payment/advplan';
                $this->load->view('admin/templates/emp_layout',$data);
            }

            elseif($user=='admin' && $permission=='0')
            {
                $data['adv']=$this->Mdl_config->show_adv_plan();
                $data['title'] = 'Advertisement';
                $data['content'] = 'admin/admin_content/payment/advplan';
                $this->load->view('admin/templates/admin_layout',$data);

            }
        }

    }

    // Add Advertisement type
    public function addadvplan()
    {

        $permission = $this->session->userdata('permission');
        $arr = explode(',',$permission);
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role');

        if(empty($this->input->post('advprice'))) {

            $this->form_validation->set_rules('plan_type','Select Options','required|greater_than[0]');
            $this->form_validation->set_rules('advprice', 'Plan Price', 'required|number');


            if ($this->form_validation->run() == FALSE)
            {
                foreach($arr as $num) {
                    if($user!='admin' && $num=='9')
                    {
                        $data['title'] = 'Add Advertisement Plan';
                        $data['content'] = 'admin/admin_content/payment/addadvplan';
                        $this->load->view('admin/templates/emp_layout',$data);
                    }

                    if($user=='admin' && $permission=='0')
                    {
                        $data['title'] = 'Add Advertisement Plan';
                        $data['content'] = 'admin/admin_content/payment/addadvplan';
                        $this->load->view('admin/templates/admin_layout',$data);
                    }
                }
            }


        }
        else {

            $data = array(
                'advplan_type' => $this->input->post('selectedplan'),
                'plan_name' => $this->input->post('advname'),
                'adv_charge' => $this->input->post('advprice'),
                'adv_status' => '1',
                'dateadded' => date('Y-m-d\TH:i:sP')
            );


            //Transfering data to Model
            $this->Mdl_config->add_plan_insert($data);
            $this->session->set_flashdata('addplantype','Plan Added Successfully');
            redirect('admin/advplan/');
        }
    }



    public function editadvplan()
    {

        $id=$this->uri->segment(3);
        $permission = $this->session->userdata('permission');
        $arr = explode(',',$permission);
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role');
        foreach($arr as $num) {
            if($user!='admin' && $num=='9')
            {
                $data['editadvplan']=$this->Mdl_config->edit_adv_plan($id);
                $data['title'] = 'Edit Mixed Plan';
                $data['content'] = 'admin/admin_content/payment/editadvplan';
                $this->load->view('admin/templates/emp_layout',$data);

            }

            if($user=='admin' && $permission=='0')
            {
                $data['editadvplan']=$this->Mdl_config->edit_adv_plan($id);
                $data['title'] = 'Edit Mixed Plan';
                $data['content'] = 'admin/admin_content/payment/editadvplan';
                $this->load->view('admin/templates/admin_layout',$data);

            }
        }
    }

    //Update Advertisement Plan
    public function updateadvplan() {

        $id=$this->uri->segment(3);
        $data = array(
            'advplan_type' => $this->input->post('selectedplan'),
            'plan_name' => $this->input->post('advname'),
            'adv_charge' => $this->input->post('advprice')
        );
        $data['updateadvplan ']=$this->Mdl_config->update_adv_plan($id,$data);
        $this->session->set_flashdata('updateadvplan', 'Data Updated Successfully');
        redirect('admin/advplan/');


    }

    //Remove Plan
    public function removeadvplan() {

        $id=$this->uri->segment(3);
        $data['removeadvplan']=$this->Mdl_config->delete_adv_plan($id);
        $this->session->set_flashdata('removeadvplan','Plan Deleted Successfully');
        redirect('admin/advplan/');
    }



    //Discount
	public function adddiscount()
	{	
			$permission = $this->session->userdata('permission');
			$arr = explode(',',$permission);
			$user = $this->session->userdata('username');
 			$role = $this->session->userdata('role');
			if(empty($this->input->post('cname'))) {
			
				
				$this->form_validation->set_rules('plan_type','Select Options','required|greater_than[0]');
				$this->form_validation->set_rules('cname', 'Headline', 'required');
				$this->form_validation->set_rules('resume', 'Resume', 'required');
				$this->form_validation->set_rules('price', 'Price', 'required|numeric|xss_clean');
				$this->form_validation->set_rules('dprice', 'Discount price', 'required|numeric|xss_clean');
				$this->form_validation->set_rules('resume_viewed', 'Resume Viewed', 'required');
				$this->form_validation->set_rules('email_service', 'Email Service', 'required');
				$this->form_validation->set_rules('validity', 'Validity', 'required');
				
				if ($this->form_validation->run() == FALSE) 
				{
					foreach($arr as $num) {
						if($user!='admin' && $num=='9')
						{	
							$data['title'] = 'Discount';
							$data['content'] = 'admin/admin_content/payment/adddiscount';
							$this->load->view('admin/templates/emp_layout',$data);
						}

						if($user=='admin' && $permission=='0') 
						{
							$data['title'] = 'Discount';		
							$data['content'] = 'admin/admin_content/payment/adddiscount';
							$this->load->view('admin/templates/admin_layout',$data);
				
						}
					}
				}
			
		} 
		
		else { 
			
			$data = array(
				'company_name' => $this->input->post('cname'),  
				'download_noofresume' => $this->input->post('resume'),
				'view_noofresume' => $this->input->post('resume_viewed'),
				'used_email' => $this->input->post('email_service'),
				'original_cost' => $this->input->post('price'),
				'discount_cost' => $this->input->post('dprice'),
				'validity' => $this->input->post('validity'),
				'planid' => $this->input->post('selectedplan'),
				'status' => $this->input->post('selectedplan')  
			);  
			
			
			//Transfering data to Model
			 $this->Mdl_config->discount_values_insert($data);
			 $this->session->set_flashdata('resumemessage','Plan Added Successfully'); 
			 redirect('admin/discountplan/');
		}
		
		
	}

	//Download Resume Discount plan Template
	public function discountplan()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
		
				$data['discountplan']=$this->Mdl_config->fetch_discount_records();
				$data['title'] = 'Discount';
				$data['content'] = 'admin/admin_content/payment/discountplan';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['discountplan']=$this->Mdl_config->fetch_discount_records();
				$data['title'] = 'Discount';
				$data['content'] = 'admin/admin_content/payment/discountplan';
				$this->load->view('admin/templates/admin_layout',$data);
		}
		}
		
	}
	
	
	//Edit Resume Download Discount plans
	public function editdiscountdownload() {
		
		$id=$this->uri->segment(3);
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
			$data['editdiscountdownload']=$this->Mdl_config->edit_discount_download($id);
			$data['title'] = 'Update Plan';
			$data['content'] = 'admin/admin_content/payment/editdiscount';
			$this->load->view('admin/templates/emp_layout',$data); 
		}
		elseif($user=='admin' && $permission=='0') 
		{
			$data['editdiscountdownload']=$this->Mdl_config->edit_discount_download($id);
			$data['title'] = 'Update Plan';
			$data['content'] = 'admin/admin_content/payment/editdiscount';
			$this->load->view('admin/templates/admin_layout',$data); 
			
		}
		}
		
		
	}
	
	//Update Resume Download Discount plans
	public function updatediscountdownload() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'company_name' => $this->input->post('cname'),  
				'download_noofresume' => $this->input->post('resume'),
				'original_cost' => $this->input->post('price'),
				'discount_cost' => $this->input->post('dprice'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatediscountdownload ']=$this->Mdl_config->update_disocunt_resume_download($id,$data);
		$this->session->set_flashdata('updatediscountdownload', 'Data Updated Successfully'); 
		redirect('admin/discountplan/');
			
		
	}
	
	//Delete 
	public function removediscountdownload() {
		
		$id=$this->uri->segment(3);
		$data['removediscountdownload']=$this->Mdl_config->remove_disocunt_resume_download($id);
		$this->session->set_flashdata('removediscountdownload','Plan Deleted Successfully'); 
		redirect('admin/discountplan/');
			
		
	}
	
	//View Resume Discount plan Template
	public function discountviewresume()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
				$data['discountplan']=$this->Mdl_config->fetch_discount_resume_view();
				$data['title'] = 'Discount View Resume';
				$data['content'] = 'admin/admin_content/payment/discountviewresume';
				$this->load->view('admin/templates/emp_layout',$data);
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['discountplan']=$this->Mdl_config->fetch_discount_resume_view();
				$data['title'] = 'Discount View Resume';
				$data['content'] = 'admin/admin_content/payment/discountviewresume';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
		
		
	}
	
	//Edit Resume View Discount plans
	public function editdiscountview() {
		
		$id=$this->uri->segment(3);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		$permission = $this->session->userdata('permission');
		if($user!='admin' && $permission=='9')
		{
				$data['editdiscountview']=$this->Mdl_config->edit_discount_resume_view($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountview';
				$this->load->view('admin/templates/emp_layout',$data); 
				
		}
		elseif($user=='admin' && $permission=='0') 
		{
				$data['editdiscountview']=$this->Mdl_config->edit_discount_resume_view($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountview';
				$this->load->view('admin/templates/admin_layout',$data); 
			
		}
		
			
		
	}
	
	//Update Resume View Discount plans
	public function updatediscountview() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'company_name' => $this->input->post('cname'),  
				'view_noofresume' => $this->input->post('resume_viewed'),
				'original_cost' => $this->input->post('price'),
				'discount_cost' => $this->input->post('dprice'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatediscountview ']=$this->Mdl_config->update_disocunt_resume_view($id,$data);
		$this->session->set_flashdata('updatediscountview', 'Data Updated Successfully'); 
		redirect('admin/discountviewresume/');
			
		
	}
	
	//Delete 
	public function removediscountview() {
		
		$id=$this->uri->segment(3);
		$data['deletemixedplan']=$this->Mdl_config->remove_disocunt_resume_download($id);
		$this->session->set_flashdata('removediscountview','Plan Deleted Successfully'); 
		redirect('admin/discountviewresume/');
			
		
	}
	
	//Download View Email Discount plan Template
	public function discountemail()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
				$data['discountemail']=$this->Mdl_config->fetch_discount_email();
				$data['title'] = 'Discount Email';
				$data['content'] = 'admin/admin_content/payment/discountemail';
				$this->load->view('admin/templates/emp_layout',$data);
				
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
			
				$data['discountemail']=$this->Mdl_config->fetch_discount_email();
				$data['title'] = 'Discount Email';
				$data['content'] = 'admin/admin_content/payment/discountemail';
				$this->load->view('admin/templates/admin_layout',$data);
			
			
		}
		}
		
		
	}
	
	
	//Edit View Email Discount plans
	public function editdiscountemail() {
		
		$id=$this->uri->segment(3);
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
			
				$data['editdiscountemail']=$this->Mdl_config->edit_discount_email($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountemail';
				$this->load->view('admin/templates/emp_layout',$data); 
				
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['editdiscountemail']=$this->Mdl_config->edit_discount_email($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountemail';
				$this->load->view('admin/templates/admin_layout',$data); 
			
		}
		}
			  
		
	}
	
	//Update View Email Discount plans
	public function updatediscountemail() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'company_name' => $this->input->post('cname'),  
				'used_email' => $this->input->post('email_service'),
				'original_cost' => $this->input->post('price'),
				'discount_cost' => $this->input->post('dprice'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatediscountemail ']=$this->Mdl_config->update_disocunt_email($id,$data);
		$this->session->set_flashdata('updatediscountemail', 'Data Updated Successfully'); 
		redirect('admin/discountemail/');
			
		
	}
	
	//Delete 
	public function removediscountemail() {
		
		$id=$this->uri->segment(3);
		$data['removediscountemail']=$this->Mdl_config->remove_disocunt_email($id);
		$this->session->set_flashdata('removediscountemail','Plan Deleted Successfully'); 
		redirect('admin/discountemail/');
			
		
	}
	
	/********** Mixed Discount plan ***********/
	
	//Download Mixed Discount plan Template
	public function discountmixed()
	{	
		
		$id=$this->uri->segment(3);
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
				$data['discountplan']=$this->Mdl_config->fetch_discount_mixed_records();
				$data['title'] = 'Discount';
				$data['content'] = 'admin/admin_content/payment/discountmixed';
				$this->load->view('admin/templates/emp_layout',$data);
				
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['discountplan']=$this->Mdl_config->fetch_discount_mixed_records();
				$data['title'] = 'Discount';
				$data['content'] = 'admin/admin_content/payment/discountmixed';
				$this->load->view('admin/templates/admin_layout',$data);
		}
		}
	}
	
	//Edit Mixed Discount plans
	public function editdiscountmixed() {
		
		$id=$this->uri->segment(3);
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
				$data['editdiscountmixed']=$this->Mdl_config->edit_discount_mixed($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountmixed';
				$this->load->view('admin/templates/emp_layout',$data); 
		}
		elseif($user=='admin' && $permission=='0') 
		{
				$data['editdiscountmixed']=$this->Mdl_config->edit_discount_mixed($id);
				$data['title'] = 'Update Plan';
				$data['content'] = 'admin/admin_content/payment/editdiscountmixed';
				$this->load->view('admin/templates/admin_layout',$data); 
			
			
		}
		}
		
			
		
	}
	
	//Update Mixed Discount plans
	public function updatediscountmixed() {
		
		$id=$this->uri->segment(3);
		$data = array(
				'company_name' => $this->input->post('cname'),  
				'download_noofresume' => $this->input->post('resume'),
				'view_noofresume' => $this->input->post('resume_viewed'),
				'used_email' => $this->input->post('email_service'),
				'original_cost' => $this->input->post('price'),
				'discount_cost' => $this->input->post('dprice'),
				'validity' => $this->input->post('validity'),
				'status' => $this->input->post('selectedplan')
			);
		$data['updatediscountmixed ']=$this->Mdl_config->update_disocunt_mixed($id,$data);
		$this->session->set_flashdata('updatediscountmixed', 'Data Updated Successfully'); 
		redirect('admin/discountmixed/');
			
		
	}
	
	//Delete 
	public function removediscountmixed() {
		
		$id=$this->uri->segment(3);
		$data['removediscountmixed']=$this->Mdl_config->remove_disocunt_mixed($id);
		$this->session->set_flashdata('removediscountmixed','Plan Deleted Successfully'); 
		redirect('admin/discountmixed/');
			
	}
	
	
	
	
	//Refund
	public function refund()
	{	
		
		$permission = $this->session->userdata('permission');
		$arr = explode(',',$permission);
		$user = $this->session->userdata('username');
 		$role = $this->session->userdata('role');
		foreach($arr as $num) {
		if($user!='admin' && $num=='9')
		{	
		
				$data['refund']=$this->Mdl_config->refund_fetch_records();
				$data['title'] = 'Refund';
				$data['content'] = 'admin/admin_content/payment/refund';
				$this->load->view('admin/templates/emp_layout',$data);
				
		}
		
		elseif($user=='admin' && $permission=='0') 
		{
				$data['refund']=$this->Mdl_config->refund_fetch_records();
				$data['title'] = 'Refund';
				$data['content'] = 'admin/admin_content/payment/refund';
				$this->load->view('admin/templates/admin_layout',$data);
			
		}
		}
		
	}   
	
	public function addrefund()
	{	
		
		if(empty($this->input->post('r_headline'))) {
			
				
		
				$this->form_validation->set_rules('r_headline', 'Headline', 'required');
				$this->form_validation->set_rules('t_date', 'Date', 'required');
				$this->form_validation->set_rules('t_id', 'ID', 'required');
				$this->form_validation->set_rules('user_email', 'Email', 'required');
				$this->form_validation->set_rules('company_id', 'Company ID', 'required');
				$this->form_validation->set_rules('amount', 'Amount', 'required|numeric|xss_clean');
				
				
				if ($this->form_validation->run() == FALSE) 
				{
		
					$data['title'] = 'Add Refund';
			    	$data['content'] = 'admin/admin_content/payment/addrefund';
		        	$this->load->view('admin/templates/admin_layout',$data);
			    }
		
		
		} 
		
		else { 
			
			$data = array(
				'refund_headline' => $this->input->post('r_headline'),  
				'transaction_date' => $this->input->post('t_date'),
				'transaction_id' => $this->input->post('t_id'),
				'email' => $this->input->post('user_email'),
				'companyid' => $this->input->post('company_id'),
				'amount' => $this->input->post('amount')
				 
			);  
			
			
			//Transfering data to Model
			 $this->Mdl_config->refund_values_insert($data);
			 $this->session->set_flashdata('refundmessage','Data Added Successfully'); 
			 redirect('admin/refund/');
		}
	}
	  
	
	
	
	/**
	 * Login user on the site
	 *
	 * @return void
	 */
	function login()
	{
		
		
		
		
		//var_dump($data['regusers']);
				
		if ($this->tank_auth->is_logged_in()) {	
		
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}

			$data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				if ($data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email'])) {								// success
					redirect('');

				} else {
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/auth/send_again/');

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				if ($data['use_recaptcha']) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			$data['title'] = 'Dashboard - Admin Login';
			$data['content'] = 'auth/login_form';
			$this->load->view('admin/templates/login_layout',$data);
		}
	}
	
	

	/**
	 * Logout user
	 *
	 * @return void
	 */
	function logout()
	{
		$this->tank_auth->logout();
		$this->_show_message($this->lang->line('auth_message_logged_out'));
		redirect('admin/login');  
	}

	/**
	 * Register user on the site
	 *
	 * @return void
	 */
	function register()
	{
		
		if($this->input->post('username')) {
			
			
			$data['content'] = 'admin/admin_content/dashboard';
			$this->load->view('admin/templates/admin_layout', $data);	
		}
		
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));

		} else {
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				} else {
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
				}
			}
			$data['errors'] = array();

			$email_activation = $this->config->item('email_activation', 'tank_auth');

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

						$this->_send_email('activate', $data['email'], $data);

						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_1'));

					} else {
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
					}
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			$data['use_username'] = $use_username;
			$data['captcha_registration'] = $captcha_registration;
			$data['use_recaptcha'] = $use_recaptcha;
			$data['title'] = 'Dashboard - Admin Register';
			$data['content'] = 'admin/admin_content/users/register';
			$this->load->view('admin/templates/login_layout', $data);
		}
	}
	
	function registerpost() {
		
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			
			$data['content'] = 'auth/login_form';
			$this->load->view('admin/templates/login_layout',$data);
		}
		
		else {

		
		$email = $this->input->post('email');
		$data=$this->Mdl_config->getUserId($email);
		$sess_array = array(
                    'id' => $data['id'],
					'username' =>  $data['username'],
                    'role'  =>  $data['role'],
					'permission' => $data['permission']  
             		 );  
		$session=$this->session->set_userdata($sess_array); 
		redirect('admin/index');
		
		}
	}
	
	/**
	 * Send activation email again, to the same or new email address
	 *
	 * @return void
	 */
	function send_again()
	{
		if (!$this->tank_auth->is_logged_in(FALSE)) {							// not logged in or activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->change_email(
						$this->form_validation->set_value('email')))) {			// success

					$data['site_name']	= $this->config->item('website_name', 'tank_auth');
					$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

					$this->_send_email('activate', $data['email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/send_again_form', $data);
		}
	}

	/**
	 * Activate user account.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function activate()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Activate user
		if ($this->tank_auth->activate_user($user_id, $new_email_key)) {		// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_activation_failed'));
		}
	}

	/**
	 * Generate reset code (to change password) and send it to user
	 *
	 * @return void
	 */
	function forgot_password()
	{
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->forgot_password(
						$this->form_validation->set_value('login')))) {

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with password activation link
					$this->_send_email('forgot_password', $data['email'], $data);

					$this->_show_message($this->lang->line('auth_message_new_password_sent'));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			 $data['content'] = 'auth/forgot_password_form';
			 $this->load->view('auth/templates/auth_layout', $data);
			
		}
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user).
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_password()
	{
		$user_id		= $this->uri->segment(3);
		$new_pass_key	= $this->uri->segment(4);

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

		$data['errors'] = array();

		if ($this->form_validation->run()) {								// validation ok
			if (!is_null($data = $this->tank_auth->reset_password(
					$user_id, $new_pass_key,
					$this->form_validation->set_value('new_password')))) {	// success

				$data['site_name'] = $this->config->item('website_name', 'tank_auth');

				// Send email with new password
				$this->_send_email('reset_password', $data['email'], $data);

				$this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));

			} else {														// fail
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		} else {
			// Try to activate user by password key (if not activated yet)
			if ($this->config->item('email_activation', 'tank_auth')) {
				$this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
			}

			if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		}
		
			$data['content'] = '';
			$this->load->view('auth/reset_password_form', $data);
	}

	/**
	 * Change user password
	 *
	 * @return void
	 */
	function change_password()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					$this->_show_message($this->lang->line('auth_message_password_changed'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/change_password_form', $data);
		}
	}

	/**
	 * Change user email
	 *
	 * @return void
	 */
	function change_email()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->set_new_email(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password')))) {			// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with new email address and its activation link
					$this->_send_email('change_email', $data['new_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/change_email_form', $data);
		}
	}

	/**
	 * Replace user email with a new one.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_email()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Reset email
		if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {	// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_new_email_failed'));
		}
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 *
	 * @return void
	 */
	function unregister()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->delete_user(
						$this->form_validation->set_value('password'))) {		// success
					$this->_show_message($this->lang->line('auth_message_unregistered'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/unregister_form', $data);
		}
	}

	/**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		
		$this->session->set_flashdata('message', $message);
		$data['title'] = 'Dashboard - Admin';
		$data['content'] = 'auth/register_form';
		$this->load->view('auth/templates/auth_layout',$data);
		
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}
	
	/********************** Report *****************************/
	
	
	/********** Job Posting ********************/
	public function activity() {
		
				$s_date = $this->input->post('start_date');
				$e_date = $this->input->post('end_date');
				
				
				if(isset($s_date)) {
				
				$data['showcountries']=$this->Mdl_config->showcountries();
				$data['showposition']=$this->Mdl_config->showposition();
				$data['showarea']=$this->Mdl_config->showarea();
				$res = array(
					'locationname_en' => $this->input->post('select_cont'),
					'positionname_en' => $this->input->post('position_cont') ,
					'areaofexpname_en' => $this->input->post('area_cont')
					    
				);
				/*$url = 'URL';
				$data = array('field1' => 'value', 'field2' => 'value');
				$options = array(
		        'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data),
			    )
			);

				$context  = stream_context_create($options);
				$result = file_get_contents($url, false, $context);
				var_dump($result);*/
				
				$data['title'] = 'Job Post Activity';
				$data['returned_res']= $this->Mdl_config->search_reports($res,$s_date,$e_date);
				$data['content'] = 'admin/admin_content/report/activity';
				$this->load->view('admin/templates/admin_layout',$data);
				
				}
				
				else {
				
				
				$data['showreport'] = $this->Mdl_config->show_reports();
				$data['showcountries']=$this->Mdl_config->showcountries();
				$data['showposition']=$this->Mdl_config->showposition();
				$data['showarea']=$this->Mdl_config->showarea();
				$data['title'] = 'Job Post Activity';
				$data['content'] = 'admin/admin_content/report/activity';
				$this->load->view('admin/templates/admin_layout',$data);
				
				}
		
	}
	
	public function comapplied() {
		
	
				$s_date = $this->input->post('start_date');
				$e_date = $this->input->post('end_date');
				
				
				if(isset($s_date)) {
				
				
					$data['showcountries']=$this->Mdl_config->showcountries();
					//$data['showcompanies']=$this->Mdl_config->showcompanies();
					$res = array(
						'locationname_en' => $this->input->post('select_cont'),
						'companytype' => $this->input->post('select_com_type') 
					);
				
				
					$data['title'] = 'Company Applied';
					$data['return_res']= $this->Mdl_config->search_com_type($res,$s_date,$e_date);
					$data['content'] = 'admin/admin_content/report/company-applied';
					$this->load->view('admin/templates/admin_layout',$data);
				
				}
				
				else {
				
					$data['showcountries']=$this->Mdl_config->showcountries();
					$data['showcomtype'] = $this->Mdl_config->show_comp_type();
					$data['title'] = 'Company Applied';
					$data['content'] = 'admin/admin_content/report/company-applied';
					$this->load->view('admin/templates/admin_layout',$data);
				
				}	
		
		
				
		
	}
	
	public function searchreport() {

				
				$s_date = $this->input->post('start_date');
				$e_date = $this->input->post('end_date');
				$data = array(
					'locationname_en' => $this->input->post('select_cont'),
					'positionname_en' => $this->input->post('position_cont') ,
					'areaofexpname_en' => $this->input->post('area_cont')
					    
				);
				$res['returned_res']= $this->Mdl_config->search_reports($data,$s_date,$e_date);
				$res['content'] = 'admin/admin_content/report/activity';
				$this->load->view('admin/templates/admin_layout',$res);
				
	
	}
}
?>