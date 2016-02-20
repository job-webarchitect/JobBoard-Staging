<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->

      

      <div class="clearfix"></div>

       <div class="white-box-right">

        <h4>Download Statistics</h4>

        <div class="col-xs-12 prf-col2"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">

          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><b>Specify User Names: </b></div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <select multiple class="form-control">
                <option value="all" selected>All</option>
                <option value="jagriti">Jagriti</option>
              </select>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><b>Specify Duration:</b></div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <input type="text" class="form-control" id="birthday" data-parsley-id="7618" placeholder="From date">
      <ul class="parsley-errors-list" id="parsley-id-7618"></ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <input type="text" class="form-control" id="birthday1" data-parsley-id="7618" placeholder="To date">
      <ul class="parsley-errors-list" id="parsley-id-7618"></ul>
      </div>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><b>Fields to be seen:</b></div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="checkbox"><span class="margin-seven">Searches</span></div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><input type="checkbox"><span class="margin-seven">Resume Views</span></div>

        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">         

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4"></div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="checkbox"><span class="margin-seven">Email-sent</span></div>

        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-4"><input type="checkbox"><span class="margin-seven">Resume downloaded</span></div>

        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4"></div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="<?php echo base_url(); ?>employer/show_report" class="primary-btn ad-apply-btn">

        Generate Report</a></div>

      </div>

 

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

                    </script>