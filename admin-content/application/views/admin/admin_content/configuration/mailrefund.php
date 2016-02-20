<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo site_url('admin/mailsetting')?>"><i class=""></i><span>Register User</span> </a> </li>  
        <li><a href="<?php echo site_url('admin/mailregcmpny')?>"><i class=""></i><span>Register Company</span> </a> </li>    
        <li><a href="<?php echo site_url('admin/mailnotification')?>"><i class=""></i><span>Notification</span> </a> </li>   
        <li class="active"><a href="<?php echo site_url('admin/mailrefund')?>"><i class=""></i><span>Refund</span> </a> </li>
        <li><a href="<?php echo site_url('admin/mailcheckout')?>"><i class=""></i><span>Checkout</span> </a> </li>      
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
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Refund</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="span12">
              <div class="span2">Choose Language:</div>   
            	  <div class="span4"> 
                  	<select class="form-control droup-down-margin" id="Role" name="Role">
                        <option>Choose Language</option>
                       <option value="en">English (EN)</option>
                        <option value="fr">French(FR)</option>
                        <option value="de">Dutch(DE)</option>
                        <option value="es"> Spanish(ES) </option>
                        <option value="chi">Chinese(CHI)</option>
                        <option value="ru"> Russian(RU)</option>
                        <option value="ar">Arabic(AR) </option>
                        
                	 </select>
                     <input type="hidden" name="langcode" class="langcode" />
                 </div>
              </div>
            <div class="span12">
              <div class="span2">Header Text:</div>   
              <div class="span4"> 
           			  <input type="text" placeholder="Enter Header">
                      </div>
              </div>
               <div class="span12">
              <div class="span2">Subject :</div>   
              <div class="span4"><input type="text" placeholder="Enter Subject"></div>
              </div>
              
              <div class="span12">
              <div class="span2">Content:</div>   
              <div class="span4"><input type="text" placeholder="Enter Content"></div>
              </div>
              <div class="span12">
              <div class="span2">Footer:</div>   
              <div class="span4"><input type="text" placeholder="Enter Footer"></div>
              </div>
         
             <div class="span8 pull-right"><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in "></span>Submit</a></div>
              
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



  
