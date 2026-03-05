<?php
$conn=mysqli_connect("localhost","root","","tripy_db");
if(isset($_POST['submit']))
{
    $login_fname = $_POST['login_fname'];
    $login_lname = $_POST['login_lname'];
    $login_username = $_POST['login_username'];
    $login_email = $_POST['login_email'];
    $login_password = md5($_POST['login_password']);

    $login_thumb_org=$_FILES["login_thumb"]["name"];
    $login_thumb_tmp=$_FILES["login_thumb"]["tmp_name"];
    $targetfile="uploads/".$login_thumb_org;
    move_uploaded_file($login_thumb_tmp, $targetfile);
    
    $role_id = $_POST['role_id'];
    $query=mysqli_query($conn,"insert into tripy_login (login_fname,login_lname,login_username,login_email,login_password,login_thumb,role_id) values ('$login_fname','$login_lname','$login_username','$login_email','$login_password','$login_thumb_org',$role_id)");

    
    if($query)
    {
        $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Register Successfully.</div>';
    }
    else
    {
        $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
    }
}
$role_data=mysqli_query($conn,"select * from tripy_role");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Tripy | Register</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon"
        href="https://play-lh.googleusercontent.com/H9yLRV4nbC7A-HZUwrm189yLxSkV62U-VlAfDa6BFVuCcXDzxaUUypqTkuIP9bAuiA=w240-h480-rw">
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.php">Tripy</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="login-title">Sign Up</h2>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input class="form-control" type="text" name="login_fname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="login_lname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="login_username" placeholder="User Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Email" name="login_email" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="login_password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="login_thumb">
            </div>
            <div class="form-group">
                <?php
                    $role_query=mysqli_query($conn,"select * from tripy_role where role_title='admin'");
                    $role_data=mysqli_fetch_array($role_query);
                ?>
                <input class="form-control" type="hidden" value="<?php echo $role_data['role_id']; ?>" name="role_id" placeholder="role_id">
            </div>
            <div class="form-group text-left">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" name="agree">
                    <span class="input-span"></span>I agree the terms and policy</label>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" value="signup" name="submit">Sign up</button>
            </div>

            <div class="text-center">Already a member?
                <a class="color-blue" href="login.php">Login here</a>
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
        $('#register-form').validate({
            errorClass: "help-block",
            rules: {
                first_name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    confirmed: true
                },
                password_confirmation: {
                    equalTo: password
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