<!-- /navbar -->
<?php $permission = $this->session->userdata('permission'); ?>


<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?php echo site_url('admin/paymentplan')?>"><i class=""></i><span>Resume Download</span> </a> </li> 
         <li><a href="<?php echo site_url('admin/viewresume')?>"><i class=""></i><span>View Resume</span> </a> </li> 
         <li><a href="<?php echo site_url('admin/paymentemail')?>"><i></i><span>Email Service</span> </a> </li> 
         <li><a href="<?php echo site_url('admin/paymentmixed')?>"><i></i><span>Mixed Plan</span> </a> </li>
          <li><a href="<?php echo site_url('admin/advplan')?>"><i></i><span>Advertisement Plan</span> </a> </li>
          <?php /*?> <li  ><a href="javascript:;"><i class=""></i><span>Conference</span> </a> </li>
         <li  <?php if($page=="translation") { echo 'class="active"'; } ?>><a href="translationplan.php"><i class=""></i><span>Translation plan</span> </a> </li>    
        <li  <?php if($page=="hotjob") { echo 'class="active"'; } ?>><a href="hotjob.php"><i class=""></i><span>Hot Job Plan</span> </a> </li>
         <li <?php if($page=="adv_plan") { echo 'class="active"'; } ?>><a href="adv-plan.php"><i class=""></i><span>Ads Plan</span> </a> </li>    
        <li  <?php if($page=="position_payment") { echo 'class="active"'; } ?>><a href="position-payment.php"><i class=""></i><span>Position With Payment</span> </a> </li><?php */?>  
         
      </ul>
      
     <?php if($permission !='0') : ?>  
     		 <div class="mainnav pull-right righttext-padding">   
             	<a href="<?php echo site_url('admin/addpayment')?>" class="btn-danger btn">
            			<span class="glyphicon glyphicon-log-in"></span>Add Plan</a>

     		 </div>
    <?php endif; ?>
      
      
    
      
    </div>
    <!-- /container -->
     
                                                
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $rmsg = $this->session->flashdata('resumemessage');
	  		$umsg = $this->session->flashdata('updatemessage');
	  		$dmsg = $this->session->flashdata('deletemessage');
	  
	  ?>
		   <?php if (isset($rmsg)) : ?>
				<CENTER><h3 style="color:green;">Plan added successfully</h3></CENTER><br>
		  <?php endif; ?>
		  
		  <?php if (isset($umsg)) : ?>
				<CENTER><h3 style="color:green;">Plan updated successfully</h3></CENTER><br>
		  <?php endif; ?>
          
           <?php if (isset($dmsg)) : ?>
				<CENTER><h3 style="color:green;">Plan Deleted successfully</h3></CENTER><br>
		  <?php endif; ?>
		  
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Resume Download</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
             <?php if(!empty($downloadresume)) : ?>
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Plan Headline</th>
                                            <th>No. of Resume Download</th>
                                            <th>Price</th>
                                            <th>Validity</th>
                                             <?php if($permission !='0') : ?>  
                                             		<th>Action</th>
                                              <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($downloadresume as $row) : ?>
                                        <tr>
                                           
                                            <td><?php echo $row->planname; ?></td>
                                            <td><?php echo $row->download_noofresume; ?></td>
                                            <td><?php echo $row->price; ?></td> 
                                            <td><?php echo $row->validity; ?></td>  
                                             <?php if($permission !='0') : ?>  
                                          		 <td><a class="btn-danger btn" href="<?php echo site_url('admin/editresumedownload/'.$row->planid)?>">
            											<span class="glyphicon glyphicon-log-in"></span>Edit</a> 
                                                      <a class="btn-danger btn" href="<?php echo site_url('admin/removeresumedownload/'.$row->planid)?>">
            											<span class="glyphicon glyphicon-log-in"></span>Delete</a>
                                                  </td>
                                             <?php endif; ?>
                                        </tr>
                                        
									<?php endforeach; ?>
                                    </tbody>
                                </table> 
            <?php else : ?>
            <h4>Plan List is empty</h4>
            
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