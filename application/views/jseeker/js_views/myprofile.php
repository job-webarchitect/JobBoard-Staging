<div class="col-lg-12 white-box-right">
  <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 profile-dtls">
        <div class="pull-right"> <span class="md-blue-link"><a href="<?=SSO_URL?>/account/users/editprofile"><em>Edit</em></a></span> </div>
        <h4 class="profile-name"> Personal details <br>
        </h4>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="profile-details-ul">
              <li><span>Name:</span> <?=$this->ssofname;?>&nbsp;<?=$this->ssolname;?> </li>
              <li><span>Email:</span> <?=$this->ssoemail;?> <span class="sm-blue-link"><a href="javascript:;"><em class="text-success"><strong>( Verified )</strong></em></a></span></li>
              <li><span>Secondary email:</span> <?php if(trim($jobseeker_profile['alternate_email']) != ''){ echo $jobseeker_profile['alternate_email'];} else { echo '<i>Not Mentioned</i>';} ?> </li>
              <li><span>Secondary Mobile no:</span> <?php if(trim($jobseeker_profile['alternate_mobileno']) != ''){ echo $jobseeker_profile['alternate_mobileno'];} else { echo '<i>Not Mentioned</i>';} ?> </li>
              <li><span>Current location:</span> <?php if(trim($jobseeker_profile['mypresent_locationid']) != ''){ echo $jobseeker_profile['mypresent_locationid'];} else { echo '<i>Not Mentioned</i>';} ?></li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="profile-details-ul">
              <li><span>Date Of Birth:</span> <?=date('d M, Y',strtotime($this->ssodob));?></li>
              <li><span>Gender:</span> <?=ucfirst($this->ssogender);?></li>
              <li><span>Marital Status:</span> <?php if(trim($jobseeker_profile['marital_flg']) == '0') { echo 'Unmarried'; } else { echo 'Married'; } ?></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"> 
        <?php if($this->ssopic != '') {?>
                <img ngf-src="user.editpic" src="<?=SSO_URL?>/image/data/<?=$this->ssopic?>"  width="180" height="190">
              <?php
                }
                else {
                  if($this->ssogender == 'male'){ echo '<img src="'.base_url().'assets/common/images/icon-male.png" width="180" height="190">'; } 
                  if($this->ssogender == 'female'){ echo '<img src="'.base_url().'assets/common/images/icon-female.png" width="180" height="190">'; } 
                }
            ?>
        <div class="change-pic">
          <label><a href="<?=SSO_URL?>/account/users/editprofile" title="You can edit Profile photo from here only"><i class="fa fa-picture-o"></i> Add/Edit Photo</a></label>
        </div>
      </div>
      <div class="col-lg-12 ">
        <ul class="prf-col2-ul pull-left">
          <li>
            <div class="email-label"> +91 - <?=$this->ssocontact?> <span class="sm-blue-link"><a href="#"><em>(Verify Now)</em></a></span> <span class="mail-edit-btn"><a href="#"><i class="fa fa-pencil"></i></a></span> <span>|</span> </div>
          </li>
          <li>
            <?php 
              if(strtotime($jobseeker_profile['tempavailable_from']) > strtotime(date('Y-m-d')) || strtotime($jobseeker_profile['tempavailable_from']) > strtotime(date('Y-m-d'))){ 
            ?> <div class="email-label text-success"> <strong> Your Temporary job status is active </strong> </div>
            <?php  
              }
              else{
            ?>
              <div class="email-label text-danger"> <strong> Your Temporary job status is deactive </strong> <span class="sm-blue-link"><a href="<?=base_url()?>myjobs/temp_availibility" target="_self"><em>(Click to activate)</em></a></span></div>
            <?php
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
</div>
<!-- ./pesonal details-->

      <!-- Educational Details-->
      <div class="col-lg-12 white-box-right">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <h4 class="profile-name">Educational Details</h4>
            <div class="prf-col2"></div>
            <div class="pull-right" id="Degree-edit-btn" style="display: block;"> <span class="md-blue-link"><a onclick="hide_status('Degree-details','Degree-edit-btn', 'Degree-edit');" href="javascript:void(0);"><em>Edit</em></a></span> </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="Degree-details" style="display: block;">
                <ul class="profile-details-ul">
                  <li><span>Degree : </span> <label id="selected_edu"><?php if(strtolower($jobseeker_profile['education']) == 'other') {echo $jobseeker_profile['edu_other'];} else { echo $this->lang->line('text_'.strtolower($jobseeker_profile['education']));}?> </label></li>
                </ul>
              </div>
              <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="Degree-edit">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Degree<span class="text-danger">*</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
                  <div class="col-lg-8 ">
                      <select id='myeducation' ng-model="education.degree" ng-init="education.degree = <?php echo '\''.$jobseeker_profile['education'].'\'';?>" name="degree" class="form-control lg-bottom-mar" >
                        <option value="">Select Degree</option>
                        <option value="PG"><?php echo $this->lang->line('text_pg');?></option>
                        <option value="GD"><?php echo $this->lang->line('text_gd');?></option>
                        <option value="UG"><?php echo $this->lang->line('text_ug');?></option>
                        <option value="OTHER"><?php echo $this->lang->line('text_other');?></option>
                      </select>
                      <div ng-show="education.degree == 'OTHER'">
                        <input type="text" class="input-md-width1 form-control" ng-model="education.other_qual" name="other_qual" ng-init="education.other_qual = <?='\''.$jobseeker_profile['edu_other'].'\''?>" placeholder="Enter other degree">
                      </div>
                      <div class="lg-bottom-mar"></div>
                      <div class="alert alert-danger text-danger" ng-show="err_deg">
                        <span>{{err_deg_text}}</span>
                      </div>
                  </div>

                  <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Degree"></span>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <a ng-click="update_degree();" href="javascript:void(0);" class="btn Secondy-btn ad-apply-btn ">Save</a> 
                  <a onclick="show_status('Degree-details','Degree-edit-btn','Degree-edit');" href="javascript:void(0);" class="btn Secondy-btn ad-apply-btn ">Cancel</a></div>
                  <!--ng-click="education.degree = <?php echo '\''.$jobseeker_profile['education'].'\'';?>"-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ./Educational Details-->

      <!-- Work Experience Details-->
      <div class="col-lg-12 white-box-right">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <h4 class="profile-name">Work Experience Details <br>
            </h4>
            <div class="prf-col2"></div>
            <div class="row">
              <div id="work-exe-edit-btn" class="pull-right right20" style="display: block;"> <span class="md-blue-link"><a href="javascript:void(0);" onclick="hide_status('work-exe-details','work-exe-edit-btn', 'work-exe-edit');"><em>Edit</em></a></span> </div>
              <div id="work-exe-details" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: block;">
                <ul class="profile-details-ul">
                  <li><span> Total experience in industry :</span>  <label id="ind_exp"><?=$jobseeker_profile['industry_exp']?> <label> Year(s)</li>
                  <li><span> Present company  :</span>              <label id="pre_cmp"><?=ucfirst($jobseeker_profile['present_company'])?><label></li>
                  <li><span> Experience in present company :</span> <label id="prc_exp"><?=$jobseeker_profile['present_company_exp']?> <label>Year(s)</li>
                  <?php $current_position =  $this->mdl_general->search_position(trim($jobseeker_profile['current_position'])); ?>
                  <li><span>Position in present company:</span>     <label id="cur_pos"> <?php if(trim($jobseeker_profile['current_position']) != '') { echo $current_position['positionname_'.$this->lang_code]; } else { echo '<i>Not Mentioned</i>'; } ?> <label></li>
                  <li><span>Salary in present company:</span>       <label id="cur_sal"> <?php if(trim($jobseeker_profile['current_salary']) != '') { echo $jobseeker_profile['current_sal_curr']." ".$jobseeker_profile['current_salary']; } else { echo '<i>Not Mentioned</i>'; } ?> <label></li>
                </ul>
                <div class="prf-col2"></div>
              </div>
              <!--EDIT Work Experience Details-->
              <div id="work-exe-edit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;">
              <div class="col-xs-12 lg-bottom-mar">
              <div class="pull-right col-xs-3 text-danger row"><b>*<i>indicates required fields</i></b></div>
              </div>
                <form>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width">Total experience in industry <span class="text-danger">*</span></div>
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-9 input-box-width">
                    <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
                     <select ng-model="work.totalexp" name="totalexp" ng-init="work.totalexp = <?='\''.$jobseeker_profile['industry_exp'].'\''?>" class="form-control lg-bottom-mar">
                        <option value="">Total experience(In Year) </option>
                        <?php for($i=0;$i<=65;$i++) {?>
                        <option value="<?=$i;?>"> <?=$i;?> </option>
                        <?php } ?>
                      </select>
                    </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Total experience in industry"></span>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width"> Present company<span class="text-danger">*</span></div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9  input-box-width">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                      <input type="text" class="form-control lg-bottom-mar" ng-model="work.presentcmpny" name="presentcmpny" placeholder="Enter Present Company" ng-init="work.presentcmpny = <?='\''.$jobseeker_profile['present_company'].'\'';?>">
                    </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Enter Present Company"></span>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width"> Experience in present company <span class="text-danger">*</span></div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9  input-box-width">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <select ng-model="work.pexp" name="pexp" ng-init="work.pexp = <?='\''.$jobseeker_profile['present_company_exp'].'\''?>" class="form-control lg-bottom-mar">
                        <option value="">Present company experience(In Year) </option>
                        <?php for($i=0;$i<=65;$i++) {?>
                        <option value="<?=$i;?>"> <?=$i;?> </option>
                        <?php } ?>
                      </select>
                      
                    </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Experience in present company"></span>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width"> Position in present company <span class="text-danger">*</span></div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                    <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
                      <select class="form-control" id="pposition" ng-model="work.pposition" ng-init="work.pposition = <?='\''.$jobseeker_profile['current_position'].'\''?>" name="pposition" required>
                        <option value="">Select present position</option>
                        <?php 
                        $data_str = '';
                        foreach ($position_result as $pkey => $p_value) {
                            $data_str .="<option  class='ng-scope ng-binding' value=".$p_value['pid'].">".$p_value['position']."</option>";
                        }
                        echo $data_str;
                        ?>
                      </select> 
                    </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Position in present company"></span>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width"> Salary in present company</div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select class="form-control " ng-model="work.pcurrency" name="pcurrency" ng-init="work.pcurrency = <?='\''.trim($jobseeker_profile['current_sal_curr']).'\''?>">
                        <option value=""> Currency </option>
                        <option value="EUR">(&#128;) EUR </option>
                        <option value="Pound">(&#163;) Pound</option>
                        <option value="Franc">(&#8355;) Franc</option>
                        <option value="USD">(&#36;) USD</option>
                        <option value="INR">(&#x20B9;) INR</option>
                        <option value="YEN">(&#165;) YEN</option>
                      </select>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                      <input type="text" class="form-control lg-bottom-mar" ng-model="work.pcurrent_sal" name="pcurrent_sal" placeholder="Enter current salary" ng-init="work.pcurrent_sal = <?='\''.trim($jobseeker_profile['current_salary']).'\''?>">
                    </div>
                    <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select  Salary in present company"></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="alert alert-danger text-danger" ng-show="err_work">
                        <span>{{err_work_text}}</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 text-center">
                    <a class="Secondy-btn ad-apply-btn" href="javascript:void(0);" ng-click="update_workexp()">Save</a>
                    <a class="Secondy-btn ad-apply-btn" href="javascript:void(0);" onclick="show_status('work-exe-details','work-exe-edit-btn','work-exe-edit');">Cancel</a>
                  </div>
                </form>
              </div>
              <!-- ./EDIT Work Experience Details--> 
            </div>
          </div>
        </div>
      </div>

      <!-- Certificate Details-->
      <div class="col-lg-12 white-box-right">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <div id="Certificate-detail-1"></div>
            <h4 class="profile-name">Certificate Details <br>
            </h4>
            <div class="prf-col2"></div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form>
                  <ul class="profile-details-ul">
                    <div id="Certificate-1" class="pull-right"> <span class="md-blue-link"><a href="javascript:void(0)" onclick="hide_status('Certificate-1','Certificate-1-detail', 'Certificate-1-edit')"><em>Edit</em></a></span> </div>
                     
                   
                    <li id="Certificate-1-detail">
                      
                     &#10003; Diploma in computer application<span class="pull-right col-lg-7"><b> Expired on :</b> 05/05/2015</span></li>
                      
                      <li style="display: none;" id="Certificate-1-edit" class="input-box clra-width">
                      
                      <span class="col-md-12 clearfix row"><span class="col-md-12 lg-bottom-mar row"> <input type="checkbox" name="Terms_Conditions" id="Terms_Conditions" checked="true"> Diploma in computer application</span>   
                      <span class="col-md-2 row">Expired on  </span>
                      <input type="text" name="resnew-file" id="resnew-file "><span><img data-original-title=" Please Enter Expired date " title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span> 
                      <div class="lg-bottom-mar"><div> <a onclick="show_status('Certificate-1-detail','Certificate-1', 'Certificate-1-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Save</a> <a onclick="show_status('Certificate-1-detail','Certificate-1', 'Certificate-1-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Cancel</a></div></div></span>
                    </li>
                    
                    
                    <div id="Certificate-2" class="pull-right"></div>
                    <li id="Certificate-2-detail">
                      <input type="checkbox" name="Terms_Conditions" id="Terms_Conditions" class="md-blue-link" href="javascript:void(0)" onclick="hide_status('Certificate-2','Certificate-2-detail', 'Certificate-2-edit')">
                       Diploma in computer application
                      <li style="display: none;" id="Certificate-2-edit" class="input-box clra-width">
                      
                      <span class="col-md-12 clearfix row"><span class="col-md-12 lg-bottom-mar row"> <input type="checkbox" name="Terms_Conditions" id="Terms_Conditions" checked="true"> Diploma in computer application</span>   
                       <span class="col-md-2 row">Expired on  </span>
                      <input type="text" name="resnew-file" id="resnew-file "><span><img data-original-title=" Please Enter Expired date " title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>  
                      <div class="lg-bottom-mar"><div> <a onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Save</a> <a onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Cancel</a></div></div></span>
                    </li>
                      
                      </li>
                      
                    <div id="Certificate" class="pull-right"> <span class="md-blue-link"><a href="javascript:void(0)" onclick="hide_status('Certificate','Certificate-detail', 'Certificate-edit')"><em>Edit</em></a></span> | <span class="md-blue-link"><a href="javascript:void(0)"><em>Delete</em></a></span> </div>
                    <li id="Certificate-detail"><span>Certificate 1:</span>Diploma in computer application<span class="pull-right col-lg-6" href="javascript:vode(0)"><b> Expired on :</b> 05/05/2015</span></li>
                    
                    <li class="input-box-width" id="Certificate-edit" style="display:none;">    <span class="col-md-2 row">Certificate </span>
                      <input type="text" name="resnew-file" id="resnew-file "><span><img data-original-title=" Please Enter certificate Name" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span> 
                      <div class="input-box-width"> <a onclick="show_status('Certificate-detail','Certificate', 'Certificate-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Save</a> <a onclick="show_status('Certificate-detail','Certificate', 'Certificate-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Cancel</a></div>
                    </li>
                   
                     <li style="display: none;" id="Certificate-edit-1" class="input-box-width">
                       <span class="col-md-2 row">Certificate 3 :  </span>
                      <input type="text" name="resnew-file" id="resnew-file "><span><img data-original-title=" Please Add certificate detail" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>  
                      
                      <div class="input-box-width"> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-detail-1','Certificate-1', 'Certificate-edit-1');">Save</a> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-detail-1','Certificate-1', 'Certificate-edit-1');">Cancel</a></div>
                    </li>
                    <span class="md-blue-link" id="Certificate-1"><a href="javascript:void(0)" onclick="hide_status('Certificate-edit-1','Certificate-detail-1', 'Certificate-edit-1')"><em>Add certificate detail</em></a></span>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ./Certificate Details-->
      
      <div class="col-lg-12 white-box-right"><!-- Resume Details-->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <h4 class="profile-name">Resume Details <br>
            </h4>
            <div class="prf-col2"></div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="profile-details-ul">
                  <div id="res1" class="pull-right"> <span class="md-blue-link"><a href="javascript:void(0)" onclick="hide_status('res1','res1-detail', 'res1-edit')"><em>Edit</em></a></span> </div>
                  <li id="res1-detail"><span>Resume:</span><a href="javascript:vode(0)" id="resume_id"><?=$jobseeker_profile['resume']?></a> <a href="<?=base_url()?>myjobs/myresume" target="_blank" class="but-text-color">(View resume)</a></li>
                  <form name="uploadresume" id="uploadresume" enctype="multipart/form-data">
                  <li style="display: none;" id="res1-edit" class="col-lg-12 row">
                    <div class="col-lg-12"><span>Upload Resume</span></div>
                    <div class="col-lg-3 lg-bottom-mar">
                      <input type="file" id="res1-file" name="res1-file">
                    </div>
                    <div class="col-lg-8">Maximum file size upto 5 MB (.doc, .docx, .pdf files allow to upload)</div>
                    <div class="clearfix"> </div>
                    <div class="alert alert-danger" id="err_file" style="display:none;"> </div>
                    <div class="clearfix"> </div>
                    <div class="pill-left col-lg-12">
                    <input type="submit" class="Secondy-btn ad-apply-btn" value="Upload Resume">
                    <input type="hidden" id="old_file_name" name="old_file_name" value="<?=$jobseeker_profile['resume']?>">
                    <a class="Secondy-btn ad-apply-btn " href="javascript:void(0);" onclick="show_status('res1-detail','res1', 'res1-edit');">Cancel</a> </div>
                  </li>
                  </form>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ./ Resume Details-->
      
      <div class="col-lg-12 white-box-right"><!-- Work Other Details-->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <h4 class="profile-name">Other Details <br>
            </h4>
            <div class="prf-col2"></div>
            <div class="row">
              <div class="pull-right right20" id="Other-edit-btn" style="display: block;"> <span class="md-blue-link"><a href="javascript:void(0);" onclick="hide_status('Other-details','Other-edit-btn', 'Other-edit');"><em>Edit</em></a></span> </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="Other-details" style="display: block;">
                <ul class="profile-details-ul">
                  <li><span>Positions Applied:</span>   <label id="papplied_id"><?php if(isset($jobseeker_position_applied[0])) {echo $jobseeker_position_applied[0]['position'];} ?>, <?php if(isset($jobseeker_position_applied[1])) { echo $jobseeker_position_applied[1]['position'];}?>, <?php if(isset($jobseeker_position_applied[2])) { echo $jobseeker_position_applied[2]['position'];} ?> </label></li>
                  <?php $area_name =  $this->mdl_position->get_area_exp_name($this->lang_code,trim($jobseeker_profile['areaofexp'])); ?>
                  <li><span>Area of experience: </span> <label id="area_exp_id"><?php if(trim($jobseeker_profile['areaofexp']) != '' && isset($area_name[0]['area_exp_name'])) { echo $area_name[0]['area_exp_name']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Expected Salary:</span>     <label id="exp_sal_id"><?php if(trim($jobseeker_profile['expected_salary']) != '') { echo $jobseeker_profile['expected_sal_curr']." ".$jobseeker_profile['expected_salary']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Skills:</span>              <label id="skill_id"><?php if(trim($jobseeker_profile['skills']) != '') { echo $jobseeker_profile['skills']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Notice Period:</span>       <label id="np_id"><?=$jobseeker_profile['notice_period']?> day(s)</li>
                  <li><span>Would you like to display your present company name: </span> <label id="cmpny_id"><?php echo ($jobseeker_profile['display_companyname'] == 1) ? 'Yes': 'No';?> </label></li>
                  <li><span>Would you like to display your  name:</span>                 <label id="name_id"><?php echo ($jobseeker_profile['displayname'] == 1) ? 'Yes': 'No';?> </label></li>
                  <li><span>Passport #: </span>         <label id="psport_id"><?php if(trim($jobseeker_profile['passport_no']) != '') { echo $jobseeker_profile['passport_no']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Do you have Membership: </span> <label id="mem_id"> <?php echo ($jobseeker_profile['membership_status'] == 1) ? 'Yes, '.$jobseeker_profile['membership_desc'] : 'No';?> </label></li>
                  <li><span>Any condition: </span>      <label id="cond_id"> <?php if(trim($jobseeker_profile['condition']) != '') { echo $jobseeker_profile['condition']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Brief note: </span>         <label id="brfn_id"> <?php if(trim($jobseeker_profile['brief_note']) != '') { echo $jobseeker_profile['brief_note']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                </ul>
              </div>
              <!--EDIT Other Details-->
              <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="Other-edit">
              <div class="col-xs-12 lg-bottom-mar">
              <div class="pull-right col-xs-3 text-danger row"><b>*<i>indicates required fields</i></b></div>
              </div>  
                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Positions Applied<span class="text-danger"> *</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                  <div class="col-lg-8">
                      <select class="form-control" multiple id="eposition" ng-model="other.eposition" name="eposition" ng-init="work.eposition = <?='\''.$jobseeker_profile['current_position'].'\''?>" required>
                        <option value="">Select present position</option>
                        <?php 
                        $data_str = '';
                        foreach ($position_result as $pkey => $p_value) {
                            $data_str .="<option  class='ng-scope ng-binding' value=".$p_value['pid'].">".$p_value['position']."</option>";
                        }
                        echo $data_str;
                        ?>
                      </select> 
                    <input type="text" style="display:none;" id="Other-inst-other" name="Other-inst-other" class="form-control lg-bottom-mar">
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Positions"></span>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Area Of Experience<span class="text-danger"> *</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                  <div class="col-lg-8">
                      <select class="form-control" id="area_id" ng-model="other.area_exp" name="area_exp" ng-init="other.area_exp = <?='\''.$jobseeker_profile['areaofexp'].'\''?>">
                          <option value=""><?php echo $this->lang->line('text_op_areaexp');?></option>
                          <?php 
                          $data_str = '';
                          foreach ($area_exp as $akey => $a_value) {
                              $data_str .="<option  class='ng-scope ng-binding' value=".$a_value['areaid'].">".$a_value['area_exp_name']."</option>";
                          }
                          echo $data_str;
                          ?>
                      </select>
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Area of experience"></span>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Expected Salary</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <select class="form-control" id="ecurrency_id" ng-model="other.ecurrency" name="ecurrency" ng-init="other.ecurrency = <?='\''.trim($jobseeker_profile['expected_sal_curr']).'\''?>">
                        <option value=""> Currency </option>
                        <option value="EUR">(&#128;) EUR </option>
                        <option value="Pound">(&#163;) Pound</option>
                        <option value="Franc">(&#8355;) Franc</option>
                        <option value="USD">(&#36;) USD</option>
                        <option value="INR">(&#x20B9;) INR</option>
                        <option value="YEN">(&#165;) YEN</option>
                    </select>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <input type="text" placeholder="Enter expected salary" ng-model="other.esalary" name="other.esalary" ng-init="other.esalary = <?='\''.trim($jobseeker_profile['expected_salary']).'\''?>" class="form-control lg-bottom-mar">
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Enter Expected Salary"></span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width"> Skills</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
                  <div class="col-lg-8">
                    <textarea class="form-control" placeholder=" skills" ng-model="other.skill" name="skill" ng-init="other.skill = <?='\''.$jobseeker_profile['skills'].'\''?>" rows="8" required=""></textarea>
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Any  Enter Skills"></span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Notice Period<span class="text-danger"> *</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
                  <div class="col-lg-8">
                    <select ng-model="other.notice_period" name="notice_period" ng-init="other.notice_period = <?='\''.$jobseeker_profile['notice_period'].'\''?>" class="form-control lg-bottom-mar">
                      <option value="0">Select Notice Period </option>
                      <?php for($i=1;$i<=100;$i++) {?>
                      <option value="<?=$i;?>">
                      <?=$i;?>
                      </option>
                      <?php } ?>
                    </select>
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Notice Period"></span>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Would you like to display your present company name<span class="text-danger"> *</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
                  <div class="col-lg-8" ng-init="other.company_display = <?='\''.$jobseeker_profile['display_companyname'].'\''?>">
                    <label> <input type="radio" name="company_display" ng-model="other.company_display" value="1"> Yes </label>
                    <label> <input type="radio" name="company_display" ng-model="other.company_display" value="0"> No </label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Would you like to display your name<span class="text-danger"> *</span></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
                  <div class="col-lg-8" ng-init="other.name_display = <?='\''.$jobseeker_profile['displayname'].'\''?>">
                    <label> <input type="radio" name="name_display" ng-model="other.name_display" value="1"> Yes </label>
                    <label> <input type="radio" name="name_display" ng-model="other.name_display" value="0"> No </label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Passport #</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <input type="text" ng-model="other.passport" name="passport" placeholder="Enter passport #" ng-init="other.passport = <?='\''.$jobseeker_profile['passport_no'].'\''?>" class="form-control ">
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Enter Passport No"></span>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Do you have Membership</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
                  <div class="col-lg-8" ng-init="other.memstatus = <?='\''.$jobseeker_profile['membership_status'].'\''?>">
                    <label> <input type="radio" name="memstatus" ng-model="other.memstatus" value="1"> Yes </label>
                    <label> <input type="radio" name="memstatus" ng-model="other.memstatus" value="0"> No </label>
                    <input ng-show="other.memstatus == '1'" type="text" class="form-control lg-bottom-mar" ng-model="other.membership_desc" name="membership_desc" ng-init="other.membership_desc = <?='\''.$jobseeker_profile['membership_desc'].'\''?>" placeholder="Enter Membership Details">
                  </div><span><img data-original-title="If you have Membership details then click yes and enter Mwmbership details" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Any condition</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <textarea ng-model="other.condition" name="condition" placeholder=" Enter condition if any (max 30 words)" rows="5" class="form-control" ng-init="other.condition = <?='\''.trim($jobseeker_profile['condition']).'\''?>"></textarea>
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Enter Any condition (max 30 words)"></span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width"> Brief note</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <textarea ng-model="other.briefnote" name="briefnote"  placeholder="Brief note if any (max 50 words)" rows="5" class="form-control" ng-init="other.briefnote = <?='\''.trim($jobseeker_profile['brief_note']).'\''?>"></textarea>
                  </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Any  Enter Brief note (max 50 words)"></span>
                </div>
                <div class="clearfix"></div>
                <div class="alert alert-danger text-danger" ng-show="err_other">
                      <span>{{err_other_text}}</span>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <a class="Secondy-btn ad-apply-btn " href="javascript:void(0);" ng-click="update_other()">Save</a>
                  <a class="Secondy-btn ad-apply-btn " href="javascript:void(0);" onclick="show_status('Other-details','Other-edit-btn','Other-edit');">Cancel</a>
                </div>
              </div>
              <!-- ./EDIT Other Details--> 
              
            </div>
          </div>
        </div>
      </div>
      <!-- ./work Other Details-->
      
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- ./ right part--> 
  
</div>
</div>
<script type="text/javascript">
  function hide_status(hide_id, hide_me, show_id){
    document.getElementById(hide_id).style.display = "none";
    document.getElementById(hide_me).style.display = "none";
    document.getElementById(show_id).style.display = "block";    
  } 
  function show_status(show_id, show_link, hide_id){
    document.getElementById(hide_id).style.display = "none";
    document.getElementById(show_link).style.display = "block";
    document.getElementById(show_id).style.display = "block";    
  }
</script>