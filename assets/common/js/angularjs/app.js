var base_url = 'http://localhost/dev-jobboard';//window.location.protocol+"//"+window.location.host;
var app = angular.module('searchApp',['searchPageApp'])
  app.config(function ($routeProvider, $locationProvider) {
        //routing DOESN'T work without html5Mode
      $locationProvider.html5Mode(true);
     
      /*
      $routeProvider.
        when('/searchresult?', {templateUrl:'/jsonapi/searchAllJob'}).
        otherwise({redirectTo:'/JobBoard/searchresult'});
      */

  });

app.controller('searchController',function($scope, $window, $http, $location) {
    $scope.resCountry='';
    $scope.resArea='';
    $scope.position='';
    $scope.positions='';
    $scope.country='';
    $scope.Countries='';
    $scope.currentCountry='';
    $scope.area_of_exp='';
    $scope.area='';

	$http({
    url: base_url+'/jsonapi/getposition',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify()
    }).success(function (data) {
       $scope.positions = data.position_result;
       $scope.regions = data.region_location;
       $scope.Countries = data.country_location;
       $scope.area 		= data.area_exp;
    }).error(function (data) {});

    if($location.search().ps){
      $scope.position     = $location.search().ps;
    }

    if($location.search().cn){
      $scope.currentCountry = $location.search().cn;
    }

    if($location.search().ep){
      $scope.area_of_exp  = $location.search().ep;
    }

	$scope.selectCountry = function() { 
 	  var country = $scope.selectedcountry;
	  $scope.resCountry=country;
	}   
	
	$scope.selectArea= function() { 
 	 var area = $scope.area_of_exp.area_exp_name;
     $scope.resArea=area; 
	 }   
	
	$scope.searchFun=function(){
     // $location.path('/JobBoard/searchresult?ps='+ $scope.position + "&cn=" + $scope.resCountry + "&ep=" + $scope.resArea);
     $window.location.href = base_url + '/JobBoard/searchresult?ps='+ $scope.position + "&cn=" + $scope.resCountry + "&ep=" + $scope.resArea;
  }
});


var searchPageApp = angular.module('searchPageApp',[])
  searchPageApp.config(function ($routeProvider, $locationProvider) {
        //routing DOESN'T work without html5Mode
        $locationProvider.html5Mode(true);
  });

  searchPageApp.controller('searchPageController',function($scope, $window, $http, $location) {
    $scope.searchresults='';

    if($location.search().ps || $location.search().cn || $location.search().ep){
      $scope.searched_position = $location.search().ps;
      $scope.searched_location = $location.search().cn;
      $scope.searched_exp      = $location.search().ep;
      $scope.total_result      = 0;

      $http({
        url: base_url+'/jsonapi/searchAllJob',
        method: "post",
        headers: {'Content-Type': 'application/json'},
        data: JSON.stringify({'spos':$location.search().ps, 'scn':$location.search().cn,'sep':$location.search().sp})
        }).success(function (data) {
          $scope.results=data;
           $scope.searchresults=data['search_result'];
           $scope.total_result =data['total_result'];
           console.log($scope.searchresults);
        }).error(function (data) {}); 
    }
  });

var GlobalApp = angular.module('GlobalApp',[])
  GlobalApp.config(function ($routeProvider, $locationProvider) {
        //routing DOESN'T work without html5Mode
      $locationProvider.html5Mode(true);
  });

