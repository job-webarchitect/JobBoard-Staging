<?php
/*$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);*/
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Member Login</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
          
            <div class="span12">
              <div class="span2">Email:</div>   
              <div class="span4"><input type="email" name="login" id="login" maxlength="200" size="300"></div>
              <div style="color:red"><?php echo form_error('login'); ?><?php //echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
             </div>
         
               
              
              <div class="span12">
              <div class="span2">Password</div>   
              <div class="span4"><input type="password" name="password" id="password" maxlength="80" size="30"></div>
              <div style="color:red"><?php echo form_error('password'); ?></div>
             </div>
             
              <div class="span12">
              <div class="span2"><?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?></div>   
              
             
             </div>
             
              
              
               
          
          	<div class="span8 pull-right"><a class="" href="#">
            	<span class="glyphicon glyphicon-log-in "></span><?php echo form_submit('submit', 'Create',array('class'=>'btn btn-danger')); ?></a></div>
            
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
<?php //echo form_submit('submit', 'Let me in'); ?>
<?php //echo form_close(); ?>