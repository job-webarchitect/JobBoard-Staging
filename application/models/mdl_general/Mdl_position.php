<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	class Mdl_position extends CI_Model
	{
		public function get_position($selected_lang){
			$this->db->select("positionid as pid, positionname_".$selected_lang." as position");
			$this->db->from("position_detail");
			return $this->db->get()->result_array();
		}

		public function get_area_exp($selected_lang){
			$this->db->select("areaofexpid as areaid, areaofexpname_".$selected_lang." as area_exp_name");
			$this->db->from("areaofexp_detail");
			return $this->db->get()->result_array();
		}

		public function get_area_exp_name($selected_lang, $area_id){
			$this->db->select("areaofexpid as areaid, areaofexpname_".$selected_lang." as area_exp_name");
			$this->db->where("areaofexpid",$area_id);
			$this->db->from("areaofexp_detail");
			return $this->db->get()->result_array();
		}		

		public function get_country_location($selected_lang){
			$this->db->select("locationid as lid, locationname_".$selected_lang." as location");
			$this->db->from("location_details");
			return $this->db->get()->result_array();
		}

		public function get_country_name($selected_lang, $con_id){
			$this->db->select("locationid as lid, locationname_".$selected_lang." as location");
			$this->db->where("locationid",$con_id);
			$this->db->from("location_details");
			return $this->db->get()->row_array();
		}

		public function get_region_location($selected_lang){
			$this->db->select("region_".$selected_lang." as regionname");
			$this->db->from("regions");
			return $this->db->get()->result_array();
		}
	}
?>