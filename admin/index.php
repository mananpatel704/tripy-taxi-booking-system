<?php
include("include/main_header.php");
$ride_count_query=mysqli_query($conn,"select * from tripy_ride where ride_approve=1");
$ride_count=mysqli_num_rows($ride_count_query);

$driver_count_query=mysqli_query($conn,"select * from tripy_driver where approved=1");
$driver_count=mysqli_num_rows($driver_count_query);

$user_count_query=mysqli_query($conn,"select * from tripy_user where status=1");
$user_count=mysqli_num_rows($user_count_query);

$login_count_query=mysqli_query($conn,"select * from tripy_login where status=1");
$login_count=mysqli_num_rows($login_count_query);
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
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $ride_count; ?></h2>
                                <div class="m-b-5">RIDES</div><i class="ti-car widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $driver_count; ?></h2>
                                <div class="m-b-5">DRIVERS</div><i class="fa fa-taxi widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $login_count; ?></h2>
                                <div class="m-b-5">LOGIN</div><i class="fa fa-user widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $user_count; ?></h2>
                                <div class="m-b-5">USERS</div><i class="fa fa-users widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                    .content-wrapper{
                        min-height: auto;
                    }
                </style>
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php
            include("include/footer.php");
            ?>
        </div>
    </div>
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