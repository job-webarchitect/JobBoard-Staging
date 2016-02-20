<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
        <div class="clearfix"></div>
        <?php 
            if(isset($mesg_succ)){echo '<div class="alert alert-success">'.$mesg_succ.'</div>';}
            if(isset($mesg_err)){echo '<div class="alert alert-danger">'.$mesg_err.'</div>';}
        ?>
        <div class="row">
            <div class="col-xs-12 "> <!-- right part-->
                <div class="clearfix"></div>
                <div class="row">
                    <form action="<?php echo base_url(); ?>employer/reminder" method="post" name="reminder_detail" id="reminder_detail">      
                    <div class="white-box-right">
                        <div class="col-lg-12"><h4>Reminder Message</h4></div>
                        <div class="col-xs-12 prf-col2"></div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-2 margin-ten">Date</div>
                            <div class="col-xs-6">
                                <input type="text"  data-parsley-id="7618" id="reminderdate" name="reminderdate" class="form-control" placeholder="MM/DD/YYYY  e.g 05/10/2015">
                                <ul id="parsley-id-7618" class="parsley-errors-list"></ul>
                            </div>
                            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png"></span>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-2 margin-ten">Message</div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 margin-ten">
                                <textarea class="form-control" rows="10" placeholder="Enter Reminder Message" name="reminder_mesg" id="reminder_mesg"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-2 margin-ten"></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="send_reminder()">Save</a>
                                <!-- <input type="submit" name="submit" value="Save" class="primary-btn ad-apply-btn"> -->
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>	<!-- ./ right part-->	
        </div>
    </div>	<!-- ./ right part-->	
</div>

<script>
function send_reminder() {
    $("#reminder_detail").submit();
}

$(document).ready(function() {
	  $('#reminderdate').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
  	    }, function (start, end, slabel) {
  		});
});
</script>