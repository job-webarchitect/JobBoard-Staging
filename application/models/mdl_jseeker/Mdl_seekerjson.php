<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Mdl_seekerjson extends CI_Model
	{
		public function update_degree($udpate_data){
			return $this->db->update('jobseeker_info',$udpate_data,array('userid'=>$this->jp_id));
		}

		public function update_work($udpate_data){
			return $this->db->update('jobseeker_info',$udpate_data,array('userid'=>$this->jp_id));
		}

		public function update_other($udpate_data){
			return $this->db->update('jobseeker_info',$udpate_data,array('userid'=>$this->jp_id));
		}

		public function update_resume($udpate_data){
			return $this->db->update('jobseeker_info',$udpate_data,array('userid'=>$this->jp_id));
		}

		public function update_temp($udpate_data){
			return $this->db->update('jobseeker_info',$udpate_data,array('userid'=>$this->jp_id));
		}
	}
?>