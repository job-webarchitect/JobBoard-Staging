
var appLang = angular.module('langApp',[])
  appLang.config(function ($routeProvider, $locationProvider) {
        //routing DOESN'T work without html5Mode
      $locationProvider.html5Mode(true);
  });

appLang.controller('langController',function($scope, $window, $http, $location) {

  $scope.changeLangFun=function(selectedlang){
    $("#full_loader").fadeIn('900');
  	$.ajax({
          url: 'http://projectstart2.com/home/set_lang_cookie/'+selectedlang+'/projecteam1.com/?callback=JSON_CALLBACK',
          dataType: "jsonp",
          headers: {'Content-Type': 'application/json'},
        success: function(data){
          $http({
            url: base_url+'/jsonapi/set_lang_cookie/selectedlang',
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data: JSON.stringify({'request_lang':selectedlang})
          }).success(function (data) {  
            console.log(data);
            $("#full_loader").fadeOut('900');
            $window.location.href = window.location;
          }).error(function (data) {
            console.log('Internal Error Occured');  
          });
        },
        error: function(data){
          console.log('Error Occured');
        }
      });       
  }

});

angular.bootstrap(document.getElementById("searchAppid"),['searchApp']);
