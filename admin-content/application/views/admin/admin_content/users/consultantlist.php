<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo site_url('admin/consultancy') ?>"><i class=""></i><span>Manage Consultant</span> </a> </li> 
        <li class="active"><a href="<?php echo site_url('admin/consultantlist') ?>"><i class=""></i><span>All Request List</span> </a> </li>  
        
         
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
        <div class="main-width">
           <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Consultant All Request List</h3>
            </div>
            
            
            <!-- /widget-header -->
            <div class="widget-content">
            <?php if(!empty($consultantlist)) : ?>
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Company Name</th>
                                            <th>Userid</th>
                                            <th>Date of Joined</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($consultantlist as $row) : ?> 
                                        <tr>
                                           
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->company_name; ?></td>
                                            <td><?php echo $row->unique_portal_id; ?></td> 
                                           <td><?php echo $row->datejoined; ?></td>
                                           <?php
				 							$status = $row->approved_status;
										    if($status == 1) :   ?>
							                  	<td><a class="btn-danger btn" href="<?php echo site_url('admin/unapprovecons/'.$row->company_id)?>">
        	 										 <span class="glyphicon glyphicon-log-in"></span>Reject</a>
          			  	 						</td>
                	  
				  							<?php else : ?>
							                  	<td><a class="btn-danger btn" href="<?php echo site_url('admin/approvecons/'.$row->company_id)?>">
         				 							<span class="glyphicon glyphicon-log-in"></span>Approve</a>
                                                    <a class="btn-danger btn" href="<?php echo site_url('admin/unapprovecons/'.$row->approved_status)?>">
        	 										 <span class="glyphicon glyphicon-log-in"></span>Reject</a>
          		  								</td>
                  							<?php endif; ?>
                                            
                                            
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
