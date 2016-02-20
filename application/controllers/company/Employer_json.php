<?php
include_once(APPPATH . 'core/JobportalGlobal_Controller.php');
class Employer_json extends JobportalGlobal_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_company/Mdl_employer');
		$this->load->helper('cookie');
		$this->load->library('Cart');
	}
	public function email_template_detail()
	{
		$filter_by = '';	
		if($this->input->post('email_filter')) {
			if($this->input->post('email_filter') == 'name') {
				$filter_by = 'template_name'; 
			}  else if($this->input->post('email_filter') == 'date') {
				$filter_by = 'created_date'; 
			}  
		}
		$email_filter_result = $this->Mdl_employer->view_templates(1,$filter_by,$this->jp_id);
		echo json_encode($email_filter_result);	
	}
	
	public function edit_template() {
		if($this->input->post('template_id')){
			$edit_templ_data = $this->Mdl_employer->getEmailTemplateDetails($this->input->post('template_id'));
			echo json_encode($edit_templ_data);
		}
	}
	
	public function delete_email_template()
	{
		if($this->input->post('del_temp_id')) {
			$update_mail_data = array();	
			$update_mail_data['status']  = 0;	
			$this->Mdl_employer->update_email_template_details($update_mail_data,$this->input->post('del_temp_id'));	
			return true;
		}
	}
	public function edit_employers_detail()
	{
		if($this->input->post('emplr_id'))
		{
			$red_edit_emplr = $this->Mdl_employer->edit_employers($this->input->post('emplr_id')); 
			print_r($red_edit_emplr);exit;
			echo json_encode($red_edit_emplr);
		}
	}
	public function get_all_position()
	{
		if($this->input->post('position_keyword')) {
			$get_job_position = $this->Mdl_employer->get_positions($this->input->post('position_keyword'));
			echo json_encode($get_job_position);	
		}
	}
	public function remove_sessplan()
	{
		//echo "<li>++".$this->input->post('remsession_id');
		if($this->input->post('remsession_id'))
		{
			$res_remove_sessplan = $this->Mdl_employer->remove_plan($this->input->post('remsession_id'));
			echo json_encode($res_remove_sessplan);	
		}
		
	}
	public function delete_plan_session()
	{
		if($this->input->post('session_rowid'))
		{
			$update_sessplan = array(
									'rowid'=>$this->input->post('session_rowid'),
									'qty'=>0
									);
			$this->cart->update($update_sessplan);
			$res_update_plan = TRUE;
			echo json_encode($res_update_plan);	

		}
	}

}
?>