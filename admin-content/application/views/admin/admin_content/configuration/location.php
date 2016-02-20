<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Location Configuration</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
               <thead>
                    <tr>
                        <th>Region</th>
                        <th>Country</th>
                        <th>Language Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($location as $row)
				{ ?>
                    <tr>
                  <td><?php echo $row->locationname_en;?></td>
                  <td><?php echo $row->region_en;?></td>
                  <td><?php echo $row->language_code;?></td>
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
           <?php } ?>
                  <!--<tr>
                   <td>Asia</td>
                  <td>India</td>
                   <td><a class="btn-danger btn" href="location-edit-con.php">
          <span class="glyphicon glyphicon-log-in"></span>Edit</a>
             </td>       
                    </tr>
                    <tr>                                           
                   <td>Asia</td>
                  <td>India</td>                          
                  <td><a class="btn-danger btn" href="location-edit-con.php">
          <span class="glyphicon glyphicon-log-in"></span>Edit</a>
                  </td>
                  </tr>
                   <tr>
                     <td>Asia</td>
                  <td>India</td>
                     <td><a class="btn-danger btn" href="location-edit-con.php">
          <span class="glyphicon glyphicon-log-in"></span>Edit</a>
                    </td>
                    </tr>
                    <tr>
                    <td>Asia</td>
                  <td>India</td>
                     
            <td><a class="btn-danger btn" href="location-edit-con.php">
          <span class="glyphicon glyphicon-log-in"></span>Edit</a>
            </td>
            </tr>-->
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
