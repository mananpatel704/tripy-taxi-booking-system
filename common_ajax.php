<?php
$conn=mysqli_connect("localhost","root","","tripy_db");
$email_admin_query=mysqli_query($conn,"SELECT tripy_role.role_id,tripy_role.role_title,tripy_login.role_id,tripy_login.login_email FROM tripy_role JOIN tripy_login ON tripy_role.role_id = tripy_login.role_id AND tripy_role.role_title='admin' ORDER BY tripy_login.login_id");
$email_admin_row=mysqli_fetch_array($email_admin_query);
$admin_email=$email_admin_row['login_email'];

$action=$_POST['action'];
if($action=='status')
{
    $status=$_POST['status'];
    $ride_id=$_POST['ride_id'];
    if($status==1)
    {
        $update_status=mysqli_query($conn,"update tripy_ride set status=0 where ride_id=$ride_id");
        if($update_status)
        {
            echo "Success";
        }
    }
}
else if($action=='status_not')
{
    $status=$_POST['status'];
    $ride_id=$_POST['ride_id'];
    if($status==0)
    {
        $update_status=mysqli_query($conn,"update tripy_ride set status=0 where ride_id=$ride_id");
        if($update_status)
        {
        $ride_id_query=mysqli_query($conn,"select * from tripy_ride where ride_id=$ride_id");
        $ride_id_row=mysqli_fetch_array($ride_id_query);
        $ride_select=mysqli_query($conn,"select * from tripy_login where login_id=$ride_id_row[login_id]");
        $ride_row=mysqli_fetch_array($ride_select);
        $login_fname=$ride_row['login_fname'];


        $to = $ride_row['login_email'];
        $subject = "Ride Cancel email";

        $message = "
        <html>
        <head>
        <title>Ride Cancel </title>
        </head>    
        <body>
            <!DOCTYPE html>
<head>
    <title>Ride Cancel Successful</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
        
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>    
<h1>WELCOME TO 'TRIPY'</h1>

    <h2>Dear '$login_fname'</h2>
    <p>We are pleased to inform you that your detail has been chacked , and you are Cancelled your ride:</p>
    <table>
        
    </table>
    <p>If you have any questions or need further assistance, please do not hesitate to contact us.</p>
    <p>Best Regards,<br/>The Team</p>
</body>
</html>

        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) 
        {
            echo "mail send";
        } 
        else 
        {
            echo "error";
        }




        $to = $admin_email;
        $subject = "Cancel email";

        $message = "
        <html>
        <head>
        <title>Cancel email</title>
        </head>    
        <body>
            <!DOCTYPE html>
<head>
    <title>Ride Cancelled Successful</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
        
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>    
<h1>WELCOME TO 'TRIPY'</h1>

    <h2>Dear '$login_fname'</h2>
    <p>We are pleased to inform you that your detail has been chacked , and you are Cancelled your ride:</p>
    <table>
        
    </table>
    <p>If you have any questions or need further assistance, please do not hesitate to contact us.</p>
    <p>Best Regards,<br/>The Team</p>
</body>
</html>

        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) 
        {
            echo "mail send";
        } 
        else 
        {
            echo "error";
        }

        $driver_ride_query=mysqli_query($conn,"select * from tripy_driver_ride where ride_id=$ride_id");
        $driver_ride_row=mysqli_fetch_array($driver_ride_query);

        $driver_query=mysqli_query($conn,"select * from tripy_driver where driver_id=$driver_ride_row[driver_id]");
        $driver_row=mysqli_fetch_array($driver_query);

        $login_query=mysqli_query($conn,"select * from tripy_login where login_id=$driver_row[login_id]");
        $login_row=mysqli_fetch_array($login_query);

        
        $to = $login_row['login_email'];
        $subject = "Ride Cancel email";

        $message = "
        <html>
        <head>
        <title>Ride Cancel</title>
        </head>    
        <body>
            <!DOCTYPE html>
<head>
    <title>Ride Cancelled Successful</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
        
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>    
<h1>WELCOME TO 'TRIPY'</h1>

    <h2>Dear '$login_fname'</h2>
    <p>We are pleased to inform you that your detail has been chacked , and you are Cancelled your ride:</p>
    <table>
        
    </table>
    <p>If you have any questions or need further assistance, please do not hesitate to contact us.</p>
    <p>Best Regards,<br/>The Team</p>
</body>
</html>

        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) 
        {
            echo "mail send";
        } 
        else 
        {
            echo "error";
        }
    }
    }
    }

?>