<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
       <?php $msg = $this->session->flashdata('assignasmsg');  ?>
		   <?php if (isset($msg)) : ?>
				<CENTER><h3 style="color:green;">Sub Admin Role has been switched Successfully</h3></CENTER><br>
		  <?php endif; ?>
        <div class="main-width">
         <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Create New Sub admin</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th>User Name</th>
                                             <th>Role</th>
                                             <th>Switch to User</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($showsubadmins as $row) : ?>
                                        <?php $status = $row->status; ?>
                                        <?php if($status=='1') : ?>
                                      		  <tr>
                                        <?php echo form_open('admin/assignas/'.$row->id); ?>   
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->role; ?></td>
                                            <input type="hidden" name="role" value="<?php echo $row->role; ?>" />
                                            
                                            <td>
                                           		<select onchange="show_other_qual()" class="form-control droup-down-margin switch_as" name="Degree-course">
                        							<option value="">Switch to User</option>
														<?php foreach($showsubadmins as $key) : ?>
                                                	 		<option value="<?php echo $key->id;?>"><?php echo $key->username; ?></option>  
                        						    		 
														<?php endforeach; ?>
                                                 </select>
                                                 <input type="hidden" name="current_status" value="<?php echo $key->status; ?>" />
                                                 <input type="hidden" name="switchas" class="switchas_text" />
                                                 <input type="hidden" name="user_id" class="switchas_val" />  
                                                 <input type="hidden" name="status" value="<?php echo $status ?>" />  
                                            
                      						</td>
                      
            
                                           <td>
                                           		<a class="" href="#">
           											<span class="glyphicon glyphicon-log-in "></span><?php echo form_submit('add', 'Switch',array('class'=>'btn btn-danger')); ?></a>
                                            	
            							   </td>
											<?php echo form_close(); ?>
                                     
                                        </tr>
                                        <?php endif; ?>
                                        
                                         
                                        
                                        
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