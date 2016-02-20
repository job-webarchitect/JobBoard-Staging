<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Mdl_jobseeker extends CI_Model
	{
		public function get_profile(){
			return $this->db->get_where('jobseeker_info',array('userid'=>$this->jp_id))->row_array();
		}

		public function get_applied_position(){
			$this->db->select('position_detail.positionid as pid, position_detail.positionname_'.$this->lang_code.' as position');
			$this->db->from('jobseeker_position_opted');
			$this->db->join('jobseeker_info','jobseeker_info.userid = jobseeker_position_opted.userid',"INNER");
			$this->db->join('position_detail','position_detail.positionid = jobseeker_position_opted.positionid',"INNER");
			$this->db->where(array('jobseeker_position_opted.userid'=> $this->jp_id));
			return $this->db->get()->result_array();
			
		}
	}
?>