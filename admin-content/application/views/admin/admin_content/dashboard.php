<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} 
?>


<?php $msg = $this->session->flashdata('approve'); 
	  $not_admin = $this->session->flashdata('not-a-admin');
?>
<?php if (isset($username)) : ?>
				<CENTER><h3 style="color:green;">Created Successfully</h3></CENTER><br>
<?php endif; ?>

<?php if (isset($not_admin)) : ?>
				<CENTER><h3 style="color:red;">You don't have an enough permission to access the page.</h3></CENTER><br>
<?php endif; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      	<div class="main-width">
          <div class="widget">
            
            <!-- /widget-header -->
            <div class="span6">
            <div class="widget">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Today's Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Total Jobs Posted</span> <span class="job-color"><?php echo $jobsposted['countMe']; ?> Jobs</span> </a>
              
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Job Response</span> <span class="job-color">0 Jobs </span> </a>
              
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Translation</span> <span class="job-color">$0</span> </a>
              
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-user"></i><span class="shortcut-label">No. of User</span> <span class="job-color"><?php echo $noofusers['countMe']; ?> User </span></a>
              
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Resume</span> <span class="job-color"><?php echo $downloadedresume['countMe']; ?> Resume </span></a>
              
              <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Advertisement</span> <span class="job-color"><?php echo $totalads['countMe']; ?> Advertisement </span></a>
              
              
               </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          </div>
          
          <!--<div class="span6">
          <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Graph</h3>
            </div>
            <div class="widget-content">
                 <div class="panel-body">
                    <div id="morris-area-chart"></div>
              </div>
              </div>
          </div>-->   
            <!-- /widget-content --> 
          </div>
           
           <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Table</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Company</th>
                           <th>Response</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Total Jobs Posted</td>
                          <td><?php echo $jobsposted['countMe']; ?> Jobs</td>                                           
                      </tr>
                      <tr>
                           <td>Job Response</td>
                          <td>0 Jobs</td>               
                      </tr>
                      <tr>
                           <td>Translation</td>
                          <td>$0</td> 
                      </tr>
                       <tr>
                        <td>No. of User</td>
                          <td><?php echo $noofusers['countMe']; ?>User</td>  
                      </tr>
                      <tr>
                           <td>Resume</td>
                          <td><?php echo $downloadedresume['countMe']; ?> Resume</td>
                      </tr>
                       <tr>
                           <td>Advertisement</td>
                          <td><?php echo $totalads['countMe']; ?> Advertisement </td> 
                      </tr>
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