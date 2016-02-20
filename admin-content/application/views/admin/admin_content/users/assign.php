<?php $page = $this->uri->segment(2);?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($page=="translator") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/translator')?>"><i class=""></i><span> Manage Translator</span> </a> </li>  
        <li <?php if($page=="addtranslator") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/addtranslator')?>"><i class=""></i><span>Add Translator</span> </a> </li>    
        <li <?php if($page=="assign") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/assign')?>"><i class=""></i><span>Assign Job Translator</span> </a> </li>  
         
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
          <div class="widget">
            <div class="widget-header">
              <h3>Job List</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
           <div class="span12">
           <div class="span1">Job ID</div>
           <input type="text" name="p_headline" id="p_headline" placeholder="Enter Job ID">
           </div>
           <div class="span12">
           <div class="span1">Position</div>
           <input type="text" name="p_headline" id="p_headline" placeholder="Enter Position">
            </div>
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>Job Id</th>
                  <th>Position</th>
                  <th>Available Language</th>
                  <th>Posted Date</th>
                  <th>Posted By</th>
                  <th>Status</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
              <tr>                           
                <td>des122</td>
                <td>Web Designer</td>
                <td>English</td> 
                <td>10-05-2015</td>
                <td>SiliconIndia</td> 
                <td>Active</td>  
               <td><a class="btn-danger btn" href="edit-assign-translate.php">
            <span class="glyphicon glyphicon-log-in"></span>Assign to Translate</a>
            </td>
            </tr>
             <tr>                           
                <td>des122</td>
                <td>Web Designer</td>
                <td>English</td> 
                <td>10-05-2015</td>
                <td>SiliconIndia</td> 
                <td>Active</td>  
               <td><a class="btn-danger btn" href="edit-assign-translate.php">
            <span class="glyphicon glyphicon-log-in"></span>Assign to Translate</a>
            </td>
            </tr>
            <tr>                           
                <td>des122</td>
                <td>Web Designer</td>
                <td>English</td> 
                <td>10-05-2015</td>
                <td>SiliconIndia</td> 
                <td>Active</td>  
               <td><a class="btn-danger btn" href="edit-assign-translate.php">
            <span class="glyphicon glyphicon-log-in"></span>Assign to Translate</a>
            </td>
            </tr>
            <tr>                           
                <td>des122</td>
                <td>Web Designer</td>
                <td>English</td> 
                <td>10-05-2015</td>
                <td>SiliconIndia</td> 
                <td>Active</td>  
               <td><a class="btn-danger btn" href="edit-assign-translate.php">
            <span class="glyphicon glyphicon-log-in"></span>Assign to Translate</a>
            </td>
            </tr>
            <tr>                           
                <td>des122</td>
                <td>Web Designer</td>
                <td>English</td> 
                <td>10-05-2015</td>
                <td>SiliconIndia</td> 
                <td>Active</td>  
               <td><a class="btn-danger btn" href="edit-assign-translate.php">
            <span class="glyphicon glyphicon-log-in"></span>Assign to Translate</a>
            </td>
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
<!-- /main -->
