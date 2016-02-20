<?php $permission = $this->session->userdata('permission'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <?php $msg = $this->session->flashdata('addmatchresume'); 
	  		$msg2= $this->session->flashdata('updatematchresume'); 
	   ?>
		   
		   <?php if (isset($msg)) : ?>
				<CENTER><h3 style="color:green;">Data Added Successfully</h3></CENTER><br>
		  <?php endif; ?>
          
           <?php if (isset($msg2)) : ?>
				<CENTER><h3 style="color:green;">Data has been Updated Successfully</h3></CENTER><br>
		  <?php endif; ?>
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <div class="span10"><h3>Resume Match Configuration</h3></div>
                  <?php //if($permission !='0') : ?>
                   		<a class="btn-danger btn" href="<?php echo site_url('admin/addmatchresume')?>">
          			<span class="glyphicon glyphicon-log-in"></span>Add</a>
                      <?php //endif; ?> 
            
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                        <th>Formula Name</th>
                        <th>Value</th>
                        <?php //if($permission !='0') : ?>
                       		 <th>Action</th>
                         <?php //endif; ?>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($matchedresume as $row) : ?> 
             		<tr>
                  		<td><?php echo $row->formula_name;?></td>
	                    <td><?php echo $row->value;?></td>
	                    <?php //if($permission !='0') : ?>
                        <td><a class="btn-danger btn" href="<?php echo site_url('admin/editmatchresume/'.$row->formulaid) ?>">
			          		<span class="glyphicon glyphicon-log-in"></span>Edit</a>
                            <?php //endif; ?>
          		  		</td>
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
