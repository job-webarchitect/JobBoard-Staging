<!-- Search Content -->
<div class="row" id="searchAppid" ng-app="searchApp" ng-controller="searchController" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 search-mrg">
    <div class="page-wrapper" >
     <input list="pos" class="lg-box" placeholder="<?php echo $this->lang->line('text_op_position');?>" ng-model="position">
      <datalist id="pos" ng-model="positionlist">
        <select>
        <option ng-repeat="pos in positions" value="{{pos.position}}"> </option>    
        </select>
      </datalist> 
        
          
      <select class="lg-box menu-mar-left" ng-model="selectedcountry" ng-change="selectCountry()" >
        <option value=""> <?php echo $this->lang->line('text_op_region');?> </option>
        <optgroup label="<?php echo $this->lang->line('text_region');?>">
            <option ng-repeat="region in regions"
                    value="{{region.regionname}}">
                    {{region.regionname}}
            </option>
        </optgroup>
        <optgroup label="<?php echo $this->lang->line('text_country');?>">
            <option ng-repeat="country in Countries"
                    value="{{country.location}}">
                    {{country.location}}
            </option>
        </optgroup>
      </select>
          <input type="hidden" ng-model="resCountry" ng-bind="resCountry" />
     
      <select class="lg-box menu-mar-left" ng-model="area_of_exp" ng-change="selectArea()">
          <option value=""><?php echo $this->lang->line('text_op_areaexp');?></option>
          <option value=""><?php echo $this->lang->line('text_op_all');?></option>
          <option ng-repeat="area_exp in area"
                    value="{{area_exp.area_exp_name}}">
                    {{area_exp.area_exp_name}}
            </option>
      </select>
        <input type="hidden" ng-model="resArea" ng-bind="resArea" /> 
     
      <button class="btn-search-red menu-mar-left" type="button" ng-click="searchFun()"> <Strong>Search Job </Strong></button>
    </div>
  </div>
  </div>
<!-- ./ Search Content -->