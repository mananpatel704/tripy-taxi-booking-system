<?php
include("include/main_header.php");
$role_id=$_GET['role_id'];

$role_data=mysqli_query($conn,"select * from tripy_role where role_id=$role_id");
$role_row=mysqli_fetch_array($role_data);
if(isset($_POST['submit']))
{
    $role_title=$_POST['role_title'];
    $query=mysqli_query($conn,"update  tripy_role set role_title='$role_title'where role_id=$role_id");
            if($query)
            {
                $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Role Edited Successfully.</div>';
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
                <h1 class="page-title">Edit Form</h1>
                <?php
                if(isset($result))
                {
                echo $result;
                }
                ?>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Role Title</label>
                                            <input class="form-control" type="text" placeholder="Role Title" name="role_title"  value="<?php echo $role_row['role_title'];?>">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit" name="submit">Submit</button>
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