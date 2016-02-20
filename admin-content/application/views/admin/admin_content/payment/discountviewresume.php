<?php $permission = $this->session->userdata('permission'); ?>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo site_url('admin/discountplan')?>"><i class=""></i><span>Discount Resume Download</span> </a> </li>
         <li class="active"><a href="<?php echo site_url('admin/discountviewresume')?>"><i class=""></i><span>View Resume</span> </a> </li>   
        <li><a href="<?php echo site_url('admin/discountemail')?>"><i></i><span>Discount Email Service</span> </a> </li> 
         <li><a href="<?php echo site_url('admin/discountmixed')?>"><i></i><span>Mixed Plan</span> </a> </li>      
         <?php /*?> <li  ><a href="javascript:;"><i class=""></i><span>Conference</span> </a> </li>
         <li  <?php if($page=="translation") { echo 'class="active"'; } ?>><a href="translationplan.php"><i class=""></i><span>Translation plan</span> </a> </li>    
        <li  <?php if($page=="hotjob") { echo 'class="active"'; } ?>><a href="hotjob.php"><i class=""></i><span>Hot Job Plan</span> </a> </li>
         <li <?php if($page=="adv_plan") { echo 'class="active"'; } ?>><a href="adv-plan.php"><i class=""></i><span>Ads Plan</span> </a> </li>    
        <li  <?php if($page=="position_payment") { echo 'class="active"'; } ?>><a href="position-payment.php"><i class=""></i><span>Position With Payment</span> </a> </li><?php */?>  
         
      </ul>
      
      <?php if($permission !='0') : ?>  
     		<div class="mainnav pull-right righttext-padding">   
				 <a href="<?php echo site_url('admin/adddiscount')?>" class="btn-danger btn">
            	<span class="glyphicon glyphicon-log-in"></span>Add Plan</a>
            </div>
     <?php endif; ?>
      
      
                                           
  </div>
      
    </div>
    <!-- /container -->
     
         
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
       <?php $rmsg = $this->session->flashdata('updatediscountview');
	  		$umsg = $this->session->flashdata('updatemessage');
	  		$dmsg = $this->session->flashdata('removediscountview');
	  
	  ?>
		   <?php if (isset($rmsg)) : ?>
				<CENTER><h3 style="color:green;">Data Updated successfully</h3></CENTER><br>
		  <?php endif; ?>
          
          <?php if (isset($dmsg)) : ?>
				<CENTER><h3 style="color:green;">Plan Deleted successfully</h3></CENTER><br>
		  <?php endif; ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Discount View Resume</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
             <?php if(!empty($discountplan)) : ?>
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>No. of Viewed Resume</th>
                                            <th>original Price</th>
                                             <th>Discount Price</th>
                                             <th>Discount Form Date</th>
                                            <th>Discount To Date</th>
                                            <th>Validity</th>  
                                            <?php if($permission !='0') : ?>
                                             		<th>Action</th>
                                             <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($discountplan as $row) : ?>
                                        <tr>
                                           
                                            <td><?php echo $row->company_name ?></td>
                                            <td><?php echo $row->view_noofresume ?></td>
                                            <td><?php echo $row->original_cost?></td> 
                                             <td><?php echo $row->discount_cost ?></td>
                                             <td><?php echo $row->discount_requestdate ?></td>
                                             <td><?php echo $row->discount_givendate ?></td> 
                                            <td><?php echo $row->validity ?></td> 
                                            <?php if($permission !='0') : ?>
                                           <td><a class="btn-danger btn" href="<?php echo site_url('admin/editdiscountview/'.$row->discount_id)?>">
            <span class="glyphicon glyphicon-log-in"></span>Edit</a> <a class="btn-danger btn" href="<?php echo site_url('admin/removediscountview/'.$row->discount_id)?>">
            <span class="glyphicon glyphicon-log-in"></span>Delete</a></td>
                                      	   <?php endif;?>
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

