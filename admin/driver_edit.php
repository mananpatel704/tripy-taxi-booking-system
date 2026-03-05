<?php
include("include/main_header.php");
$driver_id=$_GET['driver_id'];
$driver_data=mysqli_query($conn,"select * from tripy_driver where driver_id=$driver_id");
$driver_row=mysqli_fetch_array($driver_data);

$login_query=mysqli_query($conn,"select * from tripy_login where login_id=$driver_row[login_id]");
$login_row=mysqli_fetch_array($login_query);

if (isset($_POST['submit'])) {
    $driver_fname = $_POST['driver_fname'];
    $driver_lname = $_POST['driver_lname'];
    $driver_username = $_POST['driver_username'];
    $driver_email = $_POST['driver_email'];
    $driver_password = md5($_POST['driver_password']);

    $driver_thumb_org = $_FILES["driver_thumb"]["name"];
    $driver_thumb_tmp = $_FILES["driver_thumb"]["tmp_name"];
    $targetfile = "uploads/" . $driver_thumb_org;
    move_uploaded_file($driver_thumb_tmp, $targetfile);

    $role_id = $_POST['role_id'];

    $driver_phone = $_POST['driver_phone'];
    $driver_licence_org = $_FILES["driver_licence"]["name"];
    $driver_licence_tmp = $_FILES["driver_licence"]["tmp_name"];
    $targetfile = "uploads/" . $driver_licence_org;
    move_uploaded_file($driver_licence_tmp, $targetfile);

    $driver_adhar_card_org = $_FILES["driver_adhar_card"]["name"];
    $driver_adhar_card_tmp = $_FILES["driver_adhar_card"]["tmp_name"];
    $targetfile = "uploads/" . $driver_adhar_card_org;
    move_uploaded_file($driver_adhar_card_tmp, $targetfile);

    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_type = $_POST['vehicle_type'];

    $login_query=mysqli_query($conn,"insert into tripy_login (login_fname,login_lname,login_username,login_email,login_password,login_thumb,role_id) values ('$driver_fname','$driver_lname','$driver_username','$driver_email','$driver_password','$driver_thumb_org',$role_id)");
    $login_id = mysqli_insert_id($conn);
    if($login_query)
    {
        $driver_query = mysqli_query($conn, "insert into tripy_driver (login_id,driver_phone,driver_licence,driver_adhar_card,vehicle_name,vehicle_type) values ($login_id,$driver_phone,'$driver_licence_org','$driver_adhar_card_org','$vehicle_name','$vehicle_type')");
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
                <h1 class="page-title">Edit</h1>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label>Driver</label>
                                            <input class="col form-group" type="text" name="login_fname" placeholder="First Name" value="<?php echo $login_row['login_fname'];?>"><br>
                                            <input class="col form-group" type="text" name="login_lname" placeholder="Last Name"
                                            value="<?php echo $login_row['login_lname'];?>"><br>
                                            <input class="col form-group" type="email" name="login_email" placeholder="email"
                                            value="<?php echo $login_row['login_email'];?>"><br>
                                            <input class="col form-group" type="password" name="login_password" placeholder="password"
                                            value="<?php echo $login_row['login_thumb'];?>"><br>
                                            <input class="col form-group" type="file" name="login_thumb" placeholder="thumb"

                                            value="<?php echo $login_row['role_id'];?>"><br>
                                            <input class="col form-group" type="file" name="role_id" placeholder="role id"

                                            value="<?php echo $login_row['login_password'];?>"><br>
                                            <input class="col form-group" type="number" name="driver_phone" placeholder="Phone Number" value="<?php echo $driver_row['driver_phone'];?>"><br>
                                            <input class="form-control" type="file" name="driver_licence" placeholder="Licence"
                                            value="<?php echo $driver_row['driver_licence'];?>" class="form-control" ><br>      
                                            <input class="form-control" type="file" name="driver_adhar_card" placeholder="Addhar Card"
                                            value="<?php echo $driver_row['driver_adhar_card'];?>" class="form-control"><br>
                                            <select class="form-control"  name="vehicle_type" value="<?php echo $driver_row['vehicle_type'];?>"> 
                                                <tr>
                                                    <option value="two-wheeler"> <td>Two-wheeler</td></option>
                                                    <option value="three-wheeler"> <td>Three-wheeler</td></option>
                                                    <option value="four-wheeler"> <td>Four-wheeler</td></option>
                                                </tr>
                                            </select><br>
                                            <input class="col form-group" type="textbox" name="vehicle_name" value="<?php echo $driver_row['vehicle_name'];?>" placeholder="vehicle_name"><br> 
                                            <button type="submit" name="submit">submit</button>
                                        </div>
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