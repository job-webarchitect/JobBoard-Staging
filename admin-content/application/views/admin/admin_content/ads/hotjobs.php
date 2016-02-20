<?php $permission = $this->session->userdata('permission'); ?>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
       <?php if($permission =='0') : ?>
        <li class="active"><a href="<?php echo site_url('admin/hotjobs') ?>"><i class=""></i><span> All Hot Job List</span> </a> </li>  
        
        <?php else : ?>
            <li class="active"><a href="<?php echo site_url('admin/hotjobs') ?>"><i class=""></i><span> All Hot Job List</span> </a> </li>  
        	<li><a href="<?php echo site_url('admin/addhotjob') ?>"><i class=""></i><span></span> Add New Hot Job</a> </li>
         <?php endif; ?>
            
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
				<CENTER><h3 style="color:green;">Job Added to Hot Job List successfully</h3></CENTER><br>
			<?php } ?>
        
        <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header"> 
              <h3>All Hot Jobs</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <?php if(!empty($joblists)) : ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Job ID</th>
                    <th> Company ID</th>
                    <th> Posted Date</th>
                    <th> No. of Vaccancy</th>
                	<th>Status</th>
                
                  </tr>
                </thead>
                <tbody>
                 	<?php foreach($joblists as $row) : ?>
                    
                    	<tr>
                        	<td><?php echo $row->job_id; ?></td>
                            <td><?php echo $row->company_id; ?></td>
                            <td><?php echo $row->jobpostingdate; ?></td>
                            <td><?php echo $row->noof_vacancy; ?></td>
                            <?php $status = $row->jobstatus; ?>
                            <?php if($status==1) : ?>
                            		<td>Active</td>
                            <?php else : ?>
                          			 <td>DeActive</td>
                            <?php endif; ?>
                        </tr>
                    
                   <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
            <h4>Hot Job list is empty</h4>
            
            <?php endif;?>                    
            </div>
            <!-- /widget-content --> 
          </div>
          
          <!-- /widget --> 
        </div>
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>