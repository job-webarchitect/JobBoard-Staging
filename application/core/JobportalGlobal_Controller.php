<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobportalGlobal_Controller extends MY_Controller 
{
	public $lang_code, $user_loggedin, $ssoinfo, $ssofname, $ssolname, $ssoemail, $ssogender, $ssodob, $ssocountry, $ssomstatus, $ssopic, $ssocontact;
	public $jp_id, $unique_portal_id;

	function __construct()
  	{
		parent::__construct();
		$this->load->model('mdl_general/mdl_position');
		$this->load->model('mdl_general/mdl_general');
		$this->get_language_option();
		if($this->input->cookie('userinfo')){
			$userdata = json_decode($this->input->cookie('userinfo'));
			$this->user_loggedin = 'loggedin';
			$this->ssoinfo  = decode($userdata->ssoinfo);
			$this->ssofname = decode($userdata->ssofname);
			$this->ssolname = decode($userdata->ssolname);
			$this->ssoemail = decode($userdata->ssoemail);
			$this->ssogender= decode($userdata->ssogender);
			$this->ssodob 	= decode($userdata->ssodob);
			$this->ssocountry = decode($userdata->ssocountry);
			$this->ssomstatus = decode($userdata->ssomstatus);
			if($this->ssomstatus == false){
				$this->ssomstatus = 0;
			}
			$this->ssopic 	  = decode($userdata->ssopic);
			$this->ssocontact = decode($userdata->ssocontact);
			
			$result_sso_user = $this->mdl_general->search_sso_user($this->ssoinfo);
	
			
			if(!$result_sso_user){
				$this->unique_portal_id = strtoupper(substr($this->ssofname, 0,1).substr($this->ssolname, 0,1).rand(111111,999999));
				$adduser_data = array(
					'ssoid' 			=> $this->ssoinfo,
					'unique_portal_id' 	=> $this->unique_portal_id,
					'first_name'		=> $this->ssofname,
					'last_name'			=> $this->ssolname,
					'email'				=> $this->ssoemail,
					'date_of_birth'		=> $this->ssodob,
					'countrycode'		=> $this->ssocountry,
					'datejoined'		=> date('Y-m-d h:i:s'),
					'status'			=> '1'
				);
				$this->mdl_general->add_jobportal_user($adduser_data);
				if(strtolower($this->uri->segment(1)) != 'allusers' && strtolower($this->uri->segment(1)) != 'jsonapi' ){
					redirect('allusers/get_started');
				}
			}
			else{
				$this->jp_id = $result_sso_user['userid'];
				$this->unique_portal_id = $result_sso_user['unique_portal_id'];
			}
			
		}
		else{
			$this->user_loggedin = '';
			$this->ssoinfo  = $this->ssofname = $this->ssolname =  $this->ssoemail = $this->ssogender= $this->ssodob = $this->ssocountry = '';
		}
	}

  	public function get_language_option(){
		$cookie_lang = $this->input->set_cookie('lang_cookie','en',0);
		/*$geo_data  	= get_geolocation();
		$cookie_lang = $this->input->cookie('lang_cookie');
		if($cookie_lang != ''){
			$this->lang_code = $this->input->cookie('lang_cookie');
		}
		else{
	 		$load_lang 	= $this->mdl_general->get_language($geo_data['country_code']);
	 		$this->lang_code  = (!empty($load_lang['language_code'])) ? $load_lang['language_code'] : 'en';
	 		$cookie_lang = $this->input->set_cookie('lang_cookie',$this->lang_code,0);
	 	}
	 	// $this->load->language('top',get_language_folder($this->lang_code));
	 	$this->load->language('common',get_language_folder($this->lang_code));
	 	$this->load->language('footer',get_language_folder($this->lang_code));*/
	}
}
?>