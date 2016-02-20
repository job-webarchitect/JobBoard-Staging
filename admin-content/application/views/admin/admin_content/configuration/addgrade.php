<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Add Grades</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
           <?php if (isset($message)) { ?>
				<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
			<?php } ?>
            <div class="span12">
              	<div class="span2">Grade Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'gname', 'name' => 'gname')); ?></div>
                <div style="color: red;"><?php echo form_error('gname'); ?></div>
	
            </div>
            
               <div class="span12">
              <div class="span2">Grade Charge:</div>   
              <div class="span4"><?php echo form_input(array('id' => 'gcharge', 'name' => 'gcharge')); ?></div>
              <div style="color: red;"><?php echo form_error('gcharge'); ?></div>
              </div>
               <div class="span12" style="display:none">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('type' => 'hidden', 'id' => 'gdate', 'name' => 'gdate','placeholder' => 'yyyy-mm-dd')); ?> <?php echo form_error('pdate'); ?></div>
               </div>
                
             <div class="span8 pull-right">
            	<a class="" href="#"><span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Create', 'class' => 'btn btn-danger')); ?></a></div>
            
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
  
