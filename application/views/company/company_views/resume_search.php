<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
    <div class="row">     
        <div class="white-box-right">
            <div class="but-text-color"><i class="fa fa-chevron-left"></i>
                <a href="<?php echo base_url(); ?>employer" class="but-text-color">Back to home</a>
            </div>
            <div class="col-xs-12 margin-ten">
                <div class="col-lg-3 col-sm-3 col-xs-3">Search</div>
                <div class="col-sm-6 col-xs-5">
                    <form role="form">
                        <label class="radio-inline">
                            <input type="radio" name="optradio" checked onClick="normal('norml_resume','temp_resume')" value="R">Regular
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio" onClick="normal('temp_resume','norml_resume')" value="T">Temporary
                        </label>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 prf-col2"></div>
            <input type="hidden" name="language_name" id="language_name" value="<?php echo $this->input->cookie('lang_cookie'); ?>">
            <div id="norml_resume"> <!--outer-div-search-->
                    <div class="col-xs-12 margin-ten"><h4>Search Resume</h4></div>
                    <form id="regres_search" name="regres_search" method="post" class="form-horizontal" action="<?php echo base_url(); ?>employer/search_result">
                        <input type="hidden" name="search_type" id="search_type" value="R">
                        <div class="col-xs-12 margin-thirty">
                            <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Position</div>
                            <div class="col-sm-5 col-xs-7">
                                <!-- <input type="text" name="position" id="position" class="form-control bootstrap-tagsinput" data-role="tagsinput" /> -->
                                <input type="text" name="position" id="position" class="form-control" />
                                <ul class="dropdown-menu txtposition search-result" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="Dropdownposition"></ul>
                            </div>
                            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                        </div>
                        <div class="col-xs-12 margin-thirty">
                            <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Area Of Experience <span class="text-danger">*</span></div>
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control">
                                    <option value="">Select Experience Area</option>
                                    <?php
                                        $areaexp_field = 'areaofexpname_'.$this->input->cookie('lang_cookie');
                                        foreach($view_area_exp as $area_exp_all)
                                        {
                                            echo "<option value='".$area_exp_all['areaofexpid']."'>";
                                            echo $area_exp_all[$areaexp_field];
                                            echo '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                        </div>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Region or Country<span class="text-danger">*</span></div>
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control" multiple="">
                                    <option value="" selected="selected">Select Region or Country</option>
                                    <optgroup label="Region">
                                        <?php 
                                            $region_field = 'region_'.$this->input->cookie('lang_cookie');
                                            foreach($view_regions as $all_regions)
                                            {
                                                echo '<option value="'.$all_regions['region_id'].'">';
                                                echo $all_regions[$region_field];
                                                echo '</option>';
                                            } 
                                        ?>
                                    </optgroup>
                                    <optgroup label="Country">
                                        <?php 
                                            $country_field = 'locationname_'.$this->input->cookie('lang_cookie');
                                            foreach($view_countries as $all_countries)
                                            {
                                                echo '<option value="'.$all_countries['locationid'].'">';
                                                echo $all_countries[$country_field];
                                                echo '</option>';
                                            } 
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                        </div>
                        <div class="col-xs-12 margin-thirty">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin-ten">Total Experience</div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                    <select class="form-control">
                                        <option value="min">Min</option>
                                        <option value="0">Fresher</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="1">3</option>
                                        <option value="2">4</option>
                                        <option value="1">5</option>
                                        <option value="2">6</option>
                                    </select>
                                </div>
                                <span class="col-sm-2 col-xs-2">To</span>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                    <select class="form-control">
                                        <option value="max">Max</option>
                                        <option value="0">Fresher</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="1">3</option>
                                        <option value="2">4</option>
                                        <option value="1">5</option>
                                        <option value="2">6</option>
                                    </select>
                                </div>
                                <span class="col-sm-2 col-xs-2">In Years</span>     
                            </div>
                        </div>
                        <div class="col-xs-12 margin-thirty">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin-ten">Salary</div> 
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <span class="col-lg-2 col-md-2 col-sm-3 col-xs-3 row">
                                    <select class="input-width form-control salary-rs">
                                        <option>Rs.</option>
                                        <option>USD</option>
                                    </select>
                                </span>
                                <input type="text" placeholder="Lakh" class="col-lg-1 col-md-2 col-sm-2 col-xs-6 input-sm-width1 salary-input form-control">
                                <input type="text" placeholder="Thousands" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 margin-one input-sm-width2 form-control">
                                <span class="col-lg-1 col-md-1 col-sm-1 col-xs-1 salary-text">To</span>
                                <input type="text" placeholder="Lakh" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 input-sm-width1 form-control">
                                <input type="text" placeholder="Thousands" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 margin-one input-sm-width2 form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="primary-btn ad-apply-btn " onclick="regsend_result()" href="javascript:void(0);">Search</a>
                        </div>
                    </form>
            </div> <!--outer-div-search-->
            <div id="temp_resume"> <!--outer-div-temp-search-->
                <div class="col-xs-12 margin-ten"><h4>Search Temporary Resume</h4></div>
                <form id="tempres_search" name="tempres_search" method="post" class="form-horizontal" action="<?php echo base_url(); ?>employer/search_result">
                        <input type="hidden" name="search_type" id="search_type" value="T">
                    <div class="col-xs-12 margin-thirty">
                            <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Position</div>
                            <div class="col-sm-5 col-xs-7">
                                <input type="text" name="temp_position" id="temp_position" class="form-control bootstrap-tagsinput" value="Hanoi" data-role="tagsinput" />
                            </div>
                            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                    </div>
                    <div class="col-xs-12 margin-thirty">
                        <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Area Of Experience <span class="text-danger">*</span></div>
                        <div class="col-sm-5 col-xs-12">
                            <select class="form-control">
                                <option value="">Select Experience Area</option>
                                <option value="">Area#1</option>
                                <option value="">Area#2</option>
                                <option value="">Area#3</option>
                                <option value="">Area#4</option>
                                <option value="">Area#5</option>
                                <option value="">Area#6</option>
                                <option value="">Area#7</option>
                            </select>
                        </div>
                        <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                    </div>
                    <div class="col-xs-12 margin-ten">
                        <div class="col-md-3 col-sm-4 col-xs-12 margin-ten">Location <span class="text-danger">*</span></div>
                        <div class="col-sm-5 col-xs-12">
                            <select class="form-control" multiple="">
                                <option value="" selected="selected">Select Location</option>
                                <option value="as">Asia</option>
                                <option value="af">Africa</option>
                                <option value="nor">North America</option>
                                <option value="east">Eastern Europe</option>
                                <option value="euro">European Union</option>
                                <option value="sou">South America</option>
                                <option value="car">The Caribbean</option>
                            </select>
                        </div>
                        <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select any language or all"></span>
                    </div>
                    <div class="col-xs-12 margin-thirty">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin-ten">Total Experience</div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                <select class="form-control">
                                    <option value="min">Min</option>
                                    <option value="0">Fresher</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="1">3</option>
                                    <option value="2">4</option>
                                    <option value="1">5</option>
                                    <option value="2">6</option>
                                </select>
                            </div>
                            <span class="col-sm-2 col-xs-2">To</span>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                <select class="form-control">
                                    <option value="max">Max</option>
                                    <option value="0">Fresher</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="1">3</option>
                                    <option value="2">4</option>
                                    <option value="1">5</option>
                                    <option value="2">6</option>
                                </select>
                            </div>
                            <span class="col-sm-2 col-xs-2">In Years</span>     
                        </div>
                    </div>
                    <div class="col-xs-12 margin-ten">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin-ten">Availability</div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                <input type="text" class="form-control" id="birthday" data-parsley-id="7618" placeholder="From Date">
                                <ul class="parsley-errors-list" id="parsley-id-7618"></ul>
                            </div>
                            <span class="col-sm-2 col-xs-2">From</span>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 exp-input row margin-thirty">
                                <input type="text" class="form-control" id="birthday1" data-parsley-id="7618" placeholder="To Date">
                                <ul class="parsley-errors-list" id="parsley-id-7618"></ul>
                            </div>
                            <span class="col-sm-1 col-xs-1">To</span>
                        </div>
                    </div>     
                    <div class="col-xs-12 margin-thirty">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin-ten">Salary</div> 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <span class="col-lg-2 col-md-2 col-sm-3 col-xs-3 row">
                                <select class="input-width form-control salary-rs">
                                    <option>Rs.</option>
                                    <option>USD</option>
                                </select>
                            </span>
                            <input type="text" placeholder="Lakh" class="col-lg-1 col-md-2 col-sm-2 col-xs-6 input-sm-width1 salary-input form-control">
                            <input type="text" placeholder="Thousands" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 margin-one input-sm-width2 form-control">
                            <span class="col-lg-1 col-md-1 col-sm-1 col-xs-1 salary-text">To</span>
                            <input type="text" placeholder="Lakh" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 input-sm-width1 form-control">
                            <input type="text" placeholder="Thousands" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 margin-one input-sm-width2 form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 text-center"><a class="primary-btn ad-apply-btn " onclick="tempsend_result()" href="javascript:void(0);">Search</a>
                    </div>
                </form>
            </div><!--outer-div-temp-search-->
        </div>
    </div>
</div>
<!--Recent Search-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="white-box-right">
        <h4>Recent Search</h4>
        <div class="prf-col2"></div>
        <div class="margin-ten margin-seven"><a href="search-result.php">Web Designer</a></div>
        <div class="margin-ten margin-seven">1-2 year</div>
    </div>
</div>
<!--Saved Search-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="white-box-right">
        <h4>Saved Searches</h4>
        <div class="prf-col2"></div>
        <div class="margin-ten margin-seven"><a href="search-result.php">Content Writer</a><span class="pull-right">31st July 2015</span></div>
        <div class="margin-ten margin-seven"><a href="search-result.php">Web Designer</a><span class="pull-right">22nd July 2015</span></div>
        <div class="margin-ten margin-seven"><a href="search-result.php">Web Developer</a><span class="pull-right">19th July 2015</span></div>
    </div>
</div>
 <script type="text/javascript">
$(document).ready(function () {
  $('#birthday').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
  }, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
  $('#birthday1').daterangepicker({
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

<script>
/*$(document).ready(function () {
    $('#bootstrapTagsInputForm')
        .find('[name="position"]')
            
            .change(function (e) {
                $('#bootstrapTagsInputForm').formValidation('revalidateField', 'position');
            })
            .end()
        
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Position: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter at least one position you like the most.'
                        }
                    }
                },
               
        });
});*/
</script>
<script type="text/javascript">
    function regsend_result()
    { 
        //window.location.href="search-result.php";
        $("#regres_search").submit();
    }
    function tempsend_result()
    { 
        //window.location.href="search-result.php";
        $("#tempres_search").submit();
    }
  </script>
  <script type="text/javascript">
  document.getElementById('temp_resume').style.display= "none";
  function normal(val1,val2){
    document.getElementById(val1).style.display = "block";
    document.getElementById(val2).style.display = "none";    
  } 
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script>
/*$(document).ready(function()
{
    $('input[name="optradio"]').on("click",function()
    {
        var job_type = $('input[name="optradio"]:checked').val();
        alert(job_type);
        $("#search_type").val() = job_type;
    });
   
});*/
</script>
<script>
$(document).ready(function()
{
    $("#position").keyup(function()
    {
        console.log($(this).val());
        $.ajax({
            'url':"<?php echo base_url(); ?>company/Employer_json/get_all_position",
            'type':"post",
            'data':'position_keyword='+$(this).val(),
            'dataType':"JSON",
            success:function(get_pos)
            {
                if(get_pos.length > 0)
                {
                    $('#Dropdownposition').empty();
                    $('#position').attr("data-toggle", "dropdown");
                    $('#Dropdownposition').dropdown('toggle');
                }
                else if(get_pos.length == 0)
                {
                    $('#position').attr("data-toggle", "");
                }
                $.each(get_pos, function (key,value) {
                    if (get_pos.length >= 0)
                    {
                        //console.log($("#language_name").val());
                        var position_field = 'positionname_'+$("#language_name").val();
                        $('#Dropdownposition').append('<li role="presentation" class="search-content" >' + value[position_field] + '</li>');
                    }
                });
                $('ul.txtposition').on('click', 'li', function () {
                    $('#position').val($(this).text());
                });
            }
        });
         
    });
});
</script>
