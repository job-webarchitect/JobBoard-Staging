<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* GET Job Type

*/
function getJobType($value) {  
   $job_type = ($value == 1) ? "R": "T";
   return $job_type;
}

/*
* GET Job Response Status

*/
function getJobResponseStatus($value) {  
   if($value == 1) {
	   $res = "Shortlisted";
   } else  if($value == 2) {
	   $res = "On hold";
   } else if($value == 3) {
	   $res = "Rejected";
   } else {
	   $res = "Pending";
   }
   return $res;
   
}
