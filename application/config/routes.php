<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'JobBoard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['jobboard'] = 'JobBoard';
$route['jobboard/(:any)'] = 'JobBoard/$1';

/* Job Seeker route setup */
$route['myjobs'] = 'jseeker/JobSeeker';
$route['myjobs/(:any)'] = 'jseeker/JobSeeker/$1';

$route['seekerprofile'] = 'jseeker/SeekerJson';
$route['seekerprofile/(:any)'] = 'jseeker/SeekerJson/$1';

/* Employer route setup */
$route['employer'] = 'company/employer/dashboard';
$route['employer/dashboard_notify'] = 'company/employer/dashboard_notify';
$route['employer/all_jobs'] = 'company/employer/view_jobs';
$route['employer/edit_job/(:any)'] = 'company/employer/add_new_job/$1';
$route['employer/add_job'] = 'company/employer/add_new_job';
$route['employer/get_job/(:any)'] = 'company/employer/get_job/$1';
$route['employer/delete_job/(:any)'] = 'company/employer/delete_job/$1';
$route['employer/closed_job'] = 'company/employer/closed_job';
$route['employer/reopen_job'] = 'company/employer/reopen_job';
$route['employer/modify_company'] =  'company/employer/edit_company';
$route['employer/all_employer'] =  'company/employer/view_employer';
$route['employer/request_employer'] =  'company/employer/unapprove_employer';
$route['employer/shortlist'] =  'company/employer/candidate_shortlist';
$route['employer/onhold'] =  'company/employer/candidate_onhold';
$route['employer/reject'] =  'company/employer/candidate_reject';
$route['employer/saved_search'] =  'company/employer/saved_search';
$route['employer/find_resume'] =  'company/employer/resume_search';
$route['employer/search_result'] =  'company/employer/resume_search_result';
$route['employer/folder'] =  'company/employer/all_folders';
$route['employer/get_statistics'] =  'company/employer/download_stats';
$route['employer/show_report'] =  'company/employer/get_report';
$route['employer/plans'] =  'company/employer/plan_details';
$route['employer/mail_template'] =  'company/employer/email_templates';
//$route['employer/add_template'] =  'company/employer/email_template_detail';
$route['employer/history'] =  'company/employer/plan_history';
$route['employer/reminder'] =  'company/employer/message_reminder';
$route['employer/best_company'] =  'company/employer/bestin_company';
$route['employer/complain'] =  'company/employer/send_complain';
$route['employer/report'] =  'company/employer/activity_report';
$route['employer/checkout'] =  'company/employer/checkout';
//$route['employer/new_job'] = 'company/employer/add_new_job';
//$route['employer/(:any)'] = 'company/employer/dashboard/$1';