GlobalApp.controller('GlobalController',function($scope, $window, $http, $location) {
  $http({
    url: base_url+'/jsonapi/getposition',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify()
    }).success(function (data) {
       $scope.positions = data.position_result;
       $scope.regions = data.region_location;
       $scope.Countries = data.country_location;
       $scope.area    = data.area_exp;
    }).error(function (data) {});

    $scope.err_resister_as = ''; 
  $scope.setusertype = function(){
     // console.log($scope);
    if($scope.register_as.roletype == ''){
      $scope.err_resister_as = 'Select Role Type';
        return false;
    }
    else if($scope.register_as.roletype == '2'){
      if($scope.register_as.company_name == ''){
        $scope.err_resister_as = 'Select Company';
        return false;
      }
      if($scope.register_as.company_name == 'new' && $scope.register_as.new_company == ''){
        $scope.err_resister_as = 'Company name required';
        return false;
      }
      else{
        $scope.err_resister_as = ''; 
      }
    }
    else if($scope.register_as.roletype == '3'){
      if($scope.register_as.agency_name == ''){
        $scope.err_resister_as = 'Select recruitment agency';
        return false;
      }
      if($scope.register_as.agency_name == 'new' && $scope.register_as.new_agency == ''){
        $scope.err_resister_as = 'Recruitment agency name required';
        return false;
      }
      else{
        $scope.err_resister_as = ''; 
      } 
    }
    else if($scope.register_as.roletype == '4'){
      if($scope.register_as.consultancy == ''){
        $scope.err_resister_as = 'Consultancy name required';
        return false;
      }
      else{
        $scope.err_resister_as = ''; 
      }
    }
    // console.log($scope.register_as);
    // return false;
     $("#full_loader").fadeIn('900');
    $http({
      url: base_url+'/jsonapi/set_usertype',
      method: "POST",
      headers: {'Content-Type': 'application/json'},
      data: JSON.stringify({'usertype':$scope.roletype, 'all_details':$scope.register_as})
      }).success(function (data) {
        console.log(data);
        $("#full_loader").fadeOut('900');
        if(data['status'] == 'success' && data['moveto'] == 'jobseeker'){
          $window.location.href = base_url+'/myjobs/dashboard';
        }
        if(data['status'] == 'success' && data['moveto'] == 'startjobseeker'){
          $window.location.href = base_url+'/allusers/startupjobseeker';
        }
        if(data['status'] == 'success' && data['moveto'] == 'employer'){
          $window.location.href = base_url+'/allusers/startwithcompany';
        }
        else if(data['status'] == 'success' && data['moveto'] == 'activate'){
          $window.location.href = base_url+'/allusers/activate'
        }
      }).error(function (data) {});
  }

  $scope.saveseeker = function(){
    $scope.seeker.resumename = $("#resumename").val();
    // alert($scope.seeker.resumename);
    $("#full_loader").fadeIn('900');
    $http({
      url: base_url+'/jsonapi/save_jobseekerstartup',
      method: "POST",
      headers: {'Content-Type': 'application/json'},
      data: JSON.stringify({'jobseekerdata':$scope.seeker})
      }).success(function (data) {
        console.log(data);
        $("#full_loader").fadeOut('900');
        if(data['status'] == 'success' && data['moveto'] == 'jobseeker'){
          $window.location.href = base_url+'/myjobs/dashboard';
        }
      }).error(function (data) {});
  }

});

