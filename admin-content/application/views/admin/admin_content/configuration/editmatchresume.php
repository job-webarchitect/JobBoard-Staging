<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Edit Resume Match</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open('admin/updatematchresume/'.$editmatchresume['formulaid']); ?>
           <?php if (isset($message)) { ?>
				<CENTER><h3 style="color:green;">Tax added successfully</h3></CENTER><br>
			<?php } ?>
            <div class="span12">
              	<div class="span2">Tax Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'formula_name','value' => $editmatchresume['formula_name'])); ?> <?php echo form_error('formula_name'); ?></div>
            </div>
             
             <div class="span12">
              <div class="span2">Tax Rate (In %) :</div>   
              <div class="span4"><?php echo form_input(array('name' => 'value','value' => $editmatchresume['value'])); ?> <?php echo form_error('value'); ?></div>
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
  
