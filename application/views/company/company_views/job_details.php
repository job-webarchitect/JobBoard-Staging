  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
      <div class="col-lg-12 white-box-right"> <!-- pesonal details-->
         <div class="but-text-color col-lg-12 lg-bottom-mar">
                <i class="fa fa-chevron-left"></i><a class="but-text-color" href="<?php echo base_url()?>employer/all_jobs"> Back to View Job </a>
            </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
       <div class="col-lg-12"><b>Job Opportunity at SiliconIndia</b></div>
     <div class="col-lg-12">Silicon india Pvt Ltd</div>
     <div class="col-lg-12">
     <ul class="prf-col2-ul ad-chicklets">
    <li> <?php echo $job_details['workexperience_id_min'];?>-<?php echo $job_details['workexperience_id_max'];?> year </li>
    <li> <i class="fa fa-inr"></i> 2,00,000 PA</li>
    <li> <?php echo $job_details['location'];?></li>
  </ul></div>
            </div>
          
        </div>
      </div>
      <!-- ./pesonal details--> 
      
      <!-- ./Educational details-->
      
      <div class="col-lg-12 white-box-right"><!-- resume details-->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <div class="col-lg-8"><h4 class="profile-name">Job description<br></h4></div>
            <div class="prf-col2 col-lg-12"></div>
            
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-12 ad-desciption">
                 <?php echo $job_details['job_description'];?>
                </div>
             
          
          <ul class="profile-details-ul">
          <li><span class="col-lg-2"> Salary: </span><?php echo number_format($job_details['min_salary']);?> - <?php echo number_format($job_details['max_salary']);?></li>
          <li><span class="col-lg-2"> Area of Experience:  </span><?php echo $job_details['areaofexpname'];?> </li>
          <li><span class="col-lg-2">Qualification: </span><?php echo $job_details['qualification_name'];?></li> 
          <li><span class="col-lg-2"> Position:</span><?php echo $job_details['position_name'];?></li>
        </ul>
        <div class="col-lg-12"><b>Key  skills</b></div>
      <div class="col-lg-12">
      <?php
	  $skills_collection = explode(',',$job_details['skills']);
	  for($i=0; $i<count($skills_collection); $i++) {
	  ?>
      	<a class="Secondy-fent-btn ad-apply-btn " href="javascript:void(0);" onclick="show_status('res1-detail','res1', 'res1-edit');"><?php echo $skills_collection[$i];?></a>
      <?php		  	
	  }
	  ?>
     </div>
          <div class="col-lg-12">
          <h4>Company profile: </h4>
          <h5>Silicon india Pvt Ltd </h5></div>

              <div class="col-lg-12 row margin-ten">
                <div class="col-lg-6"><span class="md-blue-link"><a href="javascript:void(0);" target="_blank"> www.jobportal.com</a></span>(click here to know more about company)</div>
              </div> 
              


           
  </div>
  
              </div>
              
             
            </div>
          </div>
        </div>
         
      </div>	<!-- ./ right part-->	

 </div>
