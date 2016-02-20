<!-- /navbar -->
<?php $permission = $this->session->userdata('permission'); ?>


<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="<?php echo site_url('admin/paymentplan')?>"><i class=""></i><span>Resume Download</span> </a> </li>
                <li><a href="<?php echo site_url('admin/viewresume')?>"><i class=""></i><span>View Resume</span> </a> </li>
                <li><a href="<?php echo site_url('admin/paymentemail')?>"><i></i><span>Email Service</span> </a> </li>
                <li><a href="<?php echo site_url('admin/paymentmixed')?>"><i></i><span>Mixed Plan</span> </a> </li>
                <li class="active"><a href="<?php echo site_url('admin/advplan')?>"><i></i><span>Advertisement Plan</span> </a> </li>
            </ul>

		 <?php if($permission !='0') : ?> 
            <div class="mainnav pull-right righttext-padding">
            	 <a href="<?php echo site_url('admin/addadvplan')?>" class="btn-danger btn">
                  <span class="glyphicon glyphicon-log-in"></span>Add Plan</a>
            </div>
		<?php endif; ?>



        </div>
        <!-- /container -->


    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->

<div class="main main-minhight">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <?php $msg = $this->session->flashdata('addplantype');
                $umsg = $this->session->flashdata('updateadvplan');
                $dmsg = $this->session->flashdata('removeadvplan');

                ?>
                <?php if (isset($msg)) : ?>
                    <CENTER><h3 style="color:green;">Plan added successfully</h3></CENTER><br>
                <?php endif; ?>

                <?php if (isset($umsg)) : ?>
                    <CENTER><h3 style="color:green;">Plan updated successfully</h3></CENTER><br>
                <?php endif; ?>

                <?php if (isset($dmsg)) : ?>
                    <CENTER><h3 style="color:green;">Plan Deleted successfully</h3></CENTER><br>
                <?php endif; ?>

                <div class="main-width">
                    <div class="widget widget-table action-table">
                        <div class="widget-header">
                            <h3>Advetisement Plan</h3>
                        </div>

                        <!-- /widget-header -->
                        <div class="widget-content">
                            <?php if(!empty($adv)) : ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                       <?php if($permission !='0') : ?>  
                                            <th>Action</th>
                                       <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($adv as $row) : ?>
                                        <tr>
                                        <?php if($row->advplan_type=='1') : ?>
                                            <td><?php echo $row->plan_name; ?></td>
                                            <td><?php echo $row->adv_charge; ?></td>
                                            <?php
                                            $status = $row->adv_status;
                                            if($status == 1) :   ?>
                                                <td>Active</td>
                                            <?php else : ?>
                                                <td>Deactive</td>
                                            <?php endif; ?>
                                            <?php if($permission !='0') : ?>  
                                           		 <td><a class="btn-danger btn" href="<?php echo site_url('admin/editadvplan/'.$row->advplan_id)?>">
                                                    <span class="glyphicon glyphicon-log-in"></span>Edit</a> <a class="btn-danger btn" href="<?php echo site_url('admin/removeadvplan/'.$row->advplan_id)?>">
                                                    <span class="glyphicon glyphicon-log-in"></span>Delete</a></td>
                                        <?php endif; ?>
										<?php endif; ?>
                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <h4>Plan List is empty</h4>

                            <?php endif;?>
                        </div>
                        <!-- /widget-content -->
                    </div>



                </div>
                <!-- /span6 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>