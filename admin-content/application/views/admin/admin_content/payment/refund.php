<?php $permission = $this->session->userdata('permission'); ?>
<!-- /navbar -->



<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?php echo site_url('admin/refund')?>"><i class=""></i><span>All Refund List</span> </a> </li>    
       
         
      </ul>
      
      
       <?php if($permission !='0') : ?>   
    	  <div class="mainnav pull-right righttext-padding">   
			<a href="<?php echo site_url('admin/addrefund')?>" class="btn-danger btn">
        	    <span class="glyphicon glyphicon-log-in"></span>Add Refund</a>                 
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
       <?php $msg = $this->session->flashdata('refundmessage');  ?>
		   <?php if (isset($msg)) : ?>
				<CENTER><h3 style="color:green;">Data Added successfully</h3></CENTER><br>
		  <?php endif; ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Refund</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Refund Headline</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction ID</th>
                                            <th>User Name or Company Email</th> 
                                            <th>User Name or ID</th>
                                            <th>Refund Amount</th> 
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($refund as $row) : ?>
                                        
                                        <tr>
                                           
                                            <td><?php echo $row->refund_headline;?></td>
                                            <td><?php echo $row->transaction_date;?></td>
                                            <td><?php echo $row->transaction_id;?></td>  
                                            <td><?php echo $row->email;?></td> 
                                            <td><?php echo $row->companyid;?></td>
                                            <td><?php echo $row->amount;?></td>  
                                          
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