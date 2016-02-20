<?php $permission = $this->session->userdata('permission');
	  $arr = explode(',',$permission);
	  
 ?>

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

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
           <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Company All Request List</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
            <?php if(!empty($requestlist)) : ?>
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
                                       <?php foreach($requestlist as $row) : ?> 
                                        <tr>
                                           
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->company_name; ?></td>
                                            <td><?php echo $row->unique_portal_id; ?></td> 
                                           <td><?php echo $row->datejoined; ?></td>
                                           <input type="hidden" name="email" value="<?php echo $row->email; ?>" />
										   <?php $status = $row->approved_status; ?>

										   
							                  	<td><a class="btn-danger btn" href="<?php echo site_url('admin/approve/'.$row->company_id)?>">
         				 							<span class="glyphicon glyphicon-log-in"></span>Approve</a>
                                                    
          		  								</td>
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
