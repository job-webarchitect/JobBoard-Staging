<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Account Configuration</h3>
              
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <?php $msg = $this->session->flashdata('message');?>
		   	<?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
         
             <?php echo form_open('admin/accountupdate'); ?>
                 <?php foreach($account as $row) : ?>
            <div class="span12">
              <div class="span2">Paypal Email ID:</div>   
              <div class="span4"><?php echo form_input(array('id' => 'paypalemail', 'name' => 'paypalemail','value' => $row->paypalemail_id)); ?></div>
              </div>
               <div class="span12">
              <div class="span2">Merchant ID :</div>   
              <div class="span4"><?php echo form_input(array('id' => 'merchantid', 'name' => 'merchantid','value' => $row->merchant_id)); ?></div>
              </div>
              
              <div class="span12">
              <div class="span2">Working Key:</div>   
              <div class="span4"><?php echo form_input(array('id' => 'workingkey', 'name' => 'workingkey','value' => $row->working_key)); ?></div>
              </div>
              <div class="span12">
              <div class="span2">Currency:</div>   
              <div class="span4">
                <select name="select_currency" class="form-control" onchange="changevalue()" id="changeValue">
              		<option value="USD" <?php if($row->currency=='USD') echo 'selected="selected"'; ?>>USD</option>
                    <option value="INR" <?php if($row->currency=='INR') echo 'selected="selected"'; ?>>INR</option>
                    <option value="EUR" <?php if($row->currency=='EUR') echo 'selected="selected"'; ?>>EUR</option>
               </select>
              </div>
              </div>
              
               <div class="span12">
             		<div class="span4"><?php echo form_input(array('id' => 'res', 'name' => 'currency','type' => 'hidden')); ?></div>
              </div>
         
             <div class="span8 pull-right">
           		<a class="" href="#"> <span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Save Changes', 'class' => 'btn btn-danger' )); ?></a>
             </div>
            	
				<?php endforeach; ?>
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
<script>
function changevalue() {
var a = document.getElementById('changeValue').value;
switch(a) {
case 'USD' : 
	document.getElementById('res').value=a;
	break;
case 'INR' : 
	document.getElementById('res').value=a;
	break;
default:
	document.getElementById('res').value=a;
	break;		
	
}
	
}
</script>

    
