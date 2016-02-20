<div class="col-lg-12 white-box-right">
      <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 profile-dtls">
            <div class="pull-right"> <span class="md-blue-link"><a href="<?=SSO_URL?>/account/users/editprofile"><em>Edit</em></a></span> </div>
            <h4 class="profile-name">Personal details <br>
            </h4>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="profile-details-ul">
                  <li><span>Name:</span> <?=$this->ssofname;?>&nbsp;<?=$this->ssolname;?> </li>
                  <li><span>Available:</span> <?=date('m-d-Y',strtotime($jobseeker_profile['tempavailable_from']))?> - <?=date('m-d-Y',strtotime($jobseeker_profile['tempavailable_to']))?></li>
                  <li><span>Positions Applied:</span> <?php if(isset($jobseeker_position_applied[0])) {echo $jobseeker_position_applied[0]['position'];} ?>, <br/> <?php if(isset($jobseeker_position_applied[1])) { echo $jobseeker_position_applied[1]['position'];}?>, <br/> <?php if(isset($jobseeker_position_applied[2])) { echo $jobseeker_position_applied[2]['position'];} ?></li>
                  <?php $area_name =  $this->mdl_position->get_area_exp_name($this->lang_code,trim($jobseeker_profile['areaofexp'])); ?>
                  <li><span>Area experience:</span> <?php if(trim($jobseeker_profile['areaofexp']) != '' && isset($area_name[0]['area_exp_name'])) { echo $area_name[0]['area_exp_name']; } else { echo '<i>Not Mentioned</i>'; } ?></li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="profile-details-ul">
                  <li><span>Date Of Birth:</span> <?=date('d M, Y',strtotime($this->ssodob));?></li>
                  <li><span>Gender:</span> <?=ucfirst($this->ssogender);?></li>
                  <li><span>Marital Status:</span> <?php if($this->ssomstatus == '0') { echo 'Unmarried'; } else { echo 'Married'; } ?></li>
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
                <div class="email-label"><?=$this->ssoemail;?> <span class="sm-blue-link"><a href="javascript:;"><em class="text-success"><strong>( Verified )</strong></em></a></span> <!--<span class="mail-edit-btn"><a href="#"><i class="fa fa-pencil"></i></a></span>--> </div>
            </li>
          <li>
            <div class="email-label"> +91- <span class="sm-blue-link"><a href="#"><em>(Verify Now)</em></a></span> <span class="mail-edit-btn"><a href="#"><i class="fa fa-pencil"></i></a></span> <span>|</span> </div>
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
      
      <div class="col-lg-12 white-box-right"><!-- Educational Details-->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
            <h4 class="profile-name">Temporary Job details <br>
            </h4>
            <div class="prf-col2 col-xs-12"></div>
            <!-- tem details-->
            <div class="pull-right" id="tem-edit-btn" style="display: block;"> <span class="md-blue-link"><a onclick="hide_status('tem-details','tem-edit-btn', 'tem-edit');" href="javascript:void(0);"><em>Edit</em></a></span> </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tem-details" style="display: block;">
                <ul class="profile-details-ul">
                    <?php if($jobseeker_profile['tempavailable_from'] == '0000-00-00' || $jobseeker_profile['tempavailable_to'] == '0000-00-00'){
                      echo "<li id='temp_avalil_id'><span>Availablity: </span><label><i>Not Mentioned</i></label></li>";
                    } else {
                    ?>
                    <li id='temp_avalil_id'>
                    <span>Available From: </span>
                    <label><?=date('m-d-Y',strtotime($jobseeker_profile['tempavailable_from']))?></label>
                    <span> - Available Till: </span>
                    <label><?=date('m-d-Y',strtotime($jobseeker_profile['tempavailable_to']))?></label>
                    </li>
                    <?php } ?>
                  <li><span>Positions Applied: </span> <?php if(isset($jobseeker_position_applied[0])) {echo $jobseeker_position_applied[0]['position'];} ?>, <?php if(isset($jobseeker_position_applied[1])) { echo $jobseeker_position_applied[1]['position'];}?>, <?php if(isset($jobseeker_position_applied[2])) { echo $jobseeker_position_applied[2]['position'];} ?></li>
                  <li><span>Area of experience: </span>   <label id="area_expid"><?php if(trim($jobseeker_profile['areaofexp']) != '' && isset($area_name[0]['area_exp_name'])) { echo $area_name[0]['area_exp_name']; } else { echo '<i>Not Mentioned</i>'; } ?> </label></li>
                  <li><span>Expected Salary: </span>      <label id="e_salid"><?php if(trim($jobseeker_profile['expected_salary']) != '') { echo $jobseeker_profile['expected_sal_curr']." ".$jobseeker_profile['expected_salary']; } else { echo '<i>Not Mentioned</i>'; } ?></label></li>
                  <?php $country_name = $this->mdl_position->get_country_name($this->lang_code ,$jobseeker_profile['mypresent_locationid']);?>
                  <li><span>My Present location:</span>   <label id="mypre_locid"><?php if(trim($country_name['location']) != ''){ echo $country_name['location'];} else { echo '<i>Not Mentioned</i>';} ?></label></li>
                  <li><span>Any condition: </span>        <label id="temp_condid"><?php if(trim($jobseeker_profile['temp_condition']) != '') { echo $jobseeker_profile['temp_condition']; } else { echo '<i>Not Mentioned</i>'; } ?></label></li>
                  <li><span>Brief note: </span>           <label id="temp_briefid"><?php if(trim($jobseeker_profile['temp_briefnote']) != '') { echo $jobseeker_profile['temp_briefnote']; } else { echo '<i>Not Mentioned</i>'; } ?></label></li>
                  <li><span>Secondary Email: </span>      <label id="alt_emailid"><?php if(trim($jobseeker_profile['alternate_email']) != ''){ echo $jobseeker_profile['alternate_email'];} else { echo '<i>Not Mentioned</i>';} ?></label></li>
                  <li><span>Secondary Mobile no:</span>   <label id="alt_mobid"><?php if(trim($jobseeker_profile['alternate_mobileno']) != ''){ echo $jobseeker_profile['alternate_mobileno'];} else { echo '<i>Not Mentioned</i>';} ?> </label></li>
                </ul>
              </div>
              <div style="display: none;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tem-edit">
              <form>
              <div class="col-xs-12 lg-bottom-mar">
                <div class="pull-right col-xs-3 text-danger row"><b>*<i>indicates required fields</i></b></div>
              </div>
              <div class="clearfix"></div>
                <div class="col-xs-3 input-box-width"> Available<span class="text-danger">*</span></div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar ">
                  <div class="col-xs-2 input-box-width">From date</div>
                  <div class=" col-xs-7 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" ng-model="temp.avail_date_from" ng-init="temp.avail_date_from = <?php echo ($jobseeker_profile['tempavailable_from'] != '0000-00-00') ? '\''.date('m/d/Y', strtotime($jobseeker_profile['tempavailable_from'])).'\'' : '\'\'';?>" class="form-control input-md-width1 date_started" data-parsley-id="7618">
                  </div>
                  <div class="col-xs-2 input-box-width">Till date</div>
                  <div class="col-xs-7 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" ng-model="temp.avail_date_till" ng-init="temp.avail_date_till = <?php echo ($jobseeker_profile['tempavailable_to'] != '0000-00-00') ? '\''.date('m/d/Y', strtotime($jobseeker_profile['tempavailable_to'])).'\'' : '\'\'';?>" class="form-control input-md-width1 date_started" data-parsley-id="7618">
                  </div><span><img data-original-title="Select or enter temporary availability date" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                
                <div class="col-xs-3 input-box-width"> Positions Applied</div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <select class="form-control" multiple id="eposition" ng-model="temp.eposition" name="eposition" ng-init="temp.eposition = <?='\''.$jobseeker_profile['current_position'].'\''?>" required>
                        <?php 
                          $data_str = '';
                          foreach ($position_result as $pkey => $p_value) {
                              $data_str .="<option  class='ng-scope ng-binding' value=".$p_value['pid'].">".$p_value['position']."</option>";
                          }
                          echo $data_str;
                        ?>
                      </select> 
                    <input type="text" style="display:none;" id="tem-course-other" name="tem-course-other" class="lg-bottom-mar form-control">
                  </div><span><img data-original-title=" Please Select Positions" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                
                 <div class="col-xs-3 input-box-width"> Area of Experience<span class="text-danger">*</span></div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <select class="form-control" id="area_id" ng-model="temp.area_exp" name="area_exp" ng-init="temp.area_exp = <?='\''.$jobseeker_profile['areaofexp'].'\''?>">
                          <option value=""><?php echo $this->lang->line('text_op_areaexp');?></option>
                          <option value="0"><?php echo $this->lang->line('text_op_all');?></option>
                          <?php 
                          $data_str = '';
                          foreach ($area_exp as $akey => $a_value) {
                              $data_str .="<option  class='ng-scope ng-binding' value=".$a_value['areaid'].">".$a_value['area_exp_name']."</option>";
                          }
                          echo $data_str;
                          ?>
                      </select>
                    
                  </div><span><img data-original-title=" Please Select Area of Experience" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                <div class="col-xs-3 input-box-width">Expected Salary</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select class="form-control " ng-model="temp.ecurrency" name="ecurrency" ng-init="temp.ecurrency = <?='\''.trim($jobseeker_profile['expected_sal_curr']).'\''?>">
                  <option value=""> Currency </option>
                  <!-- <option value="Dinar">Dinar</option> -->
                  <option value="EUR">(&#128;) EUR </option>
                  <option value="Pound">(&#163;) Pound</option>
                  <option value="Franc">(&#8355;) Franc</option>
                  <option value="USD">(&#36;) USD</option>
                  <option value="INR">(&#x20B9;) INR</option>
                  <!-- <option value="CNY">CNY</option> -->
                  <option value="YEN">(&#165;) YEN</option>
                </select>
                
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
              <input type="text" class="form-control lg-bottom-mar" ng-model="temp.esalary" name="esalary" ng-init="temp.esalary = <?='\''.trim($jobseeker_profile['expected_salary']).'\''?>" placeholder="Enter current salary">
            </div>
            <span><img data-original-title=" Please Select Expected Salary" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
            </div>
                <div class="col-xs-3 input-box-width"> My present location <span class="text-danger">*</span></div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <select class="form-control" id="mypre_locationid" ng-model="temp.mypre_location" ng-init="temp.mypre_location = <?='\''.$jobseeker_profile['mypresent_locationid'].'\''?>">
                      <option value="">Select Country </option>
                      <?php 
                      $data_str = '';
                      foreach ($country_location as $ckey => $c_value) {
                        $data_str .="<option class='ng-scope ng-binding' value=".$c_value['lid'].">".$c_value['location']."</option>";
                      }
                      echo $data_str;
                      ?>
                    </select>
                  </div><span><img data-original-title=" Please Select present location" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                
                <div class="col-xs-3 input-box-width">Any condition</div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <textarea class="form-control" rows="5" placeholder="Enter condition if any (max 30 words)" ng-model="temp.condition" name="condition" ng-init="temp.condition = <?='\''.trim($jobseeker_profile['temp_condition']).'\''?>"></textarea>  
                  </div><span><img data-original-title=" Enter condition if any (max 30 words)" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                
                <div class="col-xs-3 input-box-width">Brief note</div>
                <div class=" col-xs-9 input-box-width lg-bottom-mar">
                  <div class="col-lg-8">
                    <textarea class="form-control" rows="5" placeholder=" Enter Brief note if any (max 50 words)" ng-model="temp.briefnote" name="briefnote" ng-init="temp.briefnote = <?='\''.trim($jobseeker_profile['temp_briefnote']).'\''?>"></textarea>
                  </div><span><img data-original-title=" Enter Brief note (max 50 words)" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                </div>
                
                   <div class="col-xs-3 input-box-width">Secondary Email</div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-9 input-box-width">
                <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
              <input type="text" id="Company-course-other" ng-model="temp.sec_mail" name="sec_mail" ng-init="temp.sec_mail = <?='\''.trim($jobseeker_profile['alternate_email']).'\''?>" class="form-control lg-bottom-mar" placeholder="Enter secondary email">
                   
            </div><span><img data-original-title=" Enter Email" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
            
          </div>
             <div class="col-xs-3 input-box-width">Secondary Mobile no</div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-9 input-box-width">
                <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
              <input type="text" id="Company-course-other" ng-model="temp.sec_mobile" name="sec_mobile" ng-init="temp.sec_mobile = <?='\''.trim($jobseeker_profile['alternate_mobileno']).'\''?>" class="form-control lg-bottom-mar" placeholder="Enter secondary Mobile no.">
                   
            </div><span><img data-original-title=" Enter Mobile No" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
            
          </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                <a ng-click="update_temp();" href="javascript:void(0);" class="btn Secondy-btn ad-apply-btn ">Save</a> 
                <a onclick="show_status('tem-details','tem-edit-btn','tem-edit');" href="javascript:void(0);" class="btn Secondy-btn ad-apply-btn ">Cancel</a></div>
              </form>
              </div>
              <!-- ./ tem details--> 
              
            </div>
          </div>
        </div>
        <!-- ./Educational Details-->
        
        <div class="clearfix"></div>
  </div>
</div>