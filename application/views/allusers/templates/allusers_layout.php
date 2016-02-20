<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Job Board - <?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/sb-admin.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/style-job-css.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/bootstrap-tagsinput.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/custom.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/wt-style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/owl.carousel.css"  media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/owl.theme.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/intlTelInput.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans|Bitter" rel="stylesheet" type="text/css">
</head>
<body >
  <header>
  <div class="header" id="langAppid" ng-app="langApp" ng-controller="langController">
    <nav class="padding-header navbar-default navbar-default-two ">
      <div class="container-fluid"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <ul class="topmenu-display">
          <li class="dropdown van-right pull-right"> <a aria-expanded="false" class="dropdown-toggle navbar-toggle collapsed" data-toggle="dropdown" href="#"><img src="<?php echo base_url();?>assets/common/images/Eng_Lang.png" class="magrin-right" height="20" width="20">English<span class="caret"></span></a>
            <ul  class="dropdown-menu">
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('en');"><i class="fa fa-circle menu-dought-size"></i> English</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('fr');">français</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('de');">Deutsch</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('es');">español</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('chi');">中國</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('ru');">русский</a> </li>
              <li class="dropdown margin-left-van"> <a href="#" ng-click="changeLangFun('ar');">العربية</a> </li>
            </ul>
          </li>
        </ul>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right magrin li">
            <li class="dropdown"> <span ng-click="changeLangFun('en');"><strong class="engl-color"> English </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('fr');"><strong class="fran-color">français </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('de');"><strong class="Deu-color">Deutsch  </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('es');"><strong class="spen-color">español  </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('chi');"><strong class="China-color">中國       </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('ru');"><strong class="Russian-color">русский  </strong></span> </li>
            <li class="dropdown"> <span ng-click="changeLangFun('ar');"><strong class="Arabic-color">العربية  </strong></span> </li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
  <nav class="navbar navbar-inverse navbar-inverse-two menu-border navbar-default-three navbar-bottom">
    <div class="container-fluid">
      <div class="navbar-header">
        <button aria-expanded="false" type="button" class="navbar-toggle menu-border collapsed" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <span href="#"><img src="<?php echo base_url();?>assets/common/images/logo.png" width="200" alt="Job Portal"></span> </div>
      <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li><a class="new-nav-color" href="<?php echo base_url();?>"><i class="fa fa-home fa-2x home-icon"></i></a></li>
          <li><a class="new-nav-color" href="#">Find Jobs</a></li>
          <li><a class="new-nav-color" href="#">Find Temporary Jobs</a></li>
          <li><a class="new-nav-color" href="<?=base_url()?>jobboard/postvacancy">Post Vacancy</a></li>
          <li><a class="new-nav-color" href="#">Search Resume</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div id='full_loader'> <img src='<?=base_url()?>assets/common/images/loader1.gif'/> </div>
<div class="container">
  <div class="row">
  <?php $continue_url = current_url(); ?>
  <?php if($this->user_loggedin == 'loggedin') { ?>
  <div class="col-md-12">
    <ul class="nav navbar-top-links navbar-right right-menu-text">
      <li class="dropdown btn-group">
        <a  aria-expanded="false" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">   
          <i class="fa fa-gear fa-2x"> </i> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-user">
         <li><a href="<?=SSO_URL?>/account/users/editprofile"><i class="fa fa-user fa-fw"></i> Edit Profile</a></li>
          <li><a href="<?=SSO_URL?>/account/users/changepassword"><i class="fa fa-unlock-alt fa-fw"></i> Change Password</a></li>
          <!--<li><a href="<?=base_url()?>myjobs/dashboard"><i class="fa fa-gear fa-fw"></i> My Dashboard</a></li>-->
          <li class="divider"></li>
          <li><a href="<?=SSO_URL?>/account/users/logout?continueurl=<?=$continue_url?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-top-links pull-right ">
      <li class="welcome-font-size pull-right">
         <?php if( $this->ssopic != '') {?>
                <img class="left-menu-text" ngf-src="user.editpic" src="<?=SSO_URL?>/image/data/<?=$this->ssopic?>"  height="120">
              <?php
                }
                else {
                  if($this->ssogender == 'male'){ echo '<img ngf-src="user.editpic" src="'.base_url().'assets/common/images/icon-male.png" class="left-menu-text">'; } 
                  if($this->ssogender == 'female'){ echo '<img ngf-src="user.editpic" src="'.base_url().'assets/common/images/icon-female.png" class="left-menu-text">'; } 
                }
          ?>
      </li>
      </ul>

    <ul class="nav navbar-top-links pull-right ">
      <li class="welcome-font-size pull-right btn-margin5">
         <b><?php echo $this->lang->line('text_welcome');?> <?php echo $this->ssofname;?> <?php echo $this->ssolname;?> </b>
      </li>
      <div class="clearfix"></div><div class="col-md-12  row" style=" margin: 0px;"><b>User id : <?=$this->unique_portal_id?></b></div>
    </ul>
  </div>    

  <?php } else if($this->user_loggedin == '') { ?>
    <div class="col-md-12 top-margin">
      <a href="<?=SSO_URL?>/serviceauth/register?continueurl=<?=$continue_url?>" class="wt-primary-btn btn  pull-right ">
            <span class="glyphicon glyphicon-user"></span> <strong> <?php echo $this->lang->line('text_register');?></strong>
      </a>
      <a href="<?=SSO_URL?>/serviceauth/login?continueurl=<?=$continue_url?>" class="wt-primary-btn btn  pull-right ">
            <span class="glyphicon glyphicon-log-in"></span> <strong> <?php echo $this->lang->line('text_login');?> </strong>
      </a>
    </div>
  <?php } ?>

  </div>
