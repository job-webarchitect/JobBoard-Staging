<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Manage Job Seeker</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Emailid</th>
                                            <th>Userid</th>
                                            
                                            <th>Date of Joining</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($jobseeker as $row) : ?>
                                        <tr>
                                           
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->unique_portal_id; ?></td>  
                                            <td><?php echo $row->datejoined; ?></td> 
                                      <?php
				 						$status = $row->status;
									    if($status == 1) :   ?>
						                  	<td>Active
          		  	 						</td>
                  
				  						<?php else : ?>
						                  	<td>Deactive
          		  							 </td>
                  						<?php endif; ?>
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
