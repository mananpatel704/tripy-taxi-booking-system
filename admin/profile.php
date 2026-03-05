<?php
include("include/main_header.php");
$login_data=mysqli_query($conn,"select * from tripy_login where login_id=$_SESSION[login_id]");
$login_row=mysqli_fetch_array($login_data);
?>


<body class="fixed-navbar sidebar-mini">
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
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">
                                    <img class="img-circle" src="<?php echo "uploads/".$login_row['login_thumb'];?>"/>
                                </div>
                                <h5 class="font-strong m-b-10 m-t-10"><?php echo $login_row['login_fname'];?></h5>
                                <div class="m-b-20 text-muted"><?php echo $login_row['login_email'];?></div>

                                <?php
                                    $profile_role=mysqli_query($conn,"select * from tripy_role where role_id=$login_row[role_id]");
                                    $profile_role_row=mysqli_fetch_array($profile_role);
                                ?>
                                <div class="m-b-20 text-muted" value="<?php echo $login_row['role_id']; ?>"> <td><?php echo strtoupper($profile_role_row['role_title']); ?></td></div>
                                
                                <div class="profile-social m-b-20">
                                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                                </div>
                                <div>
                                    <button class="btn btn-info btn-rounded m-b-5"><i class="fa fa-plus"></i> Follow</button>
                                    <button class="btn btn-default btn-rounded m-b-5">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="row text-center m-b-20">
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">140</div>
                                        <div class="text-muted">Followers</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">$780</div>
                                        <div class="text-muted">Sales</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">15</div>
                                        <div class="text-muted">Projects</div>
                                    </div>
                                </div>
                                <p class="text-center">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                <?php
                                if($role_row['role_title']!='driver' && $role_row['role_title']!='user')
                                {
                                ?> 
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"> </i>Active Rides</a>
                                    </li>
                                <?php
                                }
                                ?>
                                <?php
                                if($role_row['role_title']!='admin' && $role_row['role_title']!='user')
                                {
                                ?> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-4" data-toggle="tab"><i class="ti-settings"> </i>Driver Rides</a>
                                    </li>
                                <?php
                                }
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-1">
                                        <div class="row">
                                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics</h5>
                                                <div class="h2 m-0">$12,400<sup>.60</sup></div>
                                                <div><small>Month income</small></div>
                                                <div class="m-t-20 m-b-20">
                                                    <div class="h4 m-0">120</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="m-b-20">
                                                    <div class="h4 m-0">86</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-warning font-12"><i class="fa fa-level-down"></i> -12%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <ul class="list-group list-group-full list-group-divider">
                                                    <li class="list-group-item">Projects
                                                        <span class="pull-right color-orange">15</span>
                                                    </li>
                                                    <li class="list-group-item">Tasks
                                                        <span class="pull-right color-orange">148</span>
                                                    </li>
                                                    <li class="list-group-item">Articles
                                                        <span class="pull-right color-orange">72</span>
                                                    </li>
                                                    <li class="list-group-item">Friends
                                                        <span class="pull-right color-orange">44</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers</h5>
                                                <ul class="media-list media-list-divider m-0">
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u2.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u3.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u6.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u5.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Bob Gonzalez <small class="float-right text-muted">Today</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Latest Orders</h4>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th width="91px">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>11</td>
                                                    <td>@Jack</td>
                                                    <td>$564.00</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>@Amalia</td>
                                                    <td>$220.60</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>@Emma</td>
                                                    <td>$760.00</td>
                                                    <td>
                                                        <span class="badge badge-default">Pending</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>@James</td>
                                                    <td>$87.60</td>
                                                    <td>
                                                        <span class="badge badge-warning">Expired</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>@Ava</td>
                                                    <td>$430.50</td>
                                                    <td>
                                                        <span class="badge badge-default">Pending</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td>@Noah</td>
                                                    <td>$64.00</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
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
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
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
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $ride_data=mysqli_query($conn,"select * from tripy_ride  where ride_approve=1");
                                while($ride_row=mysqli_fetch_array($ride_data))
                                {

                                    $type_query=mysqli_query($conn,"select * from tripy_type where type_id=$ride_row[type_id]");
                                    $type_row=mysqli_fetch_array($type_query);

                                    $login_query=mysqli_query($conn,"select * from tripy_login where login_id=$ride_row[login_id]");
                                    $login_row=mysqli_fetch_array($login_query);
                            ?>
                                <tr>
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
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                                    <div class="tab-pane fade" id="tab-3">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                                        <ul class="media-list media-list-divider m-0">
                                            <li class="media">
                                                <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">New customer <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-warning">Server Warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-announcement font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 new feedback <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-check font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-success">Issue fixed <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-shopping-cart font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 New orders <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-reload font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-danger">Server warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }

                    .anyClass {
                        height:450px;
                        overflow-y: scroll;
                    }
                </style>
                
            <!-- END PAGE CONTENT-->
    <?php
    include("include/footer.php");    ?>
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