</div>
<!-- ./ User Details -->
<div class="container container-bottom" id="globalappid" ng-app="GlobalApp" ng-controller="GlobalController">
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
            <?php echo $this->load->view($content, null, TRUE); ?>
      </div>
  </div>
<footer>
  <div class="col-md-12 col-sm-12 col-xs-12 footer">
    <div class="col-md-6 col-sm-6">
      <div class="col-md-6 col-sm-6 col-xxs">
        <h4>Job Seeker</h4>
        <h5><a class="footer-links" href="javascript:void(0);">Home</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Search Job</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">View All Jobs</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Resume Monster</a></h5>
      </div>
      <div class="col-md-6 col-sm-6 col-xxs">
        <h4>Jobs By Functions</h4>
        <h5><a class="footer-links" href="javascript:void(0);">IT Jobs in India</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Software Jobs in India</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Engineering Jobs in India</a></h5>
      </div>
    </div>
    <div class="col-xxs-clear"> </div>
    <div class="col-md-6 col-sm-6">
      <div class="col-md-6 col-sm-6 col-xxs">
        <h4>Jobs By Location</h4>
        <h5><a class="footer-links" href="javascript:void(0);">Jobs in Bangalore</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Jobs in Chennai</a></h5>
        <h5><a class="footer-links" href="javascript:void(0);">Jobs in Pune</a></h5>
      </div>
      <div class="col-md-6 col-sm-6 col-xxs">
        <h4>Job Seeker</h4>
        <div class="new-space">
          <ul class="nav navbar-nav  magrin-left li">
            <a href=""><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href=""> <i class="fa fa-linkedin-square fa-2x"></i></a>
            <a href=""> <i class="fa fa-twitter-square fa-2x"></i></a>
            <a href=""> <i class="fa fa-google-plus-square fa-2x"></i></a>   
          </ul>
        </div>
        <div class="new-space">
          <h4>Newsletter Subscription</h4>
        </div>
        <div class="ui--mailchimp mc-field-group">
          <input type="email">
          <button class="btn btn-danger" type="button">Subscribe</button>
        </div>
      </div>
      </div>
  </div>
</footer>
<a id='backTop'>Back To Top</a>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/angularjs/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/angularjs/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/angularjs/functions.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/bootstrap-hover-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/sb-admin.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/moment.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.backTop.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/intlTelInput.js"></script>
<script type="text/javascript">
    $(document).ready( function() {
        $('#backTop').backTop({
            'position' : 300,
            'speed' : 500,
            'color' : 'red',
        });
    });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 

    $("#Mobile_No, #con_mo").intlTelInput({
    utilsScript: "<?=base_url()?>assets/common/js/libphonenumber/src/utils.js",
    preferredCountries: [ "<?=$this->ssocountry?>" ]
  });
});
</script>
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
<script type="text/javascript">
$(document).ready(function () {
  $('#birthday1').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
  }, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
  $('#birthday').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
  }, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);  
  });
});
function show_other_qual(other_qual)
{
  if(other_qual.trim() == 'other')
  {
    document.getElementById("qualf_other").style.display="block";     
  }
  else
  {
    document.getElementById("qualf_other").style.display="none";  
  }
}

</script> 
</body>
</html>