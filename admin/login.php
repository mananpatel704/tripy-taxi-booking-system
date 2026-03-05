<?php
session_start();
if(isset($_SESSION['admin_login_id']))
{
    header("Location:index.php");
}
$conn=mysqli_connect("localhost","root","","tripy_db");
if(isset($_POST['login']))
{
    $login_email=$_POST['login_email'];
    $login_password=md5($_POST['login_password']);
    $query=mysqli_query($conn,"select * from tripy_login where login_email='$login_email' AND login_password='$login_password'");
    
    
    if(mysqli_num_rows($query)>0)
    {
        $login_row=mysqli_fetch_array(($query));
        $_SESSION['admin_login_id']=$login_row['login_id'];
        $_SESSION['login_id']=$login_row['login_id'];
        $_SESSION['login_fname']=$login_row['login_fname'];
        $_SESSION['login_lname']=$login_row['login_lname'];
        $_SESSION['login_username']=$login_row['login_username'];
        $_SESSION['login_email']=$login_row['login_email'];
        $_SESSION['role_id']=$login_row['role_id'];
        $_SESSION['login_thumb']=$login_row['login_thumb'];
        if($_SESSION['role_id'] ==2)
        {
            $user_data=mysqli_query($conn, "SELECT * from tripy_user WHERE login_id=$_SESSION[login_id]");
            $user_row=mysqli_fetch_array($user_data);
            $_SESSSION['user_id'] = $user_row['user_id'];
        }

        if($_SESSION['role_id'] ==3)
        {
            $driver_data=mysqli_query($conn, "SELECT * from tripy_driver WHERE login_id=$_SESSION[login_id]");
            $driver_row=mysqli_fetch_array($driver_data);
            $_SESSION['driver_id'] = $driver_row['driver_id'];
        }
        header("Location:index.php");
    } 
    else
    {
        $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
    }

}
   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Tripy | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="https://play-lh.googleusercontent.com/H9yLRV4nbC7A-HZUwrm189yLxSkV62U-VlAfDa6BFVuCcXDzxaUUypqTkuIP9bAuiA=w240-h480-rw">
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.php">Tripy</a>
        </div>
        <form action="" method="post">
            <h2 class="login-title">Log in</h2>
            <?php
                if(isset($result))
                {
                echo $result;
                }
                ?>
            <div class="form-group mt-3">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="login_email" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="login_password" placeholder="Password">
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="input-group-icon right">
                    <select class="form-control" name="user_type" id="">
                        <option value="admin">Admin</option>
                        <option value="driver">Driver</option>
                    </select>
                </div>
            </div> -->
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <a href="forgot_password.php">Forgot password?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" name="login" value="login">Login</button>
            </div>
            
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.php">Create accaunt</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>