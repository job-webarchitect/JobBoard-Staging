<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
      
      <div class="clearfix"></div>
      <div class="row">     
       <div class="white-box-right">
        <div class="but-text-color col-lg-12 lg-bottom-mar">
       <i class="fa fa-chevron-left"></i><a class="but-text-color" href="<?php base_url(); ?>closed_job"> Back to closed Job </a>
       </div>   
        <h4>Reopen Job</h4>
        <div class="col-lg-2 pull-right text-danger">* <i>Indicates required field</i></div>
        <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-3">Job Type</div>
          <div class="col-sm-6 col-xs-5">
          <form role="form">
          <label class="radio-inline">
            <input type="radio" name="optradio" checked onClick="my_function('reopn_reg','reopn_temp')">Regular
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" onClick="my_function('reopn_temp','reopn_reg')">Temporary
          </label>
          </form></div>
          </div>

        <div class="col-xs-12 prf-col2"></div>
          <div id="reopn_reg"> <!--outer-div-->
           <div class="col-xs-12 margin-ten"><h4>Reopen Regular Job</h4></div>

           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Language <span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8  margin-ten">
            <select class="form-control">
                  <option value="">Select Language</option>
                  <option value="all">All</option>
                  <option value="eng" selected="">English</option>
                  <option value="fre">French</option>
                  <option value="dut">Dutch</option>
                  <option value="spa">Spanish</option>
                  <option value="chi">Chienese</option>
                  <option value="rus">Russian</option>
                  <option value="ara">Arabic</option>
            </select>
          </div>
          <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit language"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Job Position<span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8 margin-ten"><input type="text" class="form-control" value="Job Opportunity for Java candidates"></div>
          <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit job position"></span>
          </div>
          
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Job Description <span class="text-danger">*</span></div>
          <div class="col-sm-8 col-xs-10 margin-ten">
            <textarea class="form-control" rows="10">Role & Responsibilities:
              Senior Developer working closely with development lead along with other team member to develop Java component for Data Acquisition platform.
              Responsible for end to end development of functionality with ability to interact with IT BAs and business users.
              Qualification & Skills:
              Candidate should be Bachelor of Engineering or MCA or MS from reputed university.
              Desirable to have professional certificates like JCP, OCP etc.
              Must have a demonstrable passion for IT, and keen to continue developing and learning
              Should have strong IT experience preferably worked with Investment Bank with proven track record of delivering medium to large IT Development projects.
              Proven track record of working on development projects comprising of Java, spring and PL/SQL.
              Strong development capabilities in Core Java and Spring Integration & Multithreading framework.
              Decent knowledge in SQL and PL/SQL, candidate should be able to understand PL/SQL procedures.
              Should have experience in methodologies like Agile/Scrum, Continuous Integration
              Exhibits high degree of flexibility and can do attitude. Ability to work with very limited level of instruction and supervision.
              Nice to have: CEP and Coherence skills.
            </textarea></div>
           <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit description about job in your words. Maximum length is 250 character."></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Skills <span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8 margin-ten"><input type="text" class="form-control" value="Core Java, Spring, Sql"></div>
          <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit one or more than one skills"></span>
          </div>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">
             <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Work Experience<span class="text-danger">*</span></div>
              <div class="col-sm-2 col-xs-3  margin-ten">
               <select class="form-control">
                <option value="">Min</option>
                <option value="0">Fresher</option>
                <option value="1" selected="">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="1">6</option>
               </select>
              </div><div class="col-sm-1 col-xs-2">To</div>
              <div class="col-sm-2 col-xs-3 margin-thirty">
               <select class="form-control">
                <option value="">Max</option>
                <option value="0">Fresher</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="1" selected="">3</option>
                <option value="2">4</option>
                <option value="1">5</option>
                <option value="2">6</option>
               </select>
              </div><div class="col-md-1 col-xs-2  margin-ten">In Years</div>
             <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit minimum to maximum work experience in years."></span>
            </div>
            <div class="clearfix"></div>
            
               <div class="col-xs-12 margin-ten">
               <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Area Of Experience <span class="text-danger">*</span></div>
               <div class="col-sm-5 col-xs-8 margin-thirty">
                 <select multiple class="form-control">
                  <option value="">Select Experience Area</option>
                  <option value="" selected="selected">Area#1</option>
                  <option value="" selected="selected">Area#2</option>
                  <option value="">Area#3</option>
                  <option value="">Area#4</option>
                  <option value="">Area#5</option>
                  <option value="">Area#6</option>
                  <option value="">Area#7</option>
                 </select>
               </div><span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit multiple area of experience with press the shift key."></span>
          </div>
            
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-ten">
             <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 margin-ten">Salary</div>
              <div class="col-sm-2 col-xs-3">
               <select class="form-control">
                <option value="">Min</option>
                <option value="0">&lt;1 Lac</option>
                <option value="1">1</option>
                <option value="2" selected="">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
               </select>
              </div>
              <div class="col-xs-1">To</div>
              <div class="col-sm-2 col-xs-3 margin-ten">
               <select class="form-control">
                <option value="">Max</option>
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="1" selected="">4</option>
                <option value="2">5</option>
                <option value="1">6</option>
                <option value="2">7</option>
               </select>
              </div> 
              <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit minimum to maximum salary."></span>
            </div>

           <div class="col-xs-12 margin-ten">
               <div class="col-lg-2 col-sm-3 col-xs-12">Region or Country<span class="text-danger">*</span></div>
               <div class="col-sm-5 col-xs-8  margin-ten">
                 <select class="form-control" multiple="">
                  <option value="">Select Region or Country</option>
                  <option value="as" selected="selected">Asia</option>
                  <option value="af" selected="selected">Africa</option>
                  <option value="nor">North America</option>
                  <option value="east">Eastern Europe</option>
                  <option value="euro">European Union</option>
                  <option value="sou">South America</option>
                  <option value="car">The Caribbean</option>
                 </select>
               </div>
           <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit multiple region or country with press the shift key"></span>
          </div>
         
       
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-3">Is this a rotation job</div>
          <div class="col-sm-6 col-xs-5  margin-ten">
          <form role="form">
          <label class="radio-inline">
            <input type="radio" name="optradio" onClick="rotation('on')">On
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" checked onClick="rotation('off')">Off
          </label>
          </form></div>
          </div>

          <div id="on">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3"></div>
          <div class="col-lg-4 col-md-4 col-sm-5 col-xs-7">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 margin-ten"><input type="text" class="form-control" placeholder="on-days"></div>
           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><input type="text" class="form-control" placeholder="off-days"></div>
          </div> <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit working day and leave day"></span>
          </div>
          
          <div class="col-xs-12 margin-ten">
      <div class="col-lg-2 col-sm-3 col-xs-12">Number Of Vacancy</div>
        <div class="col-sm-5 col-xs-8  margin-ten">
          <input type="text" id="noof_vacancy" class="form-control" value="20">
        </div><span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit no of vacancy available for job"></span>
     </div>
               
 <div class="col-xs-12 margin-ten">
 <div class="col-lg-2 col-sm-3 col-xs-12">Opening Date <span class="text-danger">*</span></div>
  <div class="col-sm-5 col-xs-8  margin-ten">
  <input type="text" data-parsley-id="7618" id="birthday" class="form-control" value="08-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
 <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit opening day of job"></span>
 </div>

  <div class="col-xs-12 margin-ten">
      <div class="col-lg-2 col-sm-3 col-xs-12">Closing Date <span class="text-danger">*</span></div>
      <div class="col-sm-5 col-xs-8  margin-ten">
  <input type="text" data-parsley-id="7618" id="birthday1" class="form-control" value="09-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
   <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit closing day of job"></span>
    </div>
   
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Qualification</div>
          <div class="col-sm-5 col-xs-8  margin-ten">
            <select class="form-control margin-ten" onchange="show_other_qual(this.value)">
                  <option value="">Select Qualification</option>
                  <option value="UG">Under Graduate</option>
                  <option value="GRD" selected="">Graduate</option>
                  <option value="PG">Post Graduate</option>
                  <option value="other">Other</option>
            </select>
            <div id="qualf_other" style="display:none">
              <input type="text" class="input-md-width1 form-control" name="other_qual">
            </div>
          </div><span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit qualification. For other option you have to write other qualification"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Any Condition</div>
          <div class="col-sm-8 col-xs-10  margin-ten"><textarea class="form-control" rows="5" placeholder="Enter Condition"></textarea></div>
          <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit condition if any"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job</div>
          <div class="col-sm-8 col-xs-10">
            <div class="col-sm-2 col-xs-2 row"><input type="checkbox"> Hot Job</div>
            <div class="col-sm-3 col-xs-3"><input type="checkbox"> Advertisement</div>
          </div>
          </div>
          
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">
          Would you like to translate in other languages , then charges will apply ?</div>
          <div class="col-sm-3 col-xs-12 margin-ten">
          <form role="form">
          <label class="radio-inline">
            <input type="radio" name="optradio" onClick="price_fun('show_id')">Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" checked onClick="price_fun('hide_id')">No
          </label>
          </form></div>
          <div id="show_id">
          <div class="col-lg-2 col-sm-3"></div>
          <div class="col-sm-8 col-xs-12">
          <input type="checkbox"> English
          <input type="checkbox"> French
          <input type="checkbox"> Dutch
          <input type="checkbox"> Spanish
          <input type="checkbox"> Chinese
          <input type="checkbox"> Russian
          <input type="checkbox"> Arabic
          </div>
          </div>
          </div>

          
          <div class="clearfix"></div>
           
           <div class="col-xs-12">
           <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
           <div class="col-sm-3">
           <a href="javascript:void(0);" class="primary-btn ad-apply-btn">Reopen</a>
           </div>
       </div>
       </div> <!--outer-div-->

       <div id="reopn_temp"> <!--outer-div-->
           <div class="col-xs-12 margin-ten"><h4>Reopen Temporary Job</h4></div>

     
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Language <span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8 margin-ten">
            <select class="form-control">
                  <option value="">Select Language</option>
                  <option value="all">All</option>
                  <option value="eng" selected="">English</option>
                  <option value="fre">French</option>
                  <option value="dut">Dutch</option>
                  <option value="spa">Spanish</option>
                  <option value="chi">Chienese</option>
                  <option value="rus">Russian</option>
                  <option value="ara">Arabic</option>
            </select>
          </div><span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit language"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Job Position<span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8 margin-ten"><input type="text" class="form-control" value="Job Opportunity for Java candidates"></div>
      <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit job position"></span>
          </div>
          
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Job Description <span class="text-danger">*</span></div>
          <div class="col-sm-8 col-xs-10 margin-ten">
            <textarea class="form-control" rows="10">Role & Responsibilities:
              Senior Developer working closely with development lead along with other team member to develop Java component for Data Acquisition platform.
              Responsible for end to end development of functionality with ability to interact with IT BAs and business users.
              Qualification & Skills:
              Candidate should be Bachelor of Engineering or MCA or MS from reputed university.
              Desirable to have professional certificates like JCP, OCP etc.
              Must have a demonstrable passion for IT, and keen to continue developing and learning
              Should have strong IT experience preferably worked with Investment Bank with proven track record of delivering medium to large IT Development projects.
              Proven track record of working on development projects comprising of Java, spring and PL/SQL.
              Strong development capabilities in Core Java and Spring Integration & Multithreading framework.
              Decent knowledge in SQL and PL/SQL, candidate should be able to understand PL/SQL procedures.
              Should have experience in methodologies like Agile/Scrum, Continuous Integration
              Exhibits high degree of flexibility and can do attitude. Ability to work with very limited level of instruction and supervision.
              Nice to have: CEP and Coherence skills.
            </textarea></div>
            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit description about job in your words. Maximum length is 250 character."></span>
          </div>
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Skills <span class="text-danger">*</span></div>
          <div class="col-sm-5 col-xs-8 margin-ten"><input type="text" class="form-control" value="Core Java, Spring, Sql"></div>
           <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit skills"></span>
          </div>
           <div class="col-xs-12 margin-ten">
             <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Work Experience<span class="text-danger">*</span></div>
              <div class="col-sm-2 col-xs-3  margin-ten">
               <select class="form-control">
                <option value="">Min</option>
                <option value="0">Fresher</option>
                <option value="1" selected="">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="1">6</option>
               </select>
              </div><div class="col-xs-1">To</div>
              <div class="col-sm-2 col-xs-3 margin-thirty">
               <select class="form-control">
                <option value="">Max</option>
                <option value="0">Fresher</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="1" selected="">3</option>
                <option value="2">4</option>
                <option value="1">5</option>
                <option value="2">6</option>
               </select>
              </div><div class="col-md-1 col-xs-2">In Years</div>
             <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit minimum to maximum work experience in years."></span>
            </div>
            <div class="clearfix"></div>
            
               <div class="col-xs-12 margin-ten">
               <div class="col-lg-2 col-sm-3 col-xs-12">Area Of Experience <span class="text-danger">*</span></div>
               <div class="col-sm-5 col-xs-8  margin-ten">
                 <select class="form-control">
                  <option value="">Select Experience Area</option>
                  <option value="" selected="selected">Area#1</option>
                  <option value="" selected="selected">Area#2</option>
                  <option value="">Area#3</option>
                  <option value="">Area#4</option>
                  <option value="">Area#5</option>
                  <option value="">Area#6</option>
                  <option value="">Area#7</option>
                 </select>
               </div><span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit multiple area of experience with press the shift key."></span>
          </div>
            
             <div class="col-xs-12 margin-ten">
             <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Salary</div>
              <div class="col-sm-2 col-xs-3 margin-ten">
               <select class="form-control">
                <option value="">Min</option>
                <option value="0">&lt;1 Lac</option>
                <option value="1">1</option>
                <option value="2" selected="">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
               </select>
              </div>
             <div class="col-sm-1 col-xs-2">To</div>
              <div class="col-sm-2 col-xs-3 margin-ten">
               <select class="form-control">
                <option value="">Max</option>
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="1" selected="">4</option>
                <option value="2">5</option>
                <option value="1">6</option>
                <option value="2">7</option>
               </select>
              </div> 
            <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit minimum to maximum salary."></span>
            </div>
           <div class="col-xs-12 margin-ten">
               <div class="col-lg-2 col-sm-3 col-xs-12">Region or Country<span class="text-danger">*</span></div>
               <div class="col-sm-5 col-xs-8 margin-ten">
                 <select class="form-control" multiple="">
                  <option value="">Select Region or Country</option>
                  <option value="as" selected="selected">Asia</option>
                  <option value="af" selected="selected">Africa</option>
                  <option value="nor">North America</option>
                  <option value="east">Eastern Europe</option>
                  <option value="euro">European Union</option>
                  <option value="sou">South America</option>
                  <option value="car">The Caribbean</option>
                 </select>
               </div>
               <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit multiple region or country with press the shift key"></span>
          </div>
         
          
          <div class="col-xs-12 margin-ten">
      <div class="col-lg-2 col-sm-3 col-xs-12">Number Of Vacancy</div>
        <div class="col-sm-5 col-xs-8 margin-ten">
          <input type="text" id="noof_vacancy" class="form-control" value="15">
        </div>
        <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit no of vacancy available for job"></span>
     </div>
               
 <div class="col-xs-12 margin-ten">
 <div class="col-lg-2 col-sm-3 col-xs-12">Opening Date <span class="text-danger">*</span></div>
  <div class="col-sm-5 col-xs-8 margin-ten">
  <input type="text" data-parsley-id="7618" id="birthday2" class="form-control" value="08-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
  <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit opening date of job"></span>
 </div>

  <div class="col-xs-12 margin-ten">
      <div class="col-lg-2 col-sm-3 col-xs-12">Closing Date <span class="text-danger">*</span></div>
      <div class="col-sm-5 col-xs-8 margin-ten">
  <input type="text" data-parsley-id="7618" id="birthday3" class="form-control" value="09-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
  <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit closing date of job"></span>
    </div>

          <div class="col-xs-12 margin-ten">
 <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Availability From<span class="text-danger">*</span></div>
  <div class="col-sm-5 col-xs-8">
  <input type="text"  data-parsley-id="7618" id="from-date" class="form-control" value="08-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
 <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select temporary available date of job"></span>
 </div>
 <div class="col-xs-12 margin-ten">
      <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job Availability To<span class="text-danger">*</span></div>
      <div class="col-sm-5 col-xs-8">
  <input type="text" data-parsley-id="7618" id="to-date" class="form-control" value="09-12-2015">
  <ul id="parsley-id-7618" class="parsley-errors-list"></ul></div>
    <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Select temporary closing date of job"></span>
    </div>
   
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Qualification</div>
          <div class="col-sm-5 col-xs-8 margin-ten">
            <select class="form-control margin-ten" onchange="show_other_qual_temp(this.value)">
                  <option value="">Select Qualification</option>
                  <option value="UG">Under Graduate</option>
                  <option value="GRD" selected="">Graduate</option>
                  <option value="PG">Post Graduate</option>
                  <option value="other">Other</option>
            </select>
            <div id="qualf_other_temp" style="display:none">
              <input type="text" class="input-md-width1 form-control" name="other_qual_temp">
            </div>
          </div>
        <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit qualification. For other option you have to write other qualification"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">Any Condition</div>
          <div class="col-sm-8 col-xs-10 margin-ten"><textarea class="form-control" rows="5" placeholder="Enter Condition"></textarea></div>
          <span><img style="width: 12px;" src="<?php echo base_url(); ?>assets/common/images/qus.png" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit condition if any"></span>
          </div>
           <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten">Job</div>
          <div class="col-sm-8 col-xs-10">
            <div class="col-sm-2 col-xs-2 row"><input type="checkbox"> Hot Job</div>
            <div class="col-sm-3 col-xs-3"><input type="checkbox"> Advertisement</div>
          </div>
          </div>
       
          <div class="col-xs-12 margin-ten">
          <div class="col-lg-2 col-sm-3 col-xs-12">
          Would you like to translate in other languages , then charges will apply ?</div>
          <div class="col-sm-3 col-xs-12 margin-ten">
          <form role="form">
          <label class="radio-inline">
            <input type="radio" name="optradio" onClick="price1_fun('show_id1')">Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" checked onClick="price1_fun('hide_id1')">No
          </label>
          </form></div>
          <div id="show_id1">
          <div class="col-lg-2 col-sm-3"></div>
          <div class="col-sm-8 col-xs-12">
          <input type="checkbox"> English
          <input type="checkbox"> French
          <input type="checkbox"> Dutch
          <input type="checkbox"> Spanish
          <input type="checkbox"> Chinese
          <input type="checkbox"> Russian
          <input type="checkbox"> Arabic
          </div>
          </div>
          </div>

          <div class="clearfix"></div>
           
           <div class="col-xs-12">
           <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
           <div class="col-sm-3">
           <a href="javascript:void(0);" class="primary-btn ad-apply-btn">Reopen</a>
           </div>
       </div>
       </div> <!--outer-temp-div-->

    </div>
  </div>  <!-- ./ right part--> 
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
<script type="text/javascript">
$(document).ready(function () {
  $('#birthday2').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
  }, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
  $('#birthday3').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
  }, function (start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});

