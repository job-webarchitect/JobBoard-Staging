<div class="col-lg-9">
  <div class=" col-lg-offset-2 white-box-right">
      <h3>Get Started With Mysundari</h3>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-dtls">
       <div class="pull-right col-xs-3 text-danger row"><b>*<i>indicates required fields</i></b></div>
       <h4 class="profile-name">Company Details<br></h4>
        <div class="prf-col2"></div>
      
      <?php //print_r($company_details); ?>
      <div class="row">
        <form name="companyForm" id="companyForm" enctype="multipart/form-data">
        <div id="ppg-edit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Company Unique Id</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
             <div class="col-lg-8 col-xs-12 lg-bottom-mar">
             <strong><?=$company_details['unique_compid']?> </strong>
             </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Company Logo</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <input type="file" name="company_logo" id="company_logo" accept="image/*">
              <label class="text-danger" id="err_file" style="display:none;"> Invalid file extension </label>
            </div>
            <span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Company Logo (Allowed only JPG, JPEG or PNG image)"></span>
          </div> 
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Company Name<span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
             <input type="text" placeholder="Enter Company Name" class="form-control" ng-model="company_name" name="company_name" ng-init="company_name= <?='\''.$company_details['company_name'].'\''?>" required>
             <span class="text-danger" ng-show="companyForm.company_name.$error.required">Company name is required</span>
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Company Name"></span>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Address <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
            <textarea rows="5" class="form-control" placeholder="Enter Address" ng-model="comp_add" name="comp_add" ng-init="comp_add = ''" required></textarea>
            <span class="text-danger" ng-show="companyForm.comp_add.$error.required">Address is required</span>
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Address "></span>
          </div>   
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Country <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
            <select class="form-control" id="mypre_locationid" ng-model="comp_location" name="comp_location" ng-init="comp_location = ''" required>
                      <option value="">Select Country </option>
                      <?php 
                      $data_str = '';
                      foreach ($country_location as $ckey => $c_value) {
                        $data_str .="<option class='ng-scope ng-binding' value=".$c_value['lid'].">".$c_value['location']."</option>";
                      }
                      echo $data_str;
                      ?>
            </select>
            <span class="text-danger" ng-show="companyForm.comp_location.$error.required">Country is required</span>
            </div>
            <span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Country"></span>
          </div> 
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Zip Code <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
            <input type="number" class="form-control" placeholder="Enter Zip Code" name="comp_zipcode" ng-model="comp_zipcode" ng-minlength="5" pattern=".{5,}" ng-maxlength="9" required>
              <span class="text-danger" ng-show="(companyForm.comp_zipcode.$dirty || companyForm.comp_zipcode.$pristine ) && companyForm.comp_zipcode.$invalid">
                <span>Zip Code is required and it must be in between 5-9 digit.</span>
              </span>
            </div>
            <span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Zip Code"></span>
          </div>  
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Phone Number<span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <input type="number" id="con_mo" ng-model="con_mo" name="con_mo" class="form-control" placeholder="Enter Contact Phone Number" ng-minlength="10" ng-maxlength="10" pattern=".{5,}">
              <span class="text-danger" ng-show="companyForm.con_mo.$invalid">
                <span>Enter valid phone number of 10 digits.</span>
              </span>
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Contact Phone No."></span>
          </div>
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Preferred Language <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <select class="form-control" id="Preferred Language" ng-model="comp_lang" name="comp_lang" required>
                  <option value="">Select Language</option>
                  <option value="en"><?=$this->lang->line('text_lang_en')?></option>
                  <option value="fr"><?=$this->lang->line('text_lang_fr')?></option>
                  <option value="de"><?=$this->lang->line('text_lang_de')?></option>
                  <option value="es"><?=$this->lang->line('text_lang_es')?></option>
                  <option value="chi"><?=$this->lang->line('text_lang_chi')?></option>
                  <option value="ru"><?=$this->lang->line('text_lang_ru')?></option>
                  <option value="ar"><?=$this->lang->line('text_lang_ar')?></option>
              </select> 
              <span class="text-danger" ng-show="companyForm.comp_lang.$invalid">
                <span>Select your perferred language.</span>
              </span>         
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Preferred Language"></span>
          </div>  
                
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Website</div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <input type="text" class="form-control" ng-model="comp_website" name="comp_website" placeholder="Enter Website">
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Website"></span>
          </div>  
                           
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Contact person name  <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <input type="text" class="form-control" ng-model="com_cp" name="com_cp" placeholder="Enter contact person name" required>
              <span class="text-danger" ng-show="companyForm.com_cp.$invalid">
                <span>Contact person name is required.</span>
              </span> 
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="PleaseEnter Contact Name"></span>
          </div>  
                       
                               
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Contact Email <span class="text-danger">*</span></div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
              <input type="email" class="form-control" placeholder="Enter Contact Email" ng-model="comp_email" name="comp_email" required>
              <span class="text-danger" ng-show="(companyForm.comp_email.$dirty || companyForm.comp_email.$pristine ) && companyForm.comp_email.$invalid">
                <span ng-show="companyForm.comp_email.$error.required">Email is required.</span>
                <span ng-show="companyForm.comp_email.$error.email">Invalid email address.</span>
              </span>
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="PleaseEnter Contact Email"></span>
          </div>  
                             
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">Contact Number </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
            <div class="col-lg-8 col-xs-12 lg-bottom-mar">
            <input type="number" id="Mobile_No" class="form-control" placeholder="Enter Phone No"  name="comp_contact" ng-model="comp_contact" ng-minlength="10" pattern=".{5,}" ng-maxlength="10" required>
            <span class="text-danger" ng-show="(companyForm.comp_contact.$dirty || companyForm.comp_contact.$pristine ) && companyForm.comp_contact.$invalid">
                <span>Contact number is required and it must be 10 digit.</span>
              </span>
            </div><span><img style="width: 12px;" src="<?=base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Enter Phone No "></span>
          </div> 

          <div class="clearfix"></div>
        </div>
        <div class="col-lg-12 text-center">
        <button type="submit" ng-disabled="companyForm.$invalid" class="btn Secondy-btn ad-apply-btn">Save</button>
        <a href="<?php echo base_url();?>employer/index" target="_self" class="btn Secondy-btn ad-apply-btn">Cancel</a>
        </div>
        </form>
      </div>
      </div>
      </div>
  </div>
 </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/company/js/request.js"></script>
<script type="text/javascript">
  $("#company_logo").change(function(){
    myfile= $("#company_logo").val();
    var ext =  myfile.split('.').pop();
    if(ext.toLowerCase()=="jpg" || ext.toLowerCase()=="jpeg" || ext.toLowerCase()=="png"){
      $("#err_file").hide();
    }
    else{
      $("#res1-file").val('');
      $("#err_file").show();
    }
    return false;
});
</script>