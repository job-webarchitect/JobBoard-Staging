<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo site_url('admin/hotjobs') ?>"><i class=""></i><span> All Hot Job List</span> </a> </li>  
        <li class="active"><a href="<?php echo site_url('admin/addhotjob') ?>"><i class=""></i><span></span> Add New Hot Job</a> </li>    
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
        
        <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header"> 
              <h3>Add New Hot Job</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
             <?php if(!empty($hotjoblists)) : ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Job ID</th>
                    <th> Company ID</th>
                    <th> Posted Date</th>
                    <th> No. of Vaccancy</th>
                    <th> Action</th>
                  </tr>
                </thead>
                <tbody>
              
              
                  <?php foreach($hotjoblists as $row) : ?>
                  <tr>
                   			<td><?php echo $row->job_id; ?></td>
                            <td><?php echo $row->company_id; ?></td>
                            <td><?php echo $row->jobpostingdate; ?></td>
                            <td><?php echo $row->noof_vacancy; ?></td>
                            <td><a href="<?php echo site_url('admin/addtohotjob/'.$row->job_id)?>" class="btn-danger btn">
                    			<span class="glyphicon glyphicon-log-in"></span>Add</a>
                            </td>
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