function show_other_qual_temp(other_qual_temp)
{
  if(other_qual_temp.trim() == 'other')
  {
    document.getElementById("qualf_other_temp").style.display="block";     
  }
  else
  {
    document.getElementById("qualf_other_temp").style.display="none";  
  }
}
</script>
<script type="text/javascript">
  document.getElementById('on').style.display= "none";
  function rotation(val3)
  {
      
    if(val3 == 'on')
    { 
      document.getElementById(val3).style.display = "block"; 
    }
    else if(val3 == 'off')
    {
      document.getElementById('on').style.display = "none";
    }
  } 
</script>
<script type="text/javascript">
  document.getElementById('reopn_temp').style.display= "none";
  function my_function(val1,val2){
    document.getElementById(val1).style.display = "block";
    document.getElementById(val2).style.display = "none";    
  } 
</script>
<script type="text/javascript">
  document.getElementById('show_id').style.display= "none";
  function price_fun(val4)
  {
      
    if(val4 == 'show_id')
    { 
      document.getElementById(val4).style.display = "block"; 
    }
    else if(val4 == 'hide_id')
    {
      document.getElementById('show_id').style.display = "none";
    }
  } 
</script>
<script type="text/javascript">
  document.getElementById('show_id1').style.display= "none";
  function price1_fun(val5)
  {
      
    if(val5 == 'show_id1')
    { 
      document.getElementById(val5).style.display = "block"; 
    }
    else if(val5 == 'hide_id1')
    {
      document.getElementById('show_id1').style.display = "none";
    }
  } 
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script> 