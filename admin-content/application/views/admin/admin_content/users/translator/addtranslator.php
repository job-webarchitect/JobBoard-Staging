<?php $page = $this->uri->segment(2);?>  
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($page=="translator") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/translator')?>"><i class=""></i><span> Manage Translator</span> </a> </li>  
        <li <?php if($page=="addtranslator") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/tran/addtranslator')?>"><i class=""></i><span>Add Translator</span> </a> </li>    
        <li <?php if($page=="assign") { echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/tran/assign')?>"><i class=""></i><span>Assign Job Translator</span> </a> </li>  
         
      </ul>
      
    </div>
    <!-- /container -->
     
                                                
  </div>
  <!-- /subnavbar-inner --> 
</div>    

 
<div class="main main-minhight">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="main-width">
          <div class="widget">
            <div class="widget-header">
              <h3>Add Translator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            
               <div class="span12">
              <div class="span2">Name :</div>   
              <div class="span4"><input type="text" placeholder="Enter Refund Headline" id="r_headline" name="r_headline"></div>
              </div>
              
              <div class="span12">
              <div class="span2">Email Id:</div>   
              <div class="span4"><input type="text" placeholder="Enter Transaction Date" id="t_date" name="t_date" ></div>   
              </div>
              
              <div class="span12 bottom-space"> 
              <div class="span2">Language:</div>  
              <div class="span8 ">
              <input type="checkbox"> <span class="mrgn">Select all</span>
               <input type="checkbox"> <span class="mrgn">English</span>
               <input type="checkbox"> <span class="mrgn">French</span>
               <input type="checkbox"> <span class="mrgn">Dutch</span>
               <input type="checkbox"> <span class="mrgn">Spanish</span>
               <input type="checkbox"> <span class="mrgn">Chienese</span>
               <input type="checkbox"> <span class="mrgn">Russian</span>
               <input type="checkbox"> <span class="mrgn">Arabic</span>
              </div>  
            </div>
             <div class="span8 pull-right"><a class="btn-danger btn" href="#">
            <span class="glyphicon glyphicon-log-in "></span>Submit</a></div>
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

</div>
  <script type="text/javascript">  
  function abc(a){
	
	 if(a==7)
	 {
		  $("#position").show();
	 }
	 else
	 {
		 $("#position").hide();
	 }
   
  } 
  
  </script> 
  
<?php include('includes/footer.php'); ?>