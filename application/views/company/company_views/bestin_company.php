<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
    <?php 
        if($this->session->flashdata('mesg_succ')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('mesg_succ').'</div>';
        } else if($this->session->flashdata('mesg_err')) {
            echo '<div class="alert alert-alert">'.$this->session->flashdata('mesg_err').'</div>';
        }
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-12 "> <!-- right part-->
                <div class="clearfix"></div>
                <div class="row">     
                    <div class="white-box-right">
                        <div class="col-lg-12"><h4>Best in Company</h4></div>
                        <div class="col-xs-12 prf-col2"></div>
                        <div class="col-lg-12 margin-ten">
                            <div class="margin-thirty">
                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Best Employee</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Best Unit of the Year</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <form action="<?php echo base_url(); ?>company/employer/bestin_company" method="post" enctype="multipart/form-data" name="employee_month" id="employee_month">
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Photo</div>
                                            <div class="col-md-6 col-xs-7"><input type="file" name="employ_image" id="employ_image"></div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Person Name</div>
                                            <div class="col-md-6 col-xs-7">
                                                <input type="text" class="form-control" placeholder="Enter Person Name" name="employ_name" id="employ_name">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Unit Name</div>
                                            <div class="col-md-6 col-xs-7"><input type="text" class="form-control" placeholder="Enter Unit Name" name="unit_name"  id="unit_name"></div>
                                        </div>
                                        <!--<div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Company Name</div>
                                            <div class="col-md-6 col-xs-7"><input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name"></div>
                                        </div>-->
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                        <div class="col-md-3 col-sm-4 col-xs-3">Employee Month </div>
                                            <div class="col-md-3 col-xs-7">
                                                <select name="month" id="month" class="form-control">
                                                    <option value="january">JANUARY</option>
                                                    <option value="february">FEBRUARY</option>
                                                    <option value="march">MARCH</option>
                                                    <option value="april">APRIL</option>
                                                    <option value="may">MAY</option>
                                                    <option value="june">JUNE</option>
                                                    <option value="july">JULY</option>
                                                    <option value="august">AUGUST</option>
                                                    <option value="september">SEPTEMBER</option>
                                                    <option value="october">OCTOBER</option>
                                                    <option value="november">NOVEMBER</option>
                                                    <option value="december">DECEMBER</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-xs-7">            
                                                <select name="year" id="year" class="form-control">
                                                    <?php 
                                                        $curr_year = date('Y'); 
                                                        for($year=date('Y')-1; $year<=date('Y')+10; $year++) {
                                                    ?>
                                                           <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Description</div>
                                            <div class="col-md-6 col-xs-7">
                                                <textarea class="form-control" rows="10" placeholder="Enter Short Description (Maximum 10-15 words)" name="bestemp_description" id="bestemp_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Advertisement Date</div>
                                            <div class="col-md-6 col-xs-7">
                                                <input class="form-control margin-ten" type="text" name="from-date" id="from-date" placeholder="Select start date(MM/DD/YYYY) eg. 05/15/2010">
                                                <input class="form-control" type="text" name="to-date" id="to-date" placeholder="Select end date(MM/DD/YYYY) eg. 08/20/2010">
                                            </div>
                                        </div>
                                        <!--<div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Advertisement Cost</div>
                                            <div class="col-md-6 col-xs-7">
                                                <input type="hidden" name="bestemp_advertise_cost" value="100">
                                                <strong>$100</strong>
                                            </div>
                                        </div>-->
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3"></div>
                                            <div class="col-md-6 col-xs-7">
                                                <!-- <input type="submit" name="submit" value="Submit" class="primary-btn ad-apply-btn"> -->
                                                <a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="bestemploy_addsubmit()">Submit</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--Best Year Of The Month-->
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <form action="<?php echo base_url(); ?>company/employer/bestin_year" method="post" enctype="multipart/form-data" name="employee_year" id="employee_year">
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Logo or Photo</div>
                                            <div class="col-md-6 col-xs-7"><input type="file" name="bestyear_image" id="bestyear_image"></div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Unit Name</div>
                                            <div class="col-md-6 col-xs-7"><input type="text" class="form-control" placeholder="Enter Unit Name" name="bestyear_unitname" id="bestyear_unitname"></div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Chief Name</div>
                                            <div class="col-md-6 col-xs-7"><input type="text" class="form-control" placeholder="Enter Chief Name" name="chief_name" id="chief_name"></div>
                                        </div>
                                       <!-- <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Company Name</div>
                                            <div class="col-md-6 col-xs-7"><input type="text" class="form-control" placeholder="Enter Company Name" name="bestyear_company_name" id="bestyear_company_name"></div>
                                        </div>-->
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Year </div>
                                            <div class="col-md-3 col-xs-7">            
                                                <select name="bestyear_year" id="bestyear_year" class="form-control">
                                                    <?php 
                                                        $curr_year = date('Y'); 
                                                        for($year=date('Y')-1; $year<=date('Y')+10; $year++) {
                                                    ?>
                                                           <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Description</div>
                                            <div class="col-md-6 col-xs-7">
                                                <textarea class="form-control" rows="10" placeholder="Enter Short Description (Maximum 10-15 words)" name="bestyear_desc" id="bestyear_desc"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Advertisement Date</div>
                                            <div class="col-md-6 col-xs-7">
                                                <input class="form-control margin-ten" type="text" name="bestyear_fromdate" id="bestyear_fromdate" placeholder="Select start date(MM/DD/YYYY) eg. 05/15/2010">
                                                <input class="form-control" type="text" name="bestyear_todate" id="bestyear_todate" placeholder="Select end date(MM/DD/YYYY) eg. 08/20/2010">
                                            </div>
                                        </div>
                                        <!--<div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3">Advertisement Cost</div>
                                            <div class="col-md-6 col-xs-7">
                                                <input type="hidden" name="bestyear_advertisecost" value="100">
                                                <strong>$100</strong>
                                            </div>
                                        
                                        </div>-->
                                        <div class="col-xs-12 margin-ten best-emp-text">
                                            <div class="col-md-3 col-sm-4 col-xs-3"></div>
                                            <div class="col-md-6 col-xs-7"><a href="javascript:void(0);" class="primary-btn ad-apply-btn" onclick="bestyear_addsubmit()">Submit</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>  <!-- Tab panes -->
                        </div>
                    </div>
                </div>
            </div>	<!-- ./ right part-->	
        </div>
    </div>	<!-- ./ right part-->	
</div>
<script>
function bestemploy_addsubmit() {
    $("#employee_month").submit();
}
function bestyear_addsubmit() {
    $("#employee_year").submit();
}
</script>