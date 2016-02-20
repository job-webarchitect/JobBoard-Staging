<html>
<?php
//if (isset($this->session->userdata['logged_in'])) {

//header("location: http://localhost/login/index.php/user_authentication/user_login_process");
//}
?>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('auth/login'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<a href="<?php echo base_url() ?>auth/register">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>














<?php /*?><?php echo form_open($this->uri->uri_string()); ?>
<div class="account-container">
  <div class="content clearfix">
<table class="span6 table-mrgn">
<div class="widget-header">
<?php $forgotpassmsg = $this->session->flashdata('forgotpass'); ?>
	<?php if (isset($forgotpassmsg)) : ?>
		<CENTER><h3 style="color:green;">Password has been sent to your email</h3></CENTER><br>
	<?php endif; ?>
<div class="span6"><h2>Member Login</h2></div>
</div>
	<tr>
		<td><?php echo form_label('Login'); ?></td>
		<td><input type="email" name="login" value="<?php echo set_value('login'); ?>" size="50" /></td>
        	
	</tr>
	<tr>
	<td></td>	
	<td style="color: red;"><?php echo form_error('login'); ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Password'); ?></td>
		<td><input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" /></td>
        	
	</tr>
    <tr>
	<td></td>	
	<td style="color: red;"><?php echo form_error('password'); ?></td>
	</tr>
    
     <tr>
	<td></td>	
	<td style="color: red;"><?php echo $this->session->userdata('notvalid');?></td>
	</tr>
	
	

	<tr>
	<td></td>
	<td><?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?></td>
	</tr>

	
</table>
<div class="span5" style="margin-bottom: 20px;"><?php echo form_submit('submit', 'Sign In',array('class'=>'btn btn-danger pull-right')); ?></div>
</div>
</div>

<?php echo form_close(); ?><?php */?>



<?php /*?><div class="main">
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
             <?php echo $this->session->userdata('notvalid');?>
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
</div><?php */?>
