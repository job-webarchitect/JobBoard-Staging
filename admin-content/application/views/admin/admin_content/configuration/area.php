<?php $permission = $this->session->userdata('permission'); ?>
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <div class="span10"><h3>Area of Experience Configuration</h3></div>
              	<a class="btn-danger btn" href="<?php echo site_url('admin/addarea')?>">
          <span class="glyphicon glyphicon-log-in"></span>Add Position</a>
             
              
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                        <th>Area of Experience Name</th>
                        <th>Experience Code</th>
                        <th>Date Added</th>
                        <th>Date Modified</th>
                      	<th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($area as $row) : ?>
                	<tr>
                    	<td><?php echo $row->areaofexpname_en; ?></td>
                        <td><?php echo $row->exp_code; ?></td>
                        <td><?php echo $row->date_added ?></td>
                        <td><?php echo $row->date_modified; ?></td>
                     
                       		<td><a class="btn-danger btn" href="<?php echo site_url('admin/editarea/'. $row->areaofexpid)?>">
						          <span class="glyphicon glyphicon-log-in"></span>Edit</a></td>
                    	
                    </tr>
                  
             <?php endforeach; ?>
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
<!-- /main -->
