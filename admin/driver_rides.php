<?php
include("include/main_header.php");
include_once '../paypal_config.php';
$my_ride_data=mysqli_query($conn,"select * from tripy_driver_ride where driver_id = $_SESSION[driver_id]");
?>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <?php 
            include("include/navbar.php");
        ?>        
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <?php
            include("include/left_sidebar.php");
        ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">All Rides</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>   
                                    <th>Driver ID</th>
                                    <th>Ride ID</th>
                                    <th>Accepted Status</th>
                                    <th>closed Status</th>
                                    <th>Payment</th>
                                    <th>Status</th>  
                                    <th>Get Payment</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Driver ID</th>
                                    <th>Ride ID</th>
                                    <th>Accepted Status</th>
                                    <th>closed Status</th>
                                    <th>Payment</th>
                                    <th>Status</th>   
                                    <th>Get Payment</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                while($my_ride_row=mysqli_fetch_array($my_ride_data))
                                {

                                    $driver_query=mysqli_query($conn,"select * from tripy_login where login_id=$_SESSION[login_id]");
                                    $driver_row=mysqli_fetch_array($driver_query );

                                    $ride_data=mysqli_query($conn,"select * from tripy_ride where ride_id=$my_ride_row[ride_id]");
                                    $ride_row=mysqli_fetch_array($ride_data);
                            ?>
                                <tr>
                                    <td><?php echo $driver_row['login_fname']." ".$driver_row['login_lname'];?></td>
                                    <td><?php echo $my_ride_row['ride_id'];?></td>
                                <td>
                                    <select name="accepted_status" class="accepted" driver_ride_id="<?php echo $my_ride_row['driver_ride_id'];?>">
                                        <option value="pending">Select Status</option>
                                        <option value="accepted" <?php if($my_ride_row['accepted_status']=='accepted') { echo 'selected'; }?>>Accepted</option>
                                        <option value="rejected" <?php if($my_ride_row['accepted_status']=='rejected') { echo 'selected'; }?>>Rejected</option>                                      
                                    </select>
                                    </td>
                                    <td>
                                    <select name="closed_status" class="closed" driver_ride_id="<?php echo $my_ride_row['driver_ride_id'];?>">
                                    <option value="pending">Select Status</option>
                                        <option value="closed" <?php if($my_ride_row['closed_status']=='closed'){ echo "selected";}?>>Closed</option>
                                    </select>
                                    </td>

                                    <td><?php echo $ride_row['trip_payment'];;?></td>

                                    <td><?php echo $my_ride_row['status'];?></td>

                                    <td>
                                    <form action="<?php echo PAYPAL_URL; ?>" method="post">

                                        <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                                        <!-- Buy Now button. -->
                                        <input type="hidden" name="cmd" value="_xclick">

                                        <!-- Details about the item that buyers will purchase. -->
                                        <input type="hidden" name="item_name" value="<?php echo $ride_row['trip_user_name']; ?>">
                                        <input type="hidden" name="item_number" value="<?php echo $ride_row['ride_id']; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $ride_row['trip_payment']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $ride_row['login_id'];?>"/>

                                        <!-- Paypal currency -->
                                        <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                                        <!-- Success and cancel URLs -->
                                        <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                                        <input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL; ?>'>
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit" role="button">Buy Now</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <a class="adminca-banner" href="http://admincast.com/adminca/" target="_blank">
                        <div class="adminca-banner-ribbon"><i class="fa fa-trophy mr-2"></i>PREMIUM TEMPLATE</div>
                        <div class="wrap-1">
                            <div class="wrap-2">
                                <div>
                                    <img src="./assets/img/adminca-banner/adminca-preview.jpg" style="height:160px;margin-top:50px;" />
                                </div>
                                <div class="color-white" style="margin-left:40px;">
                                    <h1 class="font-bold">ADMINCA</h1>
                                    <p class="font-16">Save your time, choose the best</p>
                                    <ul class="list-unstyled">
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>High Quality Design</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Fully Customizable and Easy Code</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Bootstrap 4 and Angular 5+</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Best Build Tools: Gulp, SaSS, Pug...</li>
                                        <li><i class="ti-check m-r-5"></i>More layouts, pages, components</li>
                                    </ul>
                                </div>
                            </div>
                            <div style="flex:1;">
                                <div class="d-flex justify-content-end wrap-3">
                                    <div class="adminca-banner-b m-r-20">
                                        <img src="./assets/img/adminca-banner/bootstrap.png" style="width:40px;margin-right:10px;" />Bootstrap v4</div>
                                    <div class="adminca-banner-b m-r-10">
                                        <img src="./assets/img/adminca-banner/angular.png" style="width:35px;margin-right:10px;" />Angular v5+</div>
                                </div>
                                <div class="dev-img">
                                    <img src="./assets/img/adminca-banner/sprite.png" />
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
    <?php
        include("include/footer.php");
    ?>
    <!-- BEGIN THEME CONFIG PANEL-->
    <?php
        include("include/config_panel.php");
    ?>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <?php 
        include("include/preloader.php");
    ?>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <?php
        include("include/main_footer.php");
    ?>