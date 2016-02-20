<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Add Tax</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
           <?php if (isset($message)) { ?>
				<CENTER><h3 style="color:green;">Tax added successfully</h3></CENTER><br>
			<?php } ?>
            <div class="span12">
              	<div class="span2">Tax Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_en')); ?></div>
                <div style="color: red;"> <?php echo form_error('tname_en'); ?></div>
            </div>
             <div class="span12">  
              	<div class="span2">Tax Name (FR):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_fr')); ?> <?php echo form_error('tname_fr'); ?></div>
             </div>
              <div class="span12">
             	 <div class="span2">Tax Name (DE):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_de')); ?> <?php echo form_error('tname_de'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Tax Name (ES):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_es')); ?> <?php echo form_error('tname_es'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Tax Name (CHI):</div>   
             	 <div class="span4"><?php echo form_input(array('name' => 'tname_chi')); ?> <?php echo form_error('tname_chi'); ?></div>
              </div>
              <div class="span12">
             	 <div class="span2">Tax Name (RU):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_ru')); ?> <?php echo form_error('tname_ru'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Tax Name (AR):</div>   
              	<div class="span4"><?php echo form_input(array('name' => 'tname_ar')); ?> <?php echo form_error('tname_ar'); ?></div>
              </div>
              
               <div class="span12">
              <div class="span2">Tax Rate (In %) :</div>   
              <div class="span4"><?php echo form_input(array('name' => 'tcode')); ?></div>
              <div style="color: red;"><?php echo form_error('tcode'); ?></div>
              </div>
               <div class="span12">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('type'=> 'date','name' => 'tdate','placeholder' => 'yyyy-mm-dd')); ?> <?php echo form_error('tdate'); ?></div>
               </div>
                <div class="span12">
              		<div class="span2">Date Modified :</div>   
              		<div class="span4"><?php echo form_input(array('type'=> 'date','name' => 'tmodify','placeholder' => 'yyyy-mm-dd')); ?> <?php echo form_error('tmodify'); ?></div>
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
  
