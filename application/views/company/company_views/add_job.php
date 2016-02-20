<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
    <div class="row">     
        <div class="white-box-right">
            <div class="but-text-color col-lg-12 lg-bottom-mar">
                <i class="fa fa-chevron-left"></i><a class="but-text-color" href="<?php echo base_url()?>employer/all_jobs"> Back to View Job </a>
            </div> 
            <div class="col-xs-12"><h4><?php echo $job_header;?></h4></div>
            <div class="col-lg-2 pull-right text-danger">* <i>Indicates required field</i></div>
            <form action="" method="post" name="add_new_jobs" id="add_new_jobs">
            <div id="regular_jobs">
            <div class="col-xs-12 margin-ten">
                <div class="col-lg-2 col-sm-3 col-xs-3">Job Type</div>
                <div class="col-sm-6 col-xs-5">
                        <label class="radio-inline">
                            <input type="radio" name="job_type" id="job_type_1" checked onClick="manageJobType(this.value)" value="1">Regular
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="job_type" id="job_type_2" onClick="manageJobType(this.value)" value="2">Temporary
                        </label>
                </div>
                </div>
            </div>    
            <div class="col-xs-12 prf-col2"></div>
            <input type="hidden" name="language_name" id="language_name" value="<?php echo $this->input->cookie('lang_cookie'); ?>">
            <!--Add Regular Job Start-->
            <div id="reg"> 
                <div class="col-xs-12 margin-ten"><h4 class="type_jobtitle">&nbsp;</h4></div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Language <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <select class="form-control" name="job_lang" id="job_lang">
                            <option value="">Select Language</option>
                            <option value="0">All</option>
                            <?php foreach($languageCollection as $language){ ?>
                                <option value="<?php echo $language['language_id']; ?>"><?php echo $language['language_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Position<span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text" name="position" id="position" class="form-control tt-query"  placeholder="Enter Job Position" autocomplete="off" spellcheck="false">
                        <ul class="dropdown-menu txtposition search-result" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="Dropdownposition"></ul>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Write any job position like web designer, web developer etc.."></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Description <span class="text-danger">*</span></div>
                    <div class="col-sm-8 col-xs-10"><textarea class="form-control" rows="10" placeholder="Enter Job Description (Max 250 words)" name="job_desc" id="job_desc"></textarea></div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Write the description about job in your words. Maximum length is 250 character."></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Skills <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8"><input type="text" class="form-control" placeholder="Enter more than one skill using comma(,)" name="job_skills" id="job_skills"></div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Write one or more than one skills"></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 margin-ten">Work Experience<span class="text-danger">*</span></div>
                    <div class="col-sm-2 col-xs-3 margin-thirty">
                        <select class="form-control" name="job_wrexp_min" id="job_wrexp_min">
                            <option value="">Min</option>
                            <?php foreach($workExpCollection as $salary){ ?>
                                <option value="<?php echo $salary['id']; ?>"><?php echo $salary['value']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-1 col-xs-2">To</div>
                    <div class="col-sm-2 col-xs-3 margin-thirty">
                        <select class="form-control" name="job_wrexp_max" id="job_wrexp_max">
                            <option value="">Max</option>
                             <?php foreach($workExpCollection as $salary){ ?>
                                <option value="<?php echo $salary['id']; ?>"><?php echo $salary['value']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-1 col-xs-2">In Years</div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select minimum to maximum work experience in years."></span>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Area Of Experience <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <select class="form-control" name="job_area_exp" id="job_area_exp">
                          <option value="" selected="">Select Experience Area</option>
                          <?php
                          foreach($area_experience as $area_expall)
                          {
                        ?>
                            <option value="<?php echo $area_expall['areaofexpid']; ?>"><?php echo $area_expall['areaofexpname_en']; ?></option>
                        <?php
                          }
                            
                          ?>
                        </select>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select area of experience."></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 margin-ten">Salary</div>
                    <div class="col-sm-2 col-xs-3">
                        <select class="form-control" name="job_salary_min" id="job_salary_min">
                            <option value="">Min</option>
                            <?php foreach($salaryMinCollection as $salary){ ?>
                                <option value="<?php echo $salary['id']; ?>"><?php echo $salary['value']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-1">To</div>
                    <div class="col-sm-2 col-xs-3 margin-ten" >
                        <select class="form-control" name="job_salary_max" id="job_salary_max">
                            <option value="">Max</option>
                            <?php foreach($salaryMaxCollection as $salary){ ?>
                                <option value="<?php echo $salary['id']; ?>"><?php echo $salary['value']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select minimum to maximum salary."></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Region or Country <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <select class="form-control" name="job_location" id="job_location">
                            <option value="" selected="selected">Select Country</option>
                            <?php foreach($job_location as $all_country){ ?>
                                <option value="<?php echo $all_country['locationid']; ?>"><?php echo $all_country['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select region or country"></span>
                </div>
                <div class="col-xs-12 margin-ten type_rotation_job">
                    <div class="col-lg-2 col-sm-3 col-xs-3 ">Is this a rotation job</div>
                    <div class="col-sm-4 col-xs-5">
                            <label class="radio-inline">
                                <input type="radio" name="rotation_flag" id="rotation_flag_1" onClick="manageRotationFlag(this.value)" value="1">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rotation_flag" id="rotation_flag_0" checked onClick="manageRotationFlag(this.value)" value="0">No
                            </label>
                    </div>
                </div>
                <div id="on">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3"></div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-7">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 margin-ten"><input type="text" class="form-control" placeholder="on-days" name="job_ondays" id="job_ondays" value=""></div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><input type="text" class="form-control" placeholder="off-days" name="job_offdays" id="job_offdays" value=""></div>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="write working day and leave day"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Number Of Vacancy</div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text" class="form-control" placeholder="Enter No of Vacancy" name="job_vacancy_count" id="job_vacancy_count">
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="write no of vacancy available for job"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Advertisement Opening Date <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text"  data-parsley-id="7618"  class="form-control" placeholder="Select Advertisement Opening Date" name="job_adv_opendate" id="job_adv_opendate" readonly="readonly">
                        <ul id="parsley-id-7618" class="parsley-errors-list"></ul>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select opening day of job"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Advertisement Closing Date <span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text" data-parsley-id="7618"  class="form-control" placeholder="Select Advertisement Closing Date" name="job_adv_closedate" id="job_adv_closedate" readonly="readonly">
                        <ul id="parsley-id-7618" class="parsley-errors-list"></ul>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select closing day of job"></span>
                </div>
                <div class="col-xs-12 margin-ten type_availability_from">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Availability From<span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text"  data-parsley-id="7618" class="form-control" placeholder="Select Available From Date" name="temp_available_from" id="temp_available_from" readonly="readonly">
                        <ul id="parsley-id-7618" class="parsley-errors-list"></ul>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select temporary available date of job"></span>
                </div>
                <div class="col-xs-12 margin-ten type_availability_to">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Availability To<span class="text-danger">*</span></div>
                    <div class="col-sm-5 col-xs-8">
                        <input type="text" data-parsley-id="7618"  class="form-control" placeholder="Select Available To Date" name="temp_available_to" id="temp_available_to" readonly="readonly">
                        <ul id="parsley-id-7618" class="parsley-errors-list"></ul>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select temporary closing date of job"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Qualification</div>
                    <div class="col-sm-5 col-xs-8">
                        <select class="form-control margin-ten" onchange="show_other_qual(this.value)" name="job_qualification"  id="job_qualification">
                            <option value="">Select Qualification</option>
                            <?php foreach($qualificationCollection as $qualificaion){ ?>
                                <option value="<?php echo $qualificaion['qualification_id']; ?>"><?php echo $qualificaion['name']; ?></option>
                            <?php } ?>
                        </select>
                        <div id="qualf_other" style="display:none">
                            <input type="text" class="input-md-width1 form-control" name="other_qual" placeholder="Enter other qualification">
                        </div>
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="select any qualification. For other option you have to write other qualification"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Any Condition</div>
                    <div class="col-sm-8 col-xs-10"><textarea class="form-control" rows="5" placeholder="Enter Condition" name="job_condition" id="job_condition"></textarea></div>
                    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Write condition if any"></span>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Would you like to post it as ?</div>
                    <div class="col-sm-8 col-xs-10">
                        <div class="col-sm-2 col-xs-2 row"><input type="checkbox" name="job_adv_hotjob" id="job_adv_hotjob" value="0"> Hot Job</div>
                        <div class="col-sm-3 col-xs-3"><input type="checkbox" name="job_advertisement" id="job_advertisement" value="0"> Advertisement</div>
                    </div>
                </div>
                <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"> Whether you want to have this job in other language?</div>
                    <div class="col-sm-8 col-xs-10">
                        <div class="col-sm-2 col-xs-2 row">
                            <input type="radio" name="other_lang_opt" id="yes" value="yes"> Yes
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <input type="radio" name="other_lang_opt" id="no" value="no"> No
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-10" id="translate_options" style="display:none;">
                        <div class="col-sm-2 col-xs-2 row">
                            <input type="checkbox" name="translate_yourself" id="yourself" value="yourself"> Yourself
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <input type="checkbox" name="translate_comservice" id="com-service" value="com-service"> Company Service
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-10 margin-ten" id="translang_yourself" style="display:none;">
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="en"> English
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="fr"> French
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="de"> Dutch
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="es"> Spanish
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="chi"> Chinese
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="ru"> Russian
                            </div>
                        </div>    
                        <div class="col-sm-8 col-xs-10 margin-ten" id="mytrans_last">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang[]" class="myself_trans" value="ar"> Arabic
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-8 col-xs-10 margin-ten" id="translang_compserv" style="display:none">
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="en"> English
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="fr"> French
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="de"> Dutch
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="es"> Spanish
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="chi"> Chinese
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="ru"> Russian
                            </div>
                        </div>    
                        <div class="col-sm-8 col-xs-10 margin-ten" id="mytrans_last">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="compserv_lang[]" class="compserv_trans" value="ar"> Arabic
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"> Would you like to translate yourself in other language ?</div>
                    <div class="col-sm-8 col-xs-10">
                        <div class="col-sm-2 col-xs-2 row">
                            <input type="radio" name="tran_lang" onclick="myself_confirm('translang_yes')"> Yes
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <input type="radio" name="tran_lang" onclick="myself_confirm('translang_no')"> No
                        </div>
                    </div> 
                    <div id="translang_yes" style="display:none;">
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="English"> English
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="French"> French
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="Dutch"> Dutch
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-10 margin-ten">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="Spanish"> Spanish
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="Chinese"> Chinese
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="Russian"> Russian
                            </div>
                        </div>    
                        <div class="col-sm-8 col-xs-10 margin-ten" id="mytrans_last">
                            <div class="col-sm-3 col-xs-3">
                                <input type="checkbox" name="mytrans_lang" value="Arabic"> Arabic
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-xs-12 margin-ten">
                    <div class="col-lg-2 col-sm-3 col-xs-12">
                        Would you like to translate in other languages , then charges will apply ?
                    </div>
                    <div class="col-sm-3 col-xs-12 margin-ten">
                        <form role="form">
                            <label class="radio-inline">
                                <input type="radio" onclick="price_fun('show_id')" name="optradio">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" onclick="price_fun('hide_id')" checked="" name="optradio">No
                            </label>
                        </form>
                    </div>
                    <div id="show_id" style="display: block;">
                        <div class="col-lg-2 col-sm-3"></div>
                        <div class="col-xs-10">
                            <input type="checkbox"> English
                            <input type="checkbox"> French
                            <input type="checkbox"> Dutch
                            <input type="checkbox"> Spanish
                            <input type="checkbox"> Chinese
                            <input type="checkbox"> Russian
                            <input type="checkbox"> Arabic
                        </div>
                    </div>
                </div> -->
                <div class="clearfix"></div>
                <div class="col-xs-12">
                    <div class="col-sm-2 col-xs-12"></div>
                    <div class="col-sm-3 col-xs-12">
                        <a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="post_job()">Save</a>
                    </div>
                </div>
            </div>
            </div>
            </form> 
            <!--Add Regular Job end-->
        </div>
    </div>
</div>

<script>
$(document).ready(function()
{
    var language_code = ["en","fr","de","es","chi","ru","ar"];
    var language_detail = ["English","French","Dutch","Spanish","Chinese","Russian","Arabic"];
    $("input[name='other_lang_opt']").on("click",function()
    {
        var other_lang_val = $('input[name="other_lang_opt"]:checked').val();
        if(other_lang_val == 'yes')
        {
            $("#translate_options").show();
            $('input[name="translate_yourself"]').on("click",function()
            {  
                var translate_yourself = $('input[name="translate_yourself"]:checked').val();
                if(translate_yourself == 'yourself')
                {
                    $("#translang_yourself").show();
                }
                else
                {
                    $("#translang_yourself").hide();
                }
                /*if(translate_type == 'com-service')
                {
                    $("#translang_yes").show();
                }
                else
                {
                    $("#translang_yes").hide();
                }*/
            });
            
            $('input[name="translate_comservice"]').on("click",function()
            {  
                var translate_comserv = $('input[name="translate_comservice"]:checked').val();
                if(translate_comserv == 'com-service')
                {
                    $("#translang_compserv").show();
                }
                else
                {
                    $("#translang_compserv").hide();
                }
            });
        }
        else if(other_lang_val == 'no')
        {
            $("#translate_options").hide();
            $("#translang_yes").hide();
        }
    });
});
$(document).ready(function()
{
   //$("#temp_other_lang_opt").click(function()
    $("input[name='temp_other_lang_opt']").on("click",function()
    {
        var temp_other_lang_val = $('input[name="temp_other_lang_opt"]:checked').val();
        if(temp_other_lang_val == 'yes')
        {
            $("#temp_translate_options").show();
            $('input[name="temp_translate_yourself"]').on("click",function()
            {  
                var temp_translate_yourself = $('input[name="temp_translate_yourself"]:checked').val();
                if(temp_translate_yourself == 'yourself')
                {
                    $("#temp_translang_yourself").show();
                }
                else if(temp_translate_type == 'com-service')
                {
                    $("#temp_translang_yes").show();
                }
            });
            
            $('input[name="temp_translate_comservice"]').on("click",function()
            {  
                var temp_translate_comserv = $('input[name="temp_translate_comservice"]:checked').val();
                if(temp_translate_comserv == 'com-service')
                {
                    $("#temp_translang_compserv").show();
                }
            });
        }
        else
        {
            $("#temp_translate_options").hide();
        }
        /*if($("#temp_other_lang_opt").is(":checked"))
        {
            var temp_other_lang_val = $('input[name="temp_other_lang_opt"]:checked').val();
            if(temp_other_lang_val == 'yes')
            {
                $("#temp_translate_options").show();
            }
            else
            {
                $("#temp_translate_options").hide();
            }
        }*/
    }); 
});

$("input[type='checkbox'][class='myself_trans']").click(function() 
{
    if($(this).prop("checked") == true)
    {
        var myinput = $('<div class="col-sm-8 col-xs-10" id="myselflang_'+$(this).val()+'" style="margin-bottom:10px;"><textarea placeholder="Enter description in '+$(this).val()+'" rows="5" class="form-control" name="myselfdesc_'+$(this).val()+'" id="myselfdesc_'+$(this).val()+'" style="margin-bottom:10px;"></textarea><input type="text" class="form-control" name="myselfskill_'+$(this).val()+'" id="myselfskill_'+$(this).val()+'" placeholder="Enter your keyskills in '+$(this).val()+'" style="margin-bottom:10px;"><textarea placeholder="Enter any condition in '+$(this).val()+'" rows="5" class="form-control" name="myselfcondition_'+$(this).val()+'" id="myselfcondition_'+$(this).val()+'" style="margin-bottom:10px;"></textarea></div>');
        $('#mytrans_last').after(myinput);
        myinput.fadeIn('slow');

    }
    else if($(this).prop("checked") == false)
    {
        $("#myselflang_"+$(this).val()).hide();
    }
});

$(document).ready(function()
{
    $("#position").keyup(function()
    {
        $.ajax({
            'url':"<?php echo base_url(); ?>company/Employer_json/get_all_position",
            'type':"post",
            'data':'position_keyword='+$(this).val(),
            'dataType':"JSON",
            success:function(get_pos)
            {
                if(get_pos.length > 0)
                {
                    $('#Dropdownposition').empty();
                    $('#position').attr("data-toggle", "dropdown");
                    $('#Dropdownposition').dropdown('toggle');
                }
                else if(get_pos.length == 0)
                {
                    $('#position').attr("data-toggle", "");
                }
                $.each(get_pos, function (key,value) {
                    if (get_pos.length >= 0)
                    {
                        var position_field = 'positionname_'+$("#language_name").val();
                        $('#Dropdownposition').append('<li role="presentation" class="search-content">' + value[position_field] + '</li>');
                    }
                });
                $('ul.txtposition').on('click', 'li', function () {
                    $('#position').val($(this).text());
                });
            }
        });
         
    });    
});

function post_job() {
    $("#add_new_jobs").submit();
}
$(document).ready(function() {
	// Manage Job Type
	var jobType_flag_status = $('input[name=job_type]:checked').val();
    manageJobType(jobType_flag_status);
	
	// Check Rotation Job
	var rotation_flag_status = $('input[name=rotation_flag]:checked').val();
    manageRotationFlag(rotation_flag_status);
	
    $('#job_adv_hotjob').change(function(){
        if($(this).prop('checked') === true){
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });
    $('#job_advertisement').change(function(){
        if($(this).prop('checked') === true){
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });
	$('#job_adv_closedate').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
    	}, function (start, end, label) {
   });

   $('#job_adv_opendate').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
  	}, function (start, end, slabel) {
  });
  
  $('#temp_available_from').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
    	}, function (start, end, label) {
   });

   $('#temp_available_to').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
  	}, function (start, end, slabel) {
  });
});
function show_other_qual(other_qual) {
  if(other_qual == '4') {
    document.getElementById("qualf_other").style.display="block";     
  } else {
    document.getElementById("qualf_other").style.display="none";  
  }
}

function manageRotationFlag(status) {
	 if(status == '1') { 
      document.getElementById('on').style.display = "block"; 
    } else {
      document.getElementById('on').style.display = "none";
    }
}

function manageJobType(jobType) {	
	if(jobType == '1') { 
		$(".type_availability_from").hide();
		$(".type_availability_to").hide();
		$(".type_rotation_job").show();
		$(".type_jobtitle").html('<?php echo $job_sub_header_regular;?>');
    } else {
		$(".type_availability_from").show();
		$(".type_availability_to").show();
		$(".type_rotation_job").hide();
		$(".type_jobtitle").html('<?php echo $job_sub_header_temp;?>');
    } 
} 
<?php
// Edit Details
if(!empty($edit_details)) {
?>
	$("#job_type_<?php echo $edit_details['job_type'];?>").attr('checked', 'checked');
	$("input[name=job_type]").attr('disabled', 'disabled');
	
	$("#job_lang").val('<?php echo $edit_details['language_id'];?>');
	$("#job_lang").attr('disabled', 'disabled');
	
	$("#position").val('<?php echo $edit_details['position_name'];?>');
	$("#position").attr('disabled', 'disabled');

	$("#job_desc").val('<?php echo $edit_details['job_description'];?>');
	$("#job_skills").val('<?php echo $edit_details['skills'];?>');
	$("#job_wrexp_min").val('<?php echo $edit_details['workexperience_id_min'];?>');
	$("#job_wrexp_max").val('<?php echo $edit_details['workexperience_id_max'];?>');
	$("#job_area_exp").val('<?php echo $edit_details['areaofexpid'];?>');
	$("#job_salary_min").val('<?php echo $edit_details['salary_id_min'];?>');
	$("#job_salary_max").val('<?php echo $edit_details['salary_id_max'];?>');
	$("#job_location").val('<?php echo $edit_details['locationid'];?>');
	$("#rotation_flag_<?php echo $edit_details['rotation_flag'];?>").attr('checked', 'checked');
	$("#job_ondays").val('<?php echo $edit_details['rotation_ondays'];?>');
	$("#job_offdays").val('<?php echo $edit_details['rotation_offdays'];?>');
	$("#job_vacancy_count").val('<?php echo $edit_details['noof_vacancy'];?>');
	$("#job_adv_opendate").val('<?php echo $edit_details['advopening_date'];?>');
	$("#job_adv_closedate").val('<?php echo $edit_details['advclosing_date'];?>');
	$("#temp_available_from").val('<?php echo ($edit_details['job_type'] == '2') ? $edit_details['tempavail_startdate'] : "" ;?>');
	$("#temp_available_to").val('<?php echo ($edit_details['job_type'] == '2') ? $edit_details['tempavail_enddate'] : "" ;?>');
	$("#job_qualification").val('<?php echo $edit_details['qualification_id'];?>');
	$("#job_condition").val('<?php echo $edit_details['job_condition'];?>');
<?php		
}
?> 
</script>