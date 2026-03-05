<?php
$role_query=mysqli_query($conn,"select * from tripy_role where role_id=$_SESSION[role_id]");
$role_row=mysqli_fetch_array(result: $role_query);
?>         
        
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.php">
                    <span class="brand">
                        <span class="brand-tip">Tripy</span>
                    </span>
                    <span class="brand-mini">Tripy</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge">9</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>9 New</strong> Messages</span>
                                    <a class="pull-right" href="mailbox.html">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="./assets/img/users/u1.jpg" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                                <div class="font-13">Your proposal interested me.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="./assets/img/users/u2.jpg" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="./assets/img/users/u3.jpg" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="./assets/img/users/u4.jpg" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>Notifications</strong></span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                    <?php $notification_data=mysqli_query($conn,"select * from tripy_notification where login_id=$_SESSION[login_id]");
                                    while ($notification_data_row=mysqli_fetch_array($notification_data))
                                    {
                                        ?>
                                        <a class="list-group-item">
                                        <div class="media">
                                        <?php
                                        if (strpos($notification_data_row['notification_message'],"Not") !== false) 
                                        {       
                                    ?>
                                        <div class="media-img">
                                            <span class="badge badge-danger badge-big"><i class="fa fa-close"></i></span>
                                        </div>
                                    <?php
                                        }
                                        elseif (strpos($notification_data_row['notification_message'],"Driver is Register") !== false) 
                                        {       
                                    ?>
                                        <div class="media-img">
                                            <span class="badge badge-warning badge-big"><i class="fa fa-user"></i></span>
                                        </div>
                                    <?php
                                        }
                                        elseif (strpos($notification_data_row['notification_message'],"Ride is Booked") !== false) 
                                        {       
                                    ?>
                                        <div class="media-img">
                                            <span class="badge badge-dark badge-big"><i class="fa fa-car"></i></span>
                                        </div>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <div class="media-img">
                                            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                        <div class="media-body">
                                            <div class="font-13"><?php echo $notification_data_row['notification_message']; ?></div><small class="text-muted"><?php echo $notification_data_row['created_date']; ?></small></div>
                                        </div>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span><?php echo ucfirst($role_row['role_title']); ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="change_password.php"><i class="fa fa-cog"></i>Change Password</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>