<?php
include("include/main_header.php");
$login_id=$_SESSION['login_id'];
if(isset($_POST['submit']))
{
    $login_oldpassword=md5($_POST['login_oldpassword']);
    $login_newpassword=md5($_POST['login_newpassword']);
    $login_conpassword=md5($_POST['login_conpassword']);

    $query=mysqli_query($conn,"SELECT * FROM tripy_login WHERE login_password='$login_oldpassword'");
    // echo "SELECT * FROM tripy_admin WHERE admin_password='$admin_oldpassword'";
    // exit;

    if(mysqli_num_rows($query)>0)
    {
        if($login_newpassword==$login_conpassword)
        {
            $query=mysqli_query($conn,"update tripy_login set login_password='$login_newpassword' where login_id=$login_id" );
            if($query)
            {
                $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Password Changed.</div>';            
            }
        }
        else
        {
            $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> New Password And Conform Password Did Not Match</div>';
        }
    }
    else
    {
        $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
    }
}

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
                <h1 class="page-title">change password Form</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">Basic Form</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head mb-3">
                                <div class="ibox-title">change password</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if(isset($result))
                                {
                                echo $result;
                                }
                            ?>
                            <div class="ibox-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <!-- <label>change password</label> -->
                                            <input class="form-control" type="text" placeholder="old password" name="login_oldpassword">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <input class="form-control" type="text" placeholder=" new password" name="login_newpassword">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <input class="form-control" type="text" placeholder="conform password" name="login_conpassword">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit" name="submit" value="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
                <div>
                    
                </div>
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