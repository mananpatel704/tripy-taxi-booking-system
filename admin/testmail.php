<?php
$to = "mananpatel1950@gmail.com";
$subject = "HTML email";

$reset_link = "http://localhost/tripy/admin/change_password.php";


$message = "
<html>
<head>
<title>Reset Password</title>
</head>
<body>
<p>Dear User,</p>
<p>Please click on the following link to reset your password:</p>
<p><a href='$reset_link'>Reset Password</a></p>
</body>
</html>
";




// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <mananpatel704@gmail.com>' . "\r\n";

if(mail($to,$subject,$message,$headers))
{
    echo "mail sent";
}
else
{
    echo "error";
}
?>