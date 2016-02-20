<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
   <div class="clearfix"></div>
    <?php 
        if($this->session->flashdata('mesg_succ')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('mesg_succ').'</div>';
        } else if($this->session->flashdata('mesg_err')){
            echo '<div class="alert alert-alert">'.$this->session->flashdata('mesg_err').'</div>';
        }
    ?>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>
      <div class="row">
            <div class="col-xs-12 "> <!-- right part-->
            <div class="clearfix"></div>
            <form action="<?php echo base_url(); ?>company/employer/send_complain" method="post" enctype="multipart/form-data" name="complain_data" id="complain_data">
            <div class="row">     
               <div class="white-box-right">
                  <div class="col-lg-12"><h4>Complain</h4></div>
                  <div class="col-xs-12 prf-col2"></div>
                  <div class="col-xs-12 margin-ten">
                     <div class="col-xs-2 margin-ten">Reason</div>
                     <div class="col-xs-8">
                        <input type="text" class="form-control" id="complain_reason" name="complain_reason" placeholder="Enter reason for complain">
                     </div>
                  </div>
                  <div class="col-xs-12 margin-ten">
                     <div class="col-xs-2 margin-ten">Complain Message</div>
                     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 margin-ten">
                        <textarea class="form-control" rows="10" placeholder="Enter Complain Message" name="complain_message" id="complain_message"></textarea>
                     </div>
                  </div>
                  <div class="col-xs-12 margin-ten">
                     <div class="col-xs-2 margin-ten"></div>
                     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="addComplainData()">Send Complain</a>
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
      </div>	<!-- ./ right part-->	
   </div>	<!-- ./ right part-->	
</div>
<script language="javascript">
	function addComplainData() {
   	 $("#complain_data").submit();
   }
</script>