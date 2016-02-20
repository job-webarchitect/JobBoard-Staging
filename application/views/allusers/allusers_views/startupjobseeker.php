<div class="col-lg-9 ">
  <div class=" col-lg-offset-2 white-box-right">
  <h3>Get Started With Mysundari</h3>
  <form id="startwithjobseekerForm" name="startwithjobseekerForm" ng-submit="saveseeker();" ng-app>
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
    <div class="pull-right col-xs-3 text-danger row"><b>*<i>indicates required fields</i></b></div>
    <h4 class="profile-name">Educational details <br></h4>
    <div class="prf-col2"></div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: block;">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Degree<span class="text-danger">*</span></div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
              <div class="col-lg-8 col-xs-12">
              <select id="Degree-course" ng-model="seeker.degree" ng-click="otherdegree = seeker.degree" name="degree" class="form-control lg-bottom-mar" required>
                <option value="">Select Degree</option>
                <option value="PG">Post graduate</option>
                <option value="GD">Graduate</option>
                <option value="UG">Under graduate</option>
                <option value="OTHER">Other</option>
              </select>             
              <div ng-show="otherdegree == 'OTHER'">
                <input type="text" class="input-md-width1 form-control" ng-model="seeker.other_qual" name="other_qual" value="0" placeholder="Enter degree name">
              </div>
              <span class="text-danger" ng-show="submitted && startwithjobseekerForm.degree.$error.required">Degree is required</span>
              <span class="text-danger" ng-show="(otherdegree == 'OTHER') && submitted && (!seeker.other_qual)">Degree name is required</span>
              </div>
              <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Degree"></span>
            </div>
            <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
    <h4 class="profile-name">Work Experience Details <br></h4>
    <div class="prf-col2"></div>
    <div class="row">    
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Total experience in industry<span class="text-danger">*</span></div>
	      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
	        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	        <select ng-model="seeker.totalexp" name="totalexp" class="form-control lg-bottom-mar" required>
	            <option value="">Total experience (In Year) </option>
	            <?php for($i=0;$i<=65;$i++) {?>
	            <option value="<?=$i;?>">
	            <?=$i;?>
	            </option>
	            <?php } ?>
	        </select>
          <span class="text-danger" ng-show="submitted && startwithjobseekerForm.totalexp.$error.required">Total experienced is required</span>
	        </div>
	        <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select experience (In Year)"></span>
	      </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Present company<span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9  input-box-width">
           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
       	   <input type="text" placeholder="Enter Present company name" ng-model="seeker.presentcmpny" name="presentcmpny" class="form-control lg-bottom-mar" required>
           <span class="text-danger" ng-show="submitted && startwithjobseekerForm.presentcmpny.$error.required">Company is required</span>
           </div>
           <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Present company Name"></span>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width"> Experience in present company<span class="text-danger">*</span> </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9  input-box-width">
          	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        	  <select ng-model="seeker.pexp" name="pexp" class="form-control lg-bottom-mar" required>
                <option value="">Experience(In Year) </option>
                <?php for($i=0;$i<=65;$i++) {?>
                <option value="<?=$i;?>"><?=$i;?></option>
                <?php } ?>
            </select>
            <span class="text-danger" ng-show="submitted && startwithjobseekerForm.pexp.$error.required">Experience is required</span>
            </div>
            <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Total experience(In Year) "></span></div>  
              
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Position in present company<span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 lg-bottom-mar">
           <select class="form-control" ng-model="seeker.pposition" name="pposition" required>
            <option value="">Select present position</option>
            <option ng-repeat="pos in positions"
                    value="{{pos.pid}}">
                    {{pos.position}}
            </option>
            <!-- <option value="other">Other</option> -->
           </select>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <!-- <input ng-show="seeker.pposition == 'other'" type="text" class="form-control lg-bottom-mar" name="opposition" id="Other-inst-other"> -->
           <span class="text-danger" ng-show="submitted && startwithjobseekerForm.pposition.$error.required">Position is required</span>
          </div>
          <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" PleaseSelect present position"></span>
          </div>
            
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 input-box-width"> Salary in present company</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <select class="form-control " ng-model="seeker.pcurrency" name="pcurrency">
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
              <input type="text" class="form-control lg-bottom-mar" ng-model="seeker.pcurrent_sal" name="pcurrent_sal" placeholder="Enter current salary">
            </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Currency"></span>
          </div>
          <div class="clearfix"></div>
        </div>
    </div>
    </div>
    </div>
	
	<!-- <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
      <div style="display: block;" id="Certificate-detail-1"></div>
      <h4 class="profile-name">Certificate Details<br></h4>
      <div class="prf-col2"></div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="profile-details-ul">
                  
 				  <div id="Certificate-2" class="pull-right"></div>
                  <li id="Certificate-2-detail">
                      <input type="checkbox" onclick="hide_status('Certificate-2','Certificate-2-detail', 'Certificate-2-edit')" href="javascript:void(0)" class="md-blue-link" id="Terms_Conditions" name="Terms_Conditions">
                      <a> Diploma in computer application</a>
                      </li>
                  <li style="display: none;" id="Certificate-2-edit" class="input-box clra-width"><span class="col-md-12 clearfix row"><span class="col-md-12 lg-bottom-mar row"> <input type="checkbox" name="Terms_Conditions" id="Terms_Conditions" checked="true"> Diploma in computer application</span>   
                       <span class="col-md-2 row">Expired on  </span>
                      <input type="text" id="resnew-file " name="resnew-file"><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Enter Expired date "></span>
                      <div class="lg-bottom-mar"><div> <a onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Save</a> <a onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');" href="javascript:void(0);" class="Secondy-btn ad-apply-btn  ">Cancel</a></div></div></span>
                  </li>
                    <li class="input-box clra-width" id="Certificate-2-edit" style="display: none;"><span class="col-md-12 clearfix row"><span class="col-md-12 lg-bottom-mar row"> <input type="checkbox" checked="true" id="Terms_Conditions" name="Terms_Conditions"> Diploma in computer application</span>   
                       <span class="col-md-2 row">Expired on  </span>
                      <input type="text" data-parsley-id="7618" id="expiry_date-2" name="expiry_date" class="row">
                      <div class="lg-bottom-mar"><div> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');">Save</a> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-2-detail','Certificate-2', 'Certificate-2-edit');">Cancel</a></div></div></span>
                    </li>
                       <li style="display: none;" id="Certificate-edit-1" class="input-box-width"> <span>Certificate : </span>
                      <input type="text" id="resnew-file " name="resnew-file"><span><img data-original-title=" Please Enter Certificate Name " title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
                      <div class="input-box-width"> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-detail-1','Certificate-1', 'Certificate-edit-1');">Save</a> <a class="Secondy-btn ad-apply-btn  " href="javascript:void(0);" onclick="show_status('Certificate-detail-1','Certificate-1', 'Certificate-edit-1');">Cancel</a></div>
                    </li>
                    <span class="md-blue-link lg-bottom-mar" id="Certificate-1"><a href="javascript:void(0)" onclick="hide_status('Certificate-edit-1','Certificate-detail-1', 'Certificate-edit-1')"><em>Add certificate detail</em></a></span>
                </ul>
              </div>
            </div>
          </div>
        </div> -->

	  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">  
      <h4 class="profile-name">Resume Details <br></h4>
      <div class="prf-col2"></div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="profile-details-ul">
          <li class="col-lg-12 row">
            <div class="col-lg-12"><span>Upload Resume</span></div>
            <div class="col-lg-4 lg-bottom-mar">
              <input type="file" id="res1-file" ng-model="seeker.res1file" name="res1-file" required>
            </div>
            <div class="col-lg-8">Maximum file size upto 5 MB (.doc, .docx, .pdf files allow to upload)</div>
          </li>
          <li> <label class="text-danger" id="err_file" style="display:none;"> Invalid file extension </label></li>
        </ul>        
        </div>
        <input type="hidden" ng-model="seeker.resumename" name="resumename" id="resumename">
      </div>
      </div>
      </div>


