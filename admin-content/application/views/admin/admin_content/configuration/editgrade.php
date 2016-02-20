<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Update Position</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open('admin/updategrade/'.$editgrade['grade_id']); ?>
           <?php $msg = $this->session->flashdata('message');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
           
         
            <div class="span12">
              	<div class="span2">Grade Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'gname', 'name' => 'gname','value' => $editgrade['grade_code'])); ?> <?php echo form_error('gname'); ?></div>
            </div>
            
            <div class="span12">
              <div class="span2">Grade Charge:</div>   
              <div class="span4"><?php echo form_input(array('id' => 'gcharge', 'name' => 'gcharge','value' => $editgrade['charge'])); ?></div>
              <div style="color: red;"><?php echo form_error('gcharge'); ?></div>
              </div>
            
        	<div class="span12">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'gdate', 'name' => 'gdate', 'value' => $editgrade['dateadded'])); ?> <?php echo form_error('gdate'); ?></div>
               </div>
                <div class="span12">
              		<div class="span2">Date Modified :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'dmodify', 'name' => 'dmodify' ,'value' => $editgrade['datemodified'])); ?> <?php echo form_error('pmodify'); ?></div>
               </div>
             <div class="span8 pull-right">
            	<a class="" href="#"><span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Update', 'class' => 'btn btn-danger')); ?></a></div>
             <?php //endforeach; ?>
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
  
