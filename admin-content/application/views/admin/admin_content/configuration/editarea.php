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
           <?php echo form_open('admin/updatearea/'.$editarea['areaofexpid']); ?>
           <?php $msg = $this->session->flashdata('message');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
           
         
            <div class="span12">
              	<div class="span2">Area Name (EN):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname', 'name' => 'aname_en','value' => $editarea['areaofexpname_en'])); ?> <?php echo form_error('pname_en'); ?></div>
            </div>
            
            <div class="span12">  
              	<div class="span2">Area Of Experience (FR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname_fr', 'name' => 'aname_fr','value' => $editarea['areaofexpname_fr'])); ?> <?php echo form_error('aname_fr'); ?></div>
             </div>
              <div class="span12">
             	 <div class="span2">Area Of Experience (DE):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname_de', 'name' => 'aname_de','value' => $editarea['areaofexpname_de'])); ?> <?php echo form_error('aname_de'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Area Of Experience (ES):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname_es', 'name' => 'aname_es','value' => $editarea['areaofexpname_es'])); ?> <?php echo form_error('aname_es'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Area Of Experience (CHI):</div>   
             	 <div class="span4"><?php echo form_input(array('id' => 'aname_chi', 'name' => 'aname_chi','value' => $editarea['areaofexpname_ch'])); ?> <?php echo form_error('aname_chi'); ?></div>
              </div>
              <div class="span12">
             	 <div class="span2">Area Of Experience (RU):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname_ru', 'name' => 'aname_ru','value' => $editarea['areaofexpname_ru'])); ?> <?php echo form_error('aname_ru'); ?></div>
              </div>
              <div class="span12">
              	<div class="span2">Area Of Experience (AR):</div>   
              	<div class="span4"><?php echo form_input(array('id' => 'aname_ar', 'name' => 'aname_ar','value' => $editarea['areaofexpname_ar'])); ?> <?php echo form_error('aname_ar'); ?></div>
              </div>
             
              
               <div class="span12">
              <div class="span2">Experience Code :</div>   
              <div class="span4"><?php echo form_input(array('id' => 'acode', 'name' => 'acode', 'value' => $editarea['exp_code'])); ?> <?php echo form_error('pcode'); ?></div>
              </div>
               <div class="span12">
              		<div class="span2">Date Added :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'adate', 'name' => 'adate', 'value' => $editarea['date_added'])); ?> <?php echo form_error('pdate'); ?></div>
               </div>
                <div class="span12">
              		<div class="span2">Date Modified :</div>   
              		<div class="span4"><?php echo form_input(array('id' => 'amodify', 'name' => 'amodify' ,'value' => $editarea['date_added'])); ?> <?php echo form_error('pmodify'); ?></div>
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
  
