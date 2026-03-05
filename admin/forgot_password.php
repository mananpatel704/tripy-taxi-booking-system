<?php
$conn=mysqli_connect("localhost","root","","tripy_db");
if(isset($_POST['submit']))
{
   $login_email=$_POST['login_email'];

    $query=mysqli_query($conn,"SELECT * FROM tripy_login WHERE login_email='$login_email'");
    
    if(mysqli_num_rows($query)>0)
    {
        //echo "email match";
        $to = $login_email;
        $subject = "Reset Password Request";
        
        $reset_link = "http://localhost/tripy/admin/reset_password.php?login_email=";
        
        
        $message = "
        <html>
        <head>
        <title>Reset Password</title>
        </head>
        <body>
        <p>Dear User,</p>
        <p>Please click on the following link to reset your password:</p>
        <p><a style='color: black; background: #f7c621; padding: 12px 70px; border-radius: 25px; font-size: 18px; font-weight: 600;' href='http://localhost/tripy/admin/reset_password.php?login_email=".$login_email."'>Reset Password</a></p>
        </body>
        </html>
        ";
        
        
        
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        
        if(mail($to,$subject,$message,$headers))
        {
            $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Mail Sent Successfully.</div>';
        }
        else
        {
            $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Mail Not Sent.</div>';
        }
        
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
    <title>Tripy | Forgot password</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.php">Tripy</a>
        </div>
        <form action="" method="post">
            <h3 class="m-t-10 m-b-10">Forgot password</h3>
            <p class="m-b-20 mb-2">Enter your email address below and we'll send you password reset instructions.</p>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <div class="form-group mt-2">
                <input class="form-control"  type="email" name="login_email" placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block"  type="submit" name="submit" > Submit</button>
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
            $('#forgot-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
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