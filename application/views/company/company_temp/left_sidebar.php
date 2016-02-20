<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nopadding-right">
	  			<div class="white-box-full">
	  				<nav class="navbar navbar-default navbar-side navbar-inverse-two menu-border navbar-bottom">
	      				<div class="navbar-header col-xs-12">
	        				<button aria-expanded="false" type="button" class="navbar-toggle menu-border collapsed pull-left left20" data-toggle="collapse" data-target="#myNavsidebar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	      				</div>
	    				<div aria-expanded="false" class="navbar-collapse collapse" id="myNavsidebar">
	        				<ul class="nav custom-left-nav" id="side-menu">
	    						<!-- <li class="active"> <a href="emp_home.php"> Home </a></li> -->          
	    						<li class="active"> <a href="<?php echo base_url();?>company/employer/dashboard"
	    						<?php
	    							if($this->uri->segment(1) == 'employer' &&  $this->uri->segment(2) == '')
	    							{
	    								echo 'class="active"';
	    							}	
	    						?>	
	    						> Dashboard </a></li>
	    						<li> 
	    							<a href="#"> Manage Job Posting <span class="caret pull-right"></span></a>
	  								<ul style="height: 0px;" class="nav nav-second-level collapse">
	    								<li> <a href="<?php echo base_url();?>employer/all_jobs">Add/Edit Jobs</a> </li>
										<!-- <li> <a href="reopen-job.php">Reopen Jobs</a> </li> -->
	   									<!--  <li> <a href="active-job.php">Active Jobs</a> </li> !-->  
	    								<li> <a href="<?php echo base_url();?>employer/closed_job">Closed Jobs</a> </li>  
	  								</ul>
								</li>
	    						<li><a href="<?php echo base_url();?>employer/modify_company">Edit Company Details</a></li>
	    						<li> 
	    							<a href="#"> Manage Employers <span class="caret pull-right"></span></a>
	  								<ul style="height: 0px;" class="nav nav-second-level collapse">
	        							<li> <a href="<?php echo base_url();?>employer/all_employer">Add/View Employer</a> </li>
	        							<!-- <li> <a href="approve-employer.php">Approve Employer</a> </li> !-->
	        							<li> <a href="<?php echo base_url();?>employer/request_employer">Unapprove Employer</a> </li>   
	  								</ul>
	    						</li>
	    						<li> 
	    							<a href="#"> Job Responses <span class="caret pull-right"></span></a>
	  								<ul style="height: 0px;" class="nav nav-second-level collapse">
								        <li> <a href="<?php echo base_url();?>employer/shortlist">Shortlisted</a> </li>
								        <li> <a href="<?php echo base_url();?>employer/onhold">On Hold</a> </li>
								        <li> <a href="<?php echo base_url();?>employer/reject">Rejected</a> </li>
	      							</ul>
	    						</li>
	    						<li> 
	    							<a href="#"> Resume <span class="caret pull-right"></span></a>
	      							<ul style="height: 0px;" class="nav nav-second-level collapse">
								        <li> <a href="<?php echo base_url();?>employer/saved_search">Saved Search</a> </li>    
								        <li> <a href="<?php echo base_url();?>employer/find_resume">Search Resume</a> </li> 
								        <li> <a href="<?php echo base_url();?>employer/folder">Folder</a> </li>
								        <li> <a href="<?php echo base_url();?>employer/get_statistics">Download Statistics</a> </li>
	      							</ul>
								</li>
	    						<li> 
	    							<a href="#"> Account Utilization <span class="caret pull-right"></span></a>
	      							<ul style="height: 0px;" class="nav nav-second-level collapse">
								        <li> <a href="<?php echo base_url();?>employer/plans">Plan</a> </li>
								        <li> <a href="<?php echo base_url();?>employer/history">History</a> </li>
	      							</ul>
	    						</li>
	     						<li> 
	    							<a href="<?php echo base_url();?>employer/mail_template">Email Template</a> 
	    						</li>
	    						<li> 
	    							<a href="<?php echo base_url();?>employer/reminder">Reminder</a> 
								</li>
	    						<li> 
	    							<a href="<?php echo base_url();?>employer/best_company">Best in Company</a> 
	    						</li>
							    <li> 
							    	<a href="<?php echo base_url();?>employer/complain">Complain</a> 
							    </li>
							    <li> 
							    	<a href="<?php echo base_url();?>employer/report">Report</a> 
							    </li>
	  						</ul>
	      				</div>
	  				</nav>
	  			</div>
			</div>