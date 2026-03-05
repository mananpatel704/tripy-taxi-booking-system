<?php
$login_email=$_GET['login_email'];
$conn=mysqli_connect("localhost", "root", "", "tripy_db");
if (isset($_POST['submit']))
 {

    $login_newpassword = md5($_POST['login_newpassword']);
    $login_conpassword = md5($_POST['login_conpassword']);

        if($login_newpassword==$login_conpassword) 
     {
        

         $query=mysqli_query($conn,"update tripy_login set login_password='$login_newpassword' where login_email='$login_email'");

        if ($query)
        {
            $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Password Reset Successfully.</div>';
        }
         else
         {
            $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
        }
    }
    
    else
    
    {
        $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> New Password And Conform Password Did Not Match</div>';
    }

}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Tripy | Reset password</title>
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
            <h3 class="m-t-10 m-b-10 mb-2">Reset password</h3>
            <p class="m-b-20"></p>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <div class="form-group mt-2">
                <input class="form-control" type="password" name="login_newpassword" placeholder="enter new password"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="login_conpassword" placeholder="conform password"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" name="submit">Submit</button>
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
        $(function () {
            $('#forgot-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                highlight: function (e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function (e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>