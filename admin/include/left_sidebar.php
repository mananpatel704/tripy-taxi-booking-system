<?php
$role_query=mysqli_query($conn,"select * from tripy_role where role_id=$_SESSION[role_id]");
$role_row=mysqli_fetch_array($role_query);
?>
<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img class="rounded-circle" src="<?php echo 'uploads/'.$_SESSION['login_thumb']; ?>" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo ucfirst($_SESSION['login_username']); ?></div><small><?php echo ucfirst($role_row['role_title']); ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                   
                    <li class="<?php if($file=='index') { echo 'active'; } else { echo 'noactive';}?>">
                        <a class="active" href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard  </span>
                        </a>
                    </li>
                    <?php
                    if($role_row['role_title']!='driver' && $role_row['role_title']!='user')
                    {
                    ?> 
                    <li class="<?php if($file=='add_role' || $file=='manage_role') { echo 'active'; } else { echo 'noactive';}?>">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Role</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>    
                                <a href="add_role.php">Add Role</a>
                            </li>
                            <li>
                                <a href="manage_role.php">All Role</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($file=='add_type' || $file=='manage_type') { echo 'active'; } else { echo 'noactive';}?>">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Type</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="add_type.php">Add Type</a>
                            </li>
                            <li>
                                <a href="manage_type.php">All Type</a>
                            </li>
                        </ul>
                    <li class="<?php if($file=='manage_driver') { echo 'active'; } else { echo 'noactive';}?>">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Driver</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="manage_driver.php">All Driver</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }
                    ?>
                    
                    <li class="<?php if($file=='manage_ride' || $file=='allocated_ride') { echo 'active'; } else { echo 'noactive';}?>">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Ride</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                        <?php
                    if($role_row['role_title']!='driver' && $role_row['role_title']!='user')
                    {
                    ?>
                            <li>
                                <a href="manage_ride.php">All Rides</a>
                            </li>
                            <li>
                                <a href="allocated_ride.php">Allocated  Rides</a>
                            </li>
                            <?php
                    }
                    if($role_row['role_title']!='user' && $role_row['role_title']!='admin')
                    {
                            ?>
                            <li>
                                <a href="driver_rides.php">Driver Rides</a>
                            </li>
                            <?php
                    }
                    if($role_row['role_title']!='driver' && $role_row['role_title']!='admin')
                    {
                            ?>
                            <li>
                                <a href="user_rides.php">User Rides</a>
                            </li>
                            <?php
                    }
                            ?>
                        
                        </ul>
                    <li>
                    <?php
                    if($role_row['role_title']!='driver' && $role_row['role_title']!='user')
                    {
                    ?>
                    <li class="<?php if($file=='manage_user') { echo 'active'; } else { echo 'noactive';}?>">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">User</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="manage_user.php">All User</a>
                            </li>
                        </ul>
                    <li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>