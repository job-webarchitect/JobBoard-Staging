<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	class Mdl_general extends CI_Model
	{
		public function get_language($country_code){
			$this->db->select("language_code");
			$this->db->where(array('country_code'=>$country_code));
			$this->db->from("`location_details`");
			return $this->db->get()->row_array();
		}

		public function search_sso_user($ssoid){
			$this->db->select('*');
			$this->db->from('jp_user_info');
			$this->db->where('ssoid',$ssoid);
			return $this->db->get()->row_array();
		}

		public function search_position($positionid){
			$this->db->select('positionname_'.$this->lang_code);
			$this->db->from('position_detail');
			$this->db->where('positionid',$positionid);
			return $this->db->get()->row_array();	
		}

		public function add_jobportal_user($adduser_data){
			return $this->db->insert('jp_user_info',$adduser_data);
		}

		public function add_usertype($usertype_data){
			return $this->db->insert('user_type',array('userid'=>$this->jp_id,'user_type_flg'=>$usertype_data));
		}

		public function check_usertype(){
			return $this->db->get_where('user_type',array('userid'=>$this->jp_id))->row_array();
		}

		public function add_company($usertype_data){
			return $this->db->insert('company_profile',$usertype_data);
		}

		public function add_employer($usertype_data){
			return $this->db->insert('employer_detail',$usertype_data);
		}		

		public function check_user($user_flg = null){
			// return $this->db->get_where('user_type',array('userid'=>$this->jp_id, 'user_type_flg'=>$user_flg))->row_array();
			if($user_flg == null){
				return $this->db->query("SELECT ut.user_type_flg, cp.companytype from 
			user_type ut 
			LEFT JOIN jp_user_info jp ON jp.userid = ut.userid 
			INNER JOIN employer_detail ed ON ed.employerid = jp.userid
			INNER JOIN company_profile cp ON cp.company_id = ed.company_id
			where 
			ut.user_type_flg IN('2','3','4') AND jp.userid = ".$this->jp_id."")->result_array();
			}
			else if($user_flg == '1'){
			return $this->db->query("SELECT ut.user_type_flg from 
			user_type ut 
			LEFT JOIN jp_user_info jp ON jp.userid = ut.userid 
			WHERE 
			jp.status = '1' and jp.userid ='".$this->jp_id."' and ut.user_type_flg =".$user_flg."")->row_array();
			}
			else{
			return $this->db->query("SELECT ut.user_type_flg, cp.companytype from 
			user_type ut 
			LEFT JOIN jp_user_info jp ON jp.userid = ut.userid 
			INNER JOIN employer_detail ed ON ed.employerid = jp.userid
			INNER JOIN company_profile cp ON cp.company_id = ed.company_id
			where 
			ut.user_type_flg != '1' AND jp.userid = ".$this->jp_id."")->row_array();
			}
			// ut.user_type_flg =".$user_flg." AND 
			// cp.approved_status = 1 and
			
		}

		public function check_jobseeker(){
			$this->db->select('jobseeker_info.userid, user_type.user_type_flg');
			$this->db->from('jobseeker_info');
			$this->db->join('user_type', 'jobseeker_info.userid = user_type.userid', "INNER");
			$this->db->where(array('jobseeker_info.userid'=>$this->jp_id, 'user_type.user_type_flg'=>'1'));
			return $this->db->get()->row_array();
		}

		public function check_company(){
			return $this->db->query("SELECT cp.* from 
			user_type ut 
			LEFT JOIN jp_user_info jp ON jp.userid = ut.userid 
			INNER JOIN employer_detail ed ON ed.employerid = jp.userid
			INNER JOIN company_profile cp ON cp.company_id = ed.company_id
			where 
			cp.companytype = '1' AND cp.master_employerid = ".$this->jp_id." AND ed.employerid = ".$this->jp_id."")->row_array();
		}

		public function save_jobseeker_position($jobseeker_pos_data,$id = null){
			return $this->db->insert('jobseeker_position_opted',$jobseeker_pos_data);
		}

		public function save_jobseeker_data($jobseeker_data){
			return $this->db->insert('jobseeker_info',$jobseeker_data);
		}

		public function update_company_data($company_data, $company_id){
			return $this->db->update('company_profile',$company_data,array('company_id'=> $company_id));
		}

		public function company_details($search_val){
			return $this->db->query("SELECT * FROM `company_profile` cp INNER JOIN location_details ld ON cp.locationid = ld.locationid where cp.approved_status = 1 AND ld.country_code = '".$this->ssocountry."' AND companytype = '".$search_val."'")->result_array();
		}

		public function check_company_accesstoken($accesstoken){
			return $this->db->query("SELECT cp.approved_status FROM `company_profile` cp INNER JOIN jp_user_info jui ON cp.master_employerid = jui.userid INNER JOIN user_type ut ON ut.userid = jui.userid where jui.userid='".$this->jp_id."' AND accesstoken = '".$accesstoken."'")->row_array();			
		}
		
		/*
		 * Check User Type
		 */ 
		public function checkUserType($ssoid) {
			// Check Employer
			$employerDetails = $this->ifEmployerExists($ssoid);
			$data = array();
			if(count($employerDetails) > 0) {
				$data['userType'] = 'Employer';
				$data['userId'] = $employerDetails['userid'];
				$data['company_id'] = $employerDetails['company_id'];
				$data['employer_id'] = $employerDetails['employerid'];
			}	
			return json_encode($data);	
		}
		
		/*
		 * Check If Employer Exists
		 */ 
		public function ifEmployerExists($ssoid) {
			$this->db->select('employer_detail.employerid,employer_detail.userid,employer_detail.company_id');
			$this->db->from('employer_detail');
			$this->db->join('jp_user_info', 'jp_user_info.userid = employer_detail.userid', "INNER");
			$this->db->where(array('jp_user_info.ssoid'=>$ssoid));
			return $this->db->get()->row_array();
		}
	}
?>