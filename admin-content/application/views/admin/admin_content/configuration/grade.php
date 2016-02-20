<?php $permission = $this->session->userdata('permission'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $msg = $this->session->flashdata('grademessage');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
            <div class="span10"><h3>Grade Configuration</h3></div>
            
                   		<a class="btn-danger btn" href="<?php echo site_url('admin/addgrade')?>">
          				<span class="glyphicon glyphicon-log-in"></span>Add Grade</a>
             
            </div>
           
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                       
                        <th>Grade </th>
                     	<th>Price</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Action</th>
                  
                    </tr>
                </thead>
                <tbody>
                <?php foreach($grade as $row) : ?>
                    <tr>
                 		
                         <td><?php echo $row->grade_code; ?></td>
		          		 <td><?php echo $row->charge; ?></td>
                         <td><?php echo $row->dateadded; ?></td>
                          <?php
							  $status = $row->status;
					    	  if($status == 1) :   ?>
                	 			  <td>Active</td>
               				<?php else : ?>
		                  	 	  <td>Deactive</td>
                  			<?php endif; ?>
                            
                            
							<?php //if($permission !='0') : ?>
                             <td><a class="btn-danger btn" href="<?php echo site_url('admin/editgrade/'. $row->grade_id)?>">
        		 				 <span class="glyphicon glyphicon-log-in"></span>Edit</a>
          				  	 </td>
                            <?php //endif; ?>
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
