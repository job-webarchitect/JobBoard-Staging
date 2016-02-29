
$(document).ready(function() {
    $("#add_new_jobs").validate({
        rules: {
            job_lang: "required",
            position: "required",
            job_skills: "required",
            job_desc: {
                required: true,
                minlength: 10,
            },
            job_wrexp_min: "required",
            job_wrexp_max: "required",
            job_area_exp: "required",
            job_salary_min: "required",
            job_salary_max: "required",
            job_location: "required",
            job_vacancy_count: {
                required: true,
                number: true
            },
            job_adv_opendate: {
                required: true,
                date: true
            },
            job_adv_closedate: {
                required: true,
                date: true
            },
            job_qualification: "required",
            job_condition: "required",
            temp_available_from: "required",
            temp_available_to: "required",
        },
        messages: {
            job_lang: "please select any Language",
            position: "please select position",
            job_desc: {
                required: "please type job skills",
                minlength: "Your Job Description must consist of at least 10 characters",
            },
            job_skills: "please select Job Description",
            job_wrexp_min: "This field is required",
            job_wrexp_max: "This field is required",
            job_area_exp: "please select area of experience",
            job_salary_min: "This field is required",
            job_salary_max: "This field is required",
            job_location: "please select job location",
            job_vacancy_count: {
                required: "please enter number of vacancy",
                number: "please enter numeric"
            },
            job_adv_opendate: "please select opendate",
            job_adv_closedate: "please select closedate",
            job_qualification: "please select Job Qualification",
            job_condition: "This field is required",
            temp_available_from: "This field is required",
            temp_available_to: "This field is required",


        }
    });
    //validation
    $("#add_employer").validate({
        rules: {
            fname:{
                required : true,
                minlength: 2,
            },
            lname: "required",
            email: {
                required: true,
                email: true
            },
            language : "required",
            location : "required",
        },
        messages: {
            fname:{
                required :"Please enter first name",
                minlength:"Your first name consist min 2 chars",
            },
            lname : "Please enter last name",
            email: {
                required: "Please enter email address",
                email: "Please enter valid email address",
            },
            language : "Please select any Language",
            location : "Please select any location",

        }
    });
    $("#add_email_template").validate({
        rules: {
            tmpl_name:{
                required : true,
                minlength: 5,
            },
            tmpl_subj: "required",
            tmpl_from: {
                required: true,
                email: true
            },
            tmpl_mesg : "required",
            tmpl_sign : "required",
        },
        messages: {
            tmpl_name:{
                required :"Please enter Template name",
                minlength:"Your first name consist min 5 chars",
            },
            tmpl_subj : "Please enter subject",
            tmpl_from: {
                required: "Please enter email address",
                email: "Please enter valid email address",
            },
            tmpl_mesg : "Please enter message",
            tmpl_sign : "Please enter signature",

        }
    });
});
