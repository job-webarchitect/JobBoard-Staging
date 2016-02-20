<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
<head>
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
<div id="login">
<h2>Registration Form</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('auth/register');

echo form_label('Create Username : ');
echo"<br/>";
echo form_input('username');
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'email_value'
);
echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Password : ');
echo"<br/>";
echo form_password('password');
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'Sign Up');
echo form_close();
?>
<a href="<?php echo base_url() ?> ">For Login Click Here</a>
</div>
</div>
</body>
</html>


<?php /*?><?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
	
	
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Create New Sub admin</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
           <?php echo form_open($this->uri->uri_string()); ?>
           <?php if ($use_username) { ?>
            <div class="span12">
              <div class="span2">User name :</div>   
              <div class="span4"><?php echo form_input($username); ?></div>
              <div style="color:red"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
             </div>
           <?php } ?>
               <div class="span12">
              <div class="span2">Email</div>   
              <div class="span4"><?php echo form_input($email); ?></div>
              <div style="color:red"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
              </div>
              
               <div class="span12">
              <div class="span2">Password</div>   
              <div class="span4"><?php echo form_password($password); ?></div>
              <div style="color:red"><?php echo form_error($password['name']); ?></div>
             </div>
             
              <div class="span12">
              <div class="span2">Confirm Password</div>   
              <div class="span4"><?php echo form_password($confirm_password); ?></div>
              <div style="color:red"><?php echo form_error($confirm_password['name']); ?></div>
             </div>
              
              
             <?php if ($captcha_registration) {
				if ($use_recaptcha) { ?> 
              		<div class="span12">
                      <div id="recaptcha_image"></div>
		              <div class="span2"><a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a></div>
                      <div>
                      	 <div class="recaptcha_only_if_image span4"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
					 	 <div class="recaptcha_only_if_audio span4"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>   
		              </div>
                      
                      <div>
           		        <div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>  
		              </div>
                      
                       <div class="span4"><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
             		   <div style="color:red"><?php echo form_error('recaptcha_response_field'); ?></div>
                       <?php echo $recaptcha_html; ?>
                      </div>
                <?php } else { ?>
                
                		 <div class="span12">
            	 			  <div class="span2">Enter the code exactly as it appears:</div>   
			    	          <div class="span4"><?php echo $captcha_html; ?></div>
             				 
           			    </div>
                        
                        <div class="span12">
            	 			  <div class="span2"><?php echo form_label('Confirmation Code', $captcha['id']); ?></div>   
			    	          <div class="span4"><?php echo form_input($captcha); ?></div>
                              <div style="color:red"><?php echo form_error($captcha['name']); ?></div>
             				 
           			    </div>
                        
               <?php }
			   	} ?>
              
              
              
             <div class="span8 pull-right"><a class="" href="#">
            <span class="glyphicon glyphicon-log-in "></span><?php echo form_submit('add', 'Create',array('class'=>'btn btn-danger')); ?></a></div>
            
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
</div><?php */?>