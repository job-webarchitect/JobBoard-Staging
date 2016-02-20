<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part--> 
    <div class="clearfix"></div>
    <?php
        if($this->session->flashdata('mail_succ'))
        {
            echo '<div class="alert alert-success">'.$this->session->flashdata('mail_succ').'</div>';
        }
        if($this->session->flashdata('mail_err'))
        {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('mail_err').'</div>';
        }
        if($this->session->flashdata('mesg_err'))    
        {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('mesg_err').'</div>';
        }

    ?>
    <div class="alert alert-success" style="display:none;" id="mesg_succ"></div>
    <div class="alert alert-danger" style="display:none;" id="mesg_err"></div>
    <div class="white-box-right">
        <div class="pull-right right20 primary-btn ad-apply-btn" data-toggle="modal" data-target="#myModal">Add Employer</div>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <form action="<?php echo base_url(); ?>company/Employer/add_employer" method="post" name="add_employer" id="add_employer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Add Employer</h4>
                        <div class="col-lg-4 pull-right text-danger">* <i>Indicates required field</i></div>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">First Name <span class="text-danger">*</span></div>
                            <div class="col-xs-6">
                                <input type="text" class="input-width form-control" placeholder="Enter first name" name="fname" id="fname">
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Last Name <span class="text-danger">*</span></div>
                            <div class="col-xs-6">
                                <input type="text" class="input-width form-control" placeholder="Enter last name" name="lname" id="lname">
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Email <span class="text-danger">*</span></div>
                            <div class="col-xs-6">
                                <input type="text" class="input-width form-control" placeholder="Enter email" name="email" id="email">
                            </div>
                        </div>               
                        <div class="col-xs-12 margin-ten">
                        <?php //print_r($all_language); ?>
                            <div class="col-xs-3">Language <span class="text-danger">*</span></div>
                            <div class="col-xs-6">
                                <select class="input-lg-width form-control" name="language" id="language">
                                    <option value="">Select Language</option>
                                    <option value="en">English</option>
                                    <option value="arb">Arabic</option>
                                    <option value="du">Dutch</option>
                                    <option value="spn">Spanish</option>
                                    <option value="fr">French</option>
                                    <option value="chn">Chinese</option>
                                    <!-- <option value="lan">Dutch</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Location <span class="text-danger">*</span></div>
                            <div class="col-xs-6">
                                <select class="input-lg-width form-control" name="location" id="location">
                                    <option value="loc">Select Location</option>
                                    <option value="IN">India</option>
                                    <option value="USA">USA</option>
                                    <option value="FR">France</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Permission <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <div class="col-sm-4 col-xs-7 row">
                                    <input type="checkbox" name="jobpermission" id="jobpermission" value="0"><span class="margin-seven">Job Posting</span>
                                </div>
                                <div class="col-xs-6">
                                    <input type="checkbox" name="resumepermission" id="resumepermission" value="0"><span class="margin-seven">Resume Database</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer1">
                        <input type="hidden" name="add" id="add">
                        <a class="primary-btn ad-apply-btn" href="javascript:void(0);" onclick="send_employer()">Add Employer</a>
                        <div class="primary-btn ad-apply-btn" data-dismiss="modal">Cancel</div>
                    </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="col-xs-8"><h4>Add/View Employer</h4></div>
        <div class="col-xs-12 prf-col2"></div>
        <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-2"><b>Employer</b></div>
            <div class="col-xs-4"><b>Permission</b></div>
            <div class="col-xs-2"><b>Language</b></div>
            <div class="col-xs-2"><b>Location</b></div>
            <div class="col-xs-2"><b>Added By</b></div>
        </div>
        <div class="col-xs-12 white-padding">
            <div class="col-xs-1">First Name</div>
            <div class="col-xs-1">Last Name</div>
            <div class="col-xs-4">
                <div class="col-xs-6 row">Job Posting</div>
                <div class="col-xs-4">Resume Database</div>
                <div class="col-xs-2">Modify</div>
            </div>
            <div class="col-xs-2">-</div>
            <div class="col-xs-2">-</div>
            <div class="col-xs-2">-</div>
        </div>
        <div class="col-xs-12 prf-col2"></div>
        <?php //print_r($all_records); ?>
        <?php 
		if(count($all_records) > 0 ) {	 
			foreach($all_records as $all_employer){ ?>
			<div class="col-xs-12 white-padding" id="employers_data">
				<div class="col-xs-1"><?php echo $all_employer['first_name']; ?></div>
				<div class="col-xs-1"><?php echo $all_employer['last_name']; ?></div>
				<div class="col-xs-4">
					<div class="col-xs-6 row"><?php if($all_employer['permission_jobposting'] == 1) {?><i class="fa fa-check"></i><?php }else{ ?><i class="fa fa-times"></i><?php } ?></div>
					<div class="col-xs-4"><?php if($all_employer['permission_databasestats'] == 1) {?><i class="fa fa-check"></i><?php }else{ ?><i class="fa fa-times"></i><?php } ?></div>
					<div class="col-xs-2" data-toggle="modal" data-target="#myModal1"><a href="javascript:void(0);" onclick="edit_employers('<?php echo $all_employer['employerid'] ?>')"><i class="fa fa-pencil"></i></a></div> 
				</div>
				<div id="mylang<?=$all_employer['employerid']?>" class="col-xs-2"><?php echo $this->lang->line('text_lang_'.$all_employer['language_code']); ?></div>
				<div id="mycon<?=$all_employer['employerid']?>" class="col-xs-2"><?php echo $this->lang->line('text_country_'.$all_employer['country_code']); ?></div>
				<div class="col-xs-2">---</div>
			</div>
		<?php } 
		} else {
			?>
            			  <div class="col-xs-12 margin-ten white-padding">
                          <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">No Records Found !!!</div>
                          </div>
            <?php } ?>
    </div>
