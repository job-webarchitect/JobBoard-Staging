<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title><?php echo $title;?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">       
<link href="<?php echo base_url();?>assets/css/morris.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/H_style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/jstyle.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/pages/dashboard.css" rel="stylesheet">

</head>

<body>

<?php
 $user = $this->session->userdata('username');
 $permission = $this->session->userdata('permission');

?>



	<div class="navbar navbar-fixed-top">

  <div class="navbar-inner">

    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    	<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand brand-padding" href="index.php"><img width="200px" src="<?php echo base_url();?>assets/img/logo.png"/></a>  

      <div class="nav-collapse">

        <ul class="nav pull-right">

          <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <i class="icon-user"></i><?php echo $user ?> <b class="caret"></b></a>

            <ul class="dropdown-menu">

              <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>

            </ul>

          </li>

        </ul>

      </div>

      <!--/.nav-collapse --> 

    </div>

    <!-- /container --> 

  </div>

  <!-- /navbar-inner --> 

</div>

		<!-- /navbar -->

		<div class="subnavbar">

  <div class="subnavbar-inner">

    <div class="container">

      <ul class="mainnav">

	   
        <li class="active"><a href="<?php echo base_url()?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
       
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

          <i class="icon-user"> </i> <span>Users</span> </a> 

          <ul class="dropdown-menu">

            <li><a href="<?php echo site_url('admin/jobseeker')?>"> Job Seekers</a></li>

            <li><a href="<?php echo site_url('admin/company')?>"> Company Employers</a></li>

			<li><a href="<?php echo site_url('admin/recruitment')?>">Recruitment Agencies</a></li>

            <li><a href="<?php echo site_url('admin/consultancy')?>">Consultancy</a></li>
              
           <?php /*?>  <li><a href="<?php echo site_url('admin/translator')?>">Translator</a></li> <?php */?>   
         
          </ul>

        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">     

        <i class="icon-money"></i><span>Payment</span> </a>    

          <ul class="dropdown-menu">

            <li><a href="<?php echo site_url('admin/paymentplan')?>">Payment Plan</a></li>

            <li><a href="<?php echo site_url('admin/discountplan')?>">Discount Plan</a></li>

            <li><a href="<?php echo site_url('admin/refund')?>">Refund</a></li>


          </ul>

        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

          <i class="icon-sitemap"> </i> <span>Ads Management</span> </a> 

          <ul class="dropdown-menu">

            <li><a href="<?php echo site_url('admin/hotjobs')?>">Hot Jobs</a></li>

            <li><a href="<?php echo site_url('admin/advertisment')?>"> Job Advertisement</a></li>

           

          </ul>

        </li>  
        
        <!--<li class="dropdown"><a href="feedback.php">
          <i class=" icon-share"> </i> <span>User Feedback</span> </a> 
        </li>-->
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class=" icon-cogs"> </i> <span>Configuration Option</span> </a> 
          <ul class="dropdown-menu">
            <?php /*?><li><a href="<?php echo site_url('admin/language');?>">Language Configuration</a></li><?php */?>
            <li><a href="<?php echo site_url('admin/location');?>">Location Configuration</a></li>
            <li><a href="<?php echo site_url('admin/tax');?>">Tax Configuration</a></li>
            <li><a href="javascript:">Mail Configuration</a></li>
            <li><a href="<?php echo site_url('admin/matchresume');?>">Resume Match Configuration</a></li>
            <li><a href="<?php echo site_url('admin/account');?>">Account Configuration</a></li>
            <li><a href="<?php echo site_url('admin/position');?>">Position Configuration</a></li>
             <li><a href="<?php echo site_url('admin/grade');?>">Grade Configuration</a></li>
            <li><a href="<?php echo site_url('admin/area');?>">Area of Experience Configuration</a></li>
          </ul>

        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

          <i class="icon-list-alt"> </i> <span>Report</span> </a> 

          <ul class="dropdown-menu">

            <li><a href="<?php echo site_url('admin/activity')?>">Activity Report</a></li>
          <?php /*?>  <li><a href="job-post.php">Transaction Report</a></li>
            <li><a href="no-job-response.php">Outstand Activity</a></li>
            <li><a href="<?php echo site_url('admin/subactivity')?>">Sub Admin Activity</a></li><?php */?>

          
           

          </ul>

        </li>



      </ul>

	<?php if($permission =='0') : ?>
      
      <ul class="mainnav pull-right">

      <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

      <i class="icon-plus-sign"></i><span>Sub Admin</span> </a> 

          <ul class="dropdown-menu">

            <li><a href="<?php echo site_url('admin/add')?>">Add New Sub Admin</a></li>

            <li><a href="<?php echo site_url('admin/manage')?>">Manage Sub Admin</a></li>

            <li><a href="<?php echo site_url('admin/subactivity')?>">Sub Admin Activity</a></li>

          </ul>

      </li>

      </ul>
      
    <?php endif; ?>

    </div>

    <!-- /container --> 

  </div>

  <!-- /subnavbar-inner --> 

</div>

			<!-- /subnavbar -->

			<!-- Content -->

					<?php echo $this->load->view($content,NULL,TRUE); ?>

			<!-- /Content -->

		<div class="footer">

  <div class="footer-inner">

    <div class="container">

      <div class="row">

        <div class="span12"> &copy; 2015 <a href="javascript:;"> Job Portal</a>.</div>

        <!-- /span12 --> 

      </div>

      <!-- /row --> 

    </div>

    <!-- /container --> 

  </div>

  <!-- /footer-inner --> 

</div>

		<!-- /footer --> 

		
        <!-- Le javascript

================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 

