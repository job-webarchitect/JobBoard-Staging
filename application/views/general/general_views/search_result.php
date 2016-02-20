<div class="row" id="searchPage" ng-app="searchPageApp" ng-controller="searchPageController">
  <div class="col-lg-12">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <h1>Search result</h1>
    </div>
    <span class="col-lg-8 col-md-6 col-sm-6 col-xs-12 row"> {{total_result}} results found for <strong>" {{searched_position}} " </strong> Jobs in {{searched_location}}</span>
    

    <div class="white-box-right" ng-repeat="search_data in searchresults">
      <div class="ad-title"><a class="but-text-color" href="<?php echo base_url();?>JobBoard/jobdetails">{{search_data.position_name}} ({{search_data.min_exp}}-{{search_data.max_exp}} Years) </a>    
         <a href="#" class="Secondy-btn btn ad-apply-btn pull-right">Apply</a> 
          <a href="#" class="Secondy-btn btn ad-apply-btn pull-right">Save</a>
      </div>
      <div class="ad-des">{{search_data.condition}}</div>
      <ul class="prf-col2-ul ad-chicklets">
        <li> Full time </li>
        <li><i class="fa fa-inr"></i>{{search_data.salary_min}} - {{search_data.salary_max}}</li>
        <li>{{search_data.location_name}}</li>
      </ul>
      
      <div class="ad-desciption"> {{search_data.job_description}}. </div>
      <div class="prf-col2">
      <div class="pull-left text-post-with">Posted by:<b>Siliconindia</b> |  Posted on {{search_data.posted_date}} | <a href="#" class="but-text-color">View similar jobs</a> </div>
      <div class="text-post-with-two"><b>Share this job</b></div>
        <div class=" text-post-with-three">
            <a href=""><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href=""><i class="fa fa-linkedin-square fa-2x"></i></a>
            <a href=""><i class="fa fa-twitter-square fa-2x"></i></a>
            <a href=""><i class="fa fa-google-plus-square fa-2x"></i></a>   
        </div>     
      </div>
    </div>

  </div>
 </div>
</div>