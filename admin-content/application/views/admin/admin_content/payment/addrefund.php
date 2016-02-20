<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Add Plan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
             <?php echo form_open($this->uri->uri_string()); ?>
               <div class="span12">
              <div class="span2">Refund Headline :</div>   
              <div class="span4"><input type="text" placeholder="Enter Refund Headline" id="r_headline" name="r_headline"></div>
              <div style="color: red;"><?php echo form_error('r_headline'); ?></div>
              </div>
              
              <div class="span12">
              <div class="span2">Transaction Date:</div>   
              <div class="span4"><input type="date" placeholder="Enter Transaction Date" id="t_date" name="t_date" ></div> 
               <div style="color: red;"><?php echo form_error('t_date'); ?></div>  
              </div>
              <div class="span12">
              <div class="span2">Transaction Id :</div>   
              <div class="span4"><input type="text" placeholder="Enter Transaction Id" id="t_id" name="t_id" ></div>
              <div style="color: red;"><?php echo form_error('t_id'); ?></div>
              </div>
              <div class="span12">
              <div class="span2">User Name or Company Email  :</div>   
              <div class="span4"><input type="text" placeholder=" Enter User Name or Company Email " id="user_email" name="user_email" ></div>
              <div style="color: red;"><?php echo form_error('user_email'); ?></div>
               </div>
              
              <div class="span12">
              <div class="span2">User Name or Company Id  :</div>   
              <div class="span4"><input type="text" placeholder="User Name or Company Id" id="company_id" name="company_id" ></div>
              <div style="color: red;"><?php echo form_error('company_id'); ?></div>
              </div>
               <div class="span12">
              <div class="span2">Refund Amount :</div>   
              <div class="span4"><input type="text" placeholder=" Enter Refund Amount" id="amount" name="amount" ></div>
              <div style="color: red;"><?php echo form_error('amount'); ?></div>
              </div>
               
            <div class="span8 pull-right">
              <a class="" href="#"><span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Refund', 'class' => 'btn btn-danger')); ?></a></div>
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
	
	 if(a==7)
	 {
		  $("#position").show();
	 }
	 else
	 {
		 $("#position").hide();
	 }
   
  } 
  
  </script> 