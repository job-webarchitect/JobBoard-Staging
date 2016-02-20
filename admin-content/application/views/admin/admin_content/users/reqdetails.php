<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      	<div class="main-width">
          <div class="widget">
            
            <!-- /widget-header -->
            <div class="span6" style="width:100%;">
            <div class="widget">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Recruiter Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
              <a class="shortcut" href="javascript:;"><span class="shortcut-label">First Name</span> <span class="job-color"><?php echo $reqdetails['first_name']; ?> </span> </a>
              
              <a class="shortcut" href="javascript:;"><span class="shortcut-label">Last Name</span> <span class="job-color"><?php echo $reqdetails['last_name']; ?></span> </a>
              
              <a class="shortcut" href="javascript:;"> <span class="shortcut-label">Maritial Status</span> <span class="job-color"><?php echo $reqdetails['marital_status']; ?></span> </a>
              
              <a class="shortcut" href="javascript:;"><span class="shortcut-label">Contact No.</span> <span class="job-color"><?php echo $reqdetails['contactphone']; ?> </span></a>
              
              <a class="shortcut" href="javascript:;"><span class="shortcut-label">Recruiter Name</span> <span class="job-color"><?php echo $reqdetails['company_name']; ?> </span></a>
              
              <a class="shortcut" href="javascript:;"><span class="shortcut-label">Company URL</span> <span class="job-color"><?php echo $reqdetails['company_website']; ?></span></a>
              
              
              <a class="shortcut" href="javascript:;"> <span class="shortcut-label">Location</span> <span class="job-color"><?php  
			  			switch($reqdetails['locationid']) {
						
								case '1' : echo 'Inida';break;
								case '2' : echo 'China';break;
								case '3' : echo 'Singapore';break;
								case '4' : echo 'Saudi Arabia';break;
								case '5' : echo 'Germany';break;
								case '6' : echo 'Netherlands';break;
								case '7' : echo 'USA';break;
								case '8' : echo 'South Africa';break;
								default : echo 'Not Mentioned';							
							
							
						}
			  
			 ?>  </span></a>  
              
              
               </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          </div>
          
          
          </div>
           
           
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
