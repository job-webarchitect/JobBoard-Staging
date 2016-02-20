<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class="account-container">
  <div class="content clearfix">
<table class="span6 table-mrgn">
<div class="widget-header">
  <div class="span6"><h2>Forgot Password</h2></div>
  </div>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>

</table>
<div class="span4" style="margin-bottom: 20px;"><?php echo form_submit('reset', 'Get a new password',array('class'=>'btn btn-danger pull-right')); ?></div>
</div>
</div>

<?php echo form_close(); ?>