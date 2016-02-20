<?php $permission = $this->session->userdata('permission'); ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <?php if($permission =='4') : ?>
        	<li class="active" ><a href="<?php echo site_url('admin/recruitment') ?>"><i class=""></i><span>manage Recruiter</span> </a> </li>
        	<li><a href="<?php echo site_url('admin/recrequestlist') ?>"><i class=""></i><span>All Request List</span> </a> </li>     
        <?php endif; ?>
        <?php if($permission =='0') : ?>
      		 <li class="active" ><a href="<?php echo site_url('admin/recruitment') ?>"><i class=""></i><span>Manage Recruiter</span> </a> </li>
       <?php endif; ?>
        
         
      </ul>
      
    </div>
    <!-- /container -->
     
                                                
  </div>
  <!-- /subnavbar-inner --> 
</div>


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
              <h3>Manage Recruitment Agencies </h3>
            </div>
            
           
            
            <!-- /widget-header -->
            <div class="widget-content">
            <?php if(!empty($recruiter)) : ?>
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
                                       <?php foreach($recruiter as $row) : ?>
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
							                  	<td>Active</td>
                	  
				  							<?php else : ?>
							                  	<td>Deactive</td>
                  							<?php endif; ?>
                                            <td><a class="btn-success btn" href="<?php echo site_url('admin/reqdetails/' . $row->company_id) ?>">
        	 										 <span class="glyphicon glyphicon-log-in"></span>See Details</a></td>
                                         
                                         </tr>
                                        
										<?php endforeach; ?>
                                    </tbody>
                                </table>  
            <?php else : ?>
            		<h4>Request List is empty</h4>
            
            <?php endif;?>   
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