</div>
<!--Edit Employer Form Start-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form action="<?php echo base_url(); ?>company/employer/update_employer_detail" method="post" name="edit_employer_form" id="edit_employer_form">
            <input type="hidden" name="update_emplrid" id="update_emplrid" value="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel1">Edit Employer</h4>
                <div class="col-lg-4 pull-right text-danger">* <i>Indicates required field</i></div>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">First Name <span class="text-danger">*</span></div>
                    <div class="col-xs-6">
                        <input type="text" class="input-width form-control" placeholder="Enter first name" name="edit_fname" id="edit_fname" disabled>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">Last Name <span class="text-danger">*</span></div>
                    <div class="col-xs-6">
                        <input type="text" class="input-width form-control" placeholder="Enter last name" name="edit_lname" id="edit_lname" disabled>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">Email <span class="text-danger">*</span></div>
                    <div class="col-xs-6">
                        <input type="text" class="input-width form-control" placeholder="Enter email" name="edit_email" id="edit_email" disabled>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">Language <span class="text-danger">*</span></div>
                    <div class="col-xs-6">
                        <select class="input-lg-width form-control" name="edit_language" id="edit_language">
                            <option value="">Select Language</option>
                            <option value="en">English</option>
                            <option value="arb">Arabic</option>
                            <option value="du">Dutch</option>
                            <option value="spn">Spanish</option>
                            <option value="fr">French</option>
                            <option value="chn">Chinese</option>
                            <!-- <option value="lan">Dutch</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">Location <span class="text-danger">*</span></div>
                    <div class="col-xs-6">
                        <select class="input-lg-width form-control" name="edit_location" id="edit_location">
                            <option value="loc">Select Location</option>
                            <option value="IN">India</option>
                            <option value="USA">USA</option>
                            <option value="FR">France</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-xs-3">Permission <span class="text-danger">*</span></div>
                    <div class="col-xs-9">
                        <div class="col-sm-4 col-xs-7 row">
                            <input type="checkbox" name="edit_jobpermission" id="edit_jobpermission" value="0"><span class="margin-seven">Job Posting</span>
                        </div>
                        <div class="col-xs-6">
                            <input type="checkbox" name="edit_resumepermission" id="edit_resumepermission" value="0"><span class="margin-seven">Resume Database</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer1">
                <div class="primary-btn ad-apply-btn" data-dismiss="modal" onclick="update_employer()">Save</div>
                <div class="primary-btn ad-apply-btn" data-dismiss="modal">Cancel</div>
            </div>
        </div>
        <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Edit Form End-->
