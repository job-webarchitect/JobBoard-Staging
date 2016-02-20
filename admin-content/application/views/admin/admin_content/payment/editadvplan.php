<div class="main main-minhight">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="main-width">
                    <div class="widget">
                        <div class="widget-header">
                            <h3>Edit Advertisement Plan</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <?php echo form_open('admin/updateadvplan/'.$editadvplan['advplan_id']); ?>
                            <div class="span12">
                                <div class="span2">Plan Type :</div>
                                <div class="span4">
                                    <select class="form-control droup-down-margin" id="plan_type" name="plan_type" >

                                        <option value="0">Plan Type</option>
                                        <option value="1" <?php if($editadvplan['advplan_type']=='1') echo 'selected="selected"'; ?>>Advertisement</option>
                                        <option value="2" <?php if($editadvplan['advplan_type']=='2') echo 'selected="selected"'; ?>>Hot Job</option>

                                    </select>
                                    <div style="color: red;"><?php echo form_error('plan_type'); ?></div>
                                    <input type="hidden" name="selectedplan" class="selectedplan" />
                                    <div style="display:none" id="position">

                                        <select class="form-control droup-down-margin">
                                            <option value="0">Select Position</option>
                                            <option value="1">Web designer</option>
                                            <option value="3">PHP developer</option>
                                            <option value="4">Software developer</option>
                                            <option value="5">Programmer</option>
                                            <option value="6">Web developer</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="span12">
                                <div class="span2">Plan Headline :</div>
                                <div class="span4"><input type="text" placeholder="Enter the Headline" id="advname" name="advname" value="<?php echo $editadvplan['plan_name'];?>" ></div>
                                <div style="color: red;"><?php echo form_error('advname'); ?></div>
                            </div>

                            <div class="span12">
                                <div class="span2">Price :</div>
                                <div class="span4"><input type="text" placeholder="Enter the Price" id="advprice" name="advprice" value="<?php echo $editadvplan['adv_charge'];?>" ></div>
                                <div style="color: red;"><?php echo form_error('advprice'); ?></div>
                            </div>


                            <div class="span8 pull-right">
                                <a class="" href="#"><span class="glyphicon glyphicon-log-in "></span><?php echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-danger')); ?></a></div>
                            <?php echo form_close(); ?>
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


<script type="text/javascript">
    function abc(a){

        if(a==5 || a==6 || a==7)
        {
            $("#position").show();
            $("#plan_headline, #no_of_email, #validity").hide();
        }
        else
        {
            $("#position").hide();
            $("#plan_headline, #no_of_email, #validity").show();
        }
    }

</script>