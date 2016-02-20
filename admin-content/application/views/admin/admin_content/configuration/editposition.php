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
           <?php echo form_open('admin/updateposition/'.$editposition['positionid']); ?>
           <?php $msg = $this->session->flashdata('message');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
           
         
            <div class="span12">
              	<div class="span2">Position Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_en','value' => $editposition['positionname_en'])); ?> <?php echo form_error('pname_en'); ?></div>
            </div>
            
            <div class="span12">  
              	<div class="span2">Position Name (FR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_fr','value' => $editposition['positionname_fr'])); ?> <?php echo form_error('pname_fr'); ?></div>
             </div>
              <div class="span12">
             	 <div class="span2">Position Name (DE):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_de','value' => $editposition['positionname_de'])); ?> <?php echo form_error('pname_de'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (ES):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_es','value' => $editposition['positionname_es'])); ?> <?php echo form_error('pname_es'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (CHI):</div>   
             	 <div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_chi','value' => $editposition['positionname_chi'])); ?> <?php echo form_error('pname_chi'); ?></div>
              </div>
              <div class="span12">
             	 <div class="span2">Position Name (RU):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_ru','value' => $editposition['positionname_ru'])); ?> <?php echo form_error('pname_ru'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (AR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_ar','value' => $editposition['positionname_ar'])); ?> <?php echo form_error('pname_ar'); ?></div>
              </div>
             
              
               
               <div class="span12">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'pdate', 'name' => 'pdate', 'value' => $editposition['date_added'])); ?> <?php echo form_error('pdate'); ?></div>
               </div>
                <div class="span12">
              		<div class="span2">Date Modified :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'pmodify', 'name' => 'pmodify' ,'value' => $editposition['date_modified'])); ?> <?php echo form_error('pmodify'); ?></div>
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
  
