<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 ">
    <div class="clearfix"></div>
    <?php //print_r($this->cart->contents('Job_Price'));exit; ?>
    <?php //print_r($this->cart->total());exit; ?>
    <div class="white-box-right"> 
        <h4>Cart Total</h4>
        <div class="col-xs-12 prf-col2"></div>
        <div class="col-xs-12 margin-ten gray-padding">
            <div class="col-xs-6"><b>Product</b></div>
            <div class="col-xs-3"><b>Price</b></div>
            <div class="col-xs-3"><b>Action</b></div>
        </div>
        <!--Resume Plan table Session-->
        <?php $item_description =''; $total_price = 0; foreach($session_data as $resume_session_data){ ?>
            <?php $total_price = $total_price + $resume_session_data['plan_price']; ?>
        <div class="col-xs-12 white-padding">
            <div class="col-xs-6"><?php echo $resume_session_data['planname']; ?></div>
            <div class="col-xs-3">$<?php echo $resume_session_data['plan_price']; ?></div>
            <div class="col-xs-3"><a href="javascript:;" onclick="remove_sessplan_table('<?php echo $resume_session_data['sess_id']; ?>')">Remove</a></div>
            <?php $item_description .= $resume_session_data['planname'].', '; ?>
        </div>
        <?php } ?>
        <!--Session data Display-->
        <?php //print_r($this->cart->contents()); ?>
        <?php $item_description1 =''; $total_price1 = 0; foreach($this->cart->contents() as $plan_sessdata){ ?>
            <?php $total_price1 = $total_price1 + $plan_sessdata['price']; ?>
        <div class="col-xs-12 white-padding">
            <div class="col-xs-6"><?php echo $plan_sessdata['name']; ?></div>
            <div class="col-xs-3">$<?php echo $plan_sessdata['price']; ?></div>
            <div class="col-xs-3"><a href="javascript:;" onclick="remove_plan_session('<?php echo $plan_sessdata['rowid']; ?>')">Remove</a></div>
            <?php $item_description1 .= $plan_sessdata['name'].', '; ?>
        </div>
        <?php } ?>

        <div class="col-xs-12 prf-col2"></div>
        <div class="col-xs-12 margin-ten">
            <div class="col-xs-6"><strong>Total:</strong></div>
            <div class="col-xs-3">$<?php
                                        if($total_price > 0)
                                        {
                                            echo $total_price; 
                                        }
                                        else
                                        {
                                            echo $total_price1; 
                                        }
                                    ?>
            </div>
        </div>
        
    </div>
    <div class="white-box-right">
        <div class="col-xs-12 margin-ten">
            <h4>Customer Details</h4>
            <div class="col-xs-12 prf-col2"></div>
        </div>
        <form action="<?php echo base_url(); ?>company/Employer/checkout_payment" method="post" name="payment_checkout" id="payment_checkout">
        
        <input type="hidden" name="item_desc" id="item_desc" value="<?php 
                    if($item_description != '')
                    {
                        echo substr($item_description,0,strlen($item_description)-2); 
                    }
                    if($item_description1 != '')
                    {
                        echo substr($item_description1,0,strlen($item_description1)-2); 
                    }
        ?>">
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Card Type</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <select id="card_type" name="card_type" class="form-control">
                    <option value="">Select Card Type</option>
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="Discover">Discover</option>
                    <option value="Amex">Amex</option>
                    <option value="credit card">Credit Card</option>
                    <option value="Maestro">Maestro</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Cart Number</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="card_num" id="card_num" placeholder="Enter your card number." class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Expiration Date</strong><span class="text-danger">*</span></div>
            <div class="col-sm-3 col-xs-3">
                <select name="exp_mon" id="exp_mon" class="form-control">
                    <option value="">Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col-sm-3 col-xs-3">
                <select name="exp_year" id="exp_year" class="form-control">
                    <option value="">Year</option>
                    <?php 
                        $curr_year = date('Y'); 

                        for($year=0; $year<=15; $year++)
                        {
                    ?>
                    <option value="<?php echo $curr_year-1+$year; ?>"><?php echo $curr_year-1+$year; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Card Verification Value(CVV2)</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="card_verval" id="card_verval" placeholder="Enter your card verification value." class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>First Name</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_fname" id="ship_fname" placeholder="Enter your first name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Last Name</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_lname" id="ship_lname" placeholder="Enter your last name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Email</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_email" id="ship_email" placeholder="Enter your email" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Phone No.</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_phno" id="ship_phno" placeholder="Enter your phone no." class="form-control">
            </div>
        </div>
        
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Street</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_street" id="ship_street" placeholder="Enter your street name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>City</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_city" id="ship_city" placeholder="Enter your city name" class="form-control">
            </div>
        </div>
        
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>State</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_state" id="ship_state" placeholder="Enter your state name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Country</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <select name="country" id="country" class="form-control">
                    <option value="">Select Country</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option> 
                    <option value="AD">Andorra</option> 
                    <option value="AO">Angola</option> 
                    <option value="AI">Anguilla</option> 
                    <option value="AQ">Antarctica</option> 
                    <option value="AG">Antigua and Barbuda</option> 
                    <option value="AR">Argentina</option> 
                    <option value="AM">Armenia</option> 
                    <option value="AW">Aruba</option> 
                    <option value="AU">Australia</option> 
                    <option value="AT">Austria</option> 
                    <option value="AZ">Azerbaijan</option> 
                    <option value="BS">Bahamas</option> 
                    <option value="BH">Bahrain</option> 
                    <option value="BD">Bangladesh</option> 
                    <option value="BB">Barbados</option> 
                    <option value="BY">Belarus</option> 
                    <option value="BE">Belgium</option> 
                    <option value="BZ">Belize</option> 
                    <option value="BJ">Benin</option> 
                    <option value="BM">Bermuda</option> 
                    <option value="BT">Bhutan</option> 
                    <option value="BO">Bolivia</option> 
                    <option value="BA">Bosnia and Herzegovina</option> 
                    <option value="BW">Botswana</option> 
                    <option value="BV">Bouvet Island</option> 
                    <option value="BR">Brazil</option> 
                    <option value="IO">British Indian Ocean Territory</option> 
                    <option value="BN">Brunei Darussalam</option> 
                    <option value="BG">Bulgaria</option> 
                    <option value="BF">Burkina Faso</option> 
                    <option value="BI">Burundi</option> 
                    <option value="KH">Cambodia</option> 
                    <option value="CM">Cameroon</option> 
                    <option value="CA">Canada</option> 
                    <option value="CV">Cape Verde</option> 
                    <option value="KY">Cayman Islands</option> 
                    <option value="CF">Central African Republic</option> 
                    <option value="TD">Chad</option> 
                    <option value="CL">Chile</option> 
                    <option value="CN">China</option> 
                    <option value="CX">Christmas Island</option> 
                    <option value="CC">Cocos (Keeling) Islands</option> 
                    <option value="CO">Colombia</option> 
                    <option value="KM">Comoros</option> 
                    <option value="CG">Congo</option> 
                    <option value="CD">Congo, The Democratic Republic of the</option> 
                    <option value="CK">Cook Islands</option> 
                    <option value="CR">Costa Rica</option> 
                    <option value="CI">Cote D'Ivoire</option> 
                    <option value="HR">Croatia</option> 
                    <option value="CU">Cuba</option> 
                    <option value="CY">Cyprus</option> 
                    <option value="CZ">Czech Republic</option> 
                    <option value="DK">Denmark</option> 
                    <option value="DJ">Djibouti</option> 
                    <option value="DM">Dominica</option> 
                    <option value="DO">Dominican Republic</option> 
                    <option value="EC">Ecuador</option> 
                    <option value="EG">Egypt</option> 
                    <option value="SV">El Salvador</option> 
                    <option value="GQ">Equatorial Guinea</option> 
                    <option value="ER">Eritrea</option> 
                    <option value="EE">Estonia</option> 
                    <option value="ET">Ethiopia</option> 
                    <option value="FK">Falkland Islands (Malvinas)</option> 
                    <option value="FO">Faroe Islands</option> 
                    <option value="FJ">Fiji</option> 
                    <option value="FI">Finland</option> 
                    <option value="FR">France</option> 
                    <option value="GF">French Guiana</option> 
                    <option value="PF">French Polynesia</option> 
                    <option value="TF">French Southern Territories</option> 
                    <option value="GA">Gabon</option> 
                    <option value="GM">Gambia</option> 
                    <option value="GE">Georgia</option> 
                    <option value="DE">Germany</option> 
                    <option value="GH">Ghana</option> 
                    <option value="GI">Gibraltar</option> 
                    <option value="GR">Greece</option> 
                    <option value="GL">Greenland</option> 
                    <option value="GD">Grenada</option> 
                    <option value="GP">Guadeloupe</option> 
                    <option value="GU">Guam</option> 
                    <option value="GT">Guatemala</option> 
                    <option value="GG">Guernsey</option> 
                    <option value="GN">Guinea</option> 
                    <option value="GW">Guinea-Bissau</option> 
                    <option value="GY">Guyana</option> 
                    <option value="HT">Haiti</option> 
                    <option value="HM">Heard Island and McDonald Islands</option> 
                    <option value="VA">Holy See (Vatican City State)</option> 
                    <option value="HN">Honduras</option> 
                    <option value="HK">Hong Kong</option> 
                    <option value="HU">Hungary</option> 
                    <option value="IS">Iceland</option> 
                    <option value="IN">India</option> 
                    <option value="ID">Indonesia</option> 
                    <option value="IR">Iran, Islamic Republic of</option> 
                    <option value="IQ">Iraq</option> 
                    <option value="IE">Ireland</option> 
                    <option value="IM">Isle of Man</option> 
                    <option value="IL">Israel</option> 
                    <option value="IT">Italy</option> 
                    <option value="JM">Jamaica</option> 
                    <option value="JP">Japan</option> 
                    <option value="JE">Jersey</option> 
                    <option value="JO">Jordan</option> 
                    <option value="KZ">Kazakhstan</option> 
                    <option value="KE">Kenya</option> 
                    <option value="KI">Kiribati</option> 
                    <option value="KP">Korea, Democratic People's Republic of</option> 
                    <option value="KR">Korea, Republic of</option> 
                    <option value="KW">Kuwait</option> 
                    <option value="KG">Kyrgyzstan</option> 
                    <option value="LA">Laos People's Democratic Republic</option> 
                    <option value="LV">Latvia</option> 
                    <option value="LB">Lebanon</option> 
                    <option value="LS">Lesotho</option> 
                    <option value="LR">Liberia</option> 
                    <option value="LY">Libyan Arab Jamahiriya</option> 
                    <option value="LI">Liechtenstein</option> 
                    <option value="LT">Lithuania</option> 
                    <option value="LU">Luxembourg</option> 
                    <option value="MO">Macao</option> 
                    <option value="MK">Macedonia, The former Yugoslav Republic of</option> 
                    <option value="MG">Madagascar</option> 
                    <option value="MW">Malawi</option> 
                    <option value="MY">Malaysia</option> 
                    <option value="MV">Maldives</option> 
                    <option value="ML">Mali</option> 
                    <option value="MT">Malta</option> 
                    <option value="MH">Marshall Islands</option> 
                    <option value="MQ">Martinique</option> 
                    <option value="MR">Mauritania</option> 
                    <option value="MU">Mauritius</option> 
                    <option value="YT">Mayotte</option> 
                    <option value="MX">Mexico</option> 
                    <option value="FM">Micronesia, Federated States of</option> 
                    <option value="MD">Moldova, Republic of</option> 
                    <option value="MC">Monaco</option> 
                    <option value="MN">Mongolia</option> 
                    <option value="MS">Montserrat</option> 
                    <option value="MA">Morocco</option> 
                    <option value="MZ">Mozambique</option> 
                    <option value="MM">Myanmar</option> 
                    <option value="NA">Namibia</option> 
                    <option value="NR">Nauru</option> 
                    <option value="NP">Nepal</option> 
                    <option value="NL">Netherlands</option> 
                    <option value="AN">Netherlands Antilles</option> 
                    <option value="NC">New Caledonia</option> 
                    <option value="NZ">New Zealand</option> 
                    <option value="NI">Nicaragua</option> 
                    <option value="NE">Niger</option> 
                    <option value="NG">Nigeria</option> 
                    <option value="NU">Niue</option> 
                    <option value="NF">Norfolk Island</option> 
                    <option value="MP">Northern Mariana Islands</option> 
                    <option value="NO">Norway</option> 
                    <option value="OM">Oman</option> 
                    <option value="PK">Pakistan</option> 
                    <option value="PW">Palau</option> 
                    <option value="PS">Palestinian Territory, Occupied</option> 
                    <option value="PA">Panama</option> 
                    <option value="PG">Papua New Guinea</option> 
                    <option value="PY">Paraguay</option> 
                    <option value="PE">Peru</option> 
                    <option value="PH">Philippines</option> 
                    <option value="PN">Pitcairn</option> 
                    <option value="PL">Poland</option> 
                    <option value="PT">Portugal</option> 
                    <option value="PR">Puerto Rico</option> 
                    <option value="QA">Qatar</option> 
                    <option value="RE">Reunion</option> 
                    <option value="RO">Romania</option> 
                    <option value="RU">Russian Federation</option> 
                    <option value="RW">Rwanda</option> 
                    <option value="SH">Saint Helena</option> 
                    <option value="KN">Saint Kitts and Nevis</option> 
                    <option value="LC">Saint Lucia</option> 
                    <option value="PM">Saint Pierre and Miquelon</option> 
                    <option value="VC">Saint Vincent and the Grenadines</option> 
                    <option value="WS">Samoa</option> 
                    <option value="SM">San Marino</option> 
                    <option value="ST">Sao Tome and Principe</option> 
                    <option value="SA">Saudi Arabia</option> 
                    <option value="SN">Senegal</option> 
                    <option value="CS">Serbia and Montenegro</option> 
                    <option value="SC">Seychelles</option> 
                    <option value="SL">Sierra Leone</option> 
                    <option value="SG">Singapore</option> 
                    <option value="SK">Slovakia</option> 
                    <option value="SI">Slovenia</option> 
                    <option value="SB">Solomon Islands</option> 
                    <option value="SO">Somalia</option> 
                    <option value="ZA">South Africa</option> 
                    <option value="GS">South Georgia and the South Sandwich Islands</option> 
                    <option value="ES">Spain</option> 
                    <option value="LK">Sri Lanka</option> 
                    <option value="SD">Sudan</option> 
                    <option value="SR">Suriname</option> 
                    <option value="SJ">SValbard and Jan Mayen</option> 
                    <option value="SZ">Swaziland</option> 
                    <option value="SE">Sweden</option> 
                    <option value="CH">Switzerland</option> 
                    <option value="SY">Syrian Arab Republic</option> 
                    <option value="TW">Taiwan, Province of China</option> 
                    <option value="TJ">Tajikistan</option> 
                    <option value="TZ">Tanzania, United Republic of</option> 
                    <option value="TH">Thailand</option> 
                    <option value="TL">Timor-Leste</option> 
                    <option value="TG">Togo</option> 
                    <option value="TK">Tokelau</option> 
                    <option value="TO">Tonga</option> 
                    <option value="TT">Trinidad and Tobago</option> 
                    <option value="TN">Tunisia</option> 
                    <option value="TR">Turkey</option> 
                    <option value="TM">Turkmenistan</option> 
                    <option value="TC">Turks and Caicos Islands</option> 
                    <option value="TV">Tuvalu</option> 
                    <option value="UG">Uganda</option> 
                    <option value="UA">Ukraine</option> 
                    <option value="AE">United Arab Emirates</option> 
                    <option value="GB">United Kingdom</option> 
                    <option value="US">United States</option> 
                    <option value="UM">United States Minor Outlying Islands</option> 
                    <option value="UY">Uruguay</option> 
                    <option value="UZ">Uzbekistan</option> 
                    <option value="VU">Vanuatu</option> 
                    <option value="VE">Venezuela</option> 
                    <option value="VN">Viet Nam</option> 
                    <option value="VG">Virgin Islands, British</option> 
                    <option value="VI">Virgin Islands, U.S.</option> 
                    <option value="WF">Wallis and Futuna</option> 
                    <option value="EH">Western Sahara</option> 
                    <option value="YE">Yemen</option> 
                    <option value="ZM">Zambia</option> 
                    <option value="ZW">Zimbabwe</option> 
                </select>
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Zipcode</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="ship_zcode" id="ship_zcode" placeholder="Enter your zip code" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-2 col-sm-3 col-xs-12 margin-ten"><strong>Paying Amount</strong><span class="text-danger">*</span></div>
            <div class="col-sm-6 col-xs-8">
                <input type="text" name="paying_amt" id="paying_amt" placeholder="Enter your paying amount" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 margin-ten">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <center>
                    <a class="primary-btn ad-apply-btn" href="javascript:;" onclick="payment_submit()">Proceed to Checkout</a>
                </center>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function payment_submit()
    {
        $("#payment_checkout").submit();        
    }
    function remove_sessplan_table(remove_sesid)
    {
        $.ajax({
                'url':"<?php echo base_url(); ?>company/Employer_json/remove_sessplan",
                'type':"post",
                'data':"remsession_id="+remove_sesid,
                success:function(responce_mesg)
                {
                    console.log(responce_mesg);
                    if(responce_mesg == true)
                    {
                        location.reload();    
                    }
                    
                }
        });
    }
    function remove_plan_session(remrowid)
    {
        $.ajax({
                'url':"<?php echo base_url(); ?>company/Employer_json/delete_plan_session",
                'type':'post',
                'data':'session_rowid='+remrowid,
                success:function(remsucc)
                {
                    if(remsucc == true)
                    {
                        location.reload();
                    }
                }
        });
    }
</script>