<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 
<?php  
   class Mdl_config extends CI_Model  
   {  
      
     function __construct()
	 {
		parent::__construct();

	 }
	 
	 public function login($data) {
		 
		$condition = "admin_name =" . "'" . $data['username'] . "' AND " . "admin_pass =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	 }
	 
	 // Insert registration data in database
	public function registration_insert($data) {

	// Query to check whether username already exist or not
		$condition = "admin_name =" . "'" . $data['admin_name'] . "'";
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('admin_user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			} else {
			return false;
		}
}

	// Read data from database to show data in admin page
		public function read_user_information($username) {

			$condition = "admin_name =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('admin_user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
		}
	}



	 
	 
	 //Get UserName After Login
	 public function getUserId($email) {
		 
		 $query = $this->db->get_where('users',array('email'=>$email));
		 $result =$query->row_array();
		 return $result;
		 
	 }
	 
	 //Validate
	 
	 public function validate() {
		
		 $username = $this->security->xss_clean($this->input->post('email'));
         $password = $this->security->xss_clean($this->input->post('password')); 
		 
		

		$data=$this->Mdl_config->getUserId($username);
		$key=  $data['password'];
		var_dump($key);die;
		$decoded_pass = $this->encrypt->decode($key); 
		var_dump($decoded_pass);die;
		$this->db->where('email', $username);
        $this->db->where('password',$decoded_pass );
        
        // Run the query
        $query = $this->db->get('users');
		echo $this->db->last_query();
		
           if( $query->num_rows() == 1 )  {
             
			  $row = $query->row();
            	$data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'role' => $row->role,
                    'status' => $row->status,
					'permission' => $row->permission, 
                    'validated' => true
                    );
			
           $session=$this->session->set_userdata($data);
            return true;
           }
            
		else { return false; }
       
		 
	 }
	 
	 
      
	 
	 //Location Module
	 public function location()  
     {  
      	  
        $this->db->select('location_details.locationname_en, regions.region_en,location_details.language_code,location_details.status');
		$this->db->from('location_details');
		$this->db->join('regions', 'location_details.region_id = regions.region_id');
		$query = $this->db->get();
 		return $query->result();

	      
     }
	 
	 //Position Module
	  
	 public function position()  
     {  
      	  
        $query = $this->db->get('position_detail');
 		return $query->result();

	 } 
	 
	 
	 
	 //Insert the Positon into Database
	 public function form_insert($data)
	 {
		$this->db->insert('position_detail', $data);
	   
	  } 
	  
	  //Edit the Position Form Fields
	  
	  public function editposition($id)  
      {  
      	  
 		$query = $this->db->get_where('position_detail',array('positionid'=>$id));
		$result =$query->row_array();
		return $result;
	   
	  } 
	  
	  //Update the Postion into Database
	  
	  public function form_position_update($id,$data)
	  {
		
			 $q=$this->db->where('positionid', $id);
		     $this->db->update('position_detail', $data); 
	  }
	  
	  //Grade
	   public function grade()  
     {  
      	  
        $query = $this->db->get('position_grade');
 		return $query->result();

	 } 
	 
	 //Insert Grade into Database
	  public function form_insert_grade($data)
	  {
		$this->db->insert('position_grade', $data);
	   
	  }
	  
	   // Edit the Areaofexpe Form fields
	  
	  public function editgrade($id)  
      {  
      	  
 		$query = $this->db->get_where('position_grade',array('grade_id'=>$id));
		$result =$query->row_array();
		return $result;
	   
	  } 
	  
	 // Update the Areaofexp into Database
	  
	   public function form_grade_update($id,$data)
	   {
		
			 $q=$this->db->where('grade_id', $id);
		     $this->db->update('position_grade', $data); 
			
			
	   }  
	  
	  
	  
	  //Area of Experience Module 
	  public function area()  
      {  
      	  
        $query = $this->db->get('areaofexp_detail');
 		return $query->result();

	  } 
	 
	  
	  
	  //Insert Area into Database
	  public function form_insert_area($data)
	  {
		$this->db->insert('areaofexp_detail', $data);
	   
	  }
	  
	  // Edit the Areaofexpe Form fields
	  
	  public function editarea($id)  
      {  
      	  
 		$query = $this->db->get_where('areaofexp_detail',array('areaofexpid'=>$id));
		$result =$query->row_array();
		return $result;
	   
	  } 
	  
	  // Update the Areaofexp into Database
	  
	   public function form_area_update($id,$data)
	   {
		
			 $q=$this->db->where('areaofexpid', $id);
		     $this->db->update('areaofexp_detail', $data); 
			
			
	   } 
	   
	   //Account config Paypal details
	   public function account_detail()
	   {
		
			$query = $this->db->get('admin_account_config');
 			$result =$query->row_array();
			return $query->result();
			
			
	   }
	   
	   public function form_account_update($data)
	   {
		
			 $id=1;
			 $q=$this->db->where('account_id', $id);
		     $this->db->update('admin_account_config', $data); 
			
			
	   }
	   
	   public function mail_regcomp_insert($data) {
		   $this->db->insert('mail_config', $data);
	   }
	   
	   
	 //Manage job Seeker Module
	 public function js_info() {
		  
		$this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('user_type', 'jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','1');
		$query = $this->db->get();
 		return $query->result();  
	   }
	   
	 //Manage Employer Module
	 public function emp_info()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','2');
		$this->db->where('approved_status','1');
		$query = $this->db->get();
 		return $query->result();  

	      
     }
	 
	  //Show Company Details
	 public function com_details($id)  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','2');
		$this->db->where('approved_status','1');
		$this->db->where('company_id',$id);
		$query = $this->db->get();
 		return $query->row_array();  

	      
     }
	 
	 //Manage Request List Module
	 public function emp_req_list()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','2');
		$this->db->where('approved_status','0');
		$query = $this->db->get();
 		return $query->result();

	      
     }
	 //Get Email & username For Mail
	 public function get_email($id) {
		 
		 	
		return $query = $this->db->query("SELECT jp.*, cp.accesstoken from 
  											 user_type ut 
   											INNER JOIN jp_user_info jp ON jp.userid = ut.userid 
										    INNER JOIN employer_detail ed ON ed.employerid = jp.userid
										    INNER JOIN company_profile cp ON cp.company_id = ed.company_id
										    WHERE cp.company_id = ".$id." GROUP BY jp.userid
										   ")->row_array();
	
		 
	 }
	 
	 
	 //appove Company 
	  public function approve_comp($data,$param)  
      {  
	 		 $q=$this->db->where('company_id', $param);
		     $this->db->update('company_profile', $data); 
			 return $q;
	   }
	   
	//Manage Recriuter Module
	 public function req_info()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','3');
		$this->db->where('approved_status','1');
		$query = $this->db->get();
 		return $query->result();  

	      
     }
	 
	  //Show recruiter Details
	 public function req_details($id)  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','3');
		$this->db->where('approved_status','1');
		$this->db->where('company_id',$id);
		$query = $this->db->get();
 		return $query->row_array();  

	      
     }
	 
	//Manage Request List Module
	 public function rec_req_list()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','3');
		$this->db->where('approved_status','0');
		$query = $this->db->get();
 		return $query->result();

	      
     }
	 
	 //appove Recruiter 
	  public function approve_rec($data,$param)  
      {  
	 		 $q=$this->db->where('company_id', $param);
		     $this->db->update('company_profile', $data); 
			 return $q;
	   }
	   
	   //Manage Consultant List Module
	   
	   //Manage Recriuter Module
	 public function cons_info()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','4');
		$this->db->where('approved_status','1');
		$query = $this->db->get();
 		return $query->result();  

	      
     }
	 
	 //Show Consultancy Details
	 public function con_details($id)  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','4');
		$this->db->where('approved_status','1');
		$this->db->where('company_id',$id);
		$query = $this->db->get();
 		return $query->row_array();  

	      
     }
	   
	    public function cons_list()  
     {  
      	  
        $this->db->select('*');
		$this->db->from('jp_user_info');
		$this->db->join('company_profile', 'jp_user_info.userid = company_profile.master_employerid');
		$this->db->join('user_type','jp_user_info.userid = user_type.userid');
		$this->db->where('user_type_flg','4');
		$this->db->where('approved_status','0');
		$query = $this->db->get();
 		return $query->result();

	      
     }
	 
	 //appove Recruiter 
	  public function approve_cons($data,$param)  
      {  
	 		 $q=$this->db->where('master_employerid', $param);
		     $this->db->update('company_profile', $data); 
			 return $q;
	   }
	  
	  //Hot Jobs Module
	  //List Of Jobs
	  public function joblist()  
      {  
	 	$query = $this->db->get_where('job_detail',array('hotjob_flag'=>'1'));
		$result =$query->row_array();
		return $query->result();
	  }
	  
	  //List Of HotJobs
	  public function hotjoblist()  
      {  
	 	
		
		$query = $this->db->get_where('job_detail',array('hotjob_flag'=>'0'));
		$result =$query->row_array();
		return $query->result();
	  }
	  
	  //Add job to hot job list
	  public function addto_hotjob($id,$data)  
      {  
	 		 $q=$this->db->where('job_id', $id);
		     $this->db->update('job_detail', $data); 
			 return $q;
	  }
	  
	   //Advertisment Jobs Module
	  //List Of Advertisment
	  public function advertlist()  
      {  
	 	$query = $this->db->get_where('job_detail',array('advertisementjob_flag'=>'1'));
		$result =$query->row_array();
		return $query->result();
	  }
	  
	  //Add New advertisment
	  public function addnewadervt()  
      {  
	 	
		
		$query = $this->db->get_where('job_detail',array('advertisementjob_flag'=>'0'));
		$result =$query->row_array();
		return $query->result();
	  }
	  
	  //Add job to hot job list
	  public function addto_advert($id,$data)  
      {  
	 		 $q=$this->db->where('job_id', $id);
		     $this->db->update('job_detail', $data); 
			 return $q;
	  }
	  
	  
	  /************ Resume Download List **************/
	  
	  // Add Resume Download Plan
	  public function resume_download_insert($data) {
		   	$this->db->insert('plan_details', $data);
	   } 
	   
	  //Show Resume downloads 
	  public function download_resume() {
		   	$query = $this->db->get_where('plan_details',array('status'=>'1'));
			$result =$query->row_array();
			return $query->result();
	   } 
	   
	  //Edit Resume downloads 
	  public function edit_download_resume($id) {
		   	$query = $this->db->get_where('plan_details',array('planid'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //update Resume Download
	   
	    public function update_download_resume($id,$data) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->update('plan_details', $data); 
			 return $q;
	   } 
	   
	  //Delete Download resume plan
	   public function delete_download_resume($id) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->delete('plan_details'); 
			 return $q;
	   }
	  
	   /************ View Resume List **************/
	 
	   
	  //Show Viewed Resume 
	  public function view_resume() {
		   	$query = $this->db->get_where('plan_details',array('status'=>'2'));
			$result =$query->row_array();
			return $query->result();
	   } 
	   
	  //Edit View Resume  
	  public function edit_view_resume($id) {
		   	$query = $this->db->get_where('plan_details',array('planid'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //update View Resume 
	   
	    public function update_view_resume($id,$data) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->update('plan_details', $data); 
			 return $q;
	   } 
	   
	  //Delete View resume plan
	   public function delete_view_resume($id) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->delete('plan_details'); 
			 return $q;
	   }
	   
	    
	   
	  /************ Email Sevice List **************/
	   public function email_service() {
		   	$query = $this->db->get_where('plan_details',array('status'=>'3'));
			$result =$query->row_array();
			return $query->result();
	   }  
	   
	   //Edit email service
	  public function edit_email_service($id) {
		   	$query = $this->db->get_where('plan_details',array('planid'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //update Email Service
	   
	    public function update_email_service($id,$data) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->update('plan_details', $data); 
			 return $q;
	   } 
	   
	  //Delete Email Service
	   public function delete_email_service($id) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->delete('plan_details'); 
			 return $q;
	   } 
	   
	   //mixed plan 
	    public function mixed_plan() {
		     	
			$query = $this->db->get_where('plan_details',array('status'=>'4'));
			$result =$query->row_array();
			return $query->result();
			
	   }
	   
	     //Edit Mixed plan
	   public function edit_mixed_plan($id) {
		   	$query = $this->db->get_where('plan_details',array('planid'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //update Mixed plan
	   
	    public function update_mixed_plan($id,$data) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->update('plan_details', $data); 
			 return $q;
	   } 
	   
	  //Delete Mixed plan
	   public function delete_mixed_plan($id) {
		     
			 $q=$this->db->where('planid', $id);
		     $this->db->delete('plan_details'); 
			 return $q;
	   } 
	   
	   //Add Discount Plan
	    public function discount_values_insert($data) {
		   	$this->db->insert('plan_discount_onrequest', $data);
	   }
	   
	  //Show disocunt plans
	  public function fetch_discount_records() {
		    
			$query = $this->db->get('plan_discount_onrequest');
			$result =$query->row_array();
			return $query->result();
	   }
	   
	   //Edit Download Resume discount plan
	   public function edit_discount_download($id) {
		   	$query = $this->db->get_where('plan_discount_onrequest',array('discount_id'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //Update Recoreds 
	   public function update_disocunt_resume_download($id,$data) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->update('plan_discount_onrequest', $data); 
			 return $q;
	   } 
	   
	   
	   //Delete
	   public function remove_disocunt_resume_download($id) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->delete('plan_discount_onrequest'); 
			 return $q;
	   }
	   
	   /******* Discount View resume ***************/ 
	   
	  //Show disocunt Resume View plans
	  public function fetch_discount_resume_view() {
		    
			$query = $this->db->get('plan_discount_onrequest');
			$result =$query->row_array();
			return $query->result();
	   }
	   
	   //Edit Resume View  discount plan
	   public function edit_discount_resume_view($id) {
		   	$query = $this->db->get_where('plan_discount_onrequest',array('discount_id'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //Update Records 
	   public function update_disocunt_resume_view($id,$data) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->update('plan_discount_onrequest', $data); 
			 return $q;
	   } 
	   
	   
	   //Delete
	   public function remove_disocunt_resume_view($id) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->delete('plan_discount_onrequest'); 
			 return $q;
	   }
	   
	   /********* Discount View Email **************/
	   
	   //Show Discount View Email plans
	  public function fetch_discount_mixed_records() {
		    
			$query = $this->db->get('plan_discount_onrequest');
			$result =$query->row_array();
			return $query->result();
	   }
	   
	   //Edit Discount View Email plan
	   public function edit_discount_mixed($id) {
		   	$query = $this->db->get_where('plan_discount_onrequest',array('discount_id'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //Update Discount View Email 
	   public function update_disocunt_mixed($id,$data) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->update('plan_discount_onrequest', $data); 
			 return $q;
	   } 
	   
	   
	   //Delete Discount View Email 
	   public function remove_disocunt_mixed($id) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->delete('plan_discount_onrequest'); 
			 return $q;
	   }

       //Show Adv Plan
        public function show_adv_plan() {

            $query = $this->db->get('advertisement_plan');
            $result =$query->row_array();
            return $query->result();

        }

       //Insert Advertisment plan Types
       public function add_plan_insert($data) {

           $this->db->insert('advertisement_plan', $data);

       }

       //Edit Advertisement Plan
       public function edit_adv_plan($id) {

           $query = $this->db->get_where('advertisement_plan',array('advplan_id'=>$id));
           $result =$query->row_array();
           return $result;

       }

       public function update_adv_plan($id,$data) {

           $q=$this->db->where('advplan_id', $id);
           $this->db->update('advertisement_plan', $data);
           return $q;
       }

       public function delete_adv_plan($id) {

           $q=$this->db->where('advplan_id', $id);
           $this->db->delete('advertisement_plan');
           return $q;
       }

	   
	    /********* Discount Mixed Plan **************/
	   
	   //Show Mixed plan Template
	  public function fetch_discount_email() {
		    
			$query = $this->db->get('plan_discount_onrequest');
			$result =$query->row_array();
			return $query->result();
	   }
	   
	   //Edit Discount View Email plan
	   public function edit_discount_email($id) {
		   	$query = $this->db->get_where('plan_discount_onrequest',array('discount_id'=>$id));
		    $result =$query->row_array();
		    return $result;
	   } 
	   
	   //Update Discount View Email 
	   public function update_disocunt_email($id,$data) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->update('plan_discount_onrequest', $data); 
			 return $q;
	   } 
	   
	   
	   //Delete Discount View Email 
	   public function remove_disocunt_email($id) {
		     
			 $q=$this->db->where('discount_id', $id);
		     $this->db->delete('plan_discount_onrequest'); 
			 return $q;
	   }
	   
	   
	   /******** Refund **************/
	   
	   public function refund_values_insert($data) {
		   	$this->db->insert('refund', $data);
	   } 
	   
	   
	   public function refund_fetch_records() {
		    
			$query = $this->db->get('refund');
			$result =$query->row_array();
			return $query->result();
	   }
	   
	   //Inserting subadmin role into Table
	   public function form_insert_subadmin($data,$email) {
		   	
			$this->db->where('email', $email);
			return $this->db->update('users', $data);
			
	   } 
	   
	   //Show sub admins
	   public function showsubadmins() {
		    $query = $this->db->get('users');
			$result =$query->row_array();
			return $query->result();
			   
	   }
	   
	   public function getstatus($id) {
		  
		    $query = $this->db->get_where('users',array('id'=>$id));
		    $result =$query->row();
		    return $result; 
		   
	   }
	   
	   public function assigneestatus($id) {
		  
		    $query = $this->db->get_where('users',array('id'=>$id));
		    $result =$query->row();
		    return $result; 
		   
	   }
	   
	   
	   public function update_subadmin($role,$role_id,$data,$id)
	   {
		   	
			$query = 'UPDATE `users` SET `role` = CONCAT(`role`, ' ;
			$query .= "',$role'";
			$query .= ') WHERE `id` = ' . $role_id;
			$this->db->query($query);
			
			
			$this->db->where('id', $id);
			return $this->db->update('users', $data); 
			
		}
		
	    public function update_assigner($role_id,$data) {
			 
			 $this->db->where('id', $role_id);
			 return $this->db->update('users', $data); 
		 }
		 
		 //Tax
		
		//Add tax	
		 public function tax_fields_insert($data) {
			 $this->db->insert('tax_detail', $data);
			 
		 }
		 
		 //Show tax
		 public function showtax() {
			  
			   $query = $this->db->get('tax_detail');
			   $result =$query->row_array();
			   return $query->result();
			 
		 }
		 
		 //Edit Tax
		 public function edittax($id) {
			  
			$query = $this->db->get_where('tax_detail',array('tax_id'=>$id));
		    $result =$query->row_array();
		    return $result;
			 
		 }
		 
		 //Update Tax
		  public function updatetax($id,$data) { 
		  
		 	 $q=$this->db->where('tax_id', $id);
		     $this->db->update('tax_detail', $data); 
			 return $q;
		 
		  }
		  
		  //Show Matched Resume
		  public function show_matched_resume() {
			  
			$query = $this->db->get('resume_percentage_calculation');
		    $result =$query->row_array();
			return $query->result();
			 
		 }
		 
		 //Insert match Resume 
		  public function match_resume_insert($data) {
			 $this->db->insert('resume_percentage_calculation', $data);
			 
		 }
		 
		 public function edit_resume_insert($id) {
			  
			$query = $this->db->get_where('resume_percentage_calculation',array('formulaid'=>$id));
		    $result =$query->row_array();
		    return $result;
			 
		 }
		 
		 //Update
		  public function update_resume_match($id,$data) { 
		  
		 	 $q=$this->db->where('formulaid', $id);
		     $this->db->update('resume_percentage_calculation', $data); 
			 return $q;
		 
		  }
		  
		  //Report
		  public function show_reports() {
			  
		 		$this->db->select('location_details.locationname_en, position_detail.positionname_en, areaofexp_detail.areaofexpname_en, COUNT( * ) AS countMe ');
				$this->db->from('position_detail');
				$this->db->join('job_detail', 'position_detail.positionid = job_detail.positionid');
				$this->db->join('areaofexp_detail', 'areaofexp_detail.areaofexpid = job_detail.areaofexpid');
				$this->db->join('location_details', 'location_details.locationid = job_detail.locationid');
				$this->db->group_by('position_detail.positionname_en');
				$this->db->order_by('position_detail.positionname_en');
				$query = $this->db->get();
				return $query->result(); 
				
		 }
		 
		 //Show all Countries
		 public function showcountries() {
			
			$query = $this->db->get('location_details');
			$result =$query->row_array();
			return $query->result();
			 
		 }
		 
		  //Show all Position
		 public function showposition() {
			
			$query = $this->db->get('position_detail');
			$result =$query->row_array();
			return $query->result();
			 
		 }
		 
		  //Show all Position
		 public function showarea() {
			
			$query = $this->db->get('areaofexp_detail');
			$result =$query->row_array();
			return $query->result();
			 
		 }
		 
		  public function search_reports($result,$s_date,$e_date) {
			  
		 	$location = $result['locationname_en'];
			$position = $result['positionname_en'];
			$area = $result['areaofexpname_en'];	
				
			$query = 
			$this->db->query("SELECT `location_details`.`locationname_en`, `position_detail`.`positionname_en`, `areaofexp_detail`.`areaofexpname_en`, COUNT( * ) 
							 AS countMe FROM `position_detail` JOIN `job_detail` ON `position_detail`.`positionid` = `job_detail`.`positionid` JOIN `areaofexp_detail` ON 	
							 `areaofexp_detail`.`areaofexpid` = `job_detail`.`areaofexpid` JOIN `location_details` ON `location_details`.`locationid` = `job_detail`.`locationid` 
							 WHERE `job_detail`.`advopening_date` BETWEEN '$s_date' and '$e_date' AND
							 `locationname_en` LIKE '%$location%' AND positionname_en LIKE '%$position%' AND areaofexpname_en LIKE '%$area%' 
							 GROUP BY `position_detail`.`positionname_en` ORDER BY `position_detail`.`positionname_en`");  
		
			return $query->result();
			 
				
		 }
		 
		 public function  show_comp_type() {
			
			    $this->db->select('location_details.locationname_en, company_profile.companytype, COUNT( * ) AS countMe ');
				$this->db->from('location_details');
				$this->db->join('company_profile', 'location_details.locationid = company_profile.locationid');
				$this->db->group_by('company_profile.companytype');
				$this->db->order_by('company_profile.companytype');
				$query = $this->db->get();
				return $query->result();  
			 
		 }
		 
		 public function search_com_type($result,$s_date,$e_date) {
			  
		 	$location = $result['locationname_en'];
			$comptype = $result['companytype'];
				
				
			$query = 
			$this->db->query("SELECT `location_details`.`locationname_en`, `company_profile`.`companytype`, COUNT( * ) 
							 
							 AS countMe FROM `location_details` JOIN `company_profile` ON `location_details`.`locationid` = `company_profile`.`locationid` 
							  
							 WHERE `company_profile`.`dateadded` BETWEEN '$s_date' and '$e_date' AND
							
							`locationname_en` LIKE '%$location%' AND companytype LIKE '%$comptype%'  
							 
							 GROUP BY `company_profile`.`companytype` ORDER BY `company_profile`.`companytype`");  
		
			return $query->result();
			 
				
		 }
		 
		 public function no_of_users() {
			
			$query = $this->db->query("SELECT COUNT(*) AS countMe FROM jp_user_info");
			return $query->row_array();
			
			 
		 }
		 
		 public function jobsposted() {
				
				$query = $this->db->query("SELECT COUNT(*) AS countMe FROM job_detail WHERE jobstatus ='1'");
				return $query->row_array(); 
		 }
		 
		 public function downloaded_resume() {
			
				$current_date = date('Y-m-d');
				$query = $this->db->query("SELECT SUM(download_count) AS countMe  
										  FROM `resume_download_viewtrack`  
										  WHERE `resume_download_viewtrack`. `lastdownloaded_date` = '$current_date'	
										 ");
				return $query->row_array();  
										    
		 }
		 
		 public function total_ads() {
			
				
				$query = $this->db->query("SELECT SUM(hotjob_flag + advertisementjob_flag) as countMe 
										  FROM `job_detail`  
										  WHERE `hotjob_flag` = '1' OR 	`advertisementjob_flag` = '1'
										 
										 ");
				return $query->row_array();  
										    
		 }
		 
	    
	  
   }  
?>