<div class="row">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
 <h4 class="profile-name">Other Details <br></h4>
 <div class="prf-col2"></div>
  <div class="row">    
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="clearfix"></div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  input-box-width">Positions Applied<span class="text-danger"> *</span></div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 lg-bottom-mar">
      <select class="form-control" multiple ng-model="seeker.eposition" name="eposition" required>
        <option value="">Select present position</option>
        <option ng-repeat="pos in positions" value="{{pos.pid}}"> {{pos.position}} </option>
       </select>
     </div>
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
       <span class="text-danger" ng-show="submitted && startwithjobseekerForm.eposition.$error.required">Maximum 3 position you can select</span>
     </div><span><img data-original-title="Please select positions (Maximum 3 position you can select)" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
    </div>
    <div class="clearfix"></div> 

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Area Of Experience<span class="text-danger"> *</span></div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
      <div class="col-lg-8">
          <select class="form-control" id="area_id" ng-model="seeker.area_exp" name="area_exp" ng-init="seeker.area_exp = ''" required>
              <option value=""><?php echo $this->lang->line('text_op_areaexp');?></option>
              <!-- <option value="0"><?php echo $this->lang->line('text_op_all');?></option> -->
              <?php 
              $data_str = '';
              foreach ($area_exp as $akey => $a_value) {
                  $data_str .="<option  class='ng-scope ng-binding' value=".$a_value['areaid'].">".$a_value['area_exp_name']."</option>";
              }
              echo $data_str;
              ?>
          </select>
          <span class="text-danger" ng-show="submitted && startwithjobseekerForm.area_exp.$error.required">Select area of Experience</span>
      </div><span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title=" Please Select Area of experience"></span>
    </div>
            
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Expected Salary</div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
         <select class="form-control" ng-model="seeker.ecurrency" name="ecurrency" id="work-exe-inst">
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
        <input type="text" placeholder="Enter current salary" ng-model="seeker.esalary" name="esalary" class="form-control lg-bottom-mar">
       </div>
       <span><img data-original-title=" Please Select Currency and Enter Expected Salary" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
       </div>
       <div class="clearfix"></div> 
         
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  input-box-width">Skills</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 lg-bottom-mar input-box-width">
           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <textarea rows="3" ng-model="seeker.skill" name="skill" placeholder="Skills" class="form-control"></textarea>
           </div>
          <span><img data-original-title="Please Enter Skills" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
          </div>
        <div class="clearfix"></div> 
            
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Notice period<span class="text-danger"> *</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">      
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">  
        	  <select ng-model="seeker.notice_period" name="notice_period" class="form-control lg-bottom-mar" required>
              <option value="">Select Notice Period (In days)</option>
              <?php for($i=1;$i<=100;$i++) {?>
              <option value="<?=$i;?>"> <?=$i;?> </option>
              <?php } ?>
            </select>
            <span class="text-danger" ng-show="submitted && startwithjobseekerForm.notice_period.$error.required">Notice period is required</span>
           </div>
           <span><img data-original-title=" Please Select Notice Period" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
           </div>
           <div class="clearfix"></div> 

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width lg-bottom-mar">Would you like to display your present company name<span class="text-danger"> *</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">      
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">  
            <label> <input type="radio" name="company_display" ng-model="seeker.company_display" value="1" required> Yes </label>
            <label> <input type="radio" name="company_display" ng-model="seeker.company_display" value="0" required> No  </label>
          <div class="col-lg-12 row">  
          <span class="text-danger" ng-show="submitted && startwithjobseekerForm.company_display.$error.required">This Option is required</span>
          </div>
          </div>
          </div> 
          <div class="clearfix"></div>
          
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width lg-bottom-mar">Would you like to display your name<span class="text-danger"> *</span></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">      
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">  
            <label> <input type="radio" name="name_display" ng-model="seeker.name_display" value="1" required> Yes </label>
            <label> <input type="radio" name="name_display" ng-model="seeker.name_display" value="0" required> No  </label>
          <div class="col-lg-12 row">  
          <span class="text-danger" ng-show="submitted && startwithjobseekerForm.name_display.$error.required">This Option is required</span>
          </div>
          </div>
        </div> 
        <div class="clearfix"></div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Passport #</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <input type="text" ng-model="seeker.passport" name="passport" placeholder="Enter passport #" class="form-control">
            </div>
            <span><img data-original-title=" Please enter passport #" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
          </div>
          <div class="clearfix"></div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Do you have Membership</div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
          <div class="col-lg-8 col-xs-12">
            <label> <input type="radio" name="memstatus" ng-model="seeker.memstatus" value="1"> Yes </label>
            <label> <input type="radio" name="memstatus" ng-model="seeker.memstatus" value="0"> No  </label>
            <input ng-show="seeker.memstatus == '1'" type="text" class="form-control lg-bottom-mar" ng-model="seeker.membership_desc" name="membership_desc" placeholder="Enter Membership Details">
          </div>
          <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" class="red-tooltip" data-toggle="tooltip" data-placement="right" title="" data-original-title=" If you have Membership details then click yes and enter Mwmbership details"></span>
        </div>
        <div class="clearfix"></div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Any condition</div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
          <div class="col-lg-8 col-xs-12">
            <textarea ng-model="seeker.condition" name="condition" placeholder="Enter condition if any (max 30 words)" rows="5" class="form-control"></textarea>
          </div>
          <span><img data-original-title=" Please Enter Any condition ( in max 30 words)" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
        </div>
                
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width"> Brief note</div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width lg-bottom-mar">
          <div class="col-lg-8 col-xs-12">
            <textarea ng-model="seeker.briefnote" name="briefnote" placeholder="Brief note if any (max 50 words)" rows="5" class="form-control"></textarea>
          </div><span><img data-original-title=" Please Enter Brief note ( in max 50 words)" title="" data-placement="right" data-toggle="tooltip" src="<?php echo base_url();?>assets/common/images/qus.png" style="width: 12px;"></span>
        </div>
        <div class="clearfix"></div>
        </div>

    </div>
      </div>
      </div>
      <div class="col-lg-12 text-center">
      <button type="submit" class="btn Secondy-btn ad-apply-btn" ng-click="submitted=true">Save</button>
      <a href="<?php echo base_url();?>myjobs/dashboard" target="_self" class="btn Secondy-btn ad-apply-btn">Cancel</a>
      </div>
  </form>
  </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.min.js"></script>
<script type="text/javascript">
  $("#res1-file").change(function(){
    myfile= $("#res1-file").val();
    var ext = myfile.split('.').pop();
    if(ext=="pdf" || ext=="docx" || ext=="doc"){
      $("#err_file").hide();
      $("#full_loader").fadeIn('900');
        var formData = new FormData($("#startwithjobseekerForm")[0]);
        $.ajax({
            url: base_url+'/seekerprofile/upload_files_server',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                var data = JSON.parse(data);
                $("#resumename").val(data['file_name']);
                $("#full_loader").fadeOut('900');
            },
            cache: false,
            contentType: false,
            processData: false
        });

    }
    else{
      $("#res1-file").val('');
      $("#err_file").show();
    }
    return false;
});

function getUrlParameter(sParam) {
      var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
}
</script>