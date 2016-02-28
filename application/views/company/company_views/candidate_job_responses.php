<div class="col-xs-12 margin-ten">
<form role="form">
    <label class="radio-inline">
    <input type="radio" <?php echo ($status == 'all') ? 'checked="checked"' :'';?> name="optradio" onClick="window.location='<?php echo base_url(); ?>employer/job_responses/all/<?php echo $positionid?>'">All
    </label>
    <label class="radio-inline">
    <input type="radio" <?php echo ($status == '1') ? 'checked="checked"' :'';?>name="optradio" onClick="window.location='<?php echo base_url(); ?>employer/job_responses/1/<?php echo $positionid?>'">Shortlisted
    </label>
     <label class="radio-inline">
    <input type="radio" <?php echo ($status == '3') ? 'checked="checked"' :'';?>name="optradio" onClick="window.location='<?php echo base_url(); ?>employer/job_responses/3/<?php echo $positionid?>'">Rejected
    </label>
    <label class="radio-inline">
    <input type="radio" <?php echo ($status == '2') ? 'checked="checked"' :'';?>name="optradio" onClick="window.location='<?php echo base_url(); ?>employer/job_responses/2/<?php echo $positionid?>'">On-Hold
    </label>
</form>
</div>
<div class="col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>    
          <div class="white-box-right">
            <div id="short_res"> <!-- outer-div-short-->
         <div class="but-text-color col-lg-12 lg-bottom-mar">
        <i class="fa fa-chevron-left"></i><a class="but-text-color" href="<?php echo base_url(); ?>employer/dashboard_notify">Back to Home</a>
       </div> 
       <div class="clearfix"></div>
    <?php
        if($this->session->flashdata('temp_succ')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('temp_succ').'</div>'; 
        } else if($this->session->flashdata('temp_err')) {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('temp_err').'</div>';
        }
    ?>
        <div class="col-xs-12">   
        <div class="col-lg-8 profile-name row"><h4><?php echo $grid_title;?></h4></div>
        </div>
        <div class="col-xs-12 prf-col2 margin-ten"></div>
        <form  action="" method="post" name="job_response_form" id="job_response_form">
           <div class="col-xs-12 margin-ten">  
                <div class="col-lg-2 row margin-ten selectall_label"><input type="checkbox" id="selectall_response"><b> Select All</b></div> 
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 row margin-ten">  
                    <select class="form-control" id="job_description">
                        <option value="0">Job Title</option>
                        <?php foreach($position_details as $position){ ?>
                            <option value="<?php echo $position['id']; ?>" <?php echo ($positionid == $position['id']) ? 'selected="selected" ' : ''; ?> ><?php echo $position['value']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"> 
                    <select class="form-control job_status" name="update_to_status">
                        <option value="">Move</option>
                        <option value="1">Shortlisted</option>
                        <option value="3">Rejected</option>
                        <option value="2">On hold</option>
                    </select>
                </div>
                <a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="sumbit_job_response()" id="submit_button">Submit</a>
                   <div class="md-blue-link"> 
                   <span class="pull-right"><a href="javascript:void(0);"><em>Refresh</em></a></span>
                   </div>
            </div>
        <div class="col-md-2 col-xs-2 margin-ten"><strong>Name</strong></div>     
        <div class="col-md-5 col-xs-6"><strong>Job Position</strong></div> 
        <div class="col-xs-1"><strong>Status </strong></div> 
        <div class="col-xs-2"><strong><?php echo $grid_status_title;?></strong></div> 
        <div class="col-xs-2"><strong>Resume Matching %</strong></div> 
		<?php
		   			if(count($jobResponses) >0 ) {	 $i = 0;
		   				foreach($jobResponses as $jobResponse){ $i++;?>
                        	<div class="col-xs-12 margin-ten <?php echo ($i%2 == 0) ? "white" : "gray";?>-padding">
                             <div class="col-md-2 col-xs-2 md-blue-link">
                             	<?php  if($jobResponse['shortlisted_status'] != '1') { 	
                             		echo '<input type="checkbox" class="job_response" name="job_response[]" value="'.$jobResponse['applyid'].'"> ';
                                 } else {
									echo '<input type="checkbox" disabled="disabled"/>';		
								}?>
                                <a href="javascript:void(0)" id="srt<?php echo $i;?>" onClick="showDetails(<?php echo $i;?>);"><b><?php echo $jobResponse['first_name']. '  ' .$jobResponse['last_name'];?></b></a></div> 
                             <div class="col-md-5 col-xs-6 short-head">
                                B.tech in Information Technology - wipro Ltd. - <span class="red-color">2year</span> - <span class="green-color">Africa</span></div>
                                <div class="col-xs-1"> <?php echo getJobResponseStatus($jobResponse['shortlisted_status']);?></div>
                                <div class="col-xs-2"><?php echo $jobResponse['shortlisted_date'];?></div>
                                <div class="col-xs-2"><?php echo $jobResponse['matched_percentage'];?>%</div>
                                 
                            <!-- shortlist-resume-discription -->
                                <div class="white-box-right" id="srd<?php echo $i;?>" style="display:none;"> 
                                <div class="col-xs-12">        
                                  <div class="col-sm-8 col-xs-12">
                                  <h4>B.tech in Information Technology - wipro Ltd. - <span class="red-color">2year</span> - <span class="green-color">Africa</span></h4></div>
                                  <div class="col-sm-3 pull-right white-padding margin-seven">31-05-2015</div>
                                </div>
                                <div class="col-xs-12 prf-col2 margin-ten"></div>
                        
                                 <div class="col-xs-6 plan-left">
                                 <div class="col-xs-12 margin-ten"><b>Name : </b>Jagriti Singh</div>
                                 <div class="col-xs-12 margin-ten"><b>Course : </b>B.tech in Information Technology</div>
                                 <div class="col-xs-12 margin-ten"><b>Current Location : </b> Africa</div>
                                 <div class="col-xs-12 margin-ten"><b>Experience : </b>1year</div>
                                 <div class="col-xs-12 margin-ten"><b>Salary : </b><i class="fa fa-inr"></i>1.60Lac(s)</div>
                                 <div class="col-xs-12 margin-ten"><b>Expected Salary : </b><i class="fa fa-inr"></i>3.20Lac(s)</div>
                                 </div>
                        
                                 <div class="col-xs-6 plan-right margin-thirty">
                                 <div class="col-xs-12 margin-ten"><b>Skills : </b> Market Research,Java,RMI</div>
                                 <div class="col-xs-12 margin-ten"><b>Current Job : </b> Trainee Designer at wipro Ltd.</div>
                                 <div class="col-xs-12 margin-ten"><b>Mobile : </b> 3759350238</div>
                                 <div class="col-xs-12 margin-ten"><b>Application Date : </b> 31-07-2015</div>
                                 <div class="col-xs-12 margin-ten"><b>Modified Date : </b> 03-08-2015</div>
                                 </div>
                        
                        
                                 <div class="col-xs-12">
                                 <div class="col-md-2 col-sm-3 col-xs-3 ad-title"><a href="#" data-toggle="modal" data-target="#myModal"> Send Mail</a></div>
                                 <div class="col-md-2 col-sm-3 col-xs-3 ad-title"><a href="#"> Download</a></div>
                                 <div class="col-md-3 col-sm-4 col-xs-4 margin-ten ad-title"><a href="Candidate-resume.php">Resume Preview</a></div>
                                 </div>  
                               </div> 
                           <!-- ./shortlist-resume-discription -->
       </div>
         <?php
						}
					} else {
		?>
        					<div class="col-xs-12 margin-ten gray-padding">
                             <div class="col-md-12 col-xs-6 md-blue-link">
                                <a href="javascript:void(0)" id="srt1"><b>No Results Found</b></a></div> 
       						</div>
        <?php	
					}
		 ?>
         </form>
        <!--Popup Open-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title" id="myModalLabel">Choose Email Template</h4>
                          </div>
                            <div class="modal-body">
                              <div class="col-xs-12 margin-ten">
                              <div class="col-xs-8 margin-ten">
                                  <select class="form-control" id="job_description">
                					<option value="0">Job Title</option>
                    				<?php foreach($position_details as $position){ ?>
                       			 <option value="<?php echo $position['id']; ?>" <?php echo ($positionid == $position['id']) ? 'selected="selected" ' : ''; ?> ><?php echo $position['value']; ?></option>
                   					 <?php } ?>
               					 </select>
                              </div>
                              <div id="txt-mail-cont" class="col-xs-12" style="display:none;">
                                    <textarea rows="5" class="input-width form-control"></textarea>
                              </div>
                              </div>
                            </div>
                            <div class="modal-footer1">
                                <div class="primary-btn ad-apply-btn">Send Mail</div>
                                <div data-dismiss="modal" class="primary-btn ad-apply-btn">Cancel</div>
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
         <!--Popup Closed-->
      <div class="col-xs-12 margin-ten">  
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 row">  
           		 <select class="form-control">
                    <option value="0">Job Title</option>
                    <?php foreach($position_details as $position){ ?>
                    <option value="<?php echo $position['id']; ?>" <?php echo ($positionid == $position['id']) ? 'selected="selected" ' : ''; ?> ><?php echo $position['value']; ?></option>
                     <?php } ?>
                 </select>
            </div>
      </div>
      <div class="col-xs-12 margin-ten">
          <ul class="pagination pull-right">
              <li class="paginate_button previous" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button active">
              <a href="#">1</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">2</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">3</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">4</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">5</a></li>
              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">6</a></li>
              <li class="paginate_button next disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li>
         </ul>
    </div>
   </div> <!-- outer-div-short-->  
   </div>
   </div>
<script> 
	function show_area() {
	  var mail_type=document.getElementById('mail_type').value;
	  if(mail_type.trim() == 'OTH') {
		  document.getElementById('txt-mail-cont').style.display="block";    
	  } else {
		  document.getElementById('txt-mail-cont').style.display="none";
	  }
	}
	
	function showDetails(i) {
		$("#srd"+i).slideToggle("slow");
	}
    
	function regular(val1,val2,val3){
    	document.getElementById(val1).style.display = "block";
    	document.getElementById(val2).style.display = "none";
    	document.getElementById(val3).style.display = "none";   
    }
	
	function sumbit_job_response() {
    	$("#job_response_form").submit();
	} 
   
   $(document).ready(function(){
	    $("#job_description").change(function(){
        	window.location = "<?php echo base_url(); ?>employer/job_responses/<?php echo $status?>/"+$(this).val();
        });
	   
	    $("#selectall_response").change(function(){
      		$(".job_response").prop('checked', $(this).prop("checked"));
        });
	
	   	<?php
		if($status == '1') {
		?>
        	$(".selectall_label").hide();
        	$(".job_status").hide();
        	$("#submit_button").hide();
		<?php
		}
		?>
});
</script>