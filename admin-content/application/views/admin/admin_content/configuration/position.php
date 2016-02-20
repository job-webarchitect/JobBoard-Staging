<?php $permission = $this->session->userdata('permission'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $msg = $this->session->flashdata('updatemessage');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
			<?php } ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
            <div class="span10"><h3>Position Configuration</h3></div>
            
                   		<a class="btn-danger btn" href="<?php echo site_url('admin/addposition')?>">
          				<span class="glyphicon glyphicon-log-in"></span>Add Position</a>
             
            </div>
           
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position Name</th>
                       <!-- <th>Position Code</th>-->
                        <th>Date Added</th>
                        <th>Date Modified</th>
                         <th>Status</th>
                         <?php //if($permission !='0') : ?>
                       		 <th>Action</th>
                         <?php //endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($position as $row) : ?>
                    <tr>
                 		 <td><?php echo $row->positionid; ?></td>
                         <td><?php echo $row->positionname_en; ?></td>
		              <?php /*?>   <td><?php echo $row->position_code; ?></td><?php */?>
	                     <td><?php echo $row->date_added; ?></td>
       	                 <td><?php echo $row->date_modified; ?></td>
           				 <?php
							  $status = $row->status;
					    	  if($status == 1) :   ?>
                	 			  <td>Active</td>
               				<?php else : ?>
		                  	 	  <td>Deactive</td>
                  			<?php endif; ?>
                            
							<?php //if($permission !='0') : ?>
                             <td><a class="btn-danger btn" href="<?php echo site_url('admin/editposition/'. $row->positionid)?>">
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
