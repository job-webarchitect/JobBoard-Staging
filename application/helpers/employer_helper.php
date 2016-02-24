<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* GET Job Type

*/
function getJobType($value) {  
   $job_type = ($value == 1) ? "R": "T";
   return $job_type;
}
