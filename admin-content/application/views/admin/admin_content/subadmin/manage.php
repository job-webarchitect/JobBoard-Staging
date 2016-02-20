
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Create New Sub admin</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($showsubadmins as $row) : ?>
                                        
                                        <tr>
                                            
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->role; ?></td>
                                            <td><a class="btn-danger btn" href="<?php echo site_url('admin/switchas')?>">
            <span class="glyphicon glyphicon-log-in"></span>Switch</a></td>
                                        </tr>
                                        
									<?php endforeach;?>
                                    </tbody>
                                </table>  
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
