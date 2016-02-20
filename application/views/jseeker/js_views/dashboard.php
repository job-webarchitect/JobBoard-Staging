<div class="col-lg-12 white-box-right" >
      <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 profile-dtls">
            <div class="pull-right"> <span class="md-blue-link"><a href="http://dev2.lightspeedwl.com/account/users/editprofile" title="You can edit Personal details from here only"><em>Edit</em></a></span> </div>
            <h4 class="profile-name"> <?=$this->ssofname;?>&nbsp;<?=$this->ssolname;?> <br/>
              <span> <!-- 3 Years experience in Web Designing --></span></h4>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="profile-details-ul">
                  <?php $current_position =  $this->mdl_general->search_position(trim($jobseeker_profile['current_position'])); ?>
                  <li><span>Present Employer:</span> <?php if(trim($jobseeker_profile['present_company']) != '') { echo $jobseeker_profile['present_company']; } else { echo '<i>Not Mentioned</i>'; } ?> </li>
                  <li><span>Present Position:</span> <?php if(trim($jobseeker_profile['current_position']) != '') { echo $current_position['positionname_'.$this->lang_code]; } else { echo '<i>Not Mentioned</i>'; } ?></li>
                  <li><span>Current Salary:</span> <?php if(trim($jobseeker_profile['current_salary']) != '') { echo $jobseeker_profile['current_sal_curr']." ".$jobseeker_profile['current_salary']; } else { echo '<i>Not Mentioned</i>'; } ?></li>
                  <li><span>Expected Salary:</span><?php if(trim($jobseeker_profile['expected_salary']) != '') { echo $jobseeker_profile['expected_sal_curr']." ".$jobseeker_profile['expected_salary']; } else { echo '<i>Not Mentioned</i>'; } ?></li>
                  <li><span>Positions Applied:</span> <?php if(isset($jobseeker_position_applied[0])) {echo $jobseeker_position_applied[0]['position'];} ?>, <br/> <?php if(isset($jobseeker_position_applied[1])) { echo $jobseeker_position_applied[1]['position'];}?>, <br/> <?php if(isset($jobseeker_position_applied[2])) { echo $jobseeker_position_applied[2]['position'];} ?></li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="profile-details-ul">
                  <li><span>Date Of Birth:</span> <?=date('d M, Y',strtotime($this->ssodob));?></li>
                  <li><span>Gender:</span> <?=ucfirst($this->ssogender);?></li>
                  <li><span>Marital Status:</span> <?php if(trim($jobseeker_profile['marital_flg']) == '0') { echo 'Unmarried'; } else { echo 'Married'; } ?></li>
                  <li><span>Education:</span><?php if(trim($jobseeker_profile['education']) != '') { echo $jobseeker_profile['education']; } else { echo '<i>Not Mentioned</i>'; } ?></li>
                  <!-- <li><span>Zip Code:</span> 902344</li> -->
                </ul>
              </div>
              <div class="col-lg-12col-md-12 col-sm-12 col-xs-12">
                <ul class="profile-details-ul">
                  <li><span>Skills:</span><?php if(trim($jobseeker_profile['skills']) != '') { echo $jobseeker_profile['skills']; } else { echo '<i>Not Mentioned</i>'; } ?></li>
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
      <div class="clearfix"></div>
      <?php // print_r($jobseeker_position_applied[0]);
     // print_r($jobseeker_position_applied[1]);
     // print_r($jobseeker_position_applied[2]);?>
      <div class="row" ng-init="init_pos_applied(<?php if(isset($jobseeker_position_applied[0])) {echo '\''.$jobseeker_position_applied[0]['pid'].'\'';} else {echo '\'\'';} ?>,<?php if(isset($jobseeker_position_applied[1])) { echo '\''.$jobseeker_position_applied[1]['pid'].'\'';} else {echo '\'\'';} ?>, <?php if(isset($jobseeker_position_applied[2])) { echo '\''.$jobseeker_position_applied[2]['pid'].'\'';} else {echo '\'\'';} ?> )">
        <div class="col-lg-12" ng-init="findmatchingjob()">
          <h1>Latest Jobs Matching Your Profile </h1>
          <div class="col-lg-12 text-center" id='loadingmessage' style='display:none'> <img style="height:60px;" src='<?php echo base_url();?>assets/common/images/loader1.gif'/> </div>
          <div class="white-box-right" ng-repeat="search_data in searchresults">
            <div class="ad-title"><a class="but-text-color" href="<?php echo base_url();?>JobBoard/jobdetails">{{search_data.position_name}} ({{search_data.min_exp}}-{{search_data.max_exp}} Years) </a>
            <a href="#" class="Secondy-btn btn ad-apply-btn pull-right">Apply</a> 
            <a href="#" class="Secondy-btn btn ad-apply-btn pull-right">Save</a> </div>
            <div class="ad-des">{{search_data.condition}}</div>
            <ul class="prf-col2-ul ad-chicklets">
              <li> Full time </li>
              <li> <i class="fa fa-inr"></i> {{search_data.salary_min}} - {{search_data.salary_max}} PA</li>
              <li>{{search_data.location_name}}</li>
            </ul>
            <div class="ad-desciption">{{search_data.job_description}}.</div>
            <div class="prf-col2">
              <div class="pull-left col-lg-9 col-md-8 col-sm-8 col-xs-8 row">Posted by:<b>Siliconindia</b> |  Posted on {{search_data.posted_date}} | <a href="#" class="but-text-color">View similar jobs </a> </div>
              <div class="icon-widtn"><b> Share this job</b></div>
              <div class="icon-widtn-two row"> 
                <a href=""><i class="fa fa-facebook-square fa-2x"></i></a> 
                <a href=""> <i class="fa fa-linkedin-square fa-2x"></i> </a> 
                <a href=""> <i class="fa fa-twitter-square fa-2x"></i> </a> 
                <a href=""> <i class="fa fa-google-plus-square fa-2x"></i> </a> 
              </div>
            </div>
          </div>          
          
        </div>
      </div>
    </div>
    