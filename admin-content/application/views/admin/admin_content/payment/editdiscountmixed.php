<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Update Plan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <?php  echo form_open('admin/updatediscountmixed/'.$editdiscountmixed['discount_id']); ?>
            <div class="span12">
              <div class="span2">Plan Type :</div>   
              <div class="span4"> 
              <select class="form-control droup-down-margin" id="plan_type" name="plan_type" >
                        <option value="0">Plan Type</option>
                        <option value="5" <?php if($editdiscountmixed['status']=='5') echo 'selected="selected"'; ?>>Custom</option>
                       <!--<option value="5">Conference</option>
                        <option value="6">Translation plan</option>      
                        <option value="7"> Hot Job Plan</option>
                        <option value="8">Ads Plan</option>
                        <option value="9">Position With Payment</option> -->   
                      </select>
                      <input type="hidden" name="selectedplan" class="selectedplan" />
               <div style="display:none" id="position">
               <select class="form-control droup-down-margin">
               <option value="0">Select Position</option>
                      <option value="1">Web designer</option>
                      <option value="3">PHP developer</option>
                      <option value="4">Software developer</option>
                      <option value="5">Programmer</option>
                      <option value="6">Web developer</option>
                      </select>
                             
                      </div>
                      </div>
              </div>
              <div class="span12" id="plan_headline">
              <div class="span2">Plan Headline :</div>   
              <div class="span4"><input type="text" placeholder="Company Name" id="cname" value="<?php echo $editdiscountmixed['company_name']?>" name="cname"></div>
              </div>
              
              <div class="span12" id="no_of_email">
              <div class="span2">No. of Email or Resume:</div>   
              <div class="span4"><input type="text" placeholder="Enter No. of Email or Resume" id="resume" value="<?php echo $editdiscountmixed['download_noofresume']?>" name="resume" ></div>
              </div>
              
              <div class="span12" id="no_of_email">
              <div class="span2">No. of Email or Resume:</div>   
              <div class="span4"><input type="text" placeholder="Enter No. of Email or Resume" id="resume_viewed" value="<?php echo $editdiscountmixed['view_noofresume']?>" name="resume_viewed" ></div>
              </div>
              
              <div class="span12" id="no_of_email">
              <div class="span2">No. of Email or Resume:</div>   
              <div class="span4"><input type="text" placeholder="Enter No. of Email or Resume" id="email_service" value="<?php echo $editdiscountmixed['used_email']?>" name="email_service" ></div>
              </div>
              
              <div class="span12">
              <div class="span2">Original Price :</div>   
              <div class="span4"><input type="text" placeholder="Enter Price" id="Price"  value="<?php echo $editdiscountmixed['original_cost']?>" name="price"></div>
              </div>
              
              <div class="span12">
              <div class="span2">Discount Price :</div>   
              <div class="span4"><input type="text" placeholder="Enter Discount Price" id="dprice"  value="<?php echo $editdiscountmixed['discount_cost']?>" name="dprice" ></div>
              </div>
              <div class="span12">
              <div class="span2">Validity :</div>   
              <div class="span4"><input type="text" placeholder="Enter Validity in Days eg:(30)" id="validity" value="<?php echo $editdiscountmixed['validity']?>" name="validity" ></div>
              </div>
              
               
            <div class="span8 pull-right">
            <a class="" href="#"><span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Update', 'class' => 'btn btn-danger')); ?></a></div>
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
	
	 if(a==5 || a==6 || a==7)
	 {
		  $("#position").show();
      $("#plan_headline, #no_of_email, #validity").hide();
	 }
	 else
	 {
		  $("#position").hide();
      $("#plan_headline, #no_of_email, #validity").show();
	 }
  } 
  
  </script> 