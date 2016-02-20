<?php

class Mdl_employer extends CI_Model
{	
	public function __construct() {
		$this->load->helper('cookie');
	}
	
	public function get_companyid($get_compid) {
		return $this->db->query("SELECT cp.company_id,cp.unique_compid FROM company_profile cp INNER JOIN employer_detail ed ON cp.company_id = ed.company_id INNER JOIN user_type ut ON ed.employerid = ut.userid WHERE ut.user_type_flg IN('2') AND ut.userid = $get_compid")->row_array();
	}
	
	public function get_userid($user_main_id) {
		$this->db->select('userid');
		$this->db->from('jp_user_info');
		$this->db->where('unique_portal_id',$user_main_id);
		$res_user_id = $this->db->get();
		return $res_user_id->row_array();
	}
	
	public function add_employer_temp($add_employer_data) {
		$res_add_employer = $this->db->insert('temp_employer_detail',$add_employer_data);
		return $res_add_employer;
	}
	
	/*
	 * Get Employer List
	 */
	public function view_employers() {
		$this->db->select('employer_detail.employerid, employer_detail.country_code, employer_detail.language_code, employer_detail.permission_jobposting, employer_detail.permission_databasestats, employer_detail.approved_byuserid, jp_user_info.first_name, jp_user_info.last_name');
		$this->db->from('employer_detail');
		$this->db->where('employer_detail.approved_byuserid !=','0');
		$this->db->where('employer_detail.approve_status =','1');
		$this->db->join('jp_user_info','employer_detail.userid = jp_user_info.userid');		
		$res_all_employer = $this->db->get();
		return $res_all_employer->result_array();
	}
	
	/*
	 * Edit Employers
	 */
	public function edit_employers($edit_emplrid) {
		$this->db->select('employer_detail.employerid, employer_detail.country_code, employer_detail.language_code, employer_detail.permission_jobposting, employer_detail.permission_databasestats, jp_user_info.first_name, jp_user_info.last_name,jp_user_info.email');
		$this->db->from('employer_detail');
		$this->db->where('jp_user_info.userid',$edit_emplrid);
		$this->db->join('jp_user_info','employer_detail.employerid = jp_user_info.userid');	
		$res_edit_employer = $this->db->get();
		return $res_edit_employer->row_array();
	}
	
	/*
	 * Update Employers
	 */
	public function update_employers($update_emplr_data,$update_emplid) {
		return $this->db->update('employer_detail',$update_emplr_data,array('employerid'=>$update_emplid));
	}

	/*
	 * View Email Template
	 */
	public function view_templates($status,$filter_by='',$employee_id='') {
		$this->db->select('templateid,template_name,created_date');
		$this->db->from('email_template_detail');
		
		if(!empty($status)) {
			$this->db->where('email_template_detail.status =',$status);
		}
		
		if(!empty($employee_id)) {
			$this->db->where('userid =',$employee_id);
		}
		
		if($filter_by == 'template_name') {
			$this->db->order_by('template_name','asc');
		} else if($filter_by == 'created_date') {
			$this->db->order_by('created_date','asc');
		} else {
			$this->db->order_by('created_date','desc');
		}
		
		$res_view_templates = $this->db->get();
		return $res_view_templates->result_array();
	}

    /*
	 * Get Template Details
	 */
	public function getEmailTemplateDetails($template_id) {
		$res_edit_templ = $this->db->get_where('email_template_detail',array('templateid'=>$template_id));
		return $res_edit_templ->row_array();
	}
	
	/*
	 * Delete Email Template
	 */
	public function delete_email_template($del_email_tmpid) {
		return $this->db->delete('email_template_detail',array('templateid'=>$del_email_tmpid));
	}

	/*
	 * Get Postions
	 */
	public function get_positions($find_position='') {
		$position_field = "positionname_".$this->input->cookie('lang_cookie');
		$this->db->select("positionid,$position_field");
		$this->db->from('position_detail');
		
		if(!empty($find_position)) { 
			$this->db->like("$position_field",$find_position);
		}
		
		$res_position_det = $this->db->get();
		return $res_position_det->result_array();
	}
	public function get_jobpos_id($job_posname)
	{
		$jobpos_field = "positionname_".$this->input->cookie('lang_cookie');
		$this->db->select('positionid');
		$this->db->where("$jobpos_field",trim($job_posname));
		$res_jobpos_id = $this->db->get('position_detail');
		return $res_jobpos_id->row_array();
	}
	
