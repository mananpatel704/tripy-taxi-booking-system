<?php
include("include/main_header.php");
$ride_data=mysqli_query($conn,"select * from tripy_ride");
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
                <h1 class="page-title">All Ride</h1>
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
                    <div class="ibox-body anyClass">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th>Trip ID</th> -->
                                    <th>Type Title</th>
                                    <th>User ID</th>
                                    <th>Number Of Person</th>
                                    <th>Trip User Name</th>
                                    <th>Trip User Address</th>
                                    <th>Trip User Phone</th>
                                    <th>Trip User Email</th>
                                    <th>Trip User IDproof</th>
                                    <th>Trip Pickup Place</th>
                                    <th>Trip Pickup Time</th>
                                    <th>Trip Pickup Date</th>
                                    <th>Trip Drop Place</th>
                                    <th>Trip Drop Time</th>
                                    <th>Trip Drop Date</th>
                                    <th>Trip Approve</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>Trip ID</th> -->
                                    <th>Type Title</th>
                                    <th>User ID</th>
                                    <th>Number Of Person</th>
                                    <th>Trip User Name</th>
                                    <th>Trip User Address</th>
                                    <th>Trip User Phone</th>
                                    <th>Trip User Email</th>
                                    <th>Trip User IDproof</th>
                                    <th>Trip Pickup Place</th>
                                    <th>Trip Pickup Time</th>
                                    <th>Trip Pickup Date</th>
                                    <th>Trip Drop Place</th>
                                    <th>Trip Drop Time</th>
                                    <th>Trip Drop Date</th>
                                    <th>Trip Approve</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                while($ride_row=mysqli_fetch_array($ride_data))
                                {
                                    $type_query=mysqli_query($conn,"select * from tripy_type where type_id=$ride_row[type_id]");
                                    $type_row=mysqli_fetch_array($type_query);

                                    $login_query=mysqli_query($conn,"select * from tripy_login where login_id=$ride_row[login_id]");
                                    $login_row=mysqli_fetch_array($login_query);
                            ?>
                                <tr>
                                    <!-- <td><?php echo $ride_row['ride_id']; ?></td> -->
                                    <td><?php echo $type_row['type_title']; ?></td>
                                    <td><?php echo $login_row['login_fname']." ".$login_row['login_lname']; ?></td>
                                    <td><?php echo $ride_row['no_of_person']; ?></td>
                                    <td><?php echo $ride_row['trip_user_name']; ?></td>
                                    <td><?php echo $ride_row['trip_user_address']; ?></td>
                                    <td><?php echo $ride_row['trip_user_phone']; ?></td>
                                    <td><?php echo $ride_row['trip_user_email']; ?></td>
                                    <td><?php echo $ride_row['trip_user_idproof']; ?></td>
                                    <td><?php echo $ride_row['trip_pickup_place']; ?></td>
                                    <td><?php echo $ride_row['trip_pickup_time']; ?></td>
                                    <td><?php echo $ride_row['trip_pickup_date']; ?></td>
                                    <td><?php echo $ride_row['trip_drop_place']; ?></td>
                                    <td><?php echo $ride_row['trip_drop_time']; ?></td>
                                    <td><?php echo $ride_row['trip_drop_date']; ?></td>
                                    <td><input type="checkbox" name="ride_approve" class="ride_approve" data_id="<?php echo $ride_row['ride_id']; ?>" <?php if($ride_row['ride_approve']==1){ echo "checked";}?>></td>
                                    <td><a href="ride_delete.php?ride_id=<?php echo $ride_row['ride_id']; ?>">Delete</a></td>
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