GlobalApp.controller('jobseekerController',function($scope, $window, $http, $location) {
  $scope.pos1 = '';
  $scope.pos2 = '';
  $scope.pos3 = '';
  // alert('hi');
  
  $scope.init_pos_applied = function(pos1, pos2, pos3){
    $scope.pos1 = pos1;
    $scope.pos2 = pos2;
    $scope.pos3 = pos3; 
    // alert(pos1 + ' ' + pos2 + ' ' + pos3 );
  }

  $scope.findmatchingjob = function(){
    $('#loadingmessage').show();
    $http({
        url: base_url+'/jsonapi/matchingjobs',
        method: "post",
        headers: {'Content-Type': 'application/json'},
        data: JSON.stringify({'pos1':$scope.pos1, 'pos2':$scope.pos2,'pos3':$scope.pos2})
        }).success(function (data) {
          console.log(data);
           $('#loadingmessage').hide();
          $scope.results=data;
           $scope.searchresults=data['search_result'];
           // $scope.total_result =data['total_result'];
           console.log($scope.searchresults);
    }).error(function (data) {}); 
  }

  $http({
    url: base_url+'/jsonapi/getposition',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify()
    }).success(function (data) {
       $scope.positions1 = data.position_result;
       $scope.regions1 = data.region_location;
       $scope.Countries1 = data.country_location;
       $scope.area1    = data.area_exp;
    }).error(function (data) {});

  $scope.err_deg = false;
  $scope.err_deg_text = '';
  $scope.update_degree = function(){
    if($scope.education.degree == ''){
      $scope.err_deg = true;
      $scope.err_deg_text = 'Select Degree';
      return false;
    }
    else if($scope.education.degree == 'OTHER' && $scope.education.other_qual == ''){

      $scope.err_deg = true;
      $scope.err_deg_text = 'Enter other degree name';
      return false;
    }
    else{
      $scope.err_deg = false;
      $scope.err_deg_text = ''; 
    }
    $scope.update_lang_text = $('#myeducation option:selected').html();
    $http({
    url: base_url+'/seekerprofile/update_degree',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({'education':$scope.education}),
    }).success(function (data) {
      if(data['status'] == 'success'){
        if($scope.education.degree != 'OTHER') {
          $("#selected_edu").html($scope.update_lang_text);
          $scope.education.other_qual = '';
        }
        else {
          $("#selected_edu").html($scope.education.other_qual);
        }
        show_status('Degree-details','Degree-edit-btn','Degree-edit');
      }
    }).error(function (data) {});
  }

  $scope.update_workexp = function(){
  // alert($scope.work.pposition);
  //   console.log($scope.work);
    if($scope.work.totalexp == ''){
      $scope.err_work = true;
      $scope.err_work_text = 'Select total work experience';
      return false;
    }
    else if($scope.work.presentcmpny == ''){
      $scope.err_work = true;
      $scope.err_work_text = 'Enter present company name';
      return false;
    }
    else if($scope.work.pposition == '' || $scope.work.pposition == undefined){
      $scope.err_work = true;
      $scope.err_work_text = 'Select position in present company';
      return false;
    }
    else if($scope.work.pexp == ''){
      $scope.err_work = true;
      $scope.err_work_text = 'Select Experience in present company';
      return false;
    }
    else if(($scope.work.pcurrency == '' && $scope.work.pcurrent_sal != '') || ($scope.work.pcurrency != '' && $scope.work.pcurrent_sal == '')){
      $scope.err_work = true;
      $scope.err_work_text = 'Enter salary with currency properly';
      return false;
    }
    else{
      $scope.err_work = false;
      $scope.err_work_text = ''; 
    }

    $http({
    url: base_url+'/seekerprofile/update_work',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({'work':$scope.work}),
    }).success(function (data) {
      if(data['status'] == 'success'){
       $('#ind_exp').html($scope.work.totalexp + ' Year(s)');
       $('#pre_cmp').html($scope.work.presentcmpny);
       $('#cur_pos').html($('#pposition option:selected').html());
       $('#prc_exp').html($scope.work.pexp + ' Year(s)');
       $('#cur_sal').html($scope.work.pcurrency+ ' ' +$scope.work.pcurrent_sal);
        show_status('work-exe-details','work-exe-edit-btn','work-exe-edit');
      }
    }).error(function (data) {});
  }

  $scope.update_other = function(){
    if($scope.other.area_exp == ''){
      $scope.err_other = true;
      $scope.err_other_text = 'Select area of experience';
      return false;
    }
    else if(($scope.other.ecurrency == '' && $scope.other.esalary != '') || ($scope.other.ecurrency != '' && $scope.other.esalary == '')){
      $scope.err_other = true;
      $scope.err_other_text = 'Enter salary with currency properly';
      return false;
    }
    else if($scope.other.notice_period == ''){
      $scope.err_other = true;
      $scope.err_other_text = 'Select notice period';
      return false;
    }
    else if($scope.other.company_display == ''){
      $scope.err_other = true;
      $scope.err_other_text = 'Select company display option';
      return false;
    }
    else if($scope.other.name_display == ''){
      $scope.err_other = true;
      $scope.err_other_text = 'Select name display option';
      return false;
    }
    else if($scope.other.memstatus != '0' && $scope.other.membership_desc == ''){
      $scope.err_other = true;
      $scope.err_other_text = 'Enter Membership Description';
      return false;  
    }
    else{
      $scope.err_other = false;
      $scope.err_other_text = ''; 
    }
    
    $http({
    url: base_url+'/seekerprofile/update_other',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({'other':$scope.other}),
    }).success(function (data) {
      if(data['status'] == 'success'){
        $('#area_exp_id').html($('#area_id option:selected').html());
        if($scope.other.ecurrency != '' && $scope.other.esalary != ''){
          $('#exp_sal_id').html($('#ecurrency_id option:selected').html() + ' ' + $scope.other.esalary);
        }
        $('#skill_id').html($scope.other.skill);
        $('#np_id').html($scope.other.notice_period + 'day(s)');
        if($scope.other.company_display == '0'){
          $('#cmpny_id').html('No');
        }
        else{
          $('#cmpny_id').html('Yes'); 
        }
        if($scope.other.name_display == '0'){
          $('#name_id').html('No');
        }
        else{
          $('#name_id').html('Yes'); 
        }
        $('#psport_id').html($scope.other.passport);
        if($scope.other.memstatus == '0'){
          $('#mem_id').html('No</i>');
        }
        else{
          $('#mem_id').html('Yes, ' + $scope.other.membership_desc); 
        }
        $('#cond_id').html($scope.other.condition);
        $('#brfn_id').html($scope.other.briefnote);
        show_status('Other-details','Other-edit-btn','Other-edit');
      }
    }).error(function (data) {});
  }

  $('#res1-file').on('change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();

       if(ext!="pdf" && ext!="docx" && ext!="doc"){
           $("#err_file").show();
           $("#err_file").html('Only .doc, .docx, .pdf files allow to upload');
           $("#res_save").attr('disabled',true);
       } 
       else if((this.files[0].size/1024) > 2048){
          $("#err_file").show();
          $("#err_file").html('Maximum file size upto 2 MB you can upload');
          $("#res_save").attr('disabled',true);
       }
       else{
           $("#err_file").hide();
           $("#err_file").html('');
           $("#res_save").attr('disabled',false);
       }
  });

  $scope.update_temp = function(){
    /*
    console.log($scope.temp);
    return false;
    */
    $http({
    url: base_url+'/seekerprofile/update_temp',
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    data: JSON.stringify({'temp':$scope.temp}),
    }).success(function (data) {
      if(data['status'] == 'success'){
        $("#area_expid").html($('#area_id option:selected').html());
        $("#temp_avalil_id").html('<span>Available From: </span> <label>' + $scope.temp.avail_date_from + ' </label> <span> - Available Till: </span> <label>' + $scope.temp.avail_date_till + '</label>');
        
        if($scope.temp.ecurrency != '' && $scope.temp.esalary != ''){
          $("#e_salid").html($scope.temp.ecurrency + ' ' + $scope.temp.esalary);
        }
        else{
          $("#e_salid").html("<i> Not Mentioned </i>");
        }
        
        if($scope.temp.mypre_location !=''){
          $("#mypre_locid").html($('#mypre_locationid option:selected').html());
        }
        else{
          $("#mypre_locid").html("<i> Not Mentioned </i>");
        }
        
        if($scope.temp.condition !=''){
          $("#temp_condid").html($scope.temp.condition);
        }
        else{
          $("#temp_condid").html("<i> Not Mentioned </i>"); 
        }
        
        if($scope.temp.briefnote !=''){
          $("#temp_briefid").html($scope.temp.briefnote);
        }
        else{
          $("#temp_briefid").html("<i> Not Mentioned </i>"); 
        }

        if($scope.temp.sec_mail !=''){
          $("#alt_emailid").html($scope.temp.sec_mail);
        }
        else{
          $("#alt_emailid").html("<i> Not Mentioned </i>"); 
        }

        if($scope.temp.sec_mobile !=''){
          $("#alt_mobid").html($scope.temp.sec_mobile);
        }
        else{
          $("#alt_mobid").html("<i> Not Mentioned </i>"); 
        }
        show_status('tem-details','tem-edit-btn','tem-edit');
      }
    }).error(function (data) {});
    
  }

});

      (function () {
        'use strict';
        var directiveId = 'ngMatch';
        GlobalApp.directive(directiveId, ['$parse', function ($parse) {
         
        var directive = {
        link: link,
        restrict: 'A',
        require: '?ngModel'
        };
        return directive;
         
        function link(scope, elem, attrs, ctrl) {
        // if ngModel is not defined, we don't need to do anything
        if (!ctrl) return;
        if (!attrs[directiveId]) return;
         
        var firstPassword = $parse(attrs[directiveId]);
         
        var validator = function (value) {
        var temp = firstPassword(scope),
        v = value === temp;
        ctrl.$setValidity('match', v);
        return value;
        }
         
        ctrl.$parsers.unshift(validator);
        ctrl.$formatters.push(validator);
        attrs.$observe(directiveId, function () {
        validator(ctrl.$viewValue);
        });
         
        }
        }]);
        })();

angular.bootstrap(document.getElementById("globalappid"),['GlobalApp']);
angular.bootstrap(document.getElementById("searchPage"),['searchPageApp']);
