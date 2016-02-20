<?php $not_admin = $this->session->flashdata('not-a-admin'); ?>

<?php if (isset($not_admin)) : ?>
				<CENTER><h3 style="color:red;">You don't have an enough permission to access the page.</h3></CENTER><br>
<?php endif; ?>

