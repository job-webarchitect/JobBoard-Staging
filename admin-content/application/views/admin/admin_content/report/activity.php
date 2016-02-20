<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?php echo site_url('admin/activity') ?>"><i class=""></i><span>Job Posting</span> </a> </li>  
        <li><a href="<?php echo site_url('admin/comapplied') ?>"><i class=""></i><span>Company Applied</span> </a> </li>    
       <!-- <li><a href=""><i class=""></i><span>New Job Seeker Associated With Us</span> </a> </li> 
        <li><a href=""><i class=""></i><span>User Activity</span> </a> </li> 
        <li><a href=""><i class=""></i><span>Resume Download</span> </a> </li>   -->      
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
        
        <!-- /span6 -->
        <div class="span12">
          
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header">
              <h3>Job Posting</h3>
              <!--<div class="span3 pull-right">
              <a class="btn-danger btn ">Daily</a>
              <a class="btn-danger btn ">Weekly</a>
              <a class="btn-danger btn ">Monthly</a>
              </div>--> 
            </div>
            <!-- /widget-header -->

            <div class="widget-content">
              <?php echo form_open($this->uri->uri_string()); ?>
             	<div class="span12 margin-thirty">
       				 <div class="span3"><input type="text" placeholder="From YYYY-MM-DD" class="form-control" id="start_date" data-parsley-id="7618" name="start_date"></div>
        				<div class="span3"><input type="text" placeholder="To YYYY-MM-DD" class="form-control active" id="start_date1" data-parsley-id="7618" name="end_date"></div>
         	</div>
                <div class="span12">
                <div class="span3">
                <select class="form-control" name="select_cont">
                <option value="exp"> Select Country</option>
               <?php foreach($showcountries as $key) : ?>
                      <option value="<?php echo $key->locationname_en; ?>"><?php echo $key->locationname_en; ?></option>  
               <?php endforeach; ?>
                </select>
                
                </div>

                <div class="span3">
                <select class="form-control" name="position_cont">
                        <option value="exp"> Select Position</option>
              			<?php foreach($showposition as $key) : ?>
                      		<option value="<?php echo $key->positionname_en; ?>"><?php echo $key->positionname_en; ?></option>  
               			<?php endforeach; ?>
                </select></div>

                <div class="span3"> 
                <select class="form-control" name="area_cont">
                        <option value="exp"> Select Area of Experience</option>
              					<?php foreach($showarea as $key) : ?>
                      			<option value="<?php echo $key->areaofexpname_en; ?>"><?php echo $key->areaofexpname_en; ?></option>  
               			<?php endforeach; ?>
                </select></div>
                
                <div class="span3" style="width:220px"> 
             		 <span class="glyphicon glyphicon-log-in "></span><?php echo form_submit('add', 'Search',array('class'=>'btn btn-danger')); ?></a></div>
                
                </div>
                
                 

             <div class="span11">
                        <div class="panel panel-green">
                           
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
              <!-- /area-chart --> 
            </div>
            	<?php echo form_close(); ?>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          

        </div>
        <!-- /span6 --> 
       
        <?php if(!isset($returned_res)) : ?>
        <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>A Table Format</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Country </th>
                    <th> Position</th>
                    <th> Area of Experience</th>
                    <th>Total No. of Jobs</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach($showreport as $row) : ?>
                  <tr>
                    <td> <?php echo $row->locationname_en; ?></td>
                    <td>  <?php echo $row->positionname_en; ?></td>
                    <td>  <?php echo $row->areaofexpname_en; ?></td>
                   	<td> <?php echo $row->countMe;?></td>
                  </tr>
                 
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          
          <!-- /widget --> 
        </div>
       
        <?php else : ?>
        
        <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>A Table Format</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <?php if(!empty($returned_res)) : ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Country </th>
                    <th> Position</th>
                    <th> Area of Experience</th>
                    <th>Total No. of Jobs</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach($returned_res as $row) : ?>
                  <tr>
                    <td> <?php echo $row->locationname_en; ?></td>
                    <td>  <?php echo $row->positionname_en; ?></td>
                    <td>  <?php echo $row->areaofexpname_en; ?></td>
                   	<td> <?php echo $row->countMe;?></td>
                  </tr>
                 
                <?php endforeach; ?>
                </tbody>
              </table>
             <?php else : ?>
            <h4>No Matching Records have been found.</h4>
            
            <?php endif;?>  
            </div>
            <!-- /widget-content --> 
          </div>
          
          <!-- /widget --> 
        </div>
        
        
        <?php endif; ?>
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>