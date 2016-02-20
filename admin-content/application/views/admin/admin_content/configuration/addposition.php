<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Add Position</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
           <?php if (isset($message)) { ?>
				<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
			<?php } ?>
            <div class="span12">
              	<div class="span2">Position Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_en')); ?></div>
                <div style="color: red;"><?php echo form_error('pname_en'); ?></div>
	
            </div>
             <div class="span12">  
              	<div class="span2">Position Name (FR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_fr')); ?> <?php echo form_error('pname_fr'); ?></div>
             </div>
              <div class="span12">
             	 <div class="span2">Position Name (DE):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_de')); ?> <?php echo form_error('pname_de'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (ES):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_es')); ?> <?php echo form_error('pname_es'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (CHI):</div>   
             	 <div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_chi')); ?> <?php echo form_error('pname_chi'); ?></div>
              </div>
              <div class="span12">
             	 <div class="span2">Position Name (RU):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_ru')); ?> <?php echo form_error('pname_ru'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Position Name (AR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'pname', 'name' => 'pname_ar')); ?> <?php echo form_error('pname_ar'); ?></div>
              </div>
              
               <div class="span12">
              <div class="span2">Position Code :</div>   
              <div class="span4"><?php echo form_input(array('id' => 'pcode', 'name' => 'pcode')); ?></div>
              <div style="color: red;"><?php echo form_error('pcode'); ?></div>
              </div>
               <div class="span12">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('type' => 'date', 'id' => 'pdate', 'name' => 'pdate','placeholder' => 'yyyy-mm-dd')); ?> <?php echo form_error('pdate'); ?></div>
               </div>
                <div class="span12">
              		<div class="span2">Date Modified :</div>   
              		<div class="span4"><?php echo form_input(array('type' => 'date','id' => 'pmodify', 'name' => 'pmodify','placeholder' => 'yyyy-mm-dd')); ?> <?php echo form_error('pmodify'); ?></div>
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
  
