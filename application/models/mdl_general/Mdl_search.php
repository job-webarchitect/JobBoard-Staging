<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_search extends CI_Model
{
	public function searchAllJob($pos,$con){
		$lang_code = $this->lang_code;
		$query = $this->db->query("select
			pd.positionname_".$lang_code." as position_name,
			ld.locationname_".$lang_code." as location_name,
			jd.job_description,
			jd.work_experience_min as min_exp,
			jd.work_experience_max as max_exp,
			jd.jobpostingdate as posted_date,
			jd.salary_min,
			jd.salary_max,
			jd.condition
			FROM
			position_detail pd INNER JOIN job_detail jd ON pd.positionid = jd.job_id
			INNER JOIN location_details ld ON jd.locationid = ld.locationid
			where
				pd.positionname_".$lang_code." like '%$pos%'
			AND ld.locationname_".$lang_code." like '%$con%'");
		return $query->result_array();
	}

	public function matchingjobs($pid_array){
		$lang_code = $this->lang_code;

		$query = $this->db->query("select
			pd.positionname_".$lang_code." as position_name,
			ld.locationname_".$lang_code." as location_name,
			jd.job_description,
			jd.work_experience_min as min_exp,
			jd.work_experience_max as max_exp,
			jd.jobpostingdate as posted_date,
			jd.salary_min,
			jd.salary_max,
			jd.condition
			FROM
			position_detail pd INNER JOIN job_detail jd ON pd.positionid = jd.positionid
			INNER JOIN location_details ld ON jd.locationid = ld.locationid
			where
				pd.positionid IN (".$pid_array.")
			LIMIT 0, 10
			");
		return $query->result_array();
	}
}
?>