<?php $permission = $this->session->userdata('permission'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $msg = $this->session->flashdata('taxmsg'); 
	  		$msg2= $this->session->flashdata('updatetax'); 
	   ?>
		   
		   <?php if (isset($msg)) : ?>
				<CENTER><h3 style="color:green;">Tax has been Added Successfully</h3></CENTER><br>
		  <?php endif; ?>
          
           <?php if (isset($msg2)) : ?>
				<CENTER><h3 style="color:green;">Tax rate has been Updated Successfully</h3></CENTER><br>
		  <?php endif; ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <div class="span10"><h3>Tax Configuration</h3></div>
                   <?php //if($permission !='0') : ?>
                   		<a class="btn-danger btn" href="<?php echo site_url('admin/addtax')?>">
          			<span class="glyphicon glyphicon-log-in"></span>Add Tax</a>
                      <?php //endif; ?>
            
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                        <th>Tax Name</th>
                        <th>Tax Rate (In %)</th>
                        <th>Date Added</th>
                        <th>Date Modified</th>
                          <?php //if($permission !='0') : ?>
                       		 <th>Action</th>
                         <?php //endif; ?>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($showtax as $row) : ?> 
             		<tr>
                  		<td><?php echo $row->tax_name;?></td>
	                    <td><?php echo $row->tax_rate;?></td>
	                    <td><?php echo $row->date_added;?></td>
	                    <td><?php echo $row->date_modified;?></td>
      		        	<?php //if($permission !='0') : ?>
                        <td><a class="btn-danger btn" href="<?php echo site_url('admin/edittax/'.$row->tax_id) ?>">
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
