<div class="container container-bottom">
  <div class="row">
  	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>
      <div class="row">
  	<div class="col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>
      <div class="row">     
       <div class="white-box-right">
       <div class="col-lg-12"><h4>Notification</h4></div>
       <div class="col-xs-12 prf-col2"></div>
       <div class="col-lg-12 margin-ten">


<div class="margin-thirty">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" id="tab1"><a href="#expire" aria-controls="expire" role="tab" data-toggle="tab">Expire Jobs</a></li>
    <li role="presentation" id="tab2"><a href="#response" aria-controls="response" role="tab" data-toggle="tab">Job Responses</a></li>
    <li role="presentation" id="tab3"><a href="#active_job" aria-controls="active_job" role="tab" data-toggle="tab">Active Jobs</a></li>
    <li role="presentation" id="tab4"><a href="#post_job" aria-controls="post_job" role="tab" data-toggle="tab">Posted Jobs</a></li>
    <li role="presentation" id="tab5"><a href="#no_response" aria-controls="no_response" role="tab" data-toggle="tab">No Responses</a></li>
  </ul>
  </div>

  <!-- Tab panes -->
   <div class="tab-content">
   <div role="tabpanel" class="tab-pane active" id="expire">
   <div class="col-xs-12 margin-ten best-emp-text gray-padding">
    <div class="col-xs-4"><strong>Job Position</strong></div>
    <div class="col-xs-4"><strong>Posted By</strong></div>
    <div class="col-xs-4"><strong>Expired Date</strong></div>
    </div>
    <?php
	if(count($inActiveJobsCollection) >0 ) {	 
		   foreach($inActiveJobsCollection as $jobDetsils){ ?>                   
            <div class="col-xs-12 best-emp-text white-padding">
            <div class="col-xs-4"><?php echo $jobDetsils['position_name'];?></div>
            <div class="col-xs-4"><?php echo $jobDetsils['first_name']." ".$jobDetsils['last_name'];?></div>
            <div class="col-xs-4"><?php echo $jobDetsils['closing_date'];?></div>
            </div>
    <?php  }
	} else {
	?> 
   			<div class="col-xs-12 margin-ten white-padding">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
            </div>
    <?php } ?>  
    </div>

    <div role="tabpanel" class="tab-pane" id="response">
     <div class="col-xs-12 margin-ten best-emp-text gray-padding-notify">
    <div class="col-xs-3"><strong>Job Position</strong></div>
    <div class="col-xs-3"><strong>Posted By</strong></div>
    <div class="col-xs-3"><strong>Opening Date</strong></div>
    <div class="col-xs-2"><strong>Closing Date</strong></div>
    <div class="col-xs-1"><strong>Responses</strong></div>
    </div>
    <?php
	if(count($responseJobsCollection) >0 ) {	 
		   foreach($responseJobsCollection as $jobDetsils){ ?>                   
            <div class="col-xs-12 best-emp-text white-padding-notify">
            <div class="col-xs-3"><?php echo $jobDetsils['position_name'];?></div>
            <div class="col-xs-3"><?php echo $jobDetsils['first_name']." ".$jobDetsils['last_name'];?></div>
            <div class="col-xs-3"><?php echo $jobDetsils['opening_date'];?></div>
            <div class="col-xs-2"><?php echo $jobDetsils['closing_date'];?></div>
            <div class="col-xs-1"><a href="<?php echo base_url()?>employer/job_responses/all/0"><?php echo $jobDetsils['response_count'];?></a></div>
            </div>
    <?php  }
	} else {
	?> 
   			<div class="col-xs-12 margin-ten white-padding">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
            </div>
    <?php } ?>     
    </div>
    <div role="tabpanel" class="tab-pane" id="active_job">
    <div class="col-xs-12 margin-ten best-emp-text gray-padding">
    <div class="col-xs-3"><strong>Job Position</strong></div>
    <div class="col-xs-3"><strong>Posted By</strong></div>
    <div class="col-xs-3"><strong>Opening Date</strong></div>
    <div class="col-xs-3"><strong>Closing Date</strong></div>
    </div>
    <?php
	if(count($activeJobsCollection) >0 ) {	 
		   foreach($activeJobsCollection as $jobDetsils){ ?>                   
            <div class="col-xs-12 best-emp-text white-padding">
            <div class="col-xs-3"><?php echo $jobDetsils['position_name'];?></div>
            <div class="col-xs-3"><?php echo $jobDetsils['first_name']." ".$jobDetsils['last_name'];?></div>
            <div class="col-xs-3"><?php echo $jobDetsils['opening_date'];?></div>
            <div class="col-xs-3"><?php echo $jobDetsils['closing_date'];?></div>
            </div>
    <?php  }
	} else {
	?> 
   			<div class="col-xs-12 margin-ten white-padding">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
            </div>
    <?php } ?>       
    </div>
    <div role="tabpanel" class="tab-pane" id="post_job">
    <div class="col-xs-12 margin-ten best-emp-text gray-padding">
    <div class="col-xs-4"><strong>Job Position</strong></div>
    <div class="col-xs-4"><strong>Posted By</strong></div>
    <div class="col-xs-4"><strong>Posted Date</strong></div>
    </div>
    <?php
			if(count($postedJobsCollection) >0 ) {	 
				foreach($postedJobsCollection as $jobDetsils){ ?>
				  <div class="col-xs-12 best-emp-text white-padding">
				  <div class="col-xs-4"><?php echo $jobDetsils['position_name'];?></div>
            	  <div class="col-xs-4"><?php echo $jobDetsils['first_name']." ".$jobDetsils['last_name'];?></div>
				  <div class="col-xs-4"><?php echo $jobDetsils['posting_date'];?></div>
				  </div>
   <?php  }
			} else {
	?>
				  <div class="col-xs-12 margin-ten white-padding">
				  <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
				  </div>
	<?php } ?>
    
    </div>
    <div role="tabpanel" class="tab-pane" id="no_response">
    <div class="col-xs-12 margin-ten best-emp-text gray-padding">
    <div class="col-xs-4"><strong>Job Position</strong></div>
    <div class="col-xs-4"><strong>Posted By</strong></div>
    <div class="col-xs-4"><strong>Posted Date</strong></div>
    </div>
    <?php
	if(count($noresponseJobsCollection) >0 ) {	 
		   foreach($noresponseJobsCollection as $jobDetsils){ ?>                   
            <div class="col-xs-12 best-emp-text white-padding-notify">
            <div class="col-xs-4"><?php echo $jobDetsils['position_name'];?></div>
            <div class="col-xs-4"><?php echo $jobDetsils['first_name']." ".$jobDetsils['last_name'];?></div>
            <div class="col-xs-4"><?php echo $jobDetsils['posting_date'];?></div>
            </div>
    <?php  }
	} else {
	?> 
   			<div class="col-xs-12 margin-ten white-padding">
                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
            </div>
    <?php } ?> 
    
    </div>

  </div>  <!-- Tab panes -->



  </div>

 
      </div>
    </div>
  </div>	<!-- ./ right part-->	

 </div>
  </div>	<!-- ./ right part-->	
  </div>	<!-- ./ right part-->	
 </div>
</div>
</div>
<script type="text/javascript">
  /*$(document).ready(function()
  {
      var active_value = $(location).attr('hash');

      var val1 = $(active_value).parent('li');
      alert(val1);
         
   });*/
</script>