<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-hover-dropdown.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/morris/raphael.min.js"></script>
<?php /*?><script src="<?php echo base_url();?>assets/js/morris/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/js/morris/morris-data.js"></script> <?php */?> 
<script src="<?php echo base_url();?>js/base.js"></script> 

<script>     

        var lineChartData = {

            labels: ["January", "February", "March", "April", "May", "June", "July"],

            datasets: [

				{

				    fillColor: "rgba(220,220,220,0.5)",

				    strokeColor: "rgba(220,220,220,1)",

				    pointColor: "rgba(220,220,220,1)",

				    pointStrokeColor: "#fff",

				    data: [65, 59, 90, 81, 56, 55, 40]

				},

				{

				    fillColor: "rgba(151,187,205,0.5)",

				    strokeColor: "rgba(151,187,205,1)",

				    pointColor: "rgba(151,187,205,1)",

				    pointStrokeColor: "#fff",

				    data: [28, 48, 40, 19, 96, 27, 100]

				}

			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);

        var barChartData = {

            labels: ["January", "February", "March", "April", "May", "June", "July"],

            datasets: [

				{

				    fillColor: "rgba(220,220,220,0.5)",

				    strokeColor: "rgba(220,220,220,1)",

				    data: [65, 59, 90, 81, 56, 55, 40]

				},

				{

				    fillColor: "rgba(151,187,205,0.5)",

				    strokeColor: "rgba(151,187,205,1)",

				    data: [28, 48, 40, 19, 96, 27, 100]

				}

			]

        }    

        $(document).ready(function() {

        var date = new Date();

        var d = date.getDate();

        var m = date.getMonth();

        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({

          header: {

            left: 'prev,next today',

            center: 'title',

            right: 'month,agendaWeek,agendaDay'

          },

          selectable: true,

          selectHelper: true,

          select: function(start, end, allDay) {

            var title = prompt('Event Title:');

            if (title) {

              calendar.fullCalendar('renderEvent',

                {

                  title: title,

                  start: start,

                  end: end,

                  allDay: allDay

                },

                true // make the event "stick"

              );

            }

            calendar.fullCalendar('unselect');

          },

          editable: true,

          events: [

            {

              title: 'All Day Event',

              start: new Date(y, m, 1)

            },

            {

              title: 'Long Event',

              start: new Date(y, m, d+5),

              end: new Date(y, m, d+7)

            },

            {

              id: 999,

              title: 'Repeating Event',

              start: new Date(y, m, d-3, 16, 0),

              allDay: false

            },

            {

              id: 999,

              title: 'Repeating Event',

              start: new Date(y, m, d+4, 16, 0),

              allDay: false

            },

            {

              title: 'Meeting',

              start: new Date(y, m, d, 10, 30),

              allDay: false

            },

            {

              title: 'Lunch',

              start: new Date(y, m, d, 12, 0),

              end: new Date(y, m, d, 14, 0),

              allDay: false

            },

            {

              title: 'Birthday Party',

              start: new Date(y, m, d+1, 19, 0),

              end: new Date(y, m, d+1, 22, 30),

              allDay: false

            },

            {

              title: 'EGrappler.com',

              start: new Date(y, m, 28),

              end: new Date(y, m, 29),

              url: 'http://EGrappler.com/'

            }

          ]

        });

      });

    </script>
 <!-- /Calendar -->
  <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#start_date').datepicker({
                    format: "yyyy-mm-dd"
                });
                $('#start_date1').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
        </script>
        
 <!-- Change lang -->
<script>
 $("#Role").on('change',function(){
		var sel_opt = $(this).val();
		 switch(sel_opt) {
			case 'en' : $('.langcode').val(sel_opt);
					break;
			case 'fr' : $('.langcode').val(sel_opt);
					break;
			case 'de' : $('.langcode').val(sel_opt);
					break;
			case 'es' : $('.langcode').val(sel_opt);
					break;
			case 'chi' : $('.langcode').val(sel_opt);
					break;
			case 'ru' : $('.langcode').val(sel_opt);
					break;
		    default:   $('.langcode').val(sel_opt);
					break;
						
		}
});




var sel_opt = $("#plan_type").val();
if(sel_opt!=0) 
{
	$('.selectedplan').val(sel_opt);
}

	
$("#plan_type").on('change',function(){
		 var sel_opt = $(this).val();
		  switch(sel_opt) {
			
			case '0' : 
					 $('.res_email_show').hide();
			
			case '1' : 
					$('.res_email_show').hide();
					$('.selectedplan').val(sel_opt);
					break;
			case '2' : 
					$('.res_email_show').hide();
					$('.selectedplan').val(sel_opt);
					break;
			case '3' : 
					$('.res_email_show').hide();
					$('.selectedplan').val(sel_opt);
					break;
			default:  
					$('.res_email_show').show();
					$('.selectedplan').val(sel_opt);
					break;
						
		}
});



//Role
$("#select_role" )
      .change(function() {
        var str = "";
		var str2 = ""; 
        $( "select option:selected" ).each(function() {
          str += $(this).text() + ",";
		  str2 += $(this).val() + ",";
        });
       $('.selectedrole').val(str); // Put selected value to div
	   $('.selectedper').val(str2);
       })
      .trigger( "change" );
	  

	  
function show_other_qual() {
        
		//alert(id);
		var str = "";
		var str2 = "";
        $( "select option:selected" ).each(function() {
          //str += $(this).text();
		  str2 += $(this).val();
        });
      
	   //$('.switchas_text').val(str);
	   $('.switchas_val').val(str2); // Put selected value to div
       
}
</script>

</body>

</html>

