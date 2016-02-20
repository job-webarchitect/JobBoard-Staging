<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
    <?php
        if($this->session->flashdata('temp_succ')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('temp_succ').'</div>'; 
        } else if($this->session->flashdata('temp_err')) {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('temp_err').'</div>';
        } else if($this->session->flashdata('update_mail_succ')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('update_mail_succ').'</div>'; 
        } else if($this->session->flashdata('update_mail_err')) {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('update_mail_err').'</div>'; 
        }
    ?>
    <div class="alert alert-success" id="del-alert-succ" style="display:none;"></div>
    <div class="alert alert-danger" id="del-alert-err" style="display:none;"></div>
    <div class="white-box-right">
        <div class="pull-right right20 primary-btn ad-apply-btn" data-toggle="modal" data-target="#myModal" onclick="add_template()">Create Template</div>
        <h4>Email Templates</h4>
        
        <div class="prf-col2 margin-thirty"></div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <form action="<?php echo base_url();?>company/employer/add_email_template" method="post" name="add_email_template" id="add_email_template">
            <input type="hidden" name="tmpl_id" id="tmpl_id" value="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Email Template</h4>
                        <div class="col-lg-4 pull-right text-danger">* <i>Indicates required field</i></div>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Template Name <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <input type="text" class="input-width form-control" placeholder="Enter template name" name="tmpl_name" id="tmpl_name">
                            </div>
                        </div>    
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Subject <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <input type="text" class="input-width form-control" placeholder="Enter subject" name="tmpl_subj" id="tmpl_subj">
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">From <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <input type="text" class="input-width form-control" placeholder="Enter your email-id" name="tmpl_from" id="tmpl_from">
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Message <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <textarea class="input-width form-control" rows="5" placeholder="Enter message" name="tmpl_mesg" id="tmpl_mesg"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-3">Signature <span class="text-danger">*</span></div>
                            <div class="col-xs-9">
                                <textarea class="input-width form-control" rows="2" placeholder="Enter signature" name="tmpl_sign" id="tmpl_sign"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer1">
                        <div class="primary-btn ad-apply-btn" onclick="manage_email_temp()">Create</div>
                        <div class="primary-btn ad-apply-btn" data-dismiss="modal">Cancel</div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </form>
        </div>

        <div class="col-xs-12 margin-ten">
            <span class="pull-left">Sort by</span>
            <div class="col-md-2 col-xs-3">
                <select class="form-control" name="filter_emailtmpl" id="filter_emailtmpl" onchange="filter_email_template(this.value)">
                    <option value="date">Date</option>
                    <option value="name">Name</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-md-4 col-xs-4"><b>Template Name</b></div>
            <div class="col-xs-4"><b>Modify</b></div>
            <div class="col-xs-4"><b>Creation Date</b></div>
        </div>
        <div id="all_email_detail">
            <?php foreach($all_templates as $view_templates){ ?>
            <div class="col-xs-12 white-padding">
                <div class="col-md-4 col-xs-4"><?php echo $view_templates['template_name']; ?></div>
                <div class="col-xs-4">
                    <a href="javascript:;" onclick="edit_template(<?php echo $view_templates['templateid']; ?>)"><i class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></i></a>
                    
                    <span class="margin-seven"><a href="javascript:;"  onclick="delete_template(<?php echo $view_templates['templateid']; ?>)"><i class="fa fa-times"></i></a></span>
                </div>
                <div class="col-xs-4"><?php echo $view_templates['created_date']; ?></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function manage_email_temp(){
        $('#add_email_template').submit();
    }
	
	function add_template() {
		$("#tmpl_id").val('');
		$("#tmpl_name").val('');
		$("#tmpl_subj").val('');
		$("#tmpl_from").val('');
		$("#tmpl_mesg").val('');
		$("#tmpl_sign").val('');
	}
	
    function edit_template(tmpl_id) {
        $.ajax({
            'url':"<?php echo base_url(); ?>company/employer_json/edit_template",
            'type':"post",
            'data':"template_id="+tmpl_id,
            'dataType':'JSON',
            success:function(templ_all_data)
            {
                $("#tmpl_id").val(templ_all_data.templateid);
                $("#tmpl_name").val(templ_all_data.template_name);
                $("#tmpl_subj").val(templ_all_data.subject);
                $("#tmpl_from").val(templ_all_data.template_from);
                $("#tmpl_mesg").val(templ_all_data.message);
                $("#tmpl_sign").val(templ_all_data.signature);
            }
        });
    }

    function filter_email_template(filter_data) {
        $.ajax({
            'url':"<?php echo base_url(); ?>company/employer_json/email_template_detail",
            'type':"post",
            'data':"email_filter="+filter_data,
            'dataType':'JSON',
            success:function(filter_results)
            {
                var all_filter_data = "";
                all_filter_data = '<div id="all_email_detail">';
                //all_filter_data += '';
                for(var fd=0; fd<filter_results.length; fd++)
                {
                    all_filter_data += '<div class="col-xs-12 white-padding">';
                    all_filter_data += '<div class="col-md-4 col-xs-4">'+filter_results[fd].template_name+'</div>';
                    all_filter_data += '<div class="col-xs-4">';
                    all_filter_data += '<a href="javascript:;" onclick="edit_template('+filter_results[fd].templateid+')"><i class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></i></a>';
                    all_filter_data += '<span class="margin-seven"><a href="javascript:;"  onclick="delete_template('+filter_results[fd].templateid+')"><i class="fa fa-times"></i></a></span>';
                    all_filter_data += '</div>';
                    all_filter_data += '<div class="col-xs-4">'+filter_results[fd].created_date+'</div>';
                    all_filter_data += '</div>';
                }
                all_filter_data += '</div>';
                $("#all_email_detail").replaceWith(all_filter_data);
            }
        });
    }
    function delete_template(del_tempid) {
        $.ajax({
            'url':"<?php echo base_url(); ?>company/employer_json/delete_email_template",
            'type':"post",
            'data':'del_temp_id='+del_tempid,
            success:function(del_succ)
            {
                alert('Your email template has been deleted successfully');	
                location.reload();
            }
        });
    }
</script>