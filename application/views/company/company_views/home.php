<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
      <div class="col-lg-12 white-box-right">
      <div class="row">
        
      <div class="col-xs-8 profile-dtls">
           <div class="pull-right">
          <span class="md-blue-link"><a href="#"><em>Edit</em></a></span>
      </div>
      <div class="col-xs-8"><h4 class="profile-name"><?php echo $resEmployerDetails['first_name']." ".$resEmployerDetails['last_name'];?> <span></span></h4></div>
      <div class="col-xs-12 prf-col2"></div>
      
        <div class="col-xs-12 margin-ten">
          <strong>Current Location:</strong> <?php echo $resEmployerDetails['location'];?>
        </div>
  
         <div class="col-xs-12 margin-ten">
         <strong>Role:</strong> Employer
         </div>
         <div class="col-xs-12">
         <strong>Website:</strong><span class="md-blue-link"><a href="javascript:void(0);"> <?php echo $resEmployerDetails['company_website'];?></a></span>
         </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"> 
            <?php if($this->ssogender == 'male'){ echo '<img src="'.base_url().'assets/common/images/icon-male.png" width="180" height="190">'; } ?>
            <?php if($this->ssogender == 'female'){ echo '<img src="'.base_url().'assets/common/images/icon-female.png" width="180" height="190">'; } ?>
            <div class="change-pic">
              <label><a href="<?=SSO_URL?>/account/users/editprofile" title="You can edit Profile photo from here only"><i class="fa fa-picture-o"></i> Add/Edit Photo</a></label>
            </div>
          </div>
         </div>
      
      <div class="col-xs-12 margin-ten">
        <ul class="prf-col2-ul pull-left">
          <li>
            <div class="email-label"><?php echo $resEmployerDetails['email'];?>
            <span class="sm-blue-link"><a href="#"><em>(Verified)</em></a></span>
            <span class="mail-edit-btn"><a href="#"><i class="fa fa-pencil"></i></a></span>
            <span>|</span>
            </div>
          </li>
          <li>
            <div class="email-label">
            <?php echo $resEmployerDetails['phoneno'];?>
            <span class="mail-edit-btn"><a href="#"><i class="fa fa-pencil"></i></a></span>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 md-blue-link">
      <div class="col-md-3 col-xs-4 row notify-width"><a href="<?php echo base_url(); ?>company/employer/dashboard_notify#expire">Expire Jobs(<?php echo count($inActiveJobsCollection);?>)</a></div>
      <div class="col-md-3 col-xs-4 notify-width"><a href="<?php echo base_url(); ?>company/employer/dashboard_notify#response">Job Responses(<?php echo count($responseJobsCollection);?>)</a></div>
      <div class="col-md-3 col-xs-3 margin-ten notify-width"><a href="<?php echo base_url(); ?>company/employer/dashboard_notify">Active Jobs(<?php echo count($activeJobsCollection);?>)</a></div>
      <div class="col-md-2 col-xs-4 row notify-width"><a href="<?php echo base_url(); ?>company/employer/dashboard_notify">Posted Jobs(<?php echo count($postedJobsCollection);?>)</a></div>
      <div class="col-md-1 col-xs-3 notify-width"><a href="<?php echo base_url(); ?>company/employer/dashboard_notify">No Responses(<?php echo count($noresponseJobsCollection);?>)</a></div>
      </div>

   
      </div>

     
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-lg-12">
          <div class="white-box-right">
             <div class="col-md-8 col-xs-9"><h4 class="profile-name">Last Posted Jobs <span></span></h4></div>
            <div class="col-md-4 col-xs-3">
              <div class="col-md-5"><strong>R</strong> - Regular</div> 
              <div class="col-md-6"><strong>T</strong> - Temporary</div> 
           </div>
            <div class="col-xs-12 prf-col2"></div>
            <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-3"><b>Job Position(Posted ID)</b></div>
            <div class="col-xs-3"><b>Job Type</b></div>
            <div class="col-xs-3"> <b>Posted on</b></div>
            <div class="col-xs-3"><b> Responses</b></div>
            </div>
            <?php
			if(count($postedJobsCollection) >0 ) {	
			?> 
            <div class="col-xs-12 white-padding">
            <div class="col-xs-3 md-blue-link"><a href="job-description.php"><?php echo $postedJobsCollection[0]['position_name'];?></a></div>
             <div class="col-xs-3"><?php echo getJobType($postedJobsCollection[0]['job_type']);?></div>
            <div class="col-xs-3"><?php echo $postedJobsCollection[0]['posting_date'];?></div>
            <div class="col-xs-3 md-blue-link"><?php echo $postedJobsCollection[0]['response_count'];?> (<a href="manage_response.php">click here</a> to see response)</div>
            </div>
              <div class="col-xs-12">
             <div class="prf-col2"> </div> 
             <div class="pull-right md-blue-link"><a href="<?php echo base_url(); ?>employer/all_jobs">View All</a></div>
             </div>
            <?php 
				} else {
			?>
                      <div class="col-xs-12 margin-ten white-padding">
                      <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
                      </div>
			<?php } ?>
          </div>
           
           <div class="white-box-right">
            <div class="col-xs-12"><h4 class="profile-name">Reminder Message<span></span></h4></div>
            <div class="col-xs-12 prf-col2"></div>
            <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-10"><b>Message</b></div>
            <div class="col-xs-2"><b>Reminder Date</b></div>
            </div>
              <?php
		   			if(count($reminderCollection) >0 ) {	 
		   				foreach($reminderCollection as $reminderDetails){ ?>
           					 <div class="col-xs-12 white-padding">
          					  <div class="col-xs-10 md-blue-link"><?php echo $reminderDetails['message'];?></div>
          					  <div class="col-xs-2"><?php echo $reminderDetails['reminder_date'];?></div>
            				</div>
           <?php  }
					} else {
			?>
            			  <div class="col-xs-12 margin-ten white-padding">
                          <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
                          </div>
            <?php } ?>
          </div> 

          <div class="white-box-right">
            <div class="col-md-8 col-xs-9"><h4>Saved Searches<span></span></h4></div>
              <div class="col-md-4 col-xs-3">
              <div class="col-md-5"><strong>R</strong> - Regular</div> 
              <div class="col-md-6"><strong>T</strong> - Temporary</div> 
           </div>
            <div class="col-xs-12 prf-col2"></div>
            <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-3"><b>Name Keyword</b></div>
            <div class="col-xs-2"><b>Job Type</b></div>
            <div class="col-xs-3"><b>Area of Experience</b></div>
            <div class="col-xs-2"> <b>Experience</b></div>
            <div class="col-xs-2"><b>Location</b></div>
            </div>
            
            <div class="col-xs-12 white-padding">
            <div class="col-xs-3 md-blue-link"><a href="search-result.php">Web Designer</a></div>
            <div class="col-xs-2">R</div>
            <div class="col-xs-3">Area #1</div>
            <div class="col-xs-2">1-2 year</div>
            <div class="col-xs-2">Africa</div>
            </div>
            
            <div class="col-xs-12 white-padding">
            <div class="col-xs-3 md-blue-link"><a href="search-result.php">Web Developer</a></div>
            <div class="col-xs-2">R</div>
            <div class="col-xs-3">Area #1</div>
            <div class="col-xs-2">0-1 year</div>
            <div class="col-xs-2">Africa</div>
            </div>

            <div class="col-xs-12 white-padding">
            <div class="col-xs-3 md-blue-link"><a href="search-result.php">PHP Developer</a></div>
            <div class="col-xs-2">T</div>
            <div class="col-xs-3">Area #1</div>
            <div class="col-xs-2">0-1 year</div>
            <div class="col-xs-2">Africa</div>
            </div>
             
             
             <div class="col-xs-12">
             <div class="prf-col2"> </div> 
             <div class="pull-right md-blue-link"><a href="saved-search.php">View All</a></div>
             </div>

          </div>

          <div class="white-box-right">
            <div class="col-xs-12"><h4 class="profile-name">Saved Folder<span></span></h4></div>
            <div class="col-xs-12 prf-col2"></div>
            <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-10"><b>Folder Name</b></div>
            <div class="col-xs-2"><b>Date</b></div>
            </div>
            <div class="col-xs-12 white-padding">
            <div class="col-xs-10 md-blue-link"><a href="content-writer.php">Content Writer</a></div>
            <div class="col-xs-2">10-05-2015</div>
            </div>

            <div class="col-xs-12 white-padding">
            <div class="col-xs-10 md-blue-link"><a href="content-writer.php">Rohit</a></div>
            <div class="col-xs-2">12-05-2015</div>
            </div>
          </div>

           <div class="white-box-right">
            <div class="col-xs-12"><h4 class="profile-name">Account Utilization<span></span></h4></div>
            <div class="col-xs-12 prf-col2"></div>
            <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-10"><b>Resume Database Usage</b></div>
            <div class="col-xs-2"> <b>My Usage</b></div>
            </div>
            
            <div class="col-xs-12 white-padding">
            <div class="col-xs-10">CVAccess</div>
            <div class="col-xs-2"><span class="md-blue-link"><a href="account-status.php">80 out of 1000</a></span></div>
            </div>
            
             <div class="col-xs-12 white-padding">
            <div class="col-xs-10">Emails</div>
            <div class="col-xs-2"><span class="md-blue-link"><a href="account-status.php">50 out of 1000</a></span></div>
            </div>

             <div class="col-xs-12 white-padding">  
            <div class="col-xs-10">Job Posting</div>
            <div class="col-xs-2"><span class="md-blue-link"><a href="account-status.php">14 out of 100</a></span></div>
            </div>

          </div>


      </div>
    </div>
  </div>