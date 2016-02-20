<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Create New Sub admin</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
           <?php //if ($use_username) { ?>
            <div class="span12">
              <div class="span2">User name :</div>   
              <div class="span4"><input type="text" name="username" id="username" maxlength="20" size="30"></div>
              <div style="color:red"><?php //echo form_error($username['name']); ?><?php //echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
             </div>
           <?php //} ?>
               <div class="span12">
              <div class="span2">Email</div>   
              <div class="span4"><input type="text" name="email" id="email" maxlength="80" size="30"></div>
              <div style="color:red"><?php //echo form_error($email['name']); ?><?php //echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
              </div>
              
               <div class="span12">
              <div class="span2">Password</div>   
              <div class="span4"><input type="text" name="email" id="email" maxlength="80" size="30"></div>
              <div style="color:red"><?php //echo form_error($password['name']); ?></div>
             </div>
             
              <div class="span12">
              <div class="span2">Confirm Password</div>   
              <div class="span4"><input type="password" name="confirm_password" value="" id="confirm_password" maxlength="20" size="30"></div>
              <div style="color:red"><?php //echo form_error($confirm_password['name']); ?></div>
             </div>
              
               <div class="span12">
              <div class="span2">Role :</div> 
              <div class="span4">
              <select class="form-control droup-down-margin" id="Role" name="Role"  onChange="abc(this.value);">
                        <option value="0">predefined role</option>
                        <option value="1">Employer ( company)</option>
                        <option value="2">Companies approval</option>
                        <option value="3">Job seeker </option>
                        <option value="4">Recruitment agencies</option>
                        <option value="5">Consultancy</option>
                        <option value="6">Jobs</option>
                        <option value="7">Vaccancy</option>
                        <option value="8">Trasation Service</option>
                        <option value="9"> Translator</option>
                      
                        
                      </select>
              <div style="display:none" id="qualf_other">
               <select class="form-control droup-down-margin">
                        <option value="0">Company Name</option>
                        <option value="1">Siliconindia</option>
                        <option value="2"> Wipro</option>
                        <option value="3">BTM </option>
                        <option value="4">LNT</option>
                      </select>
                             
                      </div>
              </div>
              
              </div>
          
          	<div class="span8 pull-right"><a class="" href="#">
            	<span class="glyphicon glyphicon-log-in "></span><?php echo form_submit('add', 'Create',array('class'=>'btn btn-danger')); ?></a></div>
            
			<?php echo form_close(); ?>
            </div>
            <!-- /widget-content --> 
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


<script type="text/javascript">  
  function abc(a){
	
	 if(a==2)
	 {
		  $("#qualf_other").show();
	 }
	 else
	 {
		 $("#qualf_other").hide();
	 }
   
  } 
  
  </script> 
  
