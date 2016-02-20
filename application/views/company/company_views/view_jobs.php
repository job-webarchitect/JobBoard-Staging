<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"> <!-- right part-->
      
      <div class="clearfix"></div>     
       <div class="white-box-right">
         <div class="col-lg-6 col-md-8 col-sm-6 col-xs-6">
           <h4>Add/Edit Jobs</h4></div>
      <div class="col-lg-4">
         <div class="col-lg-6 col-md-2 col-sm-3 col-xs-3"><strong>R</strong> - Regular </div>
          <div class="col-lg-6 col-md-2 col-sm-3 col-xs-3"><strong>T</strong> - Temporary</div>
  </div>
   <div class="col-lg-2 ad-apply-btn"><a href="<?php echo base_url(); ?>employer/add_job" class="primary-btn"><strong>Add Job</strong></a></div>
          
          <div class="col-xs-12 prf-col2 margin-thirty"></div>


          <div class="col-xs-12 margin-ten gray-padding">
          <div class="col-lg-2 col-md-3 col-sm-2 col-xs-2"><b>Job Position</b></div>
          <div class="col-lg-3 col-md-2 col-sm-2 col-xs-3"><b>Posted By</b></div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><b>Post Date</b></div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><b>Close Date</b></div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><b>Job Type</b></div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><b>Modify</b></div>
          </div>
           <?php
		   			if(count($jobsCollection) >0 ) {	 
		   				foreach($jobsCollection as $jobDetsils){ ?>
                          <div class="col-xs-12 margin-ten white-padding">
                          <div class="col-lg-2 col-md-3 col-sm-2 col-xs-2"><a href="<?php echo base_url(); ?>employer/get_job/<?php echo $jobDetsils['job_id']?>"><?php echo $jobDetsils['position_name'];?></a></div>
                          <div class="col-lg-3 col-md-2 col-sm-2 col-xs-3"><?php echo $jobDetsils['job_postedby'];?></div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><?php echo $jobDetsils['posting_date'];?></div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><?php echo $jobDetsils['closing_date'];?></div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><?php echo getJobType($jobDetsils['job_type']);?></div>
                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                            <a href="<?php echo base_url(); ?>employer/edit_job/<?php echo $jobDetsils['job_id']?>"><i class="fa fa-pencil" title="Edit"></i></a>
                            <span class="margin-seven"><a href="<?php echo base_url(); ?>employer/delete_job/<?php echo $jobDetsils['job_id']?>"><i class="fa fa-times" title="Inactive"></i></a></span>
                          </div>
                          </div>
           <?php  }
					} else {
			?>
            			  <div class="col-xs-12 margin-ten white-padding">
                          <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
                          </div>
            <?php } ?>
       </div>
  </div>
