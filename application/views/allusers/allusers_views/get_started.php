<div class="col-lg-9 ">
  <div class=" col-lg-offset-2 white-box-right">
    <h3>Get Started With Mysundari</h3>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-box-width">
    Select role suits for your profile 
    <span class="text-danger">*</span></div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 input-box-width">
      <div class="col-lg-8 col-xs-12">
        <form>
          <select id="role_type" ng-model="register_as.roletype" name="role_type" ng-init="register_as.roletype = ''" class="form-control lg-bottom-mar">
            <option value="">Select Role </option>
            <option value="1">Job Seeker</option>
            <option value="2">Company Employer</option>
            <option value="3">Recruitment Agency</option>
            <option value="4">Consultancy</option>
          </select>

          <div ng-show="register_as.roletype == '2'">
          <select  ng-model="register_as.company_name" name="company_name" ng-init="register_as.company_name = ''" class="form-control lg-bottom-mar">
            <option value="">Select Company </option>
            <option value="new">Register new company</option>
            <optgroup label="All Companies">
            <?php
              $data_str = '';
              foreach ($company_list as $ckey => $c_value) {
                $data_str .= "<option value='".encode($c_value['company_id'])."'>".$c_value['company_name']."</option>";
              }
              echo $data_str;
            ?>
            </optgroup>
          </select>
          
          <div class="col-lg-12" ng-show="register_as.company_name == 'new'">
            Add New Company 
            <input type="text" ng-model="register_as.new_company" name="new_company" ng-init="register_as.new_company = ''" class="form-control lg-bottom-mar" placeholder="Enter company name"/>
          </div>
          </div>
          
          <div ng-show="register_as.roletype == '3'">
          <select  ng-model="register_as.agency_name" name="agency_name" ng-init="register_as.agency_name = ''" class="form-control lg-bottom-mar">
            <option value="">Select Recruitment Agency </option>
            <option value="new">Register new Recruitment Agency</option>
            <optgroup label="All Recruitment Agency">
            <?php
              $data_str = '';
              foreach ($agency_list as $akey => $a_value) {
                $data_str .= "<option value='".encode($a_value['company_id'])."'>".$a_value['company_name']."</option>";
              }
              echo $data_str;
            ?>
            </optgroup>
          </select>
          
          <div class="col-lg-12" ng-show="register_as.agency_name == 'new'">
            Add New Recruitment Agency
            <input type="text" ng-model="register_as.new_agency" name="new_agency" ng-init="register_as.new_agency = ''" class="form-control lg-bottom-mar" placeholder="Enter recruitment agency name">
          </div>
          </div>

          <div ng-show="register_as.roletype == '4'">
            <input type="text" class="input-md-width1 form-control lg-bottom-mar" ng-model="register_as.consultancy" ng-init="register_as.consultancy = ''"  name="consultancy" placeholder="Enter your consultancy name">
          </div>
        </form>
      </div>
      <span><img style="width: 12px;" src="<?php echo base_url();?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Please Select Role"></span>
    </div>  
    <div class="col-lg-12" ng-show="err_resister_as != ''">
      <div class="alert alert-danger">
         <span>{{err_resister_as}}</span>
      </div>
    </div>             
       <div class="col-lg-7 text-right">
        <a class="primary-btn ad-apply-btn btn" ng-click="setusertype()"> Proceed To Next  </a>
       </div>   
  </div>
</div>
</div>