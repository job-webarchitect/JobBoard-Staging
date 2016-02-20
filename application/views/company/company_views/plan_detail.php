<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
    <div class="clearfix"></div>
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> <!-- right part-->
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-12 "> <!-- right part-->
                <div class="clearfix"></div>
                <div class="row">     
                    <div class="white-box-right">
                        <h4>Current Plan</h4>
                        <div class="col-xs-12 prf-col2"></div>
                        <div class="col-xs-12 margin-ten gray-padding">
                            <div class="col-xs-3"><b>Plan Name</b></div>
                            <div class="col-xs-3"><b>Plan Detail</b></div>
                            <div class="col-xs-3"><b>Price</b></div>
                            <div class="col-xs-3"><b>Purchase Date</b></div>
                        </div>
                        <?php //$curr_plan = $current_plans_data; ?>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-9 white-padding">
                                <div class="col-xs-4"><?php echo $current_plans_data['planname']; ?></div>
                                <div class="col-xs-4">
                                    <?php
                                        if($current_plans_data['download_noofresume'] != 0)
                                        { 
                                            echo $current_plans_data['download_noofresume'].' Resume Download'; 
                                            echo "<br/>";
                                        }
                                        if($current_plans_data['view_noofresume'] != 0)
                                        { 
                                            echo $current_plans_data['view_noofresume'].' Resume View'; 
                                            echo "<br/>";
                                        }
                                        if($current_plans_data['used_email'] != 0)
                                        { 
                                            echo $current_plans_data['used_email'].' Email Used'; 
                                        } 
                                    ?>
                                </div>
                                <div class="col-xs-4"><?php echo $current_plans_data['transaction_price']; ?></div>
                            </div>
                            <div class="col-xs-3"><?php echo $current_plans_data['Date']; ?></div>
                        </div>
                        <div class="col-xs-12 margin-sixty"></div>
                        <h4>Available Plan</h4>
                        <div class="prf-col2"></div>
                        <div class="col-xs-12 margin-ten gray-padding">
                            <div class="col-xs-3"><b>Plan Name</b></div>
                            <div class="col-xs-3"><b>Plan Detail</b></div>
                            <div class="col-xs-3"><b>Price</b></div>
                            <div class="col-xs-3"><b>Purchase</b></div>
                        </div>
                        <?php foreach($plans_data as $all_plans){ ?>
                        <div class="col-xs-12 margin-ten">
                            <div class="col-xs-9 white-padding">
                                <div class="col-xs-4 row"><?php echo $all_plans['planname']; ?></div>
                                <div class="col-xs-4">
                                    <?php 
                                        if($all_plans['download_noofresume'] != 0)
                                        { 
                                            echo $all_plans['download_noofresume'].' Resume Download'; 
                                            echo "<br/>";
                                        }
                                        if($all_plans['view_noofresume'] != 0)
                                        { 
                                            echo $all_plans['view_noofresume'].' Resume View'; 
                                            echo "<br/>";
                                        }
                                        if($all_plans['used_email'] != 0)
                                        { 
                                            echo $all_plans['used_email'].' Email Used'; 
                                        } 
                                    ?> 
                                </div>
                                <div class="col-xs-4">Rs.<?php echo $all_plans['price']; ?></div>
                                
                                <!-- <div class="col-xs-4"></div>
                                <div class="col-xs-4"></div> -->
                            </div>
                            <div class="col-xs-3 md-blue-link"><a href="<?php echo base_url(); ?>company/employer/purchase_resume_plan/<?php echo $all_plans['planid']; ?>">Add to Cart</a></div>
                        </div>
                        <?php } ?>
                        <!-- <div class="col-xs-12 margin-ten">
                            <div class="col-xs-8 white-padding">
                                <div class="col-xs-3 row">Rs. 9099</div>
                                <div class="col-xs-4">400 CV Access</div>
                                <div class="col-xs-4">3000 Emails</div>
                            </div>
                            <div class="col-xs-4 md-blue-link"><a href="#">Add to Cart</a></div>
                        </div> -->
                    </div>
                </div>
            </div>	<!-- ./ right part-->	
        </div>
    </div>	<!-- ./ right part-->	
</div>
<script type="text/javascript">
/*function purchase_plan(planid)
{

}*/
</script>