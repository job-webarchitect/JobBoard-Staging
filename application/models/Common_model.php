<?php
class Common_model extends CI_Model
{
	/*
	 * Get Language Details
	 */	
	public function getLanguageCollection($status='') {
		$this->db->select("language_id,language_name");
		$this->db->from('language_detail');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$resLanguages = $this->db->get();
		return $resLanguages->result_array();	
	}	
	
	/*
	 * Get Qualification Details
	 */	
	public function getQualificationCollection($status='') {
		$this->db->select("qualification_code as code,qualification_id,qualification_name as name");
		$this->db->from('qualification_setup');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$resQualification = $this->db->get();
		return $resQualification->result_array();	
	}	
	
	/*
	 * Get Salary Details
	 */	
	public function getSalaryCollection($status='',$salary_type='') {
		$this->db->select("salary_id as id,salary_code as code,salary_value as value");
		$this->db->from('salary_setup');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		if(!empty($salary_type)) {
			$this->db->where('salary_type',$salary_type);
		}
		
		$resSalary = $this->db->get();
		return $resSalary->result_array();	
	}	
	
	/*
	 * Get Work Experience Details
	 */	
	public function getWorkExpCollection($status='') {
		$this->db->select("workexperience_id as id,workexperience_code as code,workexperience_name as value");
		$this->db->from('workexperience_setup');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$resWorkexp = $this->db->get();
		return $resWorkexp->result_array();	
	}	
	
	/*
	 * Get Position Details
	 */	
	public function getPositionCollection($status='') {
		$position_field = "positionname_".$this->input->cookie('lang_cookie');
		$this->db->select("$position_field as value, positionid as id");
		$this->db->from('position_detail');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$resWorkexp = $this->db->get();
		return $resWorkexp->result_array();	
	}	
	
	/*
	 *  Get Countries Details
	 */ 
	public function getCountriesCollection($status='')  {
		$country_field = "locationname_".$this->input->cookie('lang_cookie');
		$this->db->select("locationid,$country_field as name");
		$this->db->from('location_details');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$res_job_location = $this->db->get();
		return $res_job_location->result_array();
	}
	
	/*
	 *  Get Experience Details
	 */
	public function getAreaExperienceCollection($status='') {
		$areaexp_field = "areaofexpname_".$this->input->cookie('lang_cookie');
		$this->db->select("areaofexpid,$areaexp_field");
		$this->db->from('areaofexp_detail');
		
		if(!empty($status)) {
			$this->db->where('status',$status);
		}
		
		$res_areaexp_det = $this->db->get();
		return $res_areaexp_det->result_array();	
	}
	
	/*
	* GET Portal Info
	*/
	public function getPortalInfo($info) {  
	   $portalInfo = json_decode(decode($this->input->cookie('portalInfo')),true);
	   return $portalInfo[$info];
	}
	
	/*
	 * Insert Records
	 */
	public function insertRecords($data,$table_name='') {  
		// Check Null Values
		if(empty($table_name) || empty($data)) {
			return false;	
		}

	   return $this->db->insert($table_name,$data);
	} 
	
	/*
	 * Update Records
	 */
	public function updateRecords($data='',$table_name='',$id_name='',$id_value='') {  
		// Check Null Values
		if(empty($table_name) || empty($id_name) || empty($id_value) || empty($data)) {
			return false;	
		}
	   return $this->db->update($table_name,$data,array($id_name=>$id_value));
	} 
}
?>