<script type="text/javascript">
    function send_employer()
    {
        $("#add_employer").submit();
    }

    $(document).ready(function(){
        $('#jobpermission').change(function(){
            if($(this).prop('checked') === true){
                $(this).val('1');
            }else{
                $(this).val('0');
            }
        });
        $('#resumepermission').change(function(){
            if($(this).prop('checked') === true){
                $(this).val('1');
            }else{
                $(this).val('0');
            }
        });
        
    });
    function edit_employers(edit_emplrid)
    {

        $.ajax({
            'url':"<?php echo base_url(); ?>company/Employer_json/edit_employers_detail",
            'type':"post",
            'data':"emplr_id="+edit_emplrid,
            'dataType':"JSON",
            success:function(edit_empl_value)
            {
                //console.log(edit_empl_value);
                
                $("#update_emplrid").val(edit_empl_value.employerid);
                $("#edit_fname").val(edit_empl_value.first_name);
                $("#edit_lname").val(edit_empl_value.last_name);
                $("#edit_email").val(edit_empl_value.email);
                $("#edit_language").val(edit_empl_value.language_code);
                $("#edit_location").val(edit_empl_value.country_code);
                if(edit_empl_value.permission_jobposting == '1'){
                    $("#edit_jobpermission").attr('checked',true);
                    $("#edit_jobpermission").val(edit_empl_value.permission_jobposting);
                }
                if(edit_empl_value.permission_databasestats == '1')
                {
                    $("#edit_resumepermission").attr('checked',true);
                    $("#edit_resumepermission").val(edit_empl_value.permission_databasestats);    
                }
                
            }
        });
        $('#edit_jobpermission').change(function(){
            if($(this).prop('checked') === true){
                $(this).val('1');
            }else{
                $(this).val('0');
            }
        });
        $('#edit_resumepermission').change(function(){
            if($(this).prop('checked') === true){
                $(this).val('1');
            }else{
                $(this).val('0');
            }
        });
    }
    function update_employer()
    {
        var update_emplid = $("#update_emplrid").val();
        var update_fname = $("#edit_fname").val();
        var update_lname = $("#edit_lname").val();
        var update_email = $("#edit_email").val();
        var update_lang = $("#edit_language").val();
        var update_lang_text = $('#edit_language option:selected').html();
        var update_coun = $("#edit_location").val();
        var update_coun_text = $('#edit_location option:selected').html();
        var update_jpaccess = $("#edit_jobpermission").val();
        var update_rdaccess = $("#edit_resumepermission").val();

        //alert('Job Post='+update_jpaccess+'database='+update_rdaccess);

        var update_data = "empl_id="+update_emplid+"&empl_fname="+update_fname+"&empl_lname="+update_lname+"&empl_email="+update_email+"&empl_lang="+update_lang+"&empl_coun="+update_coun+"&jobpost_access="+update_jpaccess+"&dbstats_access="+update_rdaccess;
        
        $.ajax({
            'url':"<?php echo base_url(); ?>company/Employer_json/update_employers",
            'type':"post",
            'data':update_data,
            'dataType':"JSON",
            success:function(update_alert)
            {
                //console.log(update_alert);
                // location.reload();
                if(update_alert = true)
                {
                    $("#mylang"+update_emplid).html(update_lang_text);
                    $("#mycon"+update_emplid).html(update_coun_text);
                    $("#mesg_succ").show();
                    $("#mesg_succ").html("Employer data has been updated successfully");
                }
                else
                {
                    $("#mesg_err").show();
                    $("#mesg_err").html("Employer data has not been updated");
                }
            }
        });

    }
</script>