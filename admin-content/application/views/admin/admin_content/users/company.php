<?php $permission = $this->session->userdata('permission');
	  $arr = explode(',',$permission);
	  
 ?>

<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
     <?php  foreach($arr as $num) { ?>
       <?php if($num =='0') : ?>
       	 <li class="active"><a href="<?php echo site_url('admin/company')?>"><i class=""></i><span>manage Company</span> </a> </li>
       <?php endif; ?>
		
		<?php if($num =='1') : ?>
        	  <li class="active"><a href="<?php echo site_url('admin/company')?>"><i class=""></i><span>manage Company</span> </a> </li>
              <li><a href="<?php echo site_url('admin/allrequestlist')?>"><i class=""></i><span>All Request List</span> </a> </li>  
        <?php endif; ?>
        
        <?php } ?>
         
      </ul>
      
    </div>
    <!-- /container -->
     
                                                
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->     
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $msg = $this->session->flashdata('message');?>
		   <?php if (isset($msg)) { ?>
				<CENTER><h3 style="color:green;">Approved successfully</h3></CENTER><br>
			<?php } ?>
        <div class="main-width">
           <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Manage Company Employer</h3>        
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Emailid</th>
                                            <th>Userid</th>
                                            <th>Company Name</th>
                                            <th>Last Login Date</th>
                                            <th>Approved By</th> 
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($employer as $row) : ?> 
                                        <tr>
                                           
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->unique_portal_id; ?></td> 
                                            <td><?php echo $row->company_name; ?></td>  
                                            <td><?php echo $row->datejoined; ?></td> 
                                            <td><?php echo $row->approved_by; ?></td> 
                                          <?php
				 							$status = $row->status;
										    if($status == 1) :   ?>
							                  	<td><span class="glyphicon glyphicon-log-in"></span>Active</td>
                	  
				  							<?php else : ?>
							                  	<td><span class="glyphicon glyphicon-log-in"></span>Deactive</td>
                  							<?php endif; ?>
                                            <td><a class="btn-success btn" href="<?php echo site_url('admin/comdetails/' . $row->company_id) ?>">
        	 										 <span class="glyphicon glyphicon-log-in"></span>See Details</a></td>
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
