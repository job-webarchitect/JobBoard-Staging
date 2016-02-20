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
          <div class="widget widget-table action-table">
            <div class="widget-header">
              <h3>Manage Translator</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>Language Knwo</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>         
                                    <tbody>
                                        <tr>
                                           
                                            <td>Raviraj</td>
                                            <td>Rajravi@gmail.com</td>
                                            <td>English French</td>   
                                           <td><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in"></span>Active</a></td>
                                        </tr>
                                        <tr>
                                           
                                            <td>Raviraj</td>
                                            <td>Rajravi@gmail.com</td>
                                            <td>English French</td>   
                                           <td><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in"></span>Active</a></td>
                                        </tr>
                                        <tr>
                                           
                                            <td>Raviraj</td>
                                            <td>Rajravi@gmail.com</td>
                                            <td>English French</td>   
                                           <td><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in"></span>Active</a></td>
                                        </tr>
                                         <tr>
                                           
                                            <td>Raviraj</td>
                                            <td>Rajravi@gmail.com</td>
                                            <td>English French</td>   
                                           <td><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in"></span>Active</a></td>
                                        </tr>
                                        <tr>
                                           
                                            <td>Raviraj</td>
                                            <td>Rajravi@gmail.com</td>
                                            <td>English French</td>   
                                           <td><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in"></span>Active</a></td>
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