	public function view_regions()
	{
		$region_field = "region_".$this->input->cookie('lang_cookie');
		$this->db->select("region_id,$region_field");
		$this->db->from('regions');
		$res_job_region = $this->db->get();
		return $res_job_region->result_array();
	}
	
	
	public function get_position_cost($jobpositionid)
	{
		//print_r($jobpositionid);exit;
		
		
		//SELECT pg.charge FROM position_grade pg, position_detail pd WHERE pg.grade_id = pd.grade_id AND pd.positionname_en = 'PHP Developer'
		$pos_fldname = "pd.positionname_".$this->input->cookie('lang_cookie');
		$this->db->select('pg.charge');
		$this->db->from('position_grade as pg');
		$this->db->join('position_detail as pd','pg.grade_id=pd.grade_id');
		$this->db->where('positionid',$jobpositionid['positionid']);
		$res_get_poscost = $this->db->get();
		return $res_get_poscost->row_array();
	}
	public function get_hotjob_cost($hotjob_confirm)
	{
		if($hotjob_confirm == '1')
		{
			$this->db->select('adv_charge');
			$this->db->where('advplan_type','2');
			$this->db->where('adv_status','1');
			$res_hotjob_cost = $this->db->get('advertisement_plan');	
			return $res_hotjob_cost->row_array();
		}
	}
	public function get_advertise_cost($advjob_confirm)
	{
		if($advjob_confirm == '1')
		{
			$this->db->select('adv_charge');
			$this->db->where('advplan_type','1');
			$this->db->where('adv_status','1');
			$res_advjob_cost = $this->db->get('advertisement_plan');	
			return $res_advjob_cost->row_array();
		}
	}
	public function translate_jobs($trans_lang_job_det)
	{
		return $this->db->insert('job_translated_lang',$trans_lang_job_det);
	}
	public function get_all_plans()
	{
		$this->db->select('planid,planname,price,download_noofresume,view_noofresume,used_email');
		$res_plan_details = $this->db->get('plan_details');
		return $res_plan_details->result_array();
	}
	public function get_current_plans()
	{
		$this->db->select('planname,download_noofresume,view_noofresume,used_email,transaction_price,Date(transaction_date) AS Date');
		//$this->db->select('planname,download_noofresume,view_noofresume,used_email,transaction_price,transaction_date');
		$this->db->where('status','1');
		$this->db->where('companyid','SIT123456');
		$this->db->order_by('transaction_date','desc');
		$res_curr_det = $this->db->get('transaction_history');
		//echo "<li>..".$this->db->last_query();
		return $res_curr_det->row_array();
	}
	public function get_plan_detail($get_planid)
	{
		$this->db->select('planid,planname,download_noofresume,view_noofresume,used_email,price');
		$this->db->from('plan_details');
		$this->db->where('planid',$get_planid);
		$res_particular_plan = $this->db->get();
		return $res_particular_plan->row_array();
	}
	public function resume_plan_session($resplan_sessdata)
	{
		return $this->db->insert('resume_plan_session',$resplan_sessdata);
	}
	public function get_plan_sessdetail()
	{
		$this->db->select('sess_id,planid,planname,plan_price');
		$this->db->where('companyid',$this->companyid);
		return $this->db->get('resume_plan_session')->result_array();
	}
	public function remove_plan($remplan_sessid)
	{
		return $this->db->delete('resume_plan_session',array('sess_id'=>$remplan_sessid));
	}
	public function send_pretrans_detail($pretrans_data)
	{
		return $this->db->insert('pre_transaction_detail',$pretrans_data);
	}
	public function save_transaction_data($posttrans_data)
	{
		return $this->db->insert('post_transaction_detail',$posttrans_data);
	}
	public function get_company_session_payment($getcompany_id)
	{
		return $this->db->query("SELECT sum(plan_price) as price FROM resume_plan_session WHERE companyid= $getcompany_id GROUP BY companyid")->row_array();
	}
	public function remove_company_session($remcomp_id)
	{
		$res_del_plansess = $this->db->delete('resume_plan_session',array('companyid'=>$remcomp_id));
		return $res_del_plansess;
	}
	public function save_job_multilang($jobmulti_langdata)
	{
		$res_multilang_job = $this->db->insert('job_translated_lang',$jobmulti_langdata);
		return $res_multilang_job;
	}
	public function getJobsCollection($status='',$userid='',$is_response_count='') {
		$position_field = "pd.positionname_".$this->input->cookie('lang_cookie');
		$this->db->select("jd.job_id,
		jd.positionid,
		jd.job_postedby,
		DATE_FORMAT(jd.jobpostingdate, '%m-%d-%Y') as posting_date,
		DATE_FORMAT(jd.advopening_date, '%m-%d-%Y') as opening_date,
		DATE_FORMAT(jd.advclosing_date, '%m-%d-%Y') as closing_date,
		DATE_FORMAT(jd.jobpostingdate, '%m-%d-%Y') as posting_date,
		jd.job_type,
		jd.response_count,
		$position_field as position_name,
		ji.first_name,
		ji.last_name
		");
		$this->db->from('job_detail as jd');
		$this->db->join('position_detail as pd','jd.positionid=pd.positionid');
		$this->db->join('employer_detail as ed','ed.userid=jd.job_postedby','left');
		$this->db->join('jp_user_info as ji','ji.userid=jd.job_postedby','left');
		
		if($status == 'active') {
			$this->db->where('jd.jobstatus =',1);
		} else if($status == 'listing') {
			$this->db->where('jd.jobstatus !=',2);
		} else if($status == 'expired') {
			$this->db->where('jd.jobstatus =',3);
		} else if($status == 'posted_jobs') {
			$this->db->where('jd.jobstatus !=',0);
		}
		
		if($is_response_count == 'no') {
			$this->db->where('jd.response_count =',0);
		} else if($is_response_count == 'yes') {
			$this->db->where('jd.response_count >',0);
		}
	
		if($userid != '') {
			$this->db->where('jd.job_postedby =',$userid);
		}
		$this->db->where('jd.company_id',$this->Common_model->getPortalInfo('company_id'));
		$this->db->order_by('jd.job_id','desc');
		$res_all_employer = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $res_all_employer->result_array();
	}
	
	/*
	 * Get JOB Details
	 */
	public function getJobDetails($job_id) {
		$position_field = "pd.positionname_".$this->input->cookie('lang_cookie');
		$area_field = "ae.areaofexpname_".$this->input->cookie('lang_cookie');
		$location_area = "ld.locationname_".$this->input->cookie('lang_cookie');
			
		$this->db->select("jd.job_type,
		jd.language_id,
		jd.positionid,
		jd.job_description,
		jd.skills,
		jd.job_type,
		jd.workexperience_id_min,
		jd.workexperience_id_max,
		jd.areaofexpid,
		jd.salary_id_min,
		jd.salary_id_max,
		jd.locationid,
		jd.rotation_flag,
		jd.rotation_ondays,
		jd.rotation_offdays,
		jd.noof_vacancy, 
		DATE_FORMAT(jd.advopening_date, '%m/%d/%Y') as advopening_date,
		DATE_FORMAT(jd.advclosing_date, '%m/%d/%Y') as advclosing_date,
		DATE_FORMAT(jd.tempavail_startdate, '%m/%d/%Y') as tempavail_startdate,
		DATE_FORMAT(jd.tempavail_enddate, '%m/%d/%Y') as tempavail_enddate,
		jd.qualification_id, 
		jd.job_condition,
		qs.qualification_name,
		$area_field as areaofexpname,
		$position_field as position_name,
		$location_area as location,
		ss_max.salary_code as max_salary,
		ss_min.salary_code as min_salary");
		
		$this->db->from('job_detail as jd');
		$this->db->where('jd.company_id',$this->Common_model->getPortalInfo('company_id'));
		$this->db->where('jd.job_id',$job_id);
		$this->db->join('position_detail as pd','jd.positionid=pd.positionid','left');
		$this->db->join('qualification_setup as qs','qs.qualification_id=jd.qualification_id','left');
		$this->db->join('areaofexp_detail as ae','ae.areaofexpid=jd.areaofexpid','left');
		$this->db->join('salary_setup as ss_min','ss_min.salary_id=jd.salary_id_min','left');
		$this->db->join('salary_setup as ss_max','ss_max.salary_id=jd.salary_id_max','left');
		$this->db->join('location_details as ld','ld.locationid=jd.locationid','left');

		$res_edit_employer = $this->db->get();
		return $res_edit_employer->row_array();
	}

	/*
	 * Insert JOB Details
	 */		
	public function post_new_job($add_new_job_det) {
		$res_insert_job = $this->db->insert('job_detail',$add_new_job_det);

		if($res_insert_job) {
			return $this->db->insert_id();	
		} else {
			return false;
		}
	}
	
	/*
	 * Update JOB Details
	 */
	public function update_job_details($update_job_data,$update_jobid) {
		return $this->db->update('job_detail',$update_job_data,array('job_id'=>$update_jobid));
	}
	
	/*
	 * Get Employer Details
	 */
	public function getEmployerDetails($employee_id) {
		$location_area = "ld.locationname_".$this->input->cookie('lang_cookie');
		
		$this->db->select("employer_detail.employerid, 
		employer_detail.country_code,
		employer_detail.language_code, 
		employer_detail.permission_jobposting, 
		employer_detail.permission_databasestats, 
		employer_detail.approved_byuserid, 
		jp_user_info.first_name, 
		jp_user_info.last_name,
		jp_user_info.email,
		jp_user_info.sec_phoneno as phoneno,
		cp.company_website,
		$location_area as location");
		
		$this->db->from('employer_detail');
		$this->db->where('employer_detail.userid =',$employee_id);
		$this->db->join('jp_user_info','employer_detail.userid = jp_user_info.userid');	
		$this->db->join('location_details as ld','ld.country_code=employer_detail.country_code','left');	
		$this->db->join('company_profile as cp','cp.company_id=employer_detail.company_id','left');	
		$res_all_employer = $this->db->get();
		return $res_all_employer->row_array();
    }
	
	public function getReminderColelction($status='',$employee_id='') {
		$this->db->select('message,DATE_FORMAT(reminderdatetime, "%m-%d-%Y") as reminder_date');
		$this->db->from('reminder_notes_detail');
		
		if($status == 'active') {
			$this->db->where('reminderdatetime >=',date('Y-m-d H:i:s'));
		}
		
		if(!empty($employee_id)) {
			$this->db->where('userid =',$employee_id);
		}
		
    	$reminder_messages = $this->db->get();
		return $reminder_messages->result_array();
	}